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
                    'invalid-qty-error' => 'We found an invalid quantity to invoice items.',
                    'creation-error'    => 'Order invoice creation is not allowed.',
                    'product-error'     => 'Invoice can not be created without products.',
                ],
            ],
    
            'shipments' => [
                'create-success' => 'Shipment have been successfully added.',

                'error' => [
                    'invalid-qty-error' => 'We found an invalid quantity for shipment items.',
                    'creation-error'    => 'Shipment cannot be created for this order.',
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
                'transaction-saved'          => 'The transaction has been saved.',
                'transaction-amount-exceeds' => 'The specified amount of this transaction exceeds the total amount of the invoice.',
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
                    'configurable-error' => 'Please select atleast one configurable attribute.',
                ],
            ],

            'categories' => [
                'create-success' => 'Category have been successfully added.',
                'delete-success' => 'Category successfully deleted',
                'update-success' => 'Category updated successfully.',

                'mass-operations' => [
                    'delete-success'  => 'Selected Categories successfully deleted.',
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
                'create-success'   => 'Family have been successfully added.',
                'delete-success'   => 'Family successfully deleted',
                'update-success'   => 'Family updated successfully.',

                'error' => [
                    'last-item-delete'             => 'At least one families is required.',
                    'being-used'                   => 'This resource families is getting used in :source.',
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
                'campaigns' =>[
                    'create-success' => 'Campaign have been successfully added.',
                    'delete-success' => 'Campaign successfully deleted',
                    'update-success' => 'Campaign updated successfully.',
                ],

                'events' =>[
                    'create-success' => 'Event have been successfully added.',
                    'delete-success' => 'Event successfully deleted',
                    'update-success' => 'Event updated successfully.',
                ],

                'templates' =>[
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
                ],
            ],
        ],

        'settings' => [
            'locales' =>[
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
        ],

        'configuration' => [
            'create-success' => 'Configuration have been successfully added.',
            'delete-success' => 'Configuration successfully deleted',
            'update-success' => 'Configuration updated successfully.',
        ],

        'account' => [
            'create-success'     => 'Account have been successfully added.',
            'delete-success'     => 'Account successfully deleted',
            'update-success'     => 'Account updated successfully.',
            'logged-in-success'  => 'Logged in successfully.',
            'logged-out-success' => 'Logged out successfully.',

            'error' => [
                'invalid'           => 'Invalid Email or Password',
                'password-mismatch' => 'Current password does not match.',
                'credential-error'  => 'The provided credentials are incorrect.',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success'     => 'Your address has been created successfully.',
                'delete-success'     => 'Your address has been deleted successfully.',
                'update-success'     => 'Your address has been updated successfully.',
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
    
            'order-saved'             => 'Order saved successfully',
            'payment-method-saved'    => 'Payment method saved successfully.',
            'billing-address-saved'   => 'Address saved successfully.',
            'shipping-method-saved'   => 'Shipping method saved successfully.',
            'minimum-order-message'   => 'Minimum order amount is :amount.',
            'check-shipping-address'  => 'Please check shipping address.',
            'check-billing-address'   => 'Please check billing address.',
            'specify-shipping-method' => 'Please specify shipping method.',
            'specify-payment-method'  => 'Please specify payment method.',
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
                'cancel'       => 'Order canceled successfully.',
                
                'error' => [
                    'cancel-error' => 'Order can not be canceled.',
                ],
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
                'already-paid'               => 'This invoice has already been paid.',
                'invoice-missing'            => 'This invoice id does not exist.',
                'transaction-saved'          => 'The transaction has been saved.',
                'transaction-amount-exceeds' => 'The specified amount of this transaction exceeds the total amount of the invoice.',
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'Please select atleast one configurable attribute.',
            ],

            'reviews' => [
              'create-success' => 'Your review submitted successfully.',
            ],
        ],
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
