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

    'wishlist' => [
        'moved'          => 'Artículo movido con éxito al carrito.',
        'option-missing' => 'Faltan opciones de productos, por lo que el artículo no se puede mover a la lista de deseos.',
    ],

    'checkout' => [
        'cart' => [
            'item' => [
                'error-add'      => 'El artículo no se puede agregar al carrito, inténtalo de nuevo más tarde.',
                'error-remove'   => 'No hay elementos para eliminar del carrito.',
                'inactive'       => 'El artículo está inactivo y fue eliminado del carrito.',
                'inactive-add'   => 'El artículo inactivo no se puede agregar al carrito.',
                'success'        => 'El artículo se agregó correctamente al carrito.',
                'success-remove' => 'El artículo se eliminó correctamente del carrito.',
            ],

            'quantity' => [
                'error'             => 'No se pueden actualizar los artículos en este momento, inténtalo de nuevo más tarde.',
                'illegal'           => 'La cantidad no puede ser menor que uno.',
                'inventory-warning' => 'La cantidad solicitada no está disponible, inténtelo de nuevo más tarde.',
                'quantity'          => 'Cantidad',
                'success'           => 'Artículo(s) del carrito actualizado(s) con éxito.',
            ],

            'coupon' => [
                'apply-issue'    => 'No se puede aplicar el código de cupón.',
                'invalid'        => 'El código de cupón no es válido.',
                'success'        => 'Código de cupón aplicado con éxito.',
                'success-remove' => 'Cupón eliminado con éxito.',
            ],

            'move-wishlist' => [
                'error'   => 'No se puede mover el artículo a la lista de deseos, inténtalo de nuevo más tarde.',
                'success' => 'Artículo movido a la lista de deseos con éxito.',
            ],
        ],

        'minimum-order-message'   => 'El monto mínimo del pedido es :amount.',
        'check-shipping-address'  => 'Verifique la dirección de envío.',
        'check-billing-address'   => 'Verifique la dirección de facturación.',
        'specify-shipping-method' => 'Por favor, especifique el método de envío.',
        'specify-payment-method'  => 'Por favor, especifique el método de pago.',
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
            'not-authorized'               => 'No autorizada',
            'order-pending-account-delete' => 'No se puede eliminar la cuenta :name porque algunos pedidos están pendientes o en estado de procesamiento.',
            'password-mismatch'            => 'La contraseña actual no coincide.',
            'root-category-delete'         => 'No se puede eliminar la categoría raíz.',
            'security-warning'             => 'Actividad sospechosa encontrada!',
            'something-went-wrong'         => '¡Algo salió mal!',
            'system-attribute-delete'      => 'No se puede eliminar el atributo del sistema.',

            'mass-operations' => [
                'resource-not-found' => 'Seleccionada :name no encontrado.',
            ],
        ],
    ],
];
