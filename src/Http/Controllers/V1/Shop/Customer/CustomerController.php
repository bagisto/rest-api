<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Illuminate\Http\Request;
use Webkul\Customer\Models\Customer;
use Webkul\RestApi\Http\Controllers\V1\Shop\ShopController;

class CustomerController extends ShopController
{
    /**
     * Check Referral Code.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function checkReferralCode($referralCode)
    {
        $cek = Customer::where('referral_code', $referralCode)->exists();

        return response([
            'data'    => [
                'isMarketingExist' => $cek
            ],
            'message' => 'Payment method saved successfully.',
        ]);
    }
}
