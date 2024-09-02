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

            're-order' => [
                'address-create-success'  => 'Address Saved Successfully',
                'address-not-available'   => 'Their are no any shipping methods available.',
                'create'                  => 'Item added successfully to cart',
                'error'                   => 'Something went wrong !',
                'order-create-success'    => 'Order was successfully placed.',
                'payment-create-success'  => 'Payment Method Saved Successfully',
                'shipping-create-success' => 'Shipping Method Saved Successfully',
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
                'root-category-delete' => 'The Root category can not be deleted.',
                'update-success' => 'Category updated successfully.',
                'not-exist'      => 'Category not found',

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
                    'cannot-change-type'       => 'Cannot Change type field',
                    'system-attributes-delete' => 'Cannot delete the system attributes.',

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
                    'being-used'       => 'This resource families is getting used in :source.',
                    'can-not-updated'  => 'Cannot Update the Code',
                    'last-item-delete' => 'At least one families is required.',
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

            'news-letter' => [
                'create-success'  => 'You have successfully subscribed to our newsletter.',
                'warning-message' => 'You have already subscribed to our newsletter.',
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

                'subscribers' => [
                    'delete-success' => 'Newsletter Subscription deleted Successfully',
                    'update-failed'  => 'Newsletter Subscription Updated Failed',
                    'update-success' => 'Newsletter Subscription Updated Successfully.',
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
                        'delete-success' => 'Cart Rule Coupons successfully deleted'
                    ]
                ],
            ],

            'search-seo' => [
                'url-rewrites' => [
                    'create-success'  => 'URL Rewrite have been successfully added.',
                    'delete-success'  => 'URL Rewrite successfully deleted.',
                    'update-success'  => 'URL Rewrite updated successfully.',

                    'mass-operations' => [
                        'delete-success' => 'URL Rewrite successfully deleted.',
                    ],
                ],

                'search-terms' => [
                    'create-success'  => 'Search Terms have been successfully added.',
                    'delete-success'  => 'Search Terms successfully deleted.',
                    'update-success'  => 'Search Terms updated successfully.',

                    'mass-operations' => [
                        'delete-success' => 'Search Terms successfully deleted.',
                    ],
                ],

                'search-synonyms' => [
                    'create-success'  => 'Search Synonyms have been successfully added.',
                    'delete-success'  => 'Search Synonyms successfully deleted.',
                    'update-success'  => 'Search Synonyms updated successfully.',

                    'mass-operations' => [
                        'delete-success' => 'Search Synonyms successfully deleted.',
                    ],
                ],

                'sitemaps' => [
                    'create-success'  => 'Sitemaps created successfully.',
                    'delete-success'  => 'Sitemaps successfully deleted.',
                    'update-success'  => 'Sitemaps updated successfully.',
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
                    'error'          => 'One or more tax rates do not exist.',
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

        'errors' => [
            '404' => [
                'message' => 'Oops! The page you\'re looking for is on vacation. It seems we couldn\'t find what you were searching for.',
                'title'   => '404 Page Not Found',
            ],

            '401' => [
                'message' => 'Oops! Looks like you\'re not allowed to access this page. It seems you\'re missing the necessary credentials.',
                'title'   => '401 Unauthorized',
            ],

            '403' => [
                'message' => 'Oops! This page is off-limits. It appears you don\'t have the required permissions to view this content.',
                'title'   => '403 Forbidden',
            ],

            '500' => [
                'message' => 'Oops! Something went wrong. It seems we\'re having trouble loading the page you\'re looking for.',
                'title'   => '500 Internal Server Error',
            ],

            '503' => [
                'message' => 'Oops! Looks like we\'re temporarily down for maintenance. Please check back in a bit.',
                'title'   => '503 Service Unavailable',
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
                'logged-in-success'  => 'Logged in successfully.',
                'logged-out-success' => 'Logged out successfully.',
                'update-success'     => 'Your Account has been updated successfully.',

                'error' => [
                    'credential-error'  => 'The provided credentials are incorrect.',
                    'invalid'           => 'Invalid Email or Password',
                    'password-mismatch' => 'Current password does not match.',
                    'update-failed'     => 'An error has occurred while updating your account',
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
                    'empty'           => 'Your cart is empty.',
                    'error'           => 'Cart item not found.',
                    'inactive-add'    => 'Inactive item cannot be added to cart.',
                    'invalid-product' => 'Product Id is invalid.',
                    'success'         => 'Item is successfully added to cart.',
                    'success-remove'  => 'Item is successfully removed from the cart.',
                ],

                'quantity' => [
                    'illegal' => 'Quantity cannot be lesser than one.',
                    'success' => 'Cart Item(s) successfully updated.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Coupon code can\'t be applied.',
                    'invalid'        => 'Coupon code is invalid.',
                    'success-remove' => 'Coupon removed successfully.',
                    'success'        => 'Coupon code applied successfully.',
                ],

                'move-wishlist' => [
                    'success' => 'Item moved to wishlist successfully.',
                ],
            ],
        ],

        'wishlist' => [
            'moved'          => 'Item successfully moved To cart.',
            'option-missing' => 'Product options are missing, so item can not be moved to the wishlist.',
            'removed'        => 'Item Successfully Removed From Wishlist.',
            'remove-fail'    => 'Item Cannot Be Removed From Wishlist.',
            'success'        => 'Item Successfully Added To Wishlist.',

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

        'errors' => [
            '404' => [
                'message' => 'Oops! The page you\'re looking for is on vacation. It seems we couldn\'t find what you were searching for.',
                'title'   => '404 Page Not Found',
            ],

            '401' => [
                'message' => 'Oops! Looks like you\'re not allowed to access this page. It seems you\'re missing the necessary credentials.',
                'title'   => '401 Unauthorized',
            ],

            '403' => [
                'message' => 'Oops! This page is off-limits. It appears you don\'t have the required permissions to view this content.',
                'title'   => '403 Forbidden',
            ],

            '500' => [
                'message' => 'Oops! Something went wrong. It seems we\'re having trouble loading the page you\'re looking for.',
                'title'   => '500 Internal Server Error',
            ],

            '503' => [
                'message' => 'Oops! Looks like we\'re temporarily down for maintenance. Please check back in a bit.',
                'title'   => '503 Service Unavailable',
            ],
        ],
    ],
];
