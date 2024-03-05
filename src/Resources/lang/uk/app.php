<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'Замовлення успішно скасоване.',

                'error' => [
                    'cancel-error' => 'Замовлення не може бути скасоване.',
                ],
            ],

            'invoices' => [
                'create-success' => 'Рахунок успішно додано.',

                'error' => [
                    'creation-error'    => 'Створення рахунку для замовлення не дозволено.',
                    'invalid-qty-error' => 'Ми виявили недійсну кількість товарів для виставлення рахунку.',
                    'product-error'     => 'Рахунок не може бути створений без товарів.',
                ],
            ],

            'shipments' => [
                'create-success' => 'Відвантаження успішно додане.',

                'error' => [
                    'creation-error'    => 'Відвантаження не може бути створене для цього замовлення.',
                    'invalid-qty-error' => 'Ми виявили недійсну кількість товарів для відвантаження.',
                ],
            ],

            'refunds' => [
                'create-success' => 'Повернення успішно додане.',

                'error' => [
                    'creation-error'       => 'Повернення не може бути створене для цього замовлення.',
                    'invalid-amount-error' => 'Сума повернення повинна бути не нульовою.',
                    'invalid-qty-error'    => 'Ми виявили недійсну кількість товарів для повернення.',
                    'limit-error'          => 'Максимальна сума, доступна для повернення, становить :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'Цей рахунок вже оплачений.',
                'invoice-missing'            => 'Цей ідентифікатор рахунку не існує.',
                'transaction-amount-exceeds' => 'Вказана сума цієї транзакції перевищує загальну суму рахунку.',
                'transaction-saved'          => 'Транзакцію збережено.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'Товар успішно додано.',
                'delete-success' => 'Товар успішно видалено.',
                'update-success' => 'Товар успішно оновлено.',

                'inventories' => [
                    'update-success' => 'Запаси успішно оновлено.',
                ],

                'mass-operations' => [
                    'delete-success' => 'Вибрані товари успішно видалено.',
                    'update-success' => 'Вибрані товари успішно оновлено.',
                ],

                'error' => [
                    'configurable-error' => 'Будь ласка, виберіть принаймні один налаштований атрибут.',
                ],
            ],

            'categories' => [
                'create-success' => 'Категорія успішно додана.',
                'delete-success' => 'Категорія успішно видалена.',
                'update-success' => 'Категорія успішно оновлена.',

                'mass-operations' => [
                    'delete-success' => 'Вибрані категорії успішно видалено.',
                    'update-success' => 'Вибрані категорії успішно оновлено.',
                ],
            ],

            'attributes' => [
                'create-success' => 'Атрибут успішно додано.',
                'delete-success' => 'Атрибут успішно видалено.',
                'update-success' => 'Атрибут успішно оновлено.',

                'error' => [
                    'system-attributes-delete' => 'Не можна видалити системні атрибути.',
                    'cannot-change-type'       => 'Не можна змінити тип поля.',

                    'mass-operations' => [
                        'resource-not-found' => 'Вибрані атрибути не знайдені.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'Сімейство успішно додано.',
                'delete-success' => 'Сімейство успішно видалено.',
                'update-success' => 'Сімейство успішно оновлено.',

                'error' => [
                    'last-item-delete' => 'Потрібно принаймні одне сімейство.',
                    'being-used'       => 'Цей ресурс сімейств використовується в :source.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'Клієнт успішно доданий.',
                'delete-success' => 'Клієнт успішно видалений.',
                'update-success' => 'Клієнт успішно оновлений.',

                'mass-operations' => [
                    'delete-success' => 'Вибрані клієнти успішно видалені.',
                    'update-success' => 'Вибрані клієнти успішно оновлені.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'Не можна видалити обліковий запис клієнта, оскільки деякі замовлення очікують або знаходяться в стані обробки.',
                ],

                'notes' => [
                    'note-taken' => 'Запис взято.',
                ],
            ],

            'addresses' => [
                'create-success' => 'Адреса успішно додана.',
                'delete-success' => 'Адреса успішно видалена.',
                'update-success' => 'Адреса успішно оновлена.',

                'mass-operations' => [
                    'delete-success' => 'Вибрані адреси успішно видалені.',
                ],
            ],

            'groups' => [
                'create-success' => 'Групу клієнтів успішно додано.',
                'delete-success' => 'Групу клієнтів успішно видалено.',
                'update-success' => 'Групу клієнтів успішно оновлено.',

                'error' => [
                    'being-used'           => 'Цей ресурс груп використовується в Клієнтах.',
                    'default-group-delete' => 'Неможливо видалити групу за замовчуванням.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'Відгук успішно видалено.',
                'update-success' => 'Відгук успішно оновлено.',

                'mass-operations' => [
                    'delete-success' => 'Вибрані відгуки успішно видалено.',
                    'update-success' => 'Вибрані відгуки успішно оновлено.',
                ],
            ],
        ],

        'cms' => [
            'create-success' => 'CMS успішно додано.',
            'delete-success' => 'CMS успішно видалено.',
            'update-success' => 'CMS успішно оновлено.',

            'mass-operations' => [
                'delete-success' => 'Вибрані сторінки успішно видалено.',
            ],

            'error' => [
                'already-taken' => 'Ці сторінки вже зайняті.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'Кампанію успішно додано.',
                    'delete-success' => 'Кампанію успішно видалено.',
                    'update-success' => 'Кампанію успішно оновлено.',
                ],

                'events' => [
                    'create-success' => 'Подію успішно додано.',
                    'delete-success' => 'Подію успішно видалено.',
                    'update-success' => 'Подію успішно оновлено.',
                ],

                'templates' => [
                    'create-success' => 'Шаблон електронної пошти успішно додано.',
                    'delete-success' => 'Шаблон електронної пошти успішно видалено.',
                    'update-success' => 'Шаблон електронної пошти успішно оновлено.',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'Правило корзини успішно додано.',
                    'delete-success' => 'Правило корзини успішно видалено.',
                    'update-success' => 'Правило корзини успішно оновлено.',
                ],

                'catalog-rules' => [
                    'create-success' => 'Правило каталогу успішно додано.',
                    'delete-success' => 'Правило каталогу успішно видалено.',
                    'update-success' => 'Правило каталогу успішно оновлено.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'Купон для правила кошика успішно додано.',
                    'delete-success' => 'Купон для правила кошика успішно видалено.',
                    'update-success' => 'Купон для правила кошика успішно оновлено.',

                    'mass-operations' => [
                        'delete-success' => 'Вибрані сторінки успішно видалено.',
                    ],
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'Мову успішно додано.',
                'delete-success' => 'Мову успішно видалено.',
                'update-success' => 'Мову успішно оновлено.',

                'error' => [
                    'last-item-delete' => 'Потрібна принаймні одна мова.',
                ],
            ],

            'currencies' => [
                'create-success' => 'Валюту успішно додано.',
                'delete-success' => 'Валюту успішно видалено.',
                'update-success' => 'Валюту успішно оновлено.',

                'error' => [
                    'last-item-delete' => 'Потрібна принаймні одна валюта.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'Курс обміну успішно додано.',
                'delete-success' => 'Курс обміну успішно видалено.',
                'update-success' => 'Курс обміну успішно оновлено.',
            ],

            'inventory-sources' => [
                'create-success'   => 'Джерело інвентаризації успішно додано.',
                'delete-success'   => 'Джерело інвентаризації успішно видалено.',
                'update-success'   => 'Джерело інвентаризації успішно оновлено.',

                'error' => [
                    'last-item-delete' => 'Потрібне принаймні одне джерело інвентаризації.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'Ставку податку успішно додано.',
                    'delete-success' => 'Ставку податку успішно видалено.',
                    'update-success' => 'Ставку податку успішно оновлено.',
                ],

                'tax-categories' => [
                    'create-success' => 'Категорію податку успішно додано.',
                    'delete-success' => 'Категорію податку успішно видалено.',
                    'update-success' => 'Категорію податку успішно оновлено.',
                ],
            ],

            'channels' => [
                'create-success' => 'Канал успішно додано.',
                'delete-success' => 'Канал успішно видалено.',
                'update-success' => 'Канал успішно оновлено.',

                'error' => [
                    'last-item-delete' => 'Потрібен принаймні один канал.',
                ],
            ],

            'users' => [
                'create-success' => 'Користувача успішно додано.',
                'delete-success' => 'Користувача успішно видалено.',
                'update-success' => 'Користувача успішно оновлено.',

                'error' => [
                    'cannot-change-column' => 'Не можна змінити користувачів.',
                    'last-item-delete'     => 'Потрібен принаймні один користувач.',
                ],
            ],

            'roles' => [
                'create-success' => 'Роль успішно додана.',
                'delete-success' => 'Роль успішно видалена.',
                'update-success' => 'Роль успішно оновлена.',

                'error' => [
                    'being-used'       => 'Цей ресурс ролей використовується у користувача адміністратора.',
                    'last-item-delete' => 'Потрібна принаймні одна роль.',
                ],
            ],

            'themes' => [
                'create-success' => 'Тема успішно створена',
                'delete-success' => 'Тема успішно видалена',
                'update-success' => 'Тема успішно оновлена',
            ],
        ],

        'configuration' => [
            'create-success' => 'Конфігурацію успішно додано.',
            'delete-success' => 'Конфігурацію успішно видалено.',
            'update-success' => 'Конфігурацію успішно оновлено.',
        ],

        'account' => [
            'create-success'     => 'Обліковий запис успішно додано.',
            'delete-success'     => 'Обліковий запис успішно видалено.',
            'logged-in-success'  => 'Успішний вхід.',
            'logged-out-success' => 'Успішний вихід.',
            'update-success'     => 'Обліковий запис успішно оновлено.',

            'error' => [
                'credential-error'  => 'Надані облікові дані невірні.',
                'invalid'           => 'Недійсна електронна пошта або пароль.',
                'password-mismatch' => 'Поточний пароль не відповідає.',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'Вашу адресу успішно створено.',
                'delete-success' => 'Вашу адресу успішно видалено.',
                'update-success' => 'Вашу адресу успішно оновлено.',
            ],

            'accounts' => [
                'create-success'     => 'Ваш обліковий запис успішно створено.',
                'delete-success'     => 'Ваш обліковий запис успішно видалено.',
                'update-success'     => 'Ваш обліковий запис успішно оновлено.',
                'logged-in-success'  => 'Успішний вхід.',
                'logged-out-success' => 'Успішний вихід.',

                'error' => [
                    'invalid'          => 'Невірна електронна пошта або пароль',
                    'credential-error' => 'Надані облікові дані невірні.',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'Адресу збережено успішно.',
            'check-billing-address'   => 'Будь ласка, перевірте адресу для оплати.',
            'check-shipping-address'  => 'Будь ласка, перевірте адресу для доставки.',
            'minimum-order-message'   => 'Мінімальна сума замовлення: :amount.',
            'order-saved'             => 'Замовлення успішно збережено',
            'payment-method-saved'    => 'Спосіб оплати збережено успішно.',
            'shipping-method-saved'   => 'Спосіб доставки збережено успішно.',
            'specify-payment-method'  => 'Будь ласка, вкажіть спосіб оплати.',
            'specify-shipping-method' => 'Будь ласка, вкажіть спосіб доставки.',

            'cart' => [
                'item' => [
                    'success'        => 'Товар успішно додано до кошика.',
                    'success-remove' => 'Товар успішно видалено з кошика.',
                ],

                'quantity' => [
                    'illegal' => 'Кількість не може бути менше одного.',
                    'success' => 'Товар(и) в кошику успішно оновлено.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Код купона не може бути застосований.',
                    'invalid'        => 'Недійсний код купона.',
                    'success'        => 'Код купона успішно застосовано.',
                    'success-remove' => 'Купон успішно видалено.',
                ],

                'move-wishlist' => [
                    'success' => 'Товар успішно перенесено в список бажань.',
                ],
            ],
        ],

        'wishlist' => [
            'success'        => 'Товар успішно додано до списку бажань',
            'removed'        => 'Товар успішно видалено зі списку бажань',
            'moved'          => 'Товар успішно перенесено в кошик.',
            'option-missing' => 'Параметри товару відсутні, тому його не можна додати до списку бажань.',

            'error' => [
                'security-warning' => 'Виявлено підозрілу активність!',

                'mass-operations' => [
                    'resource-not-found' => 'Вибраний товар у списку бажань не знайдено.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'Замовлення скасовано успішно.',

                'error' => [
                    'cancel-error' => 'Замовлення не може бути скасоване.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'Будь ласка, виберіть принаймні один конфігураційний атрибут.',

                'reviews' => [
                    'create-success' => 'Ваш відгук успішно надіслано.',
                ],
            ],
        ],
    ],
];
