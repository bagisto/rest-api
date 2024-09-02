<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Webkul\Core\Repositories\SubscribersListRepository;
use Webkul\Core\Rules\PhoneNumber;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Customer\CustomerResource;
use Webkul\Shop\Http\Requests\Customer\RegistrationRequest;

class AuthController extends CustomerController
{
    use SendsPasswordResetEmails;

    /**
     * Controller instance.
     *
     * @return void
     */
    public function __construct(
        protected CustomerRepository $customerRepository,
        protected CustomerGroupRepository $customerGroupRepository,
        protected SubscribersListRepository $subscriptionRepository
    ) {}

    /**
     * Register the customer.
     */
    public function register(RegistrationRequest $registrationRequest): Response
    {
        Event::dispatch('customer.registration.before');

        $customer = $this->customerRepository->create([
            'first_name'        => $registrationRequest->first_name,
            'last_name'         => $registrationRequest->last_name,
            'email'             => $registrationRequest->email,
            'password'          => bcrypt($registrationRequest->password),
            'is_verified'       => 1,
            'channel_id'        => core()->getCurrentChannel()->id,
            'customer_group_id' => $this->customerGroupRepository->findOneWhere(['code' => 'general'])->id,
        ]);

        Event::dispatch('customer.registration.after', $customer);

        return response([
            'message' => trans('rest-api::app.shop.customer.accounts.create-success'),
        ]);
    }

    /**
     * Login the customer.
     */
    public function login(Request $request): Response
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (! EnsureFrontendRequestsAreStateful::fromFrontend($request)) {
            $request->validate([
                'device_name' => 'required',
            ]);

            $customer = $this->customerRepository->where('email', $request->email)->first();

            if (! $customer || ! Hash::check($request->password, $customer->password)) {
                throw ValidationException::withMessages([
                    'email' => trans('rest-api::app.shop.customer.accounts.error.credential-error'),
                ]);
            }

            /**
             * Preventing multiple token creation.
             */
            $customer->tokens()->delete();

            /**
             * Event passed to prepare cart after login.
             */
            Event::dispatch('customer.after.login', $customer);

            return response([
                'data'    => new CustomerResource($customer),
                'message' => trans('rest-api::app.shop.customer.accounts.logged-in-success'),
                'token'   => $customer->createToken($request->device_name, ['role:customer'])->plainTextToken,
            ]);

        }

        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            return response([
                'data'    => new CustomerResource($this->resolveShopUser($request)),
                'message' => trans('rest-api::app.shop.customer.accounts.logged-in-success'),
            ]);
        }

        return response([
            'message' => trans('rest-api::app.shop.customer.accounts.error.invalid'),
        ], 401);
    }

    /**
     * Get details for current logged in customer.
     */
    public function get(Request $request): Response
    {
        $customer = $this->resolveShopUser($request);

        return response([
            'data' => new CustomerResource($customer),
        ]);
    }

    /**
     * Update the customer.
     */
    public function update(Request $request): Response
    {
        $customer = $this->resolveShopUser($request);

        $isPasswordChanged = false;

        $request->validate([
            'first_name'                => ['required'],
            'last_name'                 => ['required'],
            'gender'                    => 'required|in:Other,Male,Female',
            'date_of_birth'             => 'date|before:today',
            'email'                     => 'email|unique:customers,email,'.$customer->id,
            'new_password'              => 'confirmed|min:6|required_with:current_password',
            'new_password_confirmation' => 'required_with:new_password',
            'current_password'          => 'required_with:new_password',
            'image'                     => 'array',
            'image.*'                   => 'mimes:bmp,jpeg,jpg,png,webp',
            'phone'                     => ['required', new PhoneNumber(), 'unique:customers,phone,'.$customer->id],
            'subscribed_to_news_letter' => 'nullable',
        ]);

        $data = $request->all();

        if (
            core()->getCurrentChannel()->theme === 'default' 
            && ! isset($data['image'])
        ) {
            $data['image']['image_0'] = '';
        }

        $data['subscribed_to_news_letter'] = $request->boolean('subscribed_to_news_letter');

        if (! empty($data['current_password'])) {
            if (Hash::check($data['current_password'], $customer->password)) {
                $isPasswordChanged = true;

                $data['password'] = bcrypt($data['new_password']);
            } else {
                return response(['message' => trans('rest-api::app.shop.customer.accounts.error.password-mismatch')]);
            }
        } else {
            unset($data['new_password']);
        }

        Event::dispatch('customer.update.before');

        if ($customer = $this->customerRepository->update($data, $customer->id)) {
            if ($isPasswordChanged){
                Event::dispatch('customer.password.update.after', $customer);
            }

            Event::dispatch('customer.update.after', $customer);

            if ($request->boolean('subscribed_to_news_letter')) {
                $subscription = $this->subscriptionRepository->firstOrNew(['email' => $data['email']]);

                if ($subscription) {
                    $this->subscriptionRepository->update([
                        'customer_id'   => $customer->id,
                        'is_subscribed' => 1,
                    ], $subscription->id);
                } else {
                    $this->subscriptionRepository->create([
                        'email'         => $data['email'],
                        'customer_id'   => $customer->id,
                        'channel_id'    => core()->getCurrentChannel()->id,
                        'is_subscribed' => 1,
                        'token'         => uniqid(),
                    ]);
                }
            } else {
                $subscription = $this->subscriptionRepository->findOneWhere(['email' => $data['email']]);

                if ($subscription) {
                    $this->subscriptionRepository->update([
                        'customer_id'   => $customer->id,
                        'is_subscribed' => 0,
                    ], $subscription->id);
                }
            }

            if ($request->hasFile('image')) {
                $this->customerRepository->uploadImages($data, $customer);
            } elseif (isset($data['image'])) {
                if (! empty($data['image'])) {
                    Storage::delete((string)$customer->image);
                }
                
                $customer->image = null;

                $customer->save();
            }

            return response([
                'data'    => new CustomerResource($customer),
                'message' => trans('rest-api::app.shop.customer.accounts.update-success'),
            ]);
        }

        return response(['message' => trans('rest-api::app.shop.customer.accounts.error.update-failed')]);
    }

    /**
     * Logout the customer.
     */
    public function logout(Request $request): Response
    {
        $customer = $this->resolveShopUser($request);

        ! EnsureFrontendRequestsAreStateful::fromFrontend($request)
            ? $customer->tokens()->delete()
            : auth()->guard('customer')->logout();

        Event::dispatch('customer.after.logout', $customer->id);

        return response([
            'message' => trans('rest-api::app.shop.customer.accounts.logged-out-success'),
        ]);
    }

    /**
     * Send Reset Password Link.
     */
    public function forgotPassword(Request $request): Response
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $response = Password::broker('customers')->sendResetLink($request->only(['email']));

        return response(
            ['message' => __($response)],
            $response == Password::RESET_LINK_SENT ? 200 : 400
        );
    }
}
