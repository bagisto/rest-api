<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'تم إلغاء الطلب بنجاح.',

                'error' => [
                    'cancel-error' => 'لا يمكن إلغاء الطلب.',
                ],
            ],

            're-order' => [
                'address-create-success'  => 'تم حفظ العنوان بنجاح',
                'address-not-available'   => 'لا توجد طرق شحن متاحة.',
                'create'                  => 'تمت إضافة العنصر بنجاح إلى السلة',
                'error'                   => 'حدث خطأ ما!',
                'order-create-success'    => 'تم تقديم الطلب بنجاح.',
                'payment-create-success'  => 'تم حفظ طريقة الدفع بنجاح',
                'shipping-create-success' => 'تم حفظ طريقة الشحن بنجاح',
            ],

            'invoices' => [
                'create-success' => 'تم إضافة الفاتورة بنجاح.',

                'error' => [
                    'creation-error'    => 'لا يُسمح بإنشاء فاتورة الطلب.',
                    'invalid-qty-error' => 'تم العثور على كمية غير صالحة لبنود الفاتورة.',
                    'product-error'     => 'لا يمكن إنشاء فاتورة بدون منتجات.',
                ],
            ],

            'shipments' => [
                'create-success' => 'تمت إضافة الشحنة بنجاح.',

                'error' => [
                    'creation-error'    => 'لا يمكن إنشاء الشحنة لهذا الطلب.',
                    'invalid-qty-error' => 'تم العثور على كمية غير صالحة لبنود الشحن.',
                ],
            ],

            'refunds' => [
                'create-success' => 'تمت إضافة المبلغ المسترد بنجاح.',

                'error' => [
                    'creation-error'       => 'لا يمكن إنشاء المبلغ المسترد لهذا الطلب.',
                    'invalid-amount-error' => 'يجب أن يكون المبلغ المسترد غير صفري.',
                    'invalid-qty-error'    => 'تم العثور على كمية غير صالحة لبنود المبلغ المسترد.',
                    'limit-error'          => 'المبلغ المتاح للاسترداد هو :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'تم دفع هذه الفاتورة بالفعل.',
                'invoice-missing'            => 'هوية الفاتورة هذه غير موجودة.',
                'transaction-amount-exceeds' => 'المبلغ المحدد لهذه المعاملة يتجاوز الإجمالي المبلغ في الفاتورة.',
                'transaction-saved'          => 'تم حفظ المعاملة بنجاح.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'تمت إضافة المنتج بنجاح.',
                'delete-success' => 'تم حذف المنتج بنجاح.',
                'update-success' => 'تم تحديث المنتج بنجاح.',

                'inventories' => [
                    'update-success' => 'تم تحديث المخزون بنجاح.',
                ],

                'mass-operations' => [
                    'delete-success'  => 'تم حذف المنتجات المحددة بنجاح.',
                    'update-success'  => 'تم تحديث المنتجات المحددة بنجاح.',
                ],

                'error' => [
                    'configurable-error' => 'يرجى تحديد ميزة قابلة للتكوين واحدة على الأقل.',
                ],
            ],

            'categories' => [
                'create-success' => 'تمت إضافة الفئة بنجاح.',
                'delete-success' => 'تم حذف الفئة بنجاح.',
                'root-category-delete' => 'The Root category can not be deleted.',
                'update-success' => 'تم تحديث الفئة بنجاح.',
                'not-exist'      => 'لم يتم العثور على الفئة.',

                'mass-operations' => [
                    'delete-success'  => 'تم حذف الفئات المحددة بنجاح.',
                    'update-success'  => 'تم تحديث الفئات المحددة بنجاح.',
                ],
            ],

            'attributes' => [
                'create-success' => 'تمت إضافة السمة بنجاح.',
                'delete-success' => 'تم حذف السمة بنجاح.',
                'update-success' => 'تم تحديث السمة بنجاح.',

                'error' => [
                    'cannot-change-type'       => 'لا يمكن تغيير حقل النوع.',
                    'system-attributes-delete' => 'لا يمكن حذف السمات النظامية.',

                    'mass-operations' => [
                        'resource-not-found' => 'لم يتم العثور على السمات المحددة.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'تمت إضافة العائلة بنجاح.',
                'delete-success' => 'تم حذف العائلة بنجاح.',
                'update-success' => 'تم تحديث العائلة بنجاح.',

                'error' => [
                    'being-used'       => 'تُستخدم هذه العائلة الموردة في :source.',
                    'can-not-updated'  => 'لا يمكن تحديث الكود',
                    'last-item-delete' => 'يجب أن تحتوي على عائلة واحدة على الأقل.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'تمت إضافة العميل بنجاح.',
                'delete-success' => 'تم حذف العميل بنجاح.',
                'update-success' => 'تم تحديث العميل بنجاح.',

                'mass-operations' => [
                    'delete-success' => 'تم حذف العملاء المحددين بنجاح.',
                    'update-success' => 'تم تحديث العملاء المحددين بنجاح.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'لا يمكن حذف حساب العميل لأن بعض الطلبات قيد الانتظار أو في حالة المعالجة.',
                ],

                'notes' => [
                    'note-taken' => 'تم اتخاذ الملاحظة.',
                ],
            ],

            'addresses' => [
                'create-success' => 'تمت إضافة العنوان بنجاح.',
                'delete-success' => 'تم حذف العنوان بنجاح.',
                'update-success' => 'تم تحديث العنوان بنجاح.',

                'mass-operations' => [
                    'delete-success' => 'تم حذف العناوين المحددة بنجاح.',
                ],
            ],

            'groups' => [
                'create-success' => 'تمت إضافة مجموعة العملاء بنجاح.',
                'delete-success' => 'تم حذف مجموعة العملاء بنجاح.',
                'update-success' => 'تم تحديث مجموعة العملاء بنجاح.',

                'error' => [
                    'being-used'           => 'هذه المجموعات الموردة يتم استخدامها في العملاء.',
                    'default-group-delete' => 'لا يمكن حذف المجموعة الافتراضية.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'تم حذف التقييم بنجاح.',
                'update-success' => 'تم تحديث التقييم بنجاح.',

                'mass-operations' => [
                    'delete-success' => 'تم حذف التقييمات المحددة بنجاح.',
                    'update-success' => 'تم تحديث التقييمات المحددة بنجاح.',
                ],
            ],

            'news-letter' => [
                'create-success'  => 'لقد اشتركت بنجاح في نشرتنا الإخبارية.',
                'warning-message' => 'لقد اشتركت بالفعل في نشرتنا الإخبارية.',
            ],
        ],

        'cms' => [
            'create-success' => 'تمت إضافة CMS بنجاح.',
            'delete-success' => 'تم حذف CMS بنجاح.',
            'update-success' => 'تم تحديث CMS بنجاح.',

            'mass-operations' => [
                'delete-success' => 'تم حذف الصفحات المحددة بنجاح.',
            ],

            'error' => [
                'already-taken' => 'تم استخدام الصفحات بالفعل.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'تمت إضافة الحملة بنجاح.',
                    'delete-success' => 'تم حذف الحملة بنجاح.',
                    'update-success' => 'تم تحديث الحملة بنجاح.',
                ],

                'events' => [
                    'create-success' => 'تمت إضافة الحدث بنجاح.',
                    'delete-success' => 'تم حذف الحدث بنجاح.',
                    'update-success' => 'تم تحديث الحدث بنجاح.',
                ],

                'templates' => [
                    'create-success' => 'تمت إضافة قالب البريد الإلكتروني بنجاح.',
                    'delete-success' => 'تم حذف قالب البريد الإلكتروني بنجاح.',
                    'update-success' => 'تم تحديث قالب البريد الإلكتروني بنجاح.',
                ],

                'subscribers' => [
                    'delete-success' => 'تم حذف اشتراك النشرة الإخبارية بنجاح',
                    'update-failed'  => 'فشل تحديث اشتراك النشرة الإخبارية',
                    'update-success' => 'تم تحديث اشتراك النشرة الإخبارية بنجاح',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'تمت إضافة قاعدة السلة بنجاح.',
                    'delete-success' => 'تم حذف قاعدة السلة بنجاح.',
                    'update-success' => 'تم تحديث قاعدة السلة بنجاح.',
                ],

                'catalog-rules' => [
                    'create-success' => 'تمت إضافة قاعدة الفهرس بنجاح.',
                    'delete-success' => 'تم حذف قاعدة الفهرس بنجاح.',
                    'update-success' => 'تم تحديث قاعدة الفهرس بنجاح.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'تمت إضافة كوبون قاعدة السلة بنجاح.',
                    'delete-success' => 'تم حذف كوبون قاعدة السلة بنجاح.',
                    'update-success' => 'تم تحديث كوبون قاعدة السلة بنجاح.',

                    'mass-operations' => [
                        'delete-success' => 'تم حذف كوبونات قاعدة سلة التسوق بنجاح'
                    ]
                ],
            ],

            'search-seo' => [
                'url-rewrites' => [
                    'create-success'  => 'تم إضافة إعادة الكتابة لعنوان URL بنجاح.',
                    'delete-success'  => 'تم حذف إعادة الكتابة لعنوان URL بنجاح.',
                    'update-success'  => 'تم تحديث إعادة الكتابة لعنوان URL بنجاح.',

                    'mass-operations' => [
                        'delete-success' => 'تم حذف إعادة الكتابة لعنوان URL بنجاح.',
                    ],
                ],

                'search-terms' => [
                    'create-success'  => 'تمت إضافة مصطلحات البحث بنجاح.',
                    'delete-success'  => 'تم حذف مصطلحات البحث بنجاح.',
                    'update-success'  => 'تم تحديث مصطلحات البحث بنجاح.',

                    'mass-operations' => [
                        'delete-success' => 'تم حذف مصطلحات البحث بنجاح.',
                    ],
                ],

                'search-synonyms' => [
                    'create-success'  => 'تمت إضافة مرادفات البحث بنجاح.',
                    'delete-success'  => 'تم حذف مرادفات البحث بنجاح.',
                    'update-success'  => 'تم تحديث مرادفات البحث بنجاح.',

                    'mass-operations' => [
                        'delete-success' => 'تم حذف مرادفات البحث بنجاح.',
                    ],
                ],

                'sitemaps' => [
                    'create-success' => 'تم إنشاء خرائط المواقع بنجاح.',
                    'delete-success' => 'تم حذف خرائط المواقع بنجاح.',
                    'update-success' => 'تم تحديث خرائط المواقع بنجاح.',
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'تمت إضافة اللغة بنجاح.',
                'delete-success' => 'تم حذف اللغة بنجاح.',
                'update-success' => 'تم تحديث اللغة بنجاح.',

                'error' => [
                    'last-item-delete' => 'يتطلب وجود لغة واحدة على الأقل.',
                ],
            ],

            'currencies' => [
                'create-success' => 'تمت إضافة العملة بنجاح.',
                'delete-success' => 'تم حذف العملة بنجاح.',
                'update-success' => 'تم تحديث العملة بنجاح.',

                'error' => [
                    'last-item-delete' => 'يتطلب وجود عملة واحدة على الأقل.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'تمت إضافة سعر الصرف بنجاح.',
                'delete-success' => 'تم حذف سعر الصرف بنجاح.',
                'update-success' => 'تم تحديث سعر الصرف بنجاح.',
            ],

            'inventory-sources' => [
                'create-success'   => 'تمت إضافة مصدر المخزون بنجاح.',
                'delete-success'   => 'تم حذف مصدر المخزون بنجاح.',
                'update-success'   => 'تم تحديث مصدر المخزون بنجاح.',

                'error' => [
                    'last-item-delete' => 'يتطلب وجود مصدر مخزون واحد على الأقل.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'تمت إضافة معدل الضريبة بنجاح.',
                    'delete-success' => 'تم حذف معدل الضريبة بنجاح.',
                    'update-success' => 'تم تحديث معدل الضريبة بنجاح.',
                ],

                'tax-categories' => [
                    'create-success' => 'تمت إضافة فئة الضريبة بنجاح.',
                    'delete-success' => 'تم حذف فئة الضريبة بنجاح.',
                    'error'          => 'لا يوجد واحد أو أكثر من معدلات الضرائب.',
                    'update-success' => 'تم تحديث فئة الضريبة بنجاح.',
                ],
            ],

            'channels' => [
                'create-success' => 'تمت إضافة القناة بنجاح.',
                'delete-success' => 'تم حذف القناة بنجاح.',
                'update-success' => 'تم تحديث القناة بنجاح.',

                'error' => [
                    'last-item-delete' => 'يتطلب وجود قناة واحدة على الأقل.',
                ],
            ],

            'users' => [
                'create-success' => 'تمت إضافة المستخدم بنجاح.',
                'delete-success' => 'تم حذف المستخدم بنجاح.',
                'update-success' => 'تم تحديث المستخدم بنجاح.',

                'error' => [
                    'cannot-change-column' => 'لا يمكن تغيير المستخدمين.',
                    'last-item-delete'     => 'يتطلب وجود مستخدم واحد على الأقل.',
                ],
            ],

            'roles' => [
                'create-success' => 'تمت إضافة الدور بنجاح.',
                'delete-success' => 'تم حذف الدور بنجاح.',
                'update-success' => 'تم تحديث الدور بنجاح.',

                'error' => [
                    'being-used'       => 'يتم استخدام هذه المجموعات الموردة في مستخدم المسؤول.',
                    'last-item-delete' => 'يتطلب وجود دور واحد على الأقل.',
                ],
            ],

            'themes' => [
                'create-success' => 'تم إنشاء السمة بنجاح',
                'delete-success' => 'تم حذف السمة بنجاح',
                'update-success' => 'تم تحديث السمة بنجاح',
            ],
        ],

        'configuration' => [
            'create-success' => 'تمت إضافة التكوين بنجاح.',
            'delete-success' => 'تم حذف التكوين بنجاح.',
            'update-success' => 'تم تحديث التكوين بنجاح.',
        ],

        'account' => [
            'create-success'     => 'تمت إضافة الحساب بنجاح.',
            'delete-success'     => 'تم حذف الحساب بنجاح.',
            'logged-in-success'  => 'تم تسجيل الدخول بنجاح.',
            'logged-out-success' => 'تم تسجيل الخروج بنجاح.',
            'update-success'     => 'تم تحديث الحساب بنجاح.',

            'error' => [
                'credential-error'  => 'البيانات المقدمة غير صحيحة.',
                'invalid'           => 'بريد إلكتروني أو كلمة مرور غير صالحة',
                'password-mismatch' => 'كلمة المرور الحالية غير مطابقة.',
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'عذرًا! الصفحة التي تبحث عنها في إجازة. يبدو أننا لم نتمكن من العثور على ما كنت تبحث عنه.',
                'title'   => '404 الصفحة غير موجودة',
            ],

            '401' => [
                'message' => 'عذرًا! يبدو أنك لا تمتلك الصلاحيات الكافية للوصول إلى هذه الصفحة. يبدو أنك تفتقد الاعتمادات الضرورية.',
                'title'   => '401 غير مصرح به',
            ],

            '403' => [
                'message' => 'عذرًا! هذه الصفحة محظورة. يبدو أنك ليس لديك الأذونات اللازمة لعرض هذا المحتوى.',
                'title'   => '403 ممنوع',
            ],

            '500' => [
                'message' => 'عذرًا! حدث خطأ ما. يبدو أننا نواجه مشكلة في تحميل الصفحة التي تبحث عنها.',
                'title'   => '500 خطأ داخلي في الخادم',
            ],

            '503' => [
                'message' => 'عذرًا! يبدو أننا متوقفون مؤقتًا للصيانة. يرجى التحقق مرة أخرى في وقت لاحق.',
                'title'   => '503 الخدمة غير متوفرة',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'تم إنشاء عنوانك بنجاح.',
                'delete-success' => 'تم حذف عنوانك بنجاح.',
                'update-success' => 'تم تحديث عنوانك بنجاح.',
            ],

            'accounts' => [
                'create-success'     => 'تم إنشاء حسابك بنجاح.',
                'delete-success'     => 'تم حذف حسابك بنجاح.',
                'logged-in-success'  => 'تم تسجيل الدخول بنجاح.',
                'logged-out-success' => 'تم تسجيل الخروج بنجاح.',
                'update-success'     => 'تم تحديث حسابك بنجاح.',

                'error' => [
                    'credential-error'  => 'تم تقديم بيانات الاعتماد غير الصحيحة.',
                    'invalid'           => 'بريد إلكتروني أو كلمة مرور غير صالحة',
                    'password-mismatch' => 'كلمة المرور الحالية لا تتطابق.',
                    'update-failed'     => 'حدث خطأ أثناء تحديث حسابك',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'تم حفظ العنوان بنجاح.',
            'check-billing-address'   => 'يرجى التحقق من عنوان الفواتير.',
            'check-shipping-address'  => 'يرجى التحقق من عنوان الشحن.',
            'minimum-order-message'   => 'الحد الأدنى لمبلغ الطلب هو :amount.',
            'order-saved'             => 'تم حفظ الطلب بنجاح',
            'payment-method-saved'    => 'تم حفظ طريقة الدفع بنجاح.',
            'shipping-method-saved'   => 'تم حفظ طريقة الشحن بنجاح.',
            'specify-payment-method'  => 'يرجى تحديد طريقة الدفع.',
            'specify-shipping-method' => 'يرجى تحديد طريقة الشحن.',

            'cart' => [
                'item' => [
                    'empty'           => 'سلة التسوق الخاصة بك فارغة.',
                    'error'           => 'لم يتم العثور على عنصر في السلة.',
                    'inactive-add'    => 'لا يمكن إضافة العنصر غير النشط إلى سلة التسوق.',
                    'invalid-product' => 'معرف المنتج غير صالح.',
                    'success'         => 'تمت إضافة العنصر بنجاح إلى العربة.',
                    'success-remove'  => 'تمت إزالة العنصر بنجاح من العربة.',
                ],

                'quantity' => [
                    'illegal' => 'لا يمكن أن يكون الكمية أقل من واحد.',
                    'success' => 'تم تحديث عناصر العربة بنجاح.',
                ],

                'coupon' => [
                    'apply-issue'    => 'لا يمكن تطبيق رمز القسيمة.',
                    'invalid'        => 'رمز القسيمة غير صالح.',
                    'success-remove' => 'تمت إزالة القسيمة بنجاح.',
                    'success'        => 'تم تطبيق رمز القسيمة بنجاح.',
                ],

                'move-wishlist' => [
                    'success' => 'تم نقل العنصر إلى قائمة الرغبات بنجاح.',
                ],
            ],
        ],

        'wishlist' => [
            'moved'          => 'تم نقل العنصر بنجاح إلى العربة.',
            'option-missing' => 'الخيارات غير متوفرة، لذا لا يمكن نقل العنصر إلى قائمة الرغبات.',
            'removed'        => 'تمت إزالة العنصر بنجاح من قائمة الرغبات',
            'success'        => 'تمت إضافة العنصر بنجاح إلى قائمة الرغبات',

            'error' => [
                'security-warning' => 'تم العثور على نشاط مشبوه!',

                'mass-operations' => [
                    'resource-not-found' => 'لم يتم العثور على المنتج المحدد في قائمة الرغبات.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'تم إلغاء الطلب بنجاح.',

                'error' => [
                    'cancel-error' => 'لا يمكن إلغاء الطلب.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'يرجى تحديد ميزة قابلة للتكوين واحدة على الأقل.',

                'reviews' => [
                    'create-success' => 'تم إرسال مراجعتك بنجاح.',
                ],
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'عذرًا! الصفحة التي تبحث عنها في إجازة. يبدو أننا لم نتمكن من العثور على ما كنت تبحث عنه.',
                'title'   => '404 الصفحة غير موجودة',
            ],

            '401' => [
                'message' => 'عذرًا! يبدو أنك لا تمتلك الصلاحيات الكافية للوصول إلى هذه الصفحة. يبدو أنك تفتقد الاعتمادات الضرورية.',
                'title'   => '401 غير مصرح به',
            ],

            '403' => [
                'message' => 'عذرًا! هذه الصفحة محظورة. يبدو أنك ليس لديك الأذونات اللازمة لعرض هذا المحتوى.',
                'title'   => '403 ممنوع',
            ],

            '500' => [
                'message' => 'عذرًا! حدث خطأ ما. يبدو أننا نواجه مشكلة في تحميل الصفحة التي تبحث عنها.',
                'title'   => '500 خطأ داخلي في الخادم',
            ],

            '503' => [
                'message' => 'عذرًا! يبدو أننا متوقفون مؤقتًا للصيانة. يرجى التحقق مرة أخرى في وقت لاحق.',
                'title'   => '503 الخدمة غير متوفرة',
            ],
        ],
    ],
];
