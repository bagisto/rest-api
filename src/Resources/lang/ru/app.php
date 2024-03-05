<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'Заказ успешно отменен.',

                'error' => [
                    'cancel-error' => 'Заказ не может быть отменен.',
                ],
            ],

            'invoices' => [
                'create-success' => 'Счет успешно добавлен.',

                'error' => [
                    'creation-error'    => 'Создание счета для заказа запрещено.',
                    'invalid-qty-error' => 'Обнаружено недопустимое количество для выставления счета за товары.',
                    'product-error'     => 'Счет не может быть создан без товаров.',
                ],
            ],

            'shipments' => [
                'create-success' => 'Отправка успешно добавлена.',

                'error' => [
                    'creation-error'    => 'Отправка не может быть создана для этого заказа.',
                    'invalid-qty-error' => 'Обнаружено недопустимое количество товаров для отправки.',
                ],
            ],

            'refunds' => [
                'create-success' => 'Возврат успешно добавлен.',

                'error' => [
                    'creation-error'       => 'Возврат не может быть создан для этого заказа.',
                    'invalid-amount-error' => 'Сумма возврата должна быть ненулевой.',
                    'invalid-qty-error'    => 'Обнаружено недопустимое количество для возврата товаров.',
                    'limit-error'          => 'Максимальная сумма для возврата: :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'Этот счет уже оплачен.',
                'invoice-missing'            => 'Этот идентификатор счета не существует.',
                'transaction-amount-exceeds' => 'Указанная сумма этой транзакции превышает общую сумму счета.',
                'transaction-saved'          => 'Транзакция сохранена.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'Продукт успешно добавлен.',
                'delete-success' => 'Продукт успешно удален.',
                'update-success' => 'Продукт успешно обновлен.',

                'inventories' => [
                    'update-success' => 'Инвентарь успешно обновлен.',
                ],

                'mass-operations' => [
                    'delete-success'  => 'Выбранные продукты успешно удалены.',
                    'update-success'  => 'Выбранные продукты успешно обновлены.',
                ],

                'error' => [
                    'configurable-error' => 'Пожалуйста, выберите хотя бы один конфигурируемый атрибут.',
                ],
            ],

            'categories' => [
                'create-success' => 'Категория успешно добавлена.',
                'delete-success' => 'Категория успешно удалена.',
                'update-success' => 'Категория успешно обновлена.',

                'mass-operations' => [
                    'delete-success'  => 'Выбранные категории успешно удалены.',
                    'update-success'  => 'Выбранные категории успешно обновлены.',
                ],
            ],

            'attributes' => [
                'create-success' => 'Атрибут успешно добавлен.',
                'delete-success' => 'Атрибут успешно удален.',
                'update-success' => 'Атрибут успешно обновлен.',

                'error' => [
                    'system-attributes-delete' => 'Невозможно удалить системные атрибуты.',
                    'cannot-change-type'       => 'Невозможно изменить тип поля.',

                    'mass-operations' => [
                        'resource-not-found' => 'Выбранные атрибуты не найдены.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'Семейство успешно добавлено.',
                'delete-success' => 'Семейство успешно удалено.',
                'update-success' => 'Семейство успешно обновлено.',

                'error' => [
                    'last-item-delete' => 'Требуется как минимум одно семейство.',
                    'being-used'       => 'Это семейство используется в :source.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'Покупатель успешно добавлен.',
                'delete-success' => 'Покупатель успешно удален.',
                'update-success' => 'Покупатель успешно обновлен.',

                'mass-operations' => [
                    'delete-success' => 'Выбранные покупатели успешно удалены.',
                    'update-success' => 'Выбранные покупатели успешно обновлены.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'Невозможно удалить учетную запись покупателя, так как есть незавершенные или обрабатываемые заказы.',
                ],

                'notes' => [
                    'note-taken' => 'Заметка добавлена.',
                ],
            ],

            'addresses' => [
                'create-success' => 'Адрес успешно добавлен.',
                'delete-success' => 'Адрес успешно удален.',
                'update-success' => 'Адрес успешно обновлен.',

                'mass-operations' => [
                    'delete-success' => 'Выбранные адреса успешно удалены.',
                ],
            ],

            'groups' => [
                'create-success' => 'Группа покупателей успешно добавлена.',
                'delete-success' => 'Группа покупателей успешно удалена.',
                'update-success' => 'Группа покупателей успешно обновлена.',

                'error' => [
                    'being-used'           => 'Эта группа используется у покупателей.',
                    'default-group-delete' => 'Невозможно удалить группу по умолчанию.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'Отзыв успешно удален.',
                'update-success' => 'Отзыв успешно обновлен.',

                'mass-operations' => [
                    'delete-success' => 'Выбранные отзывы успешно удалены.',
                    'update-success' => 'Выбранные отзывы успешно обновлены.',
                ],
            ],
        ],

        'cms' => [
            'create-success' => 'CMS успешно добавлен.',
            'delete-success' => 'CMS успешно удален.',
            'update-success' => 'CMS успешно обновлен.',

            'mass-operations' => [
                'delete-success' => 'Выбранные страницы успешно удалены.',
            ],

            'error' => [
                'already-taken' => 'Эта страница уже занята.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'Кампания успешно добавлена.',
                    'delete-success' => 'Кампания успешно удалена.',
                    'update-success' => 'Кампания успешно обновлена.',
                ],

                'events' => [
                    'create-success' => 'Событие успешно добавлено.',
                    'delete-success' => 'Событие успешно удалено.',
                    'update-success' => 'Событие успешно обновлено.',
                ],

                'templates' => [
                    'create-success' => 'Шаблон электронного письма успешно добавлен.',
                    'delete-success' => 'Шаблон электронного письма успешно удален.',
                    'update-success' => 'Шаблон электронного письма успешно обновлен.',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'Правило корзины успешно добавлено.',
                    'delete-success' => 'Правило корзины успешно удалено.',
                    'update-success' => 'Правило корзины успешно обновлено.',
                ],

                'catalog-rules' => [
                    'create-success' => 'Правило каталога успешно добавлено.',
                    'delete-success' => 'Правило каталога успешно удалено.',
                    'update-success' => 'Правило каталога успешно обновлено.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'Купон для правила корзины успешно добавлен.',
                    'delete-success' => 'Купон для правила корзины успешно удален.',
                    'update-success' => 'Купон для правила корзины успешно обновлен.',

                    'mass-operations' => [
                        'delete-success' => 'Выбранные страницы успешно удалены.',
                    ],
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'Языковая версия успешно добавлена.',
                'delete-success' => 'Языковая версия успешно удалена.',
                'update-success' => 'Языковая версия успешно обновлена.',

                'error' => [
                    'last-item-delete' => 'Требуется как минимум одна языковая версия.',
                ],
            ],

            'currencies' => [
                'create-success' => 'Валюта успешно добавлена.',
                'delete-success' => 'Валюта успешно удалена.',
                'update-success' => 'Валюта успешно обновлена.',

                'error' => [
                    'last-item-delete' => 'Требуется как минимум одна валюта.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'Обменный курс успешно добавлен.',
                'delete-success' => 'Обменный курс успешно удален.',
                'update-success' => 'Обменный курс успешно обновлен.',
            ],

            'inventory-sources' => [
                'create-success'   => 'Источник инвентаризации успешно добавлен.',
                'delete-success'   => 'Источник инвентаризации успешно удален.',
                'update-success'   => 'Источник инвентаризации успешно обновлен.',

                'error' => [
                    'last-item-delete' => 'Требуется как минимум один источник инвентаризации.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'Налоговая ставка успешно добавлена.',
                    'delete-success' => 'Налоговая ставка успешно удалена.',
                    'update-success' => 'Налоговая ставка успешно обновлена.',
                ],

                'tax-categories' => [
                    'create-success' => 'Налоговая категория успешно добавлена.',
                    'delete-success' => 'Налоговая категория успешно удалена.',
                    'update-success' => 'Налоговая категория успешно обновлена.',
                ],
            ],

            'channels' => [
                'create-success' => 'Канал успешно добавлен.',
                'delete-success' => 'Канал успешно удален.',
                'update-success' => 'Канал успешно обновлен.',

                'error' => [
                    'last-item-delete' => 'Требуется как минимум один канал.',
                ],
            ],

            'users' => [
                'create-success' => 'Пользователь успешно добавлен.',
                'delete-success' => 'Пользователь успешно удален.',
                'update-success' => 'Пользователь успешно обновлен.',

                'error' => [
                    'cannot-change-column' => 'Невозможно изменить пользователя.',
                    'last-item-delete'     => 'Требуется как минимум один пользователь.',
                ],
            ],

            'roles' => [
                'create-success' => 'Роль успешно добавлена.',
                'delete-success' => 'Роль успешно удалена.',
                'update-success' => 'Роль успешно обновлена.',

                'error' => [
                    'being-used'       => 'Эта роль используется в администраторском пользователе.',
                    'last-item-delete' => 'Требуется как минимум одна роль.',
                ],
            ],

            'themes' => [
                'create-success' => 'Тема успешно создана',
                'delete-success' => 'Тема успешно удалена',
                'update-success' => 'Тема успешно обновлена',
            ],
        ],

        'configuration' => [
            'create-success' => 'Конфигурация успешно добавлена.',
            'delete-success' => 'Конфигурация успешно удалена.',
            'update-success' => 'Конфигурация успешно обновлена.',
        ],

        'account' => [
            'create-success'     => 'Аккаунт успешно добавлен.',
            'delete-success'     => 'Аккаунт успешно удален.',
            'logged-in-success'  => 'Вход выполнен успешно.',
            'logged-out-success' => 'Выход выполнен успешно.',
            'update-success'     => 'Аккаунт успешно обновлен.',

            'error' => [
                'credential-error'  => 'Указанные учетные данные неверны.',
                'invalid'           => 'Неверный адрес электронной почты или пароль',
                'password-mismatch' => 'Текущий пароль не совпадает.',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'Seu endereço foi criado com sucesso.',
                'delete-success' => 'Seu endereço foi excluído com sucesso.',
                'update-success' => 'Seu endereço foi atualizado com sucesso.',
            ],

            'accounts' => [
                'create-success'     => 'Sua conta foi criada com sucesso.',
                'delete-success'     => 'Sua conta foi excluída com sucesso.',
                'update-success'     => 'Sua conta foi atualizada com sucesso.',
                'logged-in-success'  => 'Logado com sucesso.',
                'logged-out-success' => 'Deslogado com sucesso.',

                'error' => [
                    'invalid'          => 'E-mail ou senha inválidos',
                    'credential-error' => 'As credenciais fornecidas estão incorretas.',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'Endereço salvo com sucesso.',
            'check-billing-address'   => 'Por favor, verifique o endereço de cobrança.',
            'check-shipping-address'  => 'Por favor, verifique o endereço de entrega.',
            'minimum-order-message'   => 'O valor mínimo do pedido é :amount.',
            'order-saved'             => 'Pedido salvo com sucesso.',
            'payment-method-saved'    => 'Método de pagamento salvo com sucesso.',
            'shipping-method-saved'   => 'Método de envio salvo com sucesso.',
            'specify-payment-method'  => 'Por favor, especifique o método de pagamento.',
            'specify-shipping-method' => 'Por favor, especifique o método de envio.',

            'cart' => [
                'item' => [
                    'success'        => 'Item adicionado ao carrinho com sucesso.',
                    'success-remove' => 'Item removido do carrinho com sucesso.',
                ],

                'quantity' => [
                    'illegal' => 'A quantidade não pode ser menor que um.',
                    'success' => 'Item(ns) do carrinho atualizado(s) com sucesso.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Não foi possível aplicar o código do cupom.',
                    'invalid'        => 'Código do cupom inválido.',
                    'success'        => 'Código do cupom aplicado com sucesso.',
                    'success-remove' => 'Cupom removido com sucesso.',
                ],

                'move-wishlist' => [
                    'success' => 'Item movido para a lista de desejos com sucesso.',
                ],
            ],
        ],

        'wishlist' => [
            'success'        => 'Item adicionado à lista de desejos com sucesso.',
            'removed'        => 'Item removido da lista de desejos com sucesso.',
            'moved'          => 'Item movido com sucesso para o carrinho.',
            'option-missing' => 'Opções do produto estão faltando, portanto, o item não pode ser movido para a lista de desejos.',

            'error' => [
                'security-warning' => 'Atividade suspeita detectada!',

                'mass-operations' => [
                    'resource-not-found' => 'Produto selecionado na lista de desejos não encontrado.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'Pedido cancelado com sucesso.',

                'error' => [
                    'cancel-error' => 'Pedido não pode ser cancelado.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'Por favor, selecione pelo menos um atributo configurável.',

                'reviews' => [
                    'create-success' => 'Sua análise foi enviada com sucesso.',
                ],
            ],
        ],
    ],
];
