<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Webkul\Core\Rules\AlphaNumericSpace;
use Webkul\Core\Rules\PhoneNumber;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Customer\CustomerResource;

class AuthController extends CustomerController
{
    use SendsPasswordResetEmails;

    /**
     * Customer respository instance.
     *
     * @var \Webkul\Customer\Repositories\CustomerRepository
     */
    protected $customerRepository;

    /**
     * Customer group repository instance.
     *
     * @var \Webkul\Customer\Repositories\CustomerGroupRepository
     */
    protected $customerGroupRepository;

    /**
     * Controller instance.
     *
     * @return void
     */
    public function __construct(
        CustomerRepository $customerRepository,
        CustomerGroupRepository $customerGroupRepository
    ) {
        parent::__construct();

        $this->customerRepository = $customerRepository;

        $this->customerGroupRepository = $customerGroupRepository;
    }

    /**
     * Register the customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'first_name'            => ['required', new AlphaNumericSpace],
            'last_name'             => ['required', new AlphaNumericSpace],
            'email'                 => 'required|email|unique:customers,email',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        Event::dispatch('customer.registration.before');

        $customer = $this->customerRepository->create([
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
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
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
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
            Event::dispatch('customer.after.login', $request->get('email'));

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
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        $customer = $this->resolveShopUser($request);

        return response([
            'data' => new CustomerResource($customer),
        ]);
    }

    /**
     * Update the customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $customer = $this->resolveShopUser($request);

        $request->validate([
            'first_name'    => ['required', new AlphaNumericSpace],
            'last_name'     => ['required', new AlphaNumericSpace],
            'gender'        => 'required',
            'date_of_birth' => 'nullable|date|before:today',
            'email'         => 'email|unique:customers,email,'.$customer->id,
            'phone'         => ['required', new PhoneNumber],
            'password'      => 'confirmed|min:6',
        ]);

        $data = $request->all();

        if (! isset($data['password']) || ! $data['password']) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $updatedCustomer = $this->customerRepository->update($data, $customer->id);

        return response([
            'data'    => new CustomerResource($updatedCustomer),
            'message' => trans('rest-api::app.shop.customer.addresses.update-success'),
        ]);
    }

    /**
     * Logout the customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $customer = $this->resolveShopUser($request);

        ! EnsureFrontendRequestsAreStateful::fromFrontend($request)
            ? $customer->tokens()->delete()
            : auth()->guard('customer')->logout();

        Event::dispatch('customer.after.logout', $id);

        return response([
            'message' => trans('rest-api::app.shop.customer.accounts.logged-in-success'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request)
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
