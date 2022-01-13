<?php

return [
    'sales' => [
        'orders' => [
            'cancel-error' => 'لا يمكن إلغاء الطلب.',
        ],

        'invoices' => [
            'invalid-qty-error' => 'وجدنا كمية غير صالحة لعناصر الفاتورة.',
            'creation-error'    => 'إنشاء فاتورة الطلب غير مسموح به.',
            'product-error'     => 'لا يمكن إنشاء الفاتورة بدون المنتجات.',
        ],

        'shipments' => [
            'invalid-qty-error' => 'وجدنا كمية غير صالحة لعناصر الشحن.',
            'creation-error'    => 'لا يمكن إنشاء الشحنة لهذا الطلب.',
        ],

        'refunds' => [
            'creation-error'       => 'لا يمكن إنشاء رد أموال لهذا الطلب.',
            'invalid-amount-error' => 'يجب ألا يكون مبلغ الاسترداد صفرًا.',
            'invalid-qty-error'    => 'وجدنا كمية غير صالحة للعناصر المستردة.',
            'limit-error'          => 'أكبر مبلغ متاح للاسترداد :amount المبلغ.',
        ],

        'transactions' => [
            'already-paid'      => 'تم دفع هذه الفاتورة بالفعل.',
            'invoice-missing'   => 'معرف الفاتورة هذا غير موجود.',
            'transaction-saved' => 'تم حفظ الصفقة.',
        ],
    ],

    'catalog' => [
        'products' => [
            'configurable-error' => 'الرجاء تحديد سمة واحدة قابلة للتكوين على الأقل.',
        ],
    ],

    'customers' => [
        'note-cannot-taken' => 'ملاحظة لا يمكن أن تؤخذ.',
        'note-taken'        => 'أخذت الملاحظة.',
    ],

    'wishlist' => [
        'moved'          => 'تم نقل العنصر إلى عربة التسوق بنجاح.',
        'option-missing' => 'خيارات المنتج مفقودة ، لذلك لا يمكن نقل العنصر إلى قائمة الرغبات.',
    ],

    'checkout' => [
        'cart' => [
            'item' => [
                'error-add'      => 'لا يمكن إضافة العنصر إلى عربة التسوق ، يرجى المحاولة مرة أخرى في وقت لاحق.',
                'error-remove'   => 'لا توجد عناصر لإزالتها من عربة التسوق.',
                'inactive'       => 'العنصر غير نشط وتمت إزالته من سلة التسوق.',
                'inactive-add'   => 'لا يمكن إضافة عنصر غير نشط إلى سلة التسوق.',
                'success'        => 'تمت إضافة العنصر إلى سلة التسوق بنجاح.',
                'success-remove' => 'تمت إزالة العنصر بنجاح من سلة التسوق.',
            ],

            'quantity' => [
                'error'             => 'لا يمكن تحديث العنصر (العناصر) في الوقت الحالي ، يرجى المحاولة مرة أخرى لاحقًا.',
                'illegal'           => 'لا يمكن أن تكون الكمية أقل من واحد.',
                'inventory-warning' => 'الكمية المطلوبة غير متوفرة ، يرجى المحاولة مرة أخرى في وقت لاحق.',
                'quantity'          => 'كمية',
                'success'           => 'تم تحديث عنصر سلة التسوق بنجاح.',
            ],

            'coupon' => [
                'apply-issue'    => 'لا يمكن تطبيق رمز القسيمة.',
                'invalid'        => 'رمز القسيمة غير صالح.',
                'success'        => 'تم تطبيق رمز القسيمة بنجاح.',
                'success-remove' => 'تمت إزالة القسيمة بنجاح.',
            ],

            'move-wishlist' => [
                'error'   => 'لا يمكن نقل العنصر إلى قائمة الرغبات ، يرجى المحاولة مرة أخرى لاحقًا.',
                'success' => 'تم نقل العنصر إلى قائمة الرغبات بنجاح.',
            ],
        ],

        'minimum-order-message'   => 'الحد الأدنى لمبلغ الطلب هو :amount.',
        'check-shipping-address'  => 'يرجى التحقق من عنوان الشحن.',
        'check-billing-address'   => 'يرجى التحقق من عنوان الفواتير.',
        'specify-shipping-method' => 'الرجاء تحديد طريقة الشحن.',
        'specify-payment-method'  => 'الرجاء تحديد طريقة الدفع.',
    ],

    'common-response' => [
        'success' => [
            'add'    => ':name اضيف بنجاح.',
            'cancel' => ':name تم الإلغاء بنجاح.',
            'create' => ':name تم إنشاؤها بنجاح.',
            'delete' => ':name حذف بنجاح.',
            'update' => ':name تم التحديث بنجاح.',
            'upload' => ':name تم الرفع بنجاح.',

            'mass-operations' => [
                'delete'  => ':name تم حذف الاسم بنجاح.',
                'partial' => ':name لم يتم تنفيذ بعض الإجراءات بسبب قيود النظام المقيدة على.',
                'update'  => ':name تم تحديث الاسم بنجاح.',
            ],
        ],

        'error' => [
            'already-taken'                => ':name الاسم مأخوذ بالفعل.',
            'base-currency-delete'         => 'تم تعيين هذه العملة كعملة أساسية للقناة لذا لا يمكن حذفها.',
            'being-used'                   => 'هذا source: يتم استخدام الاسم :name المصدر.',
            'cannot-change-column'         => 'لا يمكن تغيير :name.',
            'default-group-delete'         => 'لا يمكن حذف المجموعة الافتراضية.',
            'delete-failed'                => 'حدث خطأ أثناء الحذف :name.',
            'last-item-delete'             => 'واحد على :name الاسم مطلوب.',
            'not-authorized'               => 'غير مخول',
            'order-pending-account-delete' => 'لا يمكن :name اسم الحساب لأن بعض الطلبات معلقة أو في حالة المعالجة.',
            'password-mismatch'            => 'كلمة المرور الحالية غير متطابقة.',
            'root-category-delete'         => 'لا يمكن حذف فئة الجذر.',
            'security-warning'             => 'تم العثور على نشاط مريب!',
            'something-went-wrong'         => 'هناك خطأ ما!',
            'system-attribute-delete'      => 'لا يمكن حذف سمة النظام.',

            'mass-operations' => [
                'resource-not-found' => ':name الاسم غير موجود.',
            ],
        ],
    ],
];
