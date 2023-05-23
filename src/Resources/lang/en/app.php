<?php

return [
    'sales' => [
        'orders' => [
            'cancel-error'    => 'Order can not be canceled.',
            'order-not-found' => 'Order not found',
        ],

        'invoices' => [
            'invalid-qty-error' => 'We found an invalid quantity to invoice items.',
            'creation-error'    => 'Order invoice creation is not allowed.',
            'product-error'     => 'Invoice can not be created without products.',
        ],

        'shipments' => [
            'invalid-qty-error' => 'We found an invalid quantity for shipment items.',
            'creation-error'    => 'Shipment cannot be created for this order.',
        ],

        'refunds' => [
            'creation-error'       => 'Refund cannot be created for this order.',
            'invalid-amount-error' => 'Refund amount should be non zero.',
            'invalid-qty-error'    => 'We found an invalid quantity for refund items.',
            'limit-error'          => 'The most money available to refund is :amount.',
        ],

        'transactions' => [
            'already-paid'      => 'This invoice has already been paid.',
            'invoice-missing'   => 'This invoice id does not exist.',
            'transaction-saved' => 'The transaction has been saved.',
            'transaction-amount-exceeds' => 'The specified amount of this transaction exceeds the total amount of the invoice.',
        ],
    ],

    'catalog' => [
        'products' => [
            'configurable-error' => 'Please select atleast one configurable attribute.',
            'review'             => 'Your review submitted successfully.'
        ],
    ],

    'customers' => [
        'note-cannot-taken' => 'Note cannot be taken.',
        'note-taken'        => 'Note taken.',
    ],

    'account'  => [
        'create'             => 'Your account has been updated successfully.',
        'login'              => 'Logged in successfully.',
        'logout'             => 'Logged out successfully.',
        'invalid-credential' => 'The provided credentials are incorrect.',
    ],

    'wishlist' => [
        'moved'          => 'Product Added to the Cart Successfully.',
        'option-missing' => 'Product options are missing, so item can not be moved to the wishlist.',
    ],

    'address' => [
        'created' => 'Your address has been created successfully.',
        'removed' => 'Address remove successfully',
    ],

    'checkout' => [
        'cart' => [
            'item' => [
                'error-add'      => 'Item cannot be added to cart, please try again later.',
                'error-remove'   => 'No items to remove from the cart.',
                'inactive'       => 'Item is inactive and was removed from cart.',
                'inactive-add'   => 'Inactive item cannot be added to cart.',
                'success'        => 'Item is successfully added to cart.',
                'success-remove' => 'Item is successfully removed from the cart.',
            ],

            'quantity' => [
                'error'             => 'Cannot update the item(s) at the moment, please try again later.',
                'illegal'           => 'Quantity cannot be lesser than one.',
                'inventory-warning' => 'The requested quantity is not available, please try again later.',
                'quantity'          => 'Quantity',
                'success'           => 'Cart Item(s) successfully updated.',
            ],

            'coupon' => [
                'apply-issue'    => 'Coupon code can\'t be applied.',
                'invalid'        => 'Coupon code is invalid.',
                'success'        => 'Coupon code applied successfully.',
                'success-remove' => 'Coupon removed successfully.',
            ],

            'move-wishlist' => [
                'error'   => 'Cannot move item to wishlist, please try again later.',
                'success' => 'Item moved to wishlist successfully.',
            ],

            'empty'               => 'Cart is empty.',
            'save'                => 'Order saved successfully.',
        ],

        'minimum-order-message'         => 'Minimum order amount is :amount.',
        'check-shipping-address'        => 'Please check shipping address.',
        'check-billing-address'         => 'Please check billing address.',
        'specify-shipping-method'       => 'Please specify shipping method.',
        'specify-payment-method'        => 'Please specify payment method.',
        'enter-shipping-method'         => 'Please Enter the shipping method',
        'shipping-method-not-available' => 'Shipping method is not available',
    ],

    'common-response' => [
        'success' => [
            'add'         => ':name added successfully.',
            'cancel'      => ':name canceled successfully.',
            'create'      => ':name created successfully.',
            'delete'      => ':name deleted successfully.',
            'update'      => ':name updated successfully.',
            'upload'      => ':name uploaded successfully.',
            'remove'      => ':name removed from :place successfully.',
            'not-found'   => ':name not found',
            'save-method' => ':name saved successfully',

            'mass-operations' => [
                'delete'  => 'Selected :name successfully deleted.',
                'partial' => 'Some actions were not performed due to restricted system constraints on :name.',
                'update'  => 'Selected :name successfully updated.',
            ],
        ],

        'error' => [
            'already-taken'                => 'The :name has already been taken.',
            'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
            'being-used'                   => 'This resource :name is getting used in :source.',
            'cannot-change-column'         => 'Cannot change the :name.',
            'default-group-delete'         => 'Cannot delete the default group.',
            'delete-failed'                => 'Error encountered while deleting :name.',
            'last-item-delete'             => 'At least one :name is required.',
            'not-authorized'               => 'Not Authorized',
            'order-pending-account-delete' => 'Cannot delete :name account because some orders are pending or in processing state.',
            'password-mismatch'            => 'Current password does not match.',
            'root-category-delete'         => 'Cannot delete the root category.',
            'security-warning'             => 'Suspicious activity found!',
            'something-went-wrong'         => 'Something went wrong!',
            'system-attribute-delete'      => 'Cannot delete the system attribute.',
            'cannot-update-product'        => 'Cannot update the :name.',

            'mass-operations' => [
                'resource-not-found' => 'Selected :name not found.',
            ],
        ],

        'general' => [
            'customer'          => 'Customer',
            'customers'         => 'Customers',
            'data'              => 'Data', 
            'customer-review'   => 'Customer Review',
            'review'            => 'Review',
            'reviews'           => 'Reviews',
            'customer-group'    => 'Customer group',   
            'customer-address'  => 'Customer address',
            'campaign'          => 'Campaign',
            'cart-rule'         => 'Cart rule',
            'cart-rule-coupon'  => 'Cart rule coupon',
            'cart-rule-coupons' => 'Cart rule coupons',
            'catalog-rule'      => 'Catalog rule',
            'event'             => 'Event',
            'email-template'    => 'Email template',
            'order'             => 'Order',
            'invoice'           => 'Invoice',
            'comment'           => 'Comment',
            'refund'            => 'Refund',
            'shipment'          => 'Shipment',
            'channel'           => 'Channel',
            'currency'          => 'Currency',
            'exchange-rate'     => 'Exchange rate',
            'rate'              => 'Rate',
            'inventory-source'  => 'Inventory source',
            'locale'            => 'Locale',
            'role'              => 'Role',
            'admin-user'        => 'Admin user',
            'slider'            => 'Slider',
            'tax-category'      => 'Tax category',
            'tax-rate'          => 'Tax rate',
            'user'              => 'User',
            'admin'             => 'Admin',
            'item'              => 'Item',
            'wishlist'          => 'Wishlist',
            'product-quantity'  => 'product quantity',
            'product'           => 'product',
            'address'           => 'Address',
            'inventory'         => 'Inventory',
            'category'          => 'Category',
            'categories'        => 'Categories',
            'attribute'         => 'Attribute',
            'attributes'        => 'Attributes',
            'family'            => 'Family',
            'page'              => 'Page',
            'account'           => 'Account',
            'content'           => 'Content',
            'products'          => 'products',
            'configuration'     => 'Configuration',
            'translations'      => 'translations',
            'transactions'      => 'Transactions',
            'payment-method'    => 'Payment Method',
            'shipping-method'   => 'Shipping Method',
        ]
    ],
];
