<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'create-success'   => 'Order have been successfully added.',
                'delete-success'   => 'Order successfully deleted',
                'upadte-success'   => 'Order updated successfully.',
                'cancel-success'   => 'Order canceled successfully.',

                'comment' => [
                    'create-success'   => 'Order have been successfully added.',
                    'delete-success'   => 'Order successfully deleted',
                    'upadte-success'   => 'Order updated successfully.',
                ],

                'error' => [
                    'cancel-error' => 'Order can not be canceled.',
                ],
            ],
    
            'invoices' => [
                'create-success'   => 'Order have been successfully added.',
                'delete-success'   => 'Order successfully deleted',
                'upadte-success'   => 'Order updated successfully.',

                'error' => [
                    'invalid-qty-error' => 'We found an invalid quantity to invoice items.',
                    'creation-error'    => 'Order invoice creation is not allowed.',
                    'product-error'     => 'Invoice can not be created without products.',
                ],
            ],
    
            'shipments' => [
                'create-success'   => 'Order have been successfully added.',
                'delete-success'   => 'Order successfully deleted',
                'upadte-success'   => 'Order updated successfully.',

                'error' => [
                    'invalid-qty-error' => 'We found an invalid quantity for shipment items.',
                    'creation-error'    => 'Shipment cannot be created for this order.',
                ],
            ],
    
            'refunds' => [
                'create-success'   => 'Order have been successfully added.',
                'delete-success'   => 'Order successfully deleted',
                'upadte-success'   => 'Order updated successfully.',

                'error' => [
                    'creation-error'       => 'Refund cannot be created for this order.',
                    'invalid-amount-error' => 'Refund amount should be non zero.',
                    'invalid-qty-error'    => 'We found an invalid quantity for refund items.',
                    'limit-error'          => 'The most money available to refund is :amount.',
                ],
            ],
    
            'transactions' => [
                'create-success'             => 'Order have been successfully added.',
                'delete-success'             => 'Order successfully deleted',
                'upadte-success'             => 'Order updated successfully.',
                'already-paid'               => 'This invoice has already been paid.',
                'invoice-missing'            => 'This invoice id does not exist.',
                'transaction-saved'          => 'The transaction has been saved.',
                'transaction-amount-exceeds' => 'The specified amount of this transaction exceeds the total amount of the invoice.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success'   => 'Product have been successfully added.',
                'delete-success'   => 'Product successfully deleted',
                'upadte-success'   => 'Product updated successfully.',

                'inventories' => [
                    'create-success'   => 'Inventory have been successfully added.',
                    'delete-success'   => 'Inventory successfully deleted',
                    'upadte-success'   => 'Inventory updated successfully.',
                ],

                'mass-operations' => [
                    'delete-success'  => 'Selected Products successfully deleted.',
                    'update-success'  => 'Selected Products successfully updated.',
                ],

                'error' => [
                    'already-taken'                => 'The Products has already been taken.',
                    'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
                    'being-used'                   => 'This resource Products is getting used in :source.',
                    'cannot-change-column'         => 'Cannot change the Products.',
                    'default-group-delete'         => 'Cannot delete the default group.',
                    'delete-failed'                => 'Error encountered while deleting Products.',
                    'last-item-delete'             => 'At least one Products is required.',
                    'not-authorized'               => 'Not Authorized',
                    'order-pending-account-delete' => 'Cannot delete Products account because some orders are pending or in processing state.',
                    'password-mismatch'            => 'Current password does not match.',
                    'root-category-delete'         => 'Cannot delete the root category.',
                    'security-warning'             => 'Suspicious activity found!',
                    'something-went-wrong'         => 'Something went wrong!',
                    'system-attribute-delete'      => 'Cannot delete the system attribute.',
                    'configurable-error'           => 'Please select atleast one configurable attribute.',
        
                    'mass-operations' => [
                        'resource-not-found' => 'Selected Products not found.',
                    ],
                ],
            ],

            'categories' => [
                'create-success'   => 'Category have been successfully added.',
                'delete-success'   => 'Category successfully deleted',
                'upadte-success'   => 'Category updated successfully.',

                'mass-operations' => [
                    'delete-success'  => 'Selected Categories successfully deleted.',
                    'update-success'  => 'Selected Categories successfully updated.',
                ],

                'error' => [
                    'already-taken'                => 'The category has already been taken.',
                    'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
                    'being-used'                   => 'This resource Category is getting used in :source.',
                    'cannot-change-column'         => 'Cannot change the Category.',
                    'default-group-delete'         => 'Cannot delete the default group.',
                    'delete-failed'                => 'Error encountered while deleting Category.',
                    'last-item-delete'             => 'At least one Category is required.',
                    'not-authorized'               => 'Not Authorized',
                    'order-pending-account-delete' => 'Cannot delete Category account because some orders are pending or in processing state.',
                    'password-mismatch'            => 'Current password does not match.',
                    'root-category-delete'         => 'Cannot delete the root category.',
                    'security-warning'             => 'Suspicious activity found!',
                    'something-went-wrong'         => 'Something went wrong!',
                    'system-attribute-delete'      => 'Cannot delete the system attribute.',
        
                    'mass-operations' => [
                        'resource-not-found' => 'Selected Categories not found.',
                    ],
                ],
            ],

            'attributes' => [
                'create-success'   => 'Attribute have been successfully added.',
                'delete-success'   => 'Attribute successfully deleted',
                'upadte-success'   => 'Attribute updated successfully.',

                'mass-operations' => [
                    'delete-success'  => 'Selected attributes successfully deleted.',
                    'update-success'  => 'Selected attributes successfully updated.',
                ],

                'error' => [
                    'already-taken'                => 'The attributes has already been taken.',
                    'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
                    'being-used'                   => 'This resource attributes is getting used in :source.',
                    'cannot-change-column'         => 'Cannot change the attributes.',
                    'default-group-delete'         => 'Cannot delete the default group.',
                    'delete-failed'                => 'Error encountered while deleting attributes.',
                    'last-item-delete'             => 'At least one attributes is required.',
                    'not-authorized'               => 'Not Authorized',
                    'order-pending-account-delete' => 'Cannot delete attributes account because some orders are pending or in processing state.',
                    'password-mismatch'            => 'Current password does not match.',
                    'root-attributes-delete'       => 'Cannot delete the root attributes.',
                    'security-warning'             => 'Suspicious activity found!',
                    'something-went-wrong'         => 'Something went wrong!',
                    'system-attributes-delete'     => 'Cannot delete the system attributes.',
        
                    'mass-operations' => [
                        'resource-not-found' => 'Selected attributess not found.',
                    ],
                ],
            ],

            'families'   => [
                'create-success'   => 'Family have been successfully added.',
                'delete-success'   => 'Family successfully deleted',
                'upadte-success'   => 'Family updated successfully.',

                'mass-operations' => [
                    'delete-success'  => 'Selected families successfully deleted.',
                    'update-success'  => 'Selected families successfully updated.',
                ],

                'error' => [
                    'already-taken'                => 'The families has already been taken.',
                    'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
                    'being-used'                   => 'This resource families is getting used in :source.',
                    'cannot-change-column'         => 'Cannot change the families.',
                    'default-group-delete'         => 'Cannot delete the default group.',
                    'delete-failed'                => 'Error encountered while deleting families.',
                    'last-item-delete'             => 'At least one families is required.',
                    'not-authorized'               => 'Not Authorized',
                    'order-pending-account-delete' => 'Cannot delete families account because some orders are pending or in processing state.',
                    'password-mismatch'            => 'Current password does not match.',
                    'root-families-delete'         => 'Cannot delete the root families.',
                    'security-warning'             => 'Suspicious activity found!',
                    'something-went-wrong'         => 'Something went wrong!',
                    'system-families-delete'       => 'Cannot delete the system families.',
        
                    'mass-operations' => [
                        'resource-not-found' => 'Selected familiess not found.',
                    ],
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success'   => 'Customer have been successfully added.',
                'delete-success'   => 'Customer successfully deleted',
                'upadte-success'   => 'Customer updated successfully.',

                'mass-operations' => [
                    'delete-success'  => 'Selected customers successfully deleted.',
                    'update-success'  => 'Selected customers successfully updated.',
                ],

                'error' => [
                    'already-taken'                => 'The customers has already been taken.',
                    'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
                    'being-used'                   => 'This resource customers is getting used in :source.',
                    'cannot-change-column'         => 'Cannot change the customers.',
                    'default-group-delete'         => 'Cannot delete the default group.',
                    'delete-failed'                => 'Error encountered while deleting customers.',
                    'last-item-delete'             => 'At least one customers is required.',
                    'not-authorized'               => 'Not Authorized',
                    'order-pending-account-delete' => 'Cannot delete customers account because some orders are pending or in processing state.',
                    'password-mismatch'            => 'Current password does not match.',
                    'root-customers-delete'        => 'Cannot delete the root customers.',
                    'security-warning'             => 'Suspicious activity found!',
                    'something-went-wrong'         => 'Something went wrong!',
                    'system-customers-delete'      => 'Cannot delete the system customers.',
                ],
            ],

            'addresses' => [
                'create-success'   => 'Address have been successfully added.',
                'delete-success'   => 'Address successfully deleted',
                'upadte-success'   => 'Address updated successfully.',

                'mass-operations' => [
                    'delete-success'  => 'Selected addresses successfully deleted.',
                    'update-success'  => 'Selected addresses successfully updated.',
                ],
            ],

            'notes' => [
                'note-cannot-taken' => 'Note cannot be taken.',
                'note-taken'        => 'Note taken.',
            ],
        ],

        'groups' => [
            'create-success'   => 'Customer group have been successfully added.',
            'delete-success'   => 'Customer group successfully deleted',
            'upadte-success'   => 'Customer group updated successfully.',

            'mass-operations' => [
                'delete-success'  => 'Selected groups successfully deleted.',
                'update-success'  => 'Selected groups successfully updated.',
            ],

            'error' => [
                'already-taken'                => 'The groups has already been taken.',
                'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
                'being-used'                   => 'This resource groups is getting used in Customers.',
                'cannot-change-column'         => 'Cannot change the groups.',
                'default-group-delete'         => 'Cannot delete the default group.',
                'delete-failed'                => 'Error encountered while deleting groups.',
                'last-item-delete'             => 'At least one groups is required.',
                'not-authorized'               => 'Not Authorized',
                'order-pending-account-delete' => 'Cannot delete groups account because some orders are pending or in processing state.',
                'password-mismatch'            => 'Current password does not match.',
                'root-groups-delete'           => 'Cannot delete the root groups.',
                'security-warning'             => 'Suspicious activity found!',
                'something-went-wrong'         => 'Something went wrong!',
                'system-groups-delete'         => 'Cannot delete the system groups.',
            ],
        ],

        'reviews' => [
            'create-success'   => 'Review have been successfully added.',
            'delete-success'   => 'Review successfully deleted',
            'upadte-success'   => 'Review updated successfully.',

            'mass-operations' => [
                'delete-success'  => 'Selected reviews successfully deleted.',
                'update-success'  => 'Selected reviews successfully updated.',
            ],
        ],

        'cms' => [
            'create-success'   => 'CMS have been successfully added.',
            'delete-success'   => 'CMS successfully deleted',
            'upadte-success'   => 'CMS updated successfully.',

            'mass-operations' => [
                'delete-success'  => 'Selected pages successfully deleted.',
                'update-success'  => 'Selected pages successfully updated.',
            ],

            'error' => [
                'already-taken'                => 'The pages has already been taken.',
                'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
                'being-used'                   => 'This resource pages is getting used in cms.',
                'cannot-change-column'         => 'Cannot change the pages.',
                'default-group-delete'         => 'Cannot delete the default group.',
                'delete-failed'                => 'Error encountered while deleting pages.',
                'last-item-delete'             => 'At least one pages is required.',
                'not-authorized'               => 'Not Authorized',
                'order-pending-account-delete' => 'Cannot delete pages account because some orders are pending or in processing state.',
                'password-mismatch'            => 'Current password does not match.',
                'root-pages-delete'            => 'Cannot delete the root pages.',
                'security-warning'             => 'Suspicious activity found!',
                'something-went-wrong'         => 'Something went wrong!',
                'system-pages-delete'          => 'Cannot delete the system pages.',
            ],
        ],

        'marketing' => [
            'campaigns' =>[
                'create-success'   => 'Campaign have been successfully added.',
                'delete-success'   => 'Campaign successfully deleted',
                'upadte-success'   => 'Campaign updated successfully.',
            ],

            'events' =>[
                'create-success'   => 'Event have been successfully added.',
                'delete-success'   => 'Event successfully deleted',
                'upadte-success'   => 'Event updated successfully.',
            ],

            'templates' =>[
                'create-success'   => 'Email Template have been successfully added.',
                'delete-success'   => 'Email Template successfully deleted',
                'upadte-success'   => 'Email Template updated successfully.',
            ],
        ],

        'promotions' => [
            'cart-rules' => [
                'create-success'   => 'Cart Rule have been successfully added.',
                'delete-success'   => 'Cart Rule successfully deleted',
                'upadte-success'   => 'Cart Rule updated successfully.',
            ],

            'catalog-rules' => [
                'create-success'   => 'Catalog Rule have been successfully added.',
                'delete-success'   => 'Catalog Rule successfully deleted',
                'upadte-success'   => 'Catalog Rule updated successfully.',
            ],

            'cart-rule-coupons' => [
                'create-success'   => 'Cart Rule Coupon have been successfully added.',
                'delete-success'   => 'Cart Rule Coupon successfully deleted',
                'upadte-success'   => 'Cart Rule Coupon updated successfully.',

                'mass-operations' => [
                    'delete-success'  => 'Selected Cart Rule Coupons successfully deleted.',
                    'update-success'  => 'Selected Cart Rule Coupons successfully updated.',
                ],
            ],
        ],

        'settings' => [
            'locales' =>[
                'create-success'   => 'Locale have been successfully added.',
                'delete-success'   => 'Locale successfully deleted',
                'upadte-success'   => 'Locale updated successfully.',

                'error' => [
                    'already-taken'                => 'The locales has already been taken.',
                    'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
                    'being-used'                   => 'This resource locales is getting used in admikn user.',
                    'cannot-change-column'         => 'Cannot change the locales.',
                    'default-group-delete'         => 'Cannot delete the default group.',
                    'delete-failed'                => 'Error encountered while deleting locales.',
                    'last-item-delete'             => 'At least one locales is required.',
                    'not-authorized'               => 'Not Authorized',
                    'order-pending-account-delete' => 'Cannot delete locales account because some orders are pending or in processing state.',
                    'password-mismatch'            => 'Current password does not match.',
                    'root-locales-delete'          => 'Cannot delete the root locales.',
                    'security-warning'             => 'Suspicious activity found!',
                    'something-went-wrong'         => 'Something went wrong!',
                    'system-locales-delete'        => 'Cannot delete the system locales.',
                ],
            ],

            'currencies' => [
                'create-success'   => 'Currency have been successfully added.',
                'delete-success'   => 'Currency successfully deleted',
                'upadte-success'   => 'Currency updated successfully.',

                'error' => [
                    'already-taken'                => 'The currencies has already been taken.',
                    'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
                    'being-used'                   => 'This resource currencies is getting used in admin user.',
                    'cannot-change-column'         => 'Cannot change the currencies.',
                    'default-group-delete'         => 'Cannot delete the default group.',
                    'delete-failed'                => 'Error encountered while deleting currencies.',
                    'last-item-delete'             => 'At least one currencies is required.',
                    'not-authorized'               => 'Not Authorized',
                    'order-pending-account-delete' => 'Cannot delete currencies account because some orders are pending or in processing state.',
                    'password-mismatch'            => 'Current password does not match.',
                    'root-currencies-delete'       => 'Cannot delete the root currencies.',
                    'security-warning'             => 'Suspicious activity found!',
                    'something-went-wrong'         => 'Something went wrong!',
                    'system-currencies-delete'     => 'Cannot delete the system currencies.',
                ],
            ],

            'exchange-rates' => [
                'create-success'   => 'Exchange Rate have been successfully added.',
                'delete-success'   => 'Exchange Rate successfully deleted',
                'upadte-success'   => 'Exchange Rate updated successfully.',

                'error' => [
                    'already-taken'                => 'The exchange rates has already been taken.',
                    'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
                    'being-used'                   => 'This resource exchange rates is getting used in admin user.',
                    'cannot-change-column'         => 'Cannot change the exchange rates.',
                    'default-group-delete'         => 'Cannot delete the default group.',
                    'delete-failed'                => 'Error encountered while deleting exchange rates.',
                    'last-item-delete'             => 'At least one exchange rates is required.',
                    'not-authorized'               => 'Not Authorized',
                    'order-pending-account-delete' => 'Cannot delete exchange rates account because some orders are pending or in processing state.',
                    'password-mismatch'            => 'Current password does not match.',
                    'root-exchange-rates-delete'   => 'Cannot delete the root exchange rates.',
                    'security-warning'             => 'Suspicious activity found!',
                    'something-went-wrong'         => 'Something went wrong!',
                    'system-exchange-rates-delete' => 'Cannot delete the system exchange rates.',
                ],
            ],

            'inventory-sources' => [
                'create-success'   => 'Inventory Source have been successfully added.',
                'delete-success'   => 'Inventory Source successfully deleted',
                'upadte-success'   => 'Inventory Source updated successfully.',

                'error' => [
                    'already-taken'                   => 'The inventory sources has already been taken.',
                    'base-currency-delete'            => 'This currency is set as channel base currency so it can not be deleted.',
                    'being-used'                      => 'This resource inventory sources is getting used in admin users.',
                    'cannot-change-column'            => 'Cannot change the inventory sources.',
                    'default-group-delete'            => 'Cannot delete the default group.',
                    'delete-failed'                   => 'Error encountered while deleting inventory sources.',
                    'last-item-delete'                => 'At least one inventory sources is required.',
                    'not-authorized'                  => 'Not Authorized',
                    'order-pending-account-delete'    => 'Cannot delete inventory sources account because some orders are pending or in processing state.',
                    'password-mismatch'               => 'Current password does not match.',
                    'root-inventory-sources-delete'   => 'Cannot delete the root inventory sources.',
                    'security-warning'                => 'Suspicious activity found!',
                    'something-went-wrong'            => 'Something went wrong!',
                    'system-inventory-sources-delete' => 'Cannot delete the system inventory sources.',
                ],
            ],

            'taxes' => [
               'tax-rates' => [
                'create-success'   => 'Tax Rate have been successfully added.',
                'delete-success'   => 'Tax Rate successfully deleted',
                'upadte-success'   => 'Tax Rate updated successfully.',
               ],
               'tax-categories' => [
                'create-success'   => 'Tax Category have been successfully added.',
                'delete-success'   => 'Tax Category successfully deleted',
                'upadte-success'   => 'Tax Category updated successfully.',
               ],
            ],

            'rates'   => [
                'create-success'   => 'Rate have been successfully added.',
                'delete-success'   => 'Rate successfully deleted',
                'upadte-success'   => 'Rate updated successfully.'
            ],

            'channels' => [
                'create-success'   => 'Channel have been successfully added.',
                'delete-success'   => 'Channel successfully deleted',
                'upadte-success'   => 'Channel updated successfully.',

                'error' => [
                    'already-taken'                => 'The channels has already been taken.',
                    'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
                    'being-used'                   => 'This resource channels is getting used in admin user.',
                    'cannot-change-column'         => 'Cannot change the channels.',
                    'default-group-delete'         => 'Cannot delete the default group.',
                    'delete-failed'                => 'Error encountered while deleting channels.',
                    'last-item-delete'             => 'At least one channels is required.',
                    'not-authorized'               => 'Not Authorized',
                    'order-pending-account-delete' => 'Cannot delete channels account because some orders are pending or in processing state.',
                    'password-mismatch'            => 'Current password does not match.',
                    'root-channels-delete'         => 'Cannot delete the root channels.',
                    'security-warning'             => 'Suspicious activity found!',
                    'something-went-wrong'         => 'Something went wrong!',
                    'system-channels-delete'       => 'Cannot delete the system channels.',
                ],
            ],

            'users' => [
                'create-success'   => 'User have been successfully added.',
                'delete-success'   => 'User successfully deleted',
                'upadte-success'   => 'User updated successfully.',

                'error' => [
                    'already-taken'                => 'The users has already been taken.',
                    'base-currency-delete'         => 'This currency is set as admin base currency so it can not be deleted.',
                    'being-used'                   => 'This resource users is getting used in admin user.',
                    'cannot-change-column'         => 'Cannot change the users.',
                    'default-group-delete'         => 'Cannot delete the default group.',
                    'delete-failed'                => 'Error encountered while deleting users.',
                    'last-item-delete'             => 'At least one users is required.',
                    'not-authorized'               => 'Not Authorized',
                    'order-pending-account-delete' => 'Cannot delete users account because some orders are pending or in processing state.',
                    'password-mismatch'            => 'Current password does not match.',
                    'root-users-delete'            => 'Cannot delete the root users.',
                    'security-warning'             => 'Suspicious activity found!',
                    'something-went-wrong'         => 'Something went wrong!',
                    'system-users-delete'          => 'Cannot delete the system users.',
                ],
            ],

            'roles' => [
                'create-success'   => 'Role have been successfully added.',
                'delete-success'   => 'Role successfully deleted',
                'upadte-success'   => 'Role updated successfully.',

                'error' => [
                    'already-taken'                => 'The roles has already been taken.',
                    'base-currency-delete'         => 'This currency is set as admin base currency so it can not be deleted.',
                    'being-used'                   => 'This resource roles is getting used in admin user.',
                    'cannot-change-column'         => 'Cannot change the roles.',
                    'default-group-delete'         => 'Cannot delete the default group.',
                    'delete-failed'                => 'Error encountered while deleting roles.',
                    'last-item-delete'             => 'At least one roles is required.',
                    'not-authorized'               => 'Not Authorized',
                    'order-pending-account-delete' => 'Cannot delete roles account because some orders are pending or in processing state.',
                    'password-mismatch'            => 'Current password does not match.',
                    'root-roles-delete'            => 'Cannot delete the root roles.',
                    'security-warning'             => 'Suspicious activity found!',
                    'something-went-wrong'         => 'Something went wrong!',
                    'system-roles-delete'          => 'Cannot delete the system roles.',
                ],
            ],

            'configuration' => [
                'create-success'   => 'Configuration have been successfully added.',
                'delete-success'   => 'Configuration successfully deleted',
                'upadte-success'   => 'Configuration updated successfully.',
            ],
        ],

        'account' => [
            'create-success'     => 'Account have been successfully added.',
            'delete-success'     => 'Account successfully deleted',
            'upadte-success'     => 'Account updated successfully.',
            'logged-in-success'  => 'Logged in successfully.',
            'logged-out-success' => 'Logged out successfully.',

            'error' => [
                'already-taken'                => 'The users has already been taken.',
                'base-currency-delete'         => 'This currency is set as admin base currency so it can not be deleted.',
                'being-used'                   => 'This resource users is getting used in admin user.',
                'cannot-change-column'         => 'Cannot change the users.',
                'default-group-delete'         => 'Cannot delete the default group.',
                'delete-failed'                => 'Error encountered while deleting users.',
                'last-item-delete'             => 'At least one users is required.',
                'not-authorized'               => 'Not Authorized',
                'order-pending-account-delete' => 'Cannot delete users account because some orders are pending or in processing state.',
                'password-mismatch'            => 'Current password does not match.',
                'root-users-delete'            => 'Cannot delete the root users.',
                'security-warning'             => 'Suspicious activity found!',
                'something-went-wrong'         => 'Something went wrong!',
                'system-users-delete'          => 'Cannot delete the system users.',
                'invalid'                      => 'Invalid Email or Password',
                'credential-error'             => 'The provided credentials are incorrect.',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success'     => 'Your address has been created successfully.',
                'delete-success'     => 'Your address has been deleted successfully.',
                'upadte-success'     => 'Your address has been updated successfully.',
            ],

            'accounts' => [
                'create-success'     => 'Your Account has been created successfully.',
                'delete-success'     => 'Your Account has been deleted successfully.',
                'upadte-success'     => 'Your Account has been updated successfully.',
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
