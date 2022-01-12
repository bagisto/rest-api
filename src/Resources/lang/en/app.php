<?php

return [
    'sales' => [
        'orders' => [
            'cancel-error' => 'Order can not be canceled.',
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
        ],
    ],

    'catalog' => [
        'products' => [
            'configurable-error' => 'Please select atleast one configurable attribute.',
        ],
    ],

    'customers' => [
        'note-cannot-taken' => 'Note cannot be taken.',
        'note-taken'        => 'Note taken.',
    ],

    'wishlist' => [
        'moved'          => 'Item successfully moved To cart.',
        'option-missing' => 'Product options are missing, so item can not be moved to the wishlist.',
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
        ],

        'minimum-order-message'   => 'Minimum order amount is :amount.',
        'check-shipping-address'  => 'Please check shipping address.',
        'check-billing-address'   => 'Please check billing address.',
        'specify-shipping-method' => 'Please specify shipping method.',
        'specify-payment-method'  => 'Please specify payment method.',
    ],

    'common-response' => [
        'success' => [
            'add'    => ':name added successfully.',
            'cancel' => ':name canceled successfully.',
            'create' => ':name created successfully.',
            'delete' => ':name deleted successfully.',
            'update' => ':name updated successfully.',
            'upload' => ':name uploaded successfully.',

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

            'mass-operations' => [
                'resource-not-found' => 'Selected :name not found.',
            ],
        ],
    ],
];
