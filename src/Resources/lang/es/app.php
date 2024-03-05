<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'Pedido cancelado con éxito.',

                'error' => [
                    'cancel-error' => 'No se puede cancelar el pedido.',
                ],
            ],

            'invoices' => [
                'create-success' => 'Factura añadida con éxito.',

                'error' => [
                    'creation-error'    => 'No se permite la creación de facturas de pedido.',
                    'invalid-qty-error' => 'Hemos encontrado una cantidad inválida para facturar artículos.',
                    'product-error'     => 'No se puede crear una factura sin productos.',
                ],
            ],

            'shipments' => [
                'create-success' => 'Envío añadido con éxito.',

                'error' => [
                    'creation-error'    => 'No se puede crear un envío para este pedido.',
                    'invalid-qty-error' => 'Hemos encontrado una cantidad inválida para los artículos de envío.',
                ],
            ],

            'refunds' => [
                'create-success' => 'Reembolso añadido con éxito.',

                'error' => [
                    'creation-error'       => 'No se puede crear un reembolso para este pedido.',
                    'invalid-amount-error' => 'El monto del reembolso debe ser distinto de cero.',
                    'invalid-qty-error'    => 'Hemos encontrado una cantidad inválida para los artículos de reembolso.',
                    'limit-error'          => 'El monto máximo disponible para el reembolso es :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'Esta factura ya ha sido pagada.',
                'invoice-missing'            => 'Este ID de factura no existe.',
                'transaction-amount-exceeds' => 'El monto especificado de esta transacción excede el monto total de la factura.',
                'transaction-saved'          => 'La transacción ha sido guardada.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'Producto añadido con éxito.',
                'delete-success' => 'Producto eliminado correctamente',
                'update-success' => 'Producto actualizado con éxito.',

                'inventories' => [
                    'update-success' => 'Inventario actualizado correctamente.',
                ],

                'mass-operations' => [
                    'delete-success' => 'Productos seleccionados eliminados correctamente.',
                    'update-success' => 'Productos seleccionados actualizados correctamente.',
                ],

                'error' => [
                    'configurable-error' => 'Por favor, selecciona al menos un atributo configurable.',
                ],
            ],

            'categories' => [
                'create-success' => 'Categoría añadida con éxito.',
                'delete-success' => 'Categoría eliminada correctamente',
                'update-success' => 'Categoría actualizada con éxito.',

                'mass-operations' => [
                    'delete-success' => 'Categorías seleccionadas eliminadas correctamente.',
                    'update-success' => 'Categorías seleccionadas actualizadas correctamente.',
                ],
            ],

            'attributes' => [
                'create-success' => 'Atributo añadido con éxito.',
                'delete-success' => 'Atributo eliminado correctamente',
                'update-success' => 'Atributo actualizado con éxito.',

                'error' => [
                    'system-attributes-delete' => 'No se pueden eliminar los atributos del sistema.',
                    'cannot-change-type'       => 'No se puede cambiar el tipo de campo',

                    'mass-operations' => [
                        'resource-not-found' => 'Atributos seleccionados no encontrados.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'Familia añadida con éxito.',
                'delete-success' => 'Familia eliminada correctamente',
                'update-success' => 'Familia actualizada con éxito.',

                'error' => [
                    'last-item-delete' => 'Se requiere al menos una familia.',
                    'being-used'       => 'Esta familia de recursos se está utilizando en :source.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'Cliente añadido con éxito.',
                'delete-success' => 'Cliente eliminado correctamente',
                'update-success' => 'Cliente actualizado con éxito.',

                'mass-operations' => [
                    'delete-success' => 'Clientes seleccionados eliminados correctamente.',
                    'update-success' => 'Clientes seleccionados actualizados correctamente.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'No se puede eliminar la cuenta de cliente porque hay pedidos pendientes o en estado de procesamiento.',
                ],

                'notes' => [
                    'note-taken' => 'Nota tomada.',
                ],
            ],

            'addresses' => [
                'create-success' => 'Dirección añadida con éxito.',
                'delete-success' => 'Dirección eliminada correctamente',
                'update-success' => 'Dirección actualizada con éxito.',

                'mass-operations' => [
                    'delete-success' => 'Direcciones seleccionadas eliminadas correctamente.',
                ],
            ],

            'groups' => [
                'create-success' => 'Grupo de clientes añadido con éxito.',
                'delete-success' => 'Grupo de clientes eliminado correctamente',
                'update-success' => 'Grupo de clientes actualizado con éxito.',

                'error' => [
                    'being-used'           => 'Este grupo de recursos se está utilizando en Clientes.',
                    'default-group-delete' => 'No se puede eliminar el grupo predeterminado.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'Reseña eliminada correctamente',
                'update-success' => 'Reseña actualizada con éxito.',

                'mass-operations' => [
                    'delete-success' => 'Reseñas seleccionadas eliminadas correctamente.',
                    'update-success' => 'Reseñas seleccionadas actualizadas correctamente.',
                ],
            ],
        ],

        'cms' => [
            'create-success' => 'CMS añadido con éxito.',
            'delete-success' => 'CMS eliminado correctamente',
            'update-success' => 'CMS actualizado con éxito.',

            'mass-operations' => [
                'delete-success' => 'Páginas seleccionadas eliminadas correctamente.',
            ],

            'error' => [
                'already-taken' => 'Las páginas ya han sido tomadas.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'Campaña añadida con éxito.',
                    'delete-success' => 'Campaña eliminada correctamente',
                    'update-success' => 'Campaña actualizada con éxito.',
                ],

                'events' => [
                    'create-success' => 'Evento añadido con éxito.',
                    'delete-success' => 'Evento eliminado correctamente',
                    'update-success' => 'Evento actualizado con éxito.',
                ],

                'templates' => [
                    'create-success' => 'Plantilla de correo electrónico añadida con éxito.',
                    'delete-success' => 'Plantilla de correo electrónico eliminada correctamente',
                    'update-success' => 'Plantilla de correo electrónico actualizada con éxito.',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'Regla del carrito añadida con éxito.',
                    'delete-success' => 'Regla del carrito eliminada correctamente',
                    'update-success' => 'Regla del carrito actualizada con éxito.',
                ],

                'catalog-rules' => [
                    'create-success' => 'Regla de catálogo añadida con éxito.',
                    'delete-success' => 'Regla de catálogo eliminada correctamente',
                    'update-success' => 'Regla de catálogo actualizada con éxito.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'Cupón de regla de carrito añadido con éxito.',
                    'delete-success' => 'Cupón de regla de carrito eliminado correctamente',
                    'update-success' => 'Cupón de regla de carrito actualizado con éxito.',

                    'mass-operations' => [
                        'delete-success' => 'Páginas seleccionadas eliminadas correctamente.',
                    ],
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'Configuración regional añadida con éxito.',
                'delete-success' => 'Configuración regional eliminada correctamente',
                'update-success' => 'Configuración regional actualizada con éxito.',

                'error' => [
                    'last-item-delete' => 'Se requiere al menos un idioma regional.',
                ],
            ],

            'currencies' => [
                'create-success' => 'Moneda añadida con éxito.',
                'delete-success' => 'Moneda eliminada correctamente',
                'update-success' => 'Moneda actualizada con éxito.',

                'error' => [
                    'last-item-delete' => 'Se requiere al menos una moneda.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'Tipo de cambio añadido con éxito.',
                'delete-success' => 'Tipo de cambio eliminado correctamente',
                'update-success' => 'Tipo de cambio actualizado con éxito.',
            ],

            'inventory-sources' => [
                'create-success'   => 'Fuente de inventario añadida con éxito.',
                'delete-success'   => 'Fuente de inventario eliminada correctamente',
                'update-success'   => 'Fuente de inventario actualizada con éxito.',

                'error' => [
                    'last-item-delete' => 'Se requiere al menos una fuente de inventario.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'Tasa de impuestos añadida con éxito.',
                    'delete-success' => 'Tasa de impuestos eliminada correctamente',
                    'update-success' => 'Tasa de impuestos actualizada con éxito.',
                ],

                'tax-categories' => [
                    'create-success' => 'Categoría de impuestos añadida con éxito.',
                    'delete-success' => 'Categoría de impuestos eliminada correctamente',
                    'update-success' => 'Categoría de impuestos actualizada con éxito.',
                ],
            ],

            'channels' => [
                'create-success' => 'Canal añadido con éxito.',
                'delete-success' => 'Canal eliminado correctamente',
                'update-success' => 'Canal actualizado con éxito.',

                'error' => [
                    'last-item-delete' => 'Se requiere al menos un canal.',
                ],
            ],

            'users' => [
                'create-success' => 'Usuario añadido con éxito.',
                'delete-success' => 'Usuario eliminado correctamente',
                'update-success' => 'Usuario actualizado con éxito.',

                'error' => [
                    'cannot-change-column' => 'No se puede cambiar el usuario.',
                    'last-item-delete'     => 'Se requiere al menos un usuario.',
                ],
            ],

            'roles' => [
                'create-success' => 'Rol añadido con éxito.',
                'delete-success' => 'Rol eliminado correctamente',
                'update-success' => 'Rol actualizado con éxito.',

                'error' => [
                    'being-used'       => 'Este recurso de roles se está utilizando en el usuario de administración.',
                    'last-item-delete' => 'Se requiere al menos un rol.',
                ],
            ],

            'themes' => [
                'create-success' => 'Tema creado exitosamente',
                'delete-success' => 'Tema eliminado exitosamente',
                'update-success' => 'Tema actualizado exitosamente',
            ],
        ],

        'configuration' => [
            'create-success' => 'Configuración añadida con éxito.',
            'delete-success' => 'Configuración eliminada correctamente',
            'update-success' => 'Configuración actualizada con éxito.',
        ],

        'account' => [
            'create-success'     => 'Cuenta añadida con éxito.',
            'delete-success'     => 'Cuenta eliminada correctamente',
            'logged-in-success'  => 'Inicio de sesión exitoso.',
            'logged-out-success' => 'Cierre de sesión exitoso.',
            'update-success'     => 'Cuenta actualizada con éxito.',

            'error' => [
                'credential-error'  => 'Las credenciales proporcionadas son incorrectas.',
                'invalid'           => 'Correo electrónico o contraseña inválidos',
                'password-mismatch' => 'La contraseña actual no coincide.',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'Tu dirección se ha creado correctamente.',
                'delete-success' => 'Tu dirección se ha eliminado correctamente.',
                'update-success' => 'Tu dirección se ha actualizado correctamente.',
            ],

            'accounts' => [
                'create-success'     => 'Tu cuenta se ha creado correctamente.',
                'delete-success'     => 'Tu cuenta se ha eliminado correctamente.',
                'update-success'     => 'Tu cuenta se ha actualizado correctamente.',
                'logged-in-success'  => 'Inicio de sesión exitoso.',
                'logged-out-success' => 'Cierre de sesión exitoso.',

                'error' => [
                    'invalid'          => 'Correo electrónico o contraseña inválidos',
                    'credential-error' => 'Las credenciales proporcionadas son incorrectas.',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'Dirección guardada correctamente.',
            'check-billing-address'   => 'Por favor, verifica la dirección de facturación.',
            'check-shipping-address'  => 'Por favor, verifica la dirección de envío.',
            'minimum-order-message'   => 'El monto mínimo del pedido es :amount.',
            'order-saved'             => 'Pedido guardado correctamente',
            'payment-method-saved'    => 'Método de pago guardado correctamente.',
            'shipping-method-saved'   => 'Método de envío guardado correctamente.',
            'specify-payment-method'  => 'Por favor, especifica el método de pago.',
            'specify-shipping-method' => 'Por favor, especifica el método de envío.',

            'cart' => [
                'item' => [
                    'success'        => 'El artículo se ha añadido al carrito correctamente.',
                    'success-remove' => 'El artículo se ha eliminado del carrito correctamente.',
                ],

                'quantity' => [
                    'illegal' => 'La cantidad no puede ser menor que uno.',
                    'success' => 'Artículo(s) del carrito actualizado(s) correctamente.',
                ],

                'coupon' => [
                    'apply-issue'    => 'No se puede aplicar el código de cupón.',
                    'invalid'        => 'El código de cupón no es válido.',
                    'success'        => 'Código de cupón aplicado correctamente.',
                    'success-remove' => 'Cupón eliminado correctamente.',
                ],

                'move-wishlist' => [
                    'success' => 'Artículo movido a la lista de deseos correctamente.',
                ],
            ],
        ],

        'wishlist' => [
            'success'        => 'Artículo añadido a la lista de deseos correctamente',
            'removed'        => 'Artículo eliminado de la lista de deseos correctamente',
            'moved'          => 'Artículo movido al carrito correctamente.',
            'option-missing' => 'Faltan opciones del producto, por lo que el artículo no se puede mover a la lista de deseos.',

            'error' => [
                'security-warning' => '¡Se ha detectado actividad sospechosa!',

                'mass-operations' => [
                    'resource-not-found' => 'Producto de lista de deseos seleccionado no encontrado.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'Pedido cancelado correctamente.',

                'error' => [
                    'cancel-error' => 'No se puede cancelar el pedido.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'Por favor, selecciona al menos un atributo configurable.',

                'reviews' => [
                    'create-success' => 'Tu reseña se ha enviado correctamente.',
                ],
            ],
        ],
    ],
];
