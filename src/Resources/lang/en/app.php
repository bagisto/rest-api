<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'Order canceled successfully.',

                'error' => [
                    'cancel-error' => 'Order can not be canceled.',
                ],
            ],

            'invoices' => [
                'create-success' => 'invoice have been successfully added.',

                'error' => [
                    'creation-error'    => 'Order invoice creation is not allowed.',
                    'invalid-qty-error' => 'We found an invalid quantity to invoice items.',
                    'product-error'     => 'Invoice can not be created without products.',
                ],
            ],

            'shipments' => [
                'create-success' => 'Shipment have been successfully added.',

                'error' => [
                    'creation-error'    => 'Shipment cannot be created for this order.',
                    'invalid-qty-error' => 'We found an invalid quantity for shipment items.',
                ],
            ],

            'refunds' => [
                'create-success' => 'Refund have been successfully added.',

                'error' => [
                    'creation-error'       => 'Refund cannot be created for this order.',
                    'invalid-amount-error' => 'Refund amount should be non zero.',
                    'invalid-qty-error'    => 'We found an invalid quantity for refund items.',
                    'limit-error'          => 'The most money available to refund is :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'This invoice has already been paid.',
                'invoice-missing'            => 'This invoice id does not exist.',
                'transaction-amount-exceeds' => 'The specified amount of this transaction exceeds the total amount of the invoice.',
                'transaction-saved'          => 'The transaction has been saved.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'Product have been successfully added.',
                'delete-success' => 'Product successfully deleted',
                'update-success' => 'Product updated successfully.',

                'inventories' => [
                    'update-success' => 'Inventory updated successfully.',
                ],

                'mass-operations' => [
                    'delete-success'  => 'Selected Products successfully deleted.',
                    'update-success'  => 'Selected Products successfully updated.',
                ],

                'error' => [
                    'configurable-error' => 'Please select at least one configurable attribute.',
                ],
            ],

            'categories' => [
                'create-success' => 'Category have been successfully added.',
                'delete-success' => 'Category successfully deleted',
                'update-success' => 'Category updated successfully.',

                'mass-operations' => [
                    'delete-success'  => 'Selected Categories successfully deleted.',
                    'update-success'  => 'Selected Categories updated successfully.',
                ],
            ],

            'attributes' => [
                'create-success' => 'Attribute have been successfully added.',
                'delete-success' => 'Attribute successfully deleted',
                'update-success' => 'Attribute updated successfully.',

                'error' => [
                    'system-attributes-delete' => 'Cannot delete the system attributes.',
                    'cannot-change-type'       => 'Cannot Change type field',

                    'mass-operations' => [
                        'resource-not-found' => 'Selected attributes not found.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'Family have been successfully added.',
                'delete-success' => 'Family successfully deleted',
                'update-success' => 'Family updated successfully.',

                'error' => [
                    'last-item-delete' => 'At least one families is required.',
                    'being-used'       => 'This resource families is getting used in :source.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'Customer have been successfully added.',
                'delete-success' => 'Customer successfully deleted',
                'update-success' => 'Customer updated successfully.',

                'mass-operations' => [
                    'delete-success' => 'Selected customers successfully deleted.',
                    'update-success' => 'Selected customers successfully updated.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'Cannot delete customers account because some orders are pending or in processing state.',
                ],

                'notes' => [
                    'note-taken' => 'Note taken.',
                ],
            ],

            'addresses' => [
                'create-success' => 'Address have been successfully added.',
                'delete-success' => 'Address successfully deleted',
                'update-success' => 'Address updated successfully.',

                'mass-operations' => [
                    'delete-success' => 'Selected addresses successfully deleted.',
                ],
            ],

            'groups' => [
                'create-success' => 'Customer group have been successfully added.',
                'delete-success' => 'Customer group successfully deleted',
                'update-success' => 'Customer group updated successfully.',

                'error' => [
                    'being-used'           => 'This resource groups is getting used in Customers.',
                    'default-group-delete' => 'Cannot delete the default group.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'Review successfully deleted',
                'update-success' => 'Review updated successfully.',

                'mass-operations' => [
                    'delete-success' => 'Selected reviews successfully deleted.',
                    'update-success' => 'Selected reviews successfully updated.',
                ],
            ],
        ],

        'cms' => [
            'create-success' => 'CMS have been successfully added.',
            'delete-success' => 'CMS successfully deleted',
            'update-success' => 'CMS updated successfully.',

            'mass-operations' => [
                'delete-success' => 'Selected pages successfully deleted.',
            ],

            'error' => [
                'already-taken' => 'The pages has already been taken.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'Campaign have been successfully added.',
                    'delete-success' => 'Campaign successfully deleted',
                    'update-success' => 'Campaign updated successfully.',
                ],

                'events' => [
                    'create-success' => 'Event have been successfully added.',
                    'delete-success' => 'Event successfully deleted',
                    'update-success' => 'Event updated successfully.',
                ],

                'templates' => [
                    'create-success' => 'Email Template have been successfully added.',
                    'delete-success' => 'Email Template successfully deleted',
                    'update-success' => 'Email Template updated successfully.',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'Cart Rule have been successfully added.',
                    'delete-success' => 'Cart Rule successfully deleted',
                    'update-success' => 'Cart Rule updated successfully.',
                ],

                'catalog-rules' => [
                    'create-success' => 'Catalog Rule have been successfully added.',
                    'delete-success' => 'Catalog Rule successfully deleted',
                    'update-success' => 'Catalog Rule updated successfully.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'Cart Rule Coupon have been successfully added.',
                    'delete-success' => 'Cart Rule Coupon successfully deleted',
                    'update-success' => 'Cart Rule Coupon updated successfully.',

                    'mass-operations' => [
                        'delete-success' => 'Selected pages successfully deleted.',
                    ],
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'Locale have been successfully added.',
                'delete-success' => 'Locale successfully deleted',
                'update-success' => 'Locale updated successfully.',

                'error' => [
                    'last-item-delete' => 'At least one locales is required.',
                ],
            ],

            'currencies' => [
                'create-success' => 'Currency have been successfully added.',
                'delete-success' => 'Currency successfully deleted',
                'update-success' => 'Currency updated successfully.',

                'error' => [
                    'last-item-delete' => 'At least one currencies is required.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'Exchange Rate have been successfully added.',
                'delete-success' => 'Exchange Rate successfully deleted',
                'update-success' => 'Exchange Rate updated successfully.',
            ],

            'inventory-sources' => [
                'create-success'   => 'Inventory Source have been successfully added.',
                'delete-success'   => 'Inventory Source successfully deleted',
                'update-success'   => 'Inventory Source updated successfully.',

                'error' => [
                    'last-item-delete' => 'At least one inventory sources is required.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'Tax Rate have been successfully added.',
                    'delete-success' => 'Tax Rate successfully deleted',
                    'update-success' => 'Tax Rate updated successfully.',
                ],

                'tax-categories' => [
                    'create-success' => 'Tax Category have been successfully added.',
                    'delete-success' => 'Tax Category successfully deleted',
                    'update-success' => 'Tax Category updated successfully.',
                ],
            ],

            'channels' => [
                'create-success' => 'Channel have been successfully added.',
                'delete-success' => 'Channel successfully deleted',
                'update-success' => 'Channel updated successfully.',

                'error' => [
                    'last-item-delete' => 'At least one channels is required.',
                ],
            ],

            'users' => [
                'create-success' => 'User have been successfully added.',
                'delete-success' => 'User successfully deleted',
                'update-success' => 'User updated successfully.',

                'error' => [
                    'cannot-change-column' => 'Cannot change the users.',
                    'last-item-delete'     => 'At least one users is required.',
                ],
            ],

            'roles' => [
                'create-success' => 'Role have been successfully added.',
                'delete-success' => 'Role successfully deleted',
                'update-success' => 'Role updated successfully.',

                'error' => [
                    'being-used'       => 'This resource roles is getting used in admin user.',
                    'last-item-delete' => 'At least one roles is required.',
                ],
            ],

            'themes' => [
                'create-success' => 'Theme created successfully',
                'delete-success' => 'Theme successfully deleted',
                'update-success' => 'Theme updated successfully.',
            ],
        ],

        'configuration' => [
            'create-success' => 'Configuration have been successfully added.',
            'delete-success' => 'Configuration successfully deleted',
            'update-success' => 'Configuration updated successfully.',
        ],

        'account' => [
            'create-success'     => 'Account have been successfully added.',
            'delete-success'     => 'Account successfully deleted',
            'logged-in-success'  => 'Logged in successfully.',
            'logged-out-success' => 'Logged out successfully.',
            'update-success'     => 'Account updated successfully.',

            'error' => [
                'credential-error'  => 'The provided credentials are incorrect.',
                'invalid'           => 'Invalid Email or Password',
                'password-mismatch' => 'Current password does not match.',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'Your address has been created successfully.',
                'delete-success' => 'Your address has been deleted successfully.',
                'update-success' => 'Your address has been updated successfully.',
            ],

            'accounts' => [
                'create-success'     => 'Your Account has been created successfully.',
                'delete-success'     => 'Your Account has been deleted successfully.',
                'update-success'     => 'Your Account has been updated successfully.',
                'logged-in-success'  => 'Logged in successfully.',
                'logged-out-success' => 'Logged out successfully.',

                'error' => [
                    'invalid'          => 'Invalid Email or Password',
                    'credential-error' => 'The provided credentials are incorrect.',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'Address saved successfully.',
            'check-billing-address'   => 'Please check billing address.',
            'check-shipping-address'  => 'Please check shipping address.',
            'minimum-order-message'   => 'Minimum order amount is :amount.',
            'order-saved'             => 'Order saved successfully',
            'payment-method-saved'    => 'Payment method saved successfully.',
            'shipping-method-saved'   => 'Shipping method saved successfully.',
            'specify-payment-method'  => 'Please specify payment method.',
            'specify-shipping-method' => 'Please specify shipping method.',

            'cart' => [
                'item' => [
                    'success'        => 'Item is successfully added to cart.',
                    'success-remove' => 'Item is successfully removed from the cart.',
                ],

                'quantity' => [
                    'illegal' => 'Quantity cannot be lesser than one.',
                    'success' => 'Cart Item(s) successfully updated.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Coupon code can\'t be applied.',
                    'invalid'        => 'Coupon code is invalid.',
                    'success'        => 'Coupon code applied successfully.',
                    'success-remove' => 'Coupon removed successfully.',
                ],

                'move-wishlist' => [
                    'success' => 'Item moved to wishlist successfully.',
                ],
            ],
        ],

        'wishlist' => [
            'success'        => 'Item Successfully Added To Wishlist',
            'removed'        => 'Item Successfully Removed From Wishlist',
            'moved'          => 'Item successfully moved To cart.',
            'option-missing' => 'Product options are missing, so item can not be moved to the wishlist.',

            'error' => [
                'security-warning' => 'Suspicious activity found!',

                'mass-operations' => [
                    'resource-not-found' => 'Selected wishlist product not found.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'Order canceled successfully.',

                'error' => [
                    'cancel-error' => 'Order can not be canceled.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'Please select at least one configurable attribute.',

                'reviews' => [
                    'create-success' => 'Your review submitted successfully.',
                ],
            ],
        ],
    ],
];
