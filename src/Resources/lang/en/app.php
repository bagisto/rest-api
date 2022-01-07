<?php

return [
    'customer' => [
        'note-taken'        => 'Note taken.',
        'note-cannot-taken' => 'Note cannot be taken.',
    ],

    'response' => [
        'success' => [
            'create' => ':name created successfully.',
            'update' => ':name updated successfully.',
            'delete' => ':name deleted successfully.',
            'upload' => ':name uploaded successfully.',
            'cancel' => ':name canceled successfully.',

            'mass-operations' => [
                'update'  => 'Selected :name successfully updated.',
                'delete'  => 'Selected :name successfully deleted.',
                'partial' => 'Some actions were not performed due to restricted system constraints on :name.',
            ],
        ],

        'error' => [
            'something-went-wrong'         => 'Something went wrong!',
            'already-taken'                => 'The :name has already been taken.',
            'being-used'                   => 'This resource :name is getting used in :source.',
            'delete-failed'                => 'Error encountered while deleting :name.',
            'last-item-delete'             => 'At least one :name is required.',
            'base-currency-delete'         => 'This currency is set as channel base currency so it can not be deleted.',
            'root-category-delete'         => 'Cannot delete the root category.',
            'system-attribute-delete'      => 'Cannot delete the system attribute.',
            'default-group-delete'         => 'Cannot delete the default group.',
            'order-pending-account-delete' => 'Cannot delete :name account because some orders are pending or in processing state.',
        ],
    ],
];
