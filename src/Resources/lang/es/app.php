<?php

return [
    'sales' => [
        'orders' => [
            'cancel-error' => 'No se puede cancelar el pedido.',
        ],

        'invoices' => [
            'invalid-qty-error' => 'Encontramos una cantidad no válida para facturar artículos.',
            'creation-error'    => 'No se permite la creación de facturas de pedidos.',
            'product-error'     => 'La factura no se puede crear sin productos.',
        ],

        'shipments' => [
            'invalid-qty-error' => 'Encontramos una cantidad no válida para los artículos de envío.',
            'creation-error'    => 'No se puede crear el envío para este pedido.',
        ],

        'refunds' => [
            'creation-error'       => 'No se puede crear el reembolso para este pedido.',
            'invalid-amount-error' => 'El importe del reembolso no debe ser cero.',
            'invalid-qty-error'    => 'Encontramos una cantidad no válida para artículos de reembolso.',
            'limit-error'          => 'La mayor cantidad de dinero disponible para reembolsar es :amount.',
        ],

        'transactions' => [
            'already-paid'      => 'Esta factura ya ha sido pagada.',
            'invoice-missing'   => 'Este ID de factura no existe.',
            'transaction-saved' => 'La transacción ha sido guardada.',
        ],
    ],

    'catalog' => [
        'products' => [
            'configurable-error' => 'Seleccione al menos un atributo configurable.',
        ],
    ],

    'customers' => [
        'note-cannot-taken' => 'No se puede tomar nota.',
        'note-taken'        => 'Nota tomada.',
    ],

    'common-response' => [
        'success' => [
            'add'    => ':name agregado exitosamente.',
            'cancel' => ':name cancelado con éxito.',
            'create' => ':name creado con éxito.',
            'delete' => ':name eliminado con éxito.',
            'update' => ':name actualizado con éxito.',
            'upload' => ':name subido correctamente.',

            'mass-operations' => [
                'delete'  => 'Seleccionado :name eliminado con éxito.',
                'partial' => 'Algunas acciones no se realizaron debido a restricciones del sistema restringidas en :name.',
                'update'  => 'Seleccionado :name actualizado con éxito.',
            ],
        ],

        'error' => [
            'already-taken'                => 'El :name ya ha sido tomado.',
            'base-currency-delete'         => 'Esta moneda se establece como moneda base del canal, por lo que no se puede eliminar.',
            'being-used'                   => 'Este recurso :name se está usando en :source.',
            'cannot-change-column'         => 'No se puede cambiar el :name.',
            'default-group-delete'         => 'No se puede eliminar el grupo predeterminado.',
            'delete-failed'                => 'Error encontrado al eliminar :name.',
            'last-item-delete'             => 'Se requiere al menos un :name.',
            'order-pending-account-delete' => 'No se puede eliminar la cuenta :name porque algunos pedidos están pendientes o en estado de procesamiento.',
            'password-mismatch'            => 'La contraseña actual no coincide.',
            'root-category-delete'         => 'No se puede eliminar la categoría raíz.',
            'something-went-wrong'         => '¡Algo salió mal!',
            'system-attribute-delete'      => 'No se puede eliminar el atributo del sistema.',
        ],
    ],
];
