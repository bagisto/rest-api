<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Customer\CustomerResource;

class AuthController extends CustomerController
{
    use SendsPasswordResetEmails;
    
    /**
     * Controller instance.
     *
     * @param  \Webkul\Customer\Repositories\CustomerRepository  $customerRepository
     * @param  \Webkul\Customer\Repositories\CustomerGroupRepository  $customerGroupRepository
     * @return void
     */
    public function __construct(
        protected CustomerRepository $customerRepository,
        protected CustomerGroupRepository $customerGroupRepository
    ) {
        parent::__construct();
    }

    /**
     * Register the customer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'first_name'            => 'required|alpha_num|regex:/^[a-z\d\-_\s]+$/i',
            'last_name'             => 'required|alpha_num|regex:/^[a-z\d\-_\s]+$/i',
            'email'                 => 'required|email|unique:customers,email',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        $this->customerRepository->create([
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
            'is_verified'       => 1,
            'channel_id'        => core()->getCurrentChannel()->id,
            'customer_group_id' => $this->customerGroupRepository->findOneWhere(['code' => 'general'])->id,
        ]);

        return response([
            'message' => 'Your account has been created successfully.',
        ]);
    }

    /**
     * Login the customer.
     *
     * @param  \Illuminate\Http\Request  $request
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
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            /**
             * Preventing multiple token creation.
             */
            $customer->tokens()->delete();

            return response([
                'data'    => new CustomerResource($customer),
                'message' => 'Logged in successfully.',
                'token'   => $customer->createToken($request->device_name, ['role:customer'])->plainTextToken,
            ]);
        }

        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            return response([
                'data'    => new CustomerResource($this->resolveShopUser($request)),
                'message' => 'Logged in successfully.',
            ]);
        }

        return response([
            'message' => 'Invalid Email or Password',
        ], 401);
    }

    /**
     * Get details for current logged in customer.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $customer = $this->resolveShopUser($request);

        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'gender'        => 'required',
            'date_of_birth' => 'nullable|date|before:today',
            'email'         => 'email|unique:customers,email,' . $customer->id,
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
            'message' => 'Your account has been updated successfully.',
        ]);
    }

    /**
     * Logout the customer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $customer = $this->resolveShopUser($request);

        ! EnsureFrontendRequestsAreStateful::fromFrontend($request)
            ? $customer->tokens()->delete()
            : auth()->guard('customer')->logout();

        return response([
            'message' => 'Logged out successfully.',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
