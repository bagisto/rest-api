<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'سفارش با موفقیت لغو شد.',

                'error' => [
                    'cancel-error' => 'امکان لغو سفارش وجود ندارد.',
                ],
            ],

            'invoices' => [
                'create-success' => 'فاکتور با موفقیت اضافه شد.',

                'error' => [
                    'creation-error'    => 'ایجاد فاکتور سفارش مجاز نیست.',
                    'invalid-qty-error' => 'ما مقدار نامعتبری را برای موارد فاکتوری پیدا کردیم.',
                    'product-error'     => 'فاکتور بدون محصول ایجاد نمی شود.',
                ],
            ],

            'shipments' => [
                'create-success' => 'ارسال با موفقیت اضافه شد.',

                'error' => [
                    'creation-error'    => 'ارسال برای این سفارش قابل انجام نیست.',
                    'invalid-qty-error' => 'ما مقدار نامعتبری برای موارد ارسالی پیدا کردیم.',
                ],
            ],

            'refunds' => [
                'create-success' => 'بازپرداخت با موفقیت اضافه شد.',

                'error' => [
                    'creation-error'       => 'بازپرداخت برای این سفارش ممکن نیست.',
                    'invalid-amount-error' => 'مبلغ بازپرداخت باید غیر صفر باشد.',
                    'invalid-qty-error'    => 'ما مقدار نامعتبری برای موارد بازپرداختی پیدا کردیم.',
                    'limit-error'          => 'بیشترین مبلغ قابل بازپرداخت :amount است.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'این فاکتور قبلاً پرداخت شده است.',
                'invoice-missing'            => 'این شناسه فاکتور وجود ندارد.',
                'transaction-amount-exceeds' => 'مقدار مشخص شده این تراکنش مجموع مبلغ فاکتور را بیشتر می کند.',
                'transaction-saved'          => 'تراکنش ذخیره شده است.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'محصول با موفقیت اضافه شد.',
                'delete-success' => 'محصول با موفقیت حذف شد',
                'update-success' => 'محصول با موفقیت به روز شد.',

                'inventories' => [
                    'update-success' => 'موجودی با موفقیت به روز شد.',
                ],

                'mass-operations' => [
                    'delete-success'  => 'محصولات انتخاب شده با موفقیت حذف شدند.',
                    'update-success'  => 'محصولات انتخاب شده با موفقیت به روز شدند.',
                ],

                'error' => [
                    'configurable-error' => 'لطفاً حداقل یک ویژگی قابل پیکربندی را انتخاب کنید.',
                ],
            ],

            'categories' => [
                'create-success' => 'دسته با موفقیت اضافه شد.',
                'delete-success' => 'دسته با موفقیت حذف شد',
                'update-success' => 'دسته با موفقیت به روز شد.',

                'mass-operations' => [
                    'delete-success'  => 'دسته‌های انتخاب شده با موفقیت حذف شدند.',
                    'update-success'  => 'دسته‌های انتخاب شده با موفقیت به روز شدند.',
                ],
            ],

            'attributes' => [
                'create-success' => 'ویژگی با موفقیت اضافه شد.',
                'delete-success' => 'ویژگی با موفقیت حذف شد',
                'update-success' => 'ویژگی با موفقیت به روز شد.',

                'error' => [
                    'system-attributes-delete' => 'امکان حذف ویژگی‌های سیستمی وجود ندارد.',
                    'cannot-change-type'       => 'امکان تغییر نوع فیلد وجود ندارد',

                    'mass-operations' => [
                        'resource-not-found' => 'ویژگی‌های انتخاب شده یافت نشدند.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'خانواده با موفقیت اضافه شد.',
                'delete-success' => 'خانواده با موفقیت حذف شد',
                'update-success' => 'خانواده با موفقیت به روز شد.',

                'error' => [
                    'last-item-delete' => 'حداقل یک خانواده مورد نیاز است.',
                    'being-used'       => 'این منبع خانواده در :source استفاده می شود.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'مشتری با موفقیت اضافه شد.',
                'delete-success' => 'مشتری با موفقیت حذف شد',
                'update-success' => 'مشتری با موفقیت به روز شد.',

                'mass-operations' => [
                    'delete-success' => 'مشتریان انتخاب شده با موفقیت حذف شدند.',
                    'update-success' => 'مشتریان انتخاب شده با موفقیت به روز شدند.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'امکان حذف حساب مشتری به دلیل وجود سفارشات در انتظار یا در حال پردازش وجود ندارد.',
                ],

                'notes' => [
                    'note-taken' => 'یادداشت ثبت شد.',
                ],
            ],

            'addresses' => [
                'create-success' => 'آدرس با موفقیت اضافه شد.',
                'delete-success' => 'آدرس با موفقیت حذف شد',
                'update-success' => 'آدرس با موفقیت به روز شد.',

                'mass-operations' => [
                    'delete-success' => 'آدرس‌های انتخاب شده با موفقیت حذف شدند.',
                ],
            ],

            'groups' => [
                'create-success' => 'گروه مشتری با موفقیت اضافه شد.',
                'delete-success' => 'گروه مشتری با موفقیت حذف شد',
                'update-success' => 'گروه مشتری با موفقیت به روز شد.',

                'error' => [
                    'being-used'           => 'این منبع گروه در مشتریان استفاده می شود.',
                    'default-group-delete' => 'امکان حذف گروه پیش فرض وجود ندارد.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'نقد و بررسی با موفقیت حذف شد',
                'update-success' => 'نقد و بررسی با موفقیت به روز شد.',

                'mass-operations' => [
                    'delete-success' => 'نقدهای انتخاب شده با موفقیت حذف شدند.',
                    'update-success' => 'نقدهای انتخاب شده با موفقیت به روز شدند.',
                ],
            ],
        ],

        'cms' => [
            'create-success' => 'CMS با موفقیت اضافه شد.',
            'delete-success' => 'CMS با موفقیت حذف شد.',
            'update-success' => 'CMS با موفقیت به روز شد.',

            'mass-operations' => [
                'delete-success' => 'صفحات انتخاب شده با موفقیت حذف شدند.',
            ],

            'error' => [
                'already-taken' => 'صفحات قبلاً گرفته شده است.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'کمپین با موفقیت اضافه شد.',
                    'delete-success' => 'کمپین با موفقیت حذف شد.',
                    'update-success' => 'کمپین با موفقیت به روز شد.',
                ],

                'events' => [
                    'create-success' => 'رویداد با موفقیت اضافه شد.',
                    'delete-success' => 'رویداد با موفقیت حذف شد.',
                    'update-success' => 'رویداد با موفقیت به روز شد.',
                ],

                'templates' => [
                    'create-success' => 'قالب ایمیل با موفقیت اضافه شد.',
                    'delete-success' => 'قالب ایمیل با موفقیت حذف شد.',
                    'update-success' => 'قالب ایمیل با موفقیت به روز شد.',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'قانون سبد خرید با موفقیت اضافه شد.',
                    'delete-success' => 'قانون سبد خرید با موفقیت حذف شد.',
                    'update-success' => 'قانون سبد خرید با موفقیت به روز شد.',
                ],

                'catalog-rules' => [
                    'create-success' => 'قانون فهرست با موفقیت اضافه شد.',
                    'delete-success' => 'قانون فهرست با موفقیت حذف شد.',
                    'update-success' => 'قانون فهرست با موفقیت به روز شد.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'کوپن قانون سبد خرید با موفقیت اضافه شد.',
                    'delete-success' => 'کوپن قانون سبد خرید با موفقیت حذف شد.',
                    'update-success' => 'کوپن قانون سبد خرید با موفقیت به روز شد.',

                    'mass-operations' => [
                        'delete-success' => 'صفحات انتخاب شده با موفقیت حذف شدند.',
                    ],
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'محلی با موفقیت اضافه شد.',
                'delete-success' => 'محلی با موفقیت حذف شد.',
                'update-success' => 'محلی با موفقیت به روز شد.',

                'error' => [
                    'last-item-delete' => 'حداقل یک محل مورد نیاز است.',
                ],
            ],

            'currencies' => [
                'create-success' => 'ارز با موفقیت اضافه شد.',
                'delete-success' => 'ارز با موفقیت حذف شد.',
                'update-success' => 'ارز با موفقیت به روز شد.',

                'error' => [
                    'last-item-delete' => 'حداقل یک ارز مورد نیاز است.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'نرخ تبادل با موفقیت اضافه شد.',
                'delete-success' => 'نرخ تبادل با موفقیت حذف شد.',
                'update-success' => 'نرخ تبادل با موفقیت به روز شد.',
            ],

            'inventory-sources' => [
                'create-success'   => 'منبع موجودی با موفقیت اضافه شد.',
                'delete-success'   => 'منبع موجودی با موفقیت حذف شد.',
                'update-success'   => 'منبع موجودی با موفقیت به روز شد.',

                'error' => [
                    'last-item-delete' => 'حداقل یک منبع موجودی مورد نیاز است.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'نرخ مالیات با موفقیت اضافه شد.',
                    'delete-success' => 'نرخ مالیات با موفقیت حذف شد.',
                    'update-success' => 'نرخ مالیات با موفقیت به روز شد.',
                ],

                'tax-categories' => [
                    'create-success' => 'دسته مالیات با موفقیت اضافه شد.',
                    'delete-success' => 'دسته مالیات با موفقیت حذف شد.',
                    'update-success' => 'دسته مالیات با موفقیت به روز شد.',
                ],
            ],

            'channels' => [
                'create-success' => 'کانال با موفقیت اضافه شد.',
                'delete-success' => 'کانال با موفقیت حذف شد.',
                'update-success' => 'کانال با موفقیت به روز شد.',

                'error' => [
                    'last-item-delete' => 'حداقل یک کانال مورد نیاز است.',
                ],
            ],

            'users' => [
                'create-success' => 'کاربر با موفقیت اضافه شد.',
                'delete-success' => 'کاربر با موفقیت حذف شد.',
                'update-success' => 'کاربر با موفقیت به روز شد.',

                'error' => [
                    'cannot-change-column' => 'امکان تغییر کاربران وجود ندارد.',
                    'last-item-delete'     => 'حداقل یک کاربر مورد نیاز است.',
                ],
            ],

            'roles' => [
                'create-success' => 'نقش با موفقیت اضافه شد.',
                'delete-success' => 'نقش با موفقیت حذف شد.',
                'update-success' => 'نقش با موفقیت به روز شد.',

                'error' => [
                    'being-used'       => 'این منبع نقش در کاربر ادمین استفاده می شود.',
                    'last-item-delete' => 'حداقل یک نقش مورد نیاز است.',
                ],
            ],

            'themes' => [
                'create-success' => 'پوسته با موفقیت ایجاد شد',
                'delete-success' => 'پوسته با موفقیت حذف شد',
                'update-success' => 'پوسته با موفقیت به‌روزرسانی شد',
            ],
        ],

        'configuration' => [
            'create-success' => 'پیکربندی با موفقیت اضافه شد.',
            'delete-success' => 'پیکربندی با موفقیت حذف شد.',
            'update-success' => 'پیکربندی با موفقیت به روز شد.',
        ],

        'account' => [
            'create-success'     => 'حساب با موفقیت اضافه شد.',
            'delete-success'     => 'حساب با موفقیت حذف شد.',
            'logged-in-success'  => 'با موفقیت وارد شد.',
            'logged-out-success' => 'با موفقیت خارج شد.',
            'update-success'     => 'حساب با موفقیت به روز شد.',

            'error' => [
                'credential-error'  => 'مدارک ارائه شده اشتباه است.',
                'invalid'           => 'ایمیل یا رمز عبور نامعتبر است',
                'password-mismatch' => 'رمز عبور فعلی مطابقت ندارد.',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'آدرس شما با موفقیت ایجاد شد.',
                'delete-success' => 'آدرس شما با موفقیت حذف شد.',
                'update-success' => 'آدرس شما با موفقیت به روز شد.',
            ],

            'accounts' => [
                'create-success'     => 'حساب شما با موفقیت ایجاد شد.',
                'delete-success'     => 'حساب شما با موفقیت حذف شد.',
                'update-success'     => 'حساب شما با موفقیت به روز شد.',
                'logged-in-success'  => 'با موفقیت وارد شدید.',
                'logged-out-success' => 'با موفقیت خارج شدید.',

                'error' => [
                    'invalid'          => 'ایمیل یا رمز عبور نامعتبر است',
                    'credential-error' => 'مدارک ارائه شده اشتباه است.',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'آدرس با موفقیت ذخیره شد.',
            'check-billing-address'   => 'لطفاً آدرس صورتحساب را بررسی کنید.',
            'check-shipping-address'  => 'لطفاً آدرس ارسال را بررسی کنید.',
            'minimum-order-message'   => 'حداقل مبلغ سفارش :amount است.',
            'order-saved'             => 'سفارش با موفقیت ذخیره شد',
            'payment-method-saved'    => 'روش پرداخت با موفقیت ذخیره شد.',
            'shipping-method-saved'   => 'روش حمل و نقل با موفقیت ذخیره شد.',
            'specify-payment-method'  => 'لطفاً روش پرداخت را مشخص کنید.',
            'specify-shipping-method' => 'لطفاً روش حمل و نقل را مشخص کنید.',

            'cart' => [
                'item' => [
                    'success'        => 'کالا با موفقیت به سبد خرید اضافه شد.',
                    'success-remove' => 'کالا با موفقیت از سبد خرید حذف شد.',
                ],

                'quantity' => [
                    'illegal' => 'تعداد نمی تواند کمتر از یک باشد.',
                    'success' => 'موارد سبد خرید با موفقیت به روز شد.',
                ],

                'coupon' => [
                    'apply-issue'    => 'کد تخفیف قابل اعمال نیست.',
                    'invalid'        => 'کد تخفیف نامعتبر است.',
                    'success'        => 'کد تخفیف با موفقیت اعمال شد.',
                    'success-remove' => 'کد تخفیف با موفقیت حذف شد.',
                ],

                'move-wishlist' => [
                    'success' => 'مورد با موفقیت به لیست علاقه مندی ها منتقل شد.',
                ],
            ],
        ],

        'wishlist' => [
            'success'        => 'مورد با موفقیت به لیست علاقه مندی ها اضافه شد',
            'removed'        => 'مورد با موفقیت از لیست علاقه مندی ها حذف شد',
            'moved'          => 'مورد با موفقیت به سبد خرید منتقل شد.',
            'option-missing' => 'گزینه های محصول از دست رفته اند، بنابراین مورد نمی تواند به لیست علاقه مندی ها منتقل شود.',

            'error' => [
                'security-warning' => 'فعالیت مشکوکی یافت شد!',

                'mass-operations' => [
                    'resource-not-found' => 'محصول مورد نظر در لیست علاقه مندی یافت نشد.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'سفارش با موفقیت لغو شد.',

                'error' => [
                    'cancel-error' => 'امکان لغو سفارش وجود ندارد.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'لطفاً حداقل یک ویژگی قابل پیکربندی را انتخاب کنید.',

                'reviews' => [
                    'create-success' => 'نقد و بررسی شما با موفقیت ثبت شد.',
                ],
            ],
        ],
    ],
];
