<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'ההזמנה בוטלה בהצלחה.',

                'error' => [
                    'cancel-error' => 'לא ניתן לבטל הזמנה.',
                ],
            ],

            're-order' => [
                'address-create-success'  => 'כתובת נשמרה בהצלחה',
                'address-not-available'   => 'אין שיטות שילוח זמינות.',
                'create'                  => 'פריט נוסף בהצלחה לעגלת הקניות',
                'error'                   => 'אירעה שגיאה!',
                'order-create-success'    => 'ההזמנה בוצעה בהצלחה.',
                'payment-create-success'  => 'שיטת תשלום נשמרה בהצלחה',
                'shipping-create-success' => 'שיטת משלוח נשמרה בהצלחה',
            ],

            'invoices' => [
                'create-success' => 'החשבונית נוספה בהצלחה.',

                'error' => [
                    'creation-error'    => 'לא ניתן ליצור חשבונית להזמנה זו.',
                    'invalid-qty-error' => 'מצאנו כמות לא תקינה לפריטים בחשבונית.',
                    'product-error'     => 'לא ניתן ליצור חשבונית ללא מוצרים.',
                ],
            ],

            'shipments' => [
                'create-success' => 'המשלוח נוסף בהצלחה.',

                'error' => [
                    'creation-error'    => 'לא ניתן ליצור משלוח עבור הזמנה זו.',
                    'invalid-qty-error' => 'מצאנו כמות לא תקינה לפריטי המשלוח.',
                ],
            ],

            'refunds' => [
                'create-success' => 'ההחזר נוסף בהצלחה.',

                'error' => [
                    'creation-error'       => 'לא ניתן ליצור החזר עבור הזמנה זו.',
                    'invalid-amount-error' => 'סכום ההחזר צריך להיות שונה מאפס.',
                    'invalid-qty-error'    => 'מצאנו כמות לא תקינה לפריטי ההחזר.',
                    'limit-error'          => 'הסכום המרבי להחזר הוא :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'החשבונית הזו כבר שולמה.',
                'invoice-missing'            => 'מזהה החשבונית הזה אינו קיים.',
                'transaction-amount-exceeds' => 'הסכום המצויין של עסקה זו חורג מסך החשבונית הכולל.',
                'transaction-saved'          => 'העסקה נשמרה בהצלחה.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'המוצר נוסף בהצלחה.',
                'delete-success' => 'המוצר נמחק בהצלחה',
                'update-success' => 'המוצר עודכן בהצלחה.',

                'inventories' => [
                    'update-success' => 'המלאי עודכן בהצלחה.',
                ],

                'mass-operations' => [
                    'delete-success'  => 'המוצרים שנבחרו נמחקו בהצלחה.',
                    'update-success'  => 'המוצרים שנבחרו עודכנו בהצלחה.',
                ],

                'error' => [
                    'configurable-error' => 'יש לבחור לפחות מאפיין אחד להגדרת המוצר.',
                ],
            ],

            'categories' => [
                'create-success'       => 'הקטגוריה נוספה בהצלחה.',
                'delete-success'       => 'הקטגוריה נמחקה בהצלחה',
                'root-category-delete' => 'קטגוריית השורש לא ניתנת למחיקה.',
                'update-success'       => 'הקטגוריה עודכנה בהצלחה.',
                'not-exist'            => 'הקטגוריה לא נמצאה.',

                'mass-operations' => [
                    'delete-success'  => 'הקטגוריות שנבחרו נמחקו בהצלחה.',
                    'update-success'  => 'הקטגוריות שנבחרו עודכנו בהצלחה.',
                ],
            ],

            'attributes' => [
                'create-success' => 'המאפיין נוסף בהצלחה.',
                'delete-success' => 'המאפיין נמחק בהצלחה',
                'update-success' => 'המאפיין עודכן בהצלחה.',

                'error' => [
                    'cannot-change-type'       => 'לא ניתן לשנות את סוג השדה',
                    'system-attributes-delete' => 'לא ניתן למחוק את המאפיינים המערכתיים.',

                    'mass-operations' => [
                        'resource-not-found' => 'המאפיינים שנבחרו לא נמצאו.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'המשפחה נוספה בהצלחה.',
                'delete-success' => 'המשפחה נמחקה בהצלחה',
                'update-success' => 'המשפחה עודכנה בהצלחה.',

                'error' => [
                    'being-used'       => 'משאב זה משפחות בשימוש ב־:source.',
                    'can-not-updated'  => 'לא ניתן לעדכן את הקוד',
                    'last-item-delete' => 'נדרשת לפחות משפחה אחת.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'הלקוח נוסף בהצלחה.',
                'delete-success' => 'הלקוח נמחק בהצלחה',
                'update-success' => 'הלקוח עודכן בהצלחה.',

                'mass-operations' => [
                    'delete-success' => 'הלקוחות שנבחרו נמחקו בהצלחה.',
                    'update-success' => 'הלקוחות שנבחרו עודכנו בהצלחה.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'לא ניתן למחוק את חשבון הלקוחות מכיוון שיש הזמנות ממתינות או בתהליך.',
                ],

                'notes' => [
                    'note-taken' => 'הערה נקלטה.',
                ],
            ],

            'addresses' => [
                'create-success' => 'הכתובת נוספה בהצלחה.',
                'delete-success' => 'הכתובת נמחקה בהצלחה',
                'update-success' => 'הכתובת עודכנה בהצלחה.',

                'mass-operations' => [
                    'delete-success' => 'הכתובות שנבחרו נמחקו בהצלחה.',
                ],
            ],

            'groups' => [
                'create-success' => 'קבוצת הלקוחות נוספה בהצלחה.',
                'delete-success' => 'קבוצת הלקוחות נמחקה בהצלחה',
                'update-success' => 'קבוצת הלקוחות עודכנה בהצלחה.',

                'error' => [
                    'being-used'           => 'המשאב קבוצות בשימוש בלקוחות.',
                    'default-group-delete' => 'לא ניתן למחוק את קבוצת ברירת המחדל.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'הביקורת נמחקה בהצלחה',
                'update-success' => 'הביקורת עודכנה בהצלחה.',

                'mass-operations' => [
                    'delete-success' => 'הביקורות שנבחרו נמחקו בהצלחה.',
                    'update-success' => 'הביקורות שנבחרו עודכנו בהצלחה.',
                ],
            ],

            'news-letter' => [
                'create-success'  => 'נרשמת בהצלחה לניוזלטר שלנו.',
                'warning-message' => 'כבר נרשמת לניוזלטר שלנו.',
            ],
        ],

        'cms' => [
            'create-success' => 'התוכן נוסף בהצלחה.',
            'delete-success' => 'התוכן נמחק בהצלחה',
            'update-success' => 'התוכן עודכן בהצלחה.',

            'mass-operations' => [
                'delete-success' => 'הדפים שנבחרו נמחקו בהצלחה.',
            ],

            'error' => [
                'already-taken' => 'הדפים נתפסו כבר.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'הקמפיין נוסף בהצלחה.',
                    'delete-success' => 'הקמפיין נמחק בהצלחה',
                    'update-success' => 'הקמפיין עודכן בהצלחה.',
                ],

                'events' => [
                    'create-success' => 'האירוע נוסף בהצלחה.',
                    'delete-success' => 'האירוע נמחק בהצלחה',
                    'update-success' => 'האירוע עודכן בהצלחה.',
                ],

                'templates' => [
                    'create-success' => 'תבנית האימייל נוספה בהצלחה.',
                    'delete-success' => 'תבנית האימייל נמחקה בהצלחה',
                    'update-success' => 'תבנית האימייל עודכנה בהצלחה.',
                ],

                'subscribers' => [
                    'delete-success' => 'הרשמה לניוזלטר נמחקה בהצלחה',
                    'update-failed'  => 'עדכון הרשמה לניוזלטר נכשל',
                    'update-success' => 'הרשמה לניוזלטר עודכנה בהצלחה',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'החוק של העגלה נוסף בהצלחה.',
                    'delete-success' => 'החוק של העגלה נמחק בהצלחה',
                    'update-success' => 'החוק של העגלה עודכן בהצלחה.',
                ],

                'catalog-rules' => [
                    'create-success' => 'חוק הקטלוג נוסף בהצלחה.',
                    'delete-success' => 'חוק הקטלוג נמחק בהצלחה',
                    'update-success' => 'חוק הקטלוג עודכן בהצלחה.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'קופון חוק העגלה נוסף בהצלחה.',
                    'delete-success' => 'קופון חוק העגלה נמחק בהצלחה',
                    'update-success' => 'קופון חוק העגלה עודכן בהצלחה.',

                    'mass-operations' => [
                        'delete-success' => 'קופונים של כלל העגלה נמחקו בהצלחה'
                    ]
                ],
            ],

            'search-seo' => [
                'url-rewrites' => [
                    'create-success'  => 'הכתיבה מחדש של ה-URL נוספה בהצלחה.',
                    'delete-success'  => 'הכתיבה מחדש של ה-URL נמחקה בהצלחה.',
                    'update-success'  => 'הכתיבה מחדש של ה-URL עודכנה בהצלחה.',

                    'mass-operations' => [
                        'delete-success' => 'הכתיבה מחדש של ה-URL נמחקה בהצלחה.',
                    ],
                ],

                'search-terms' => [
                    'create-success'  => 'מונחי החיפוש נוספו בהצלחה.',
                    'delete-success'  => 'מונחי החיפוש נמחקו בהצלחה.',
                    'update-success'  => 'מונחי החיפוש עודכנו בהצלחה.',

                    'mass-operations' => [
                        'delete-success' => 'מונחי החיפוש נמחקו בהצלחה.',
                    ],
                ],

                'search-synonyms' => [
                    'create-success'  => 'הדמיונים לחיפוש נוספו בהצלחה.',
                    'delete-success'  => 'הדמיונים לחיפוש נמחקו בהצלחה.',
                    'update-success'  => 'הדמיונים לחיפוש עודכנו בהצלחה.',

                    'mass-operations' => [
                        'delete-success' => 'הדמיונים לחיפוש נמחקו בהצלחה.',
                    ],
                ],

                'sitemaps' => [
                    'create-success' => 'מפת האתר נוצרה בהצלחה.',
                    'delete-success' => 'מפת האתר נמחקה בהצלחה.',
                    'update-success' => 'מפת האתר עודכנה בהצלחה.',
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'המיקום נוסף בהצלחה.',
                'delete-success' => 'המיקום נמחק בהצלחה',
                'update-success' => 'המיקום עודכן בהצלחה.',

                'error' => [
                    'last-item-delete' => 'נדרש לפחות מיקום אחד.',
                ],
            ],

            'currencies' => [
                'create-success' => 'המטבע נוסף בהצלחה.',
                'delete-success' => 'המטבע נמחק בהצלחה',
                'update-success' => 'המטבע עודכן בהצלחה.',

                'error' => [
                    'last-item-delete' => 'נדרש לפחות מטבע אחד.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'שער החליפין נוסף בהצלחה.',
                'delete-success' => 'שער החליפין נמחק בהצלחה',
                'update-success' => 'שער החליפין עודכן בהצלחה.',
            ],

            'inventory-sources' => [
                'create-success'   => 'מקור המלאי נוסף בהצלחה.',
                'delete-success'   => 'מקור המלאי נמחק בהצלחה',
                'update-success'   => 'מקור המלאי עודכן בהצלחה.',

                'error' => [
                    'last-item-delete' => 'נדרש לפחות מקור אחד.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'שער המס נוסף בהצלחה.',
                    'delete-success' => 'שער המס נמחק בהצלחה',
                    'update-success' => 'שער המס עודכן בהצלחה.',
                ],

                'tax-categories' => [
                    'create-success' => 'קטגוריית המס נוספה בהצלחה.',
                    'delete-success' => 'קטגוריית המס נמחקה בהצלחה',
                    'error'          => 'שיעור מס אחד או יותר אינם קיימים',
                    'update-success' => 'קטגוריית המס עודכנה בהצלחה.',
                ],
            ],

            'channels' => [
                'create-success' => 'הערוץ נוסף בהצלחה.',
                'delete-success' => 'הערוץ נמחק בהצלחה',
                'update-success' => 'הערוץ עודכן בהצלחה.',

                'error' => [
                    'last-item-delete' => 'נדרש לפחות ערוץ אחד.',
                ],
            ],

            'users' => [
                'create-success' => 'המשתמש נוסף בהצלחה.',
                'delete-success' => 'המשתמש נמחק בהצלחה',
                'update-success' => 'המשתמש עודכן בהצלחה.',

                'error' => [
                    'cannot-change-column' => 'לא ניתן לשנות את המשתמשים.',
                    'last-item-delete'     => 'נדרש לפחות משתמש אחד.',
                ],
            ],

            'roles' => [
                'create-success' => 'התפקיד נוסף בהצלחה.',
                'delete-success' => 'התפקיד נמחק בהצלחה',
                'update-success' => 'התפקיד עודכן בהצלחה.',

                'error' => [
                    'being-used'       => 'המשאב תפקידים בשימוש במשתמש המנהל.',
                    'last-item-delete' => 'נדרש לפחות תפקיד אחד.',
                ],
            ],

            'themes' => [
                'create-success' => 'נושא נוצר בהצלחה',
                'delete-success' => 'נושא נמחק בהצלחה',
                'update-success' => 'נושא עודכן בהצלחה',
            ],
        ],

        'configuration' => [
            'create-success' => 'התצורה נוספה בהצלחה.',
            'delete-success' => 'התצורה נמחקה בהצלחה',
            'update-success' => 'התצורה עודכנה בהצלחה.',
        ],

        'account' => [
            'create-success'     => 'החשבון נוסף בהצלחה.',
            'delete-success'     => 'החשבון נמחק בהצלחה',
            'logged-in-success'  => 'נכנסת למערכת בהצלחה.',
            'logged-out-success' => 'יצאת מהמערכת בהצלחה.',
            'update-success'     => 'החשבון עודכן בהצלחה.',

            'error' => [
                'credential-error'  => 'פרטי ההתחברות שסופקו אינם נכונים.',
                'invalid'           => 'אימייל או סיסמה לא תקינים',
                'password-mismatch' => 'הסיסמה הנוכחית אינה תואמת.',
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'אופס! הדף שאתה מחפש בחופשה. נראה שלא הצלחנו למצוא את מה שחיפשת.',
                'title'   => 'דף לא נמצא 404',
            ],
    
            '401' => [
                'message' => 'אופס! נראה שאין לך הרשאה לגשת לדף זה. נראה שיש לך חוסר באישורים הנדרשים.',
                'title'   => 'אין אישור 401',
            ],
    
            '403' => [
                'message' => 'אופס! דף זה אסור. נראה שאין לך הרשאות הדרושות להצגת התוכן הזה.',
                'title'   => 'הוגן 403',
            ],
    
            '500' => [
                'message' => 'אופס! משהו השתבש. נראה שיש לנו בעיות בטעינת הדף שאתה מחפש.',
                'title'   => 'שגיאת שרת פנימית 500',
            ],
    
            '503' => [
                'message' => 'אופס! נראה שאנחנו מועדפים למטה לתחזוקה זמנית. אנא נסה שוב מאוחר יותר.',
                'title'   => 'שירות לא זמין 503',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'הכתובת שלך נוצרה בהצלחה.',
                'delete-success' => 'הכתובת שלך נמחקה בהצלחה.',
                'update-success' => 'הכתובת שלך עודכנה בהצלחה.',
            ],

            'accounts' => [
                'create-success'     => 'החשבון שלך נוצר בהצלחה.',
                'delete-success'     => 'החשבון שלך נמחק בהצלחה.',
                'logged-in-success'  => 'נכנסת למערכת בהצלחה.',
                'logged-out-success' => 'יצאת מהמערכת בהצלחה.',
                'update-success'     => 'החשבון שלך עודכן בהצלחה.',

                'error' => [
                    'credential-error'  => 'הפרטים שסופקו אינם נכונים.',
                    'invalid'           => 'אימייל או סיסמה לא תקינים',
                    'password-mismatch' => 'הסיסמה הנוכחית אינה תואמת.',
                    'update-failed'     => 'אירעה שגיאה בעת עדכון החשבון שלך',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'הכתובת נשמרה בהצלחה.',
            'check-billing-address'   => 'אנא בדוק כתובת לחיוב.',
            'check-shipping-address'  => 'אנא בדוק כתובת למשלוח.',
            'minimum-order-message'   => 'הסכום המינימלי להזמנה הוא :amount.',
            'order-saved'             => 'ההזמנה נשמרה בהצלחה',
            'payment-method-saved'    => 'שיטת התשלום נשמרה בהצלחה.',
            'shipping-method-saved'   => 'שיטת המשלוח נשמרה בהצלחה.',
            'specify-payment-method'  => 'אנא ציין שיטת תשלום.',
            'specify-shipping-method' => 'אנא ציין שיטת משלוח.',

            'cart' => [
                'item' => [
                    'empty'           => ' העגלת קניות שלך ריקה.',
                    'error'           => 'פריט בעגלת הקניות לא נמצא.',
                    'inactive-add'    => 'לא ניתן להוסיף פריט לא פעיל לעגלה.',
                    'invalid-product' => 'מזהה המוצר אינו בתוקף.',
                    'success'         => 'הפריט נוסף לעגלה בהצלחה.',
                    'success-remove'  => 'הפריט הוסר מהעגלה בהצלחה.',
                ],

                'quantity' => [
                    'illegal' => 'הכמות לא יכולה להיות פחותה מאחד.',
                    'success' => 'פריט(ים) בעגלה עודכנו בהצלחה.',
                ],

                'coupon' => [
                    'apply-issue'    => 'לא ניתן להחיל קוד קופון.',
                    'invalid'        => 'קוד קופון לא תקין.',
                    'success-remove' => 'הקופון הוסר בהצלחה.',
                    'success'        => 'קוד הקופון הוחל בהצלחה.',
                ],

                'move-wishlist' => [
                    'success' => 'הפריט הועבר לרשימת המשאלות בהצלחה.',
                ],
            ],
        ],

        'wishlist' => [
            'moved'          => 'הפריט הועבר בהצלחה לעגלה.',
            'option-missing' => 'אפשרויות המוצר חסרות, לכן לא ניתן להעביר את הפריט לרשימת המשאלות.',
            'removed'        => 'הפריט הוסר בהצלחה מרשימת המשאלות',
            'success'        => 'הפריט נוסף לרשימת המשאלות בהצלחה',

            'error' => [
                'security-warning' => 'נמצאה פעילות חשודה!',

                'mass-operations' => [
                    'resource-not-found' => 'המוצר ברשימת המשאלות שנבחר לא נמצא.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'ההזמנה בוטלה בהצלחה.',

                'error' => [
                    'cancel-error' => 'לא ניתן לבטל את ההזמנה.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'אנא בחר לפחות מאפיין אחד שניתן להגדרה.',

                'reviews' => [
                    'create-success' => 'הביקורת שלך נשלחה בהצלחה.',
                ],
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'אופס! הדף שאתה מחפש בחופשה. נראה שלא הצלחנו למצוא את מה שחיפשת.',
                'title'   => 'דף לא נמצא 404',
            ],
    
            '401' => [
                'message' => 'אופס! נראה שאין לך הרשאה לגשת לדף זה. נראה שיש לך חוסר באישורים הנדרשים.',
                'title'   => 'אין אישור 401',
            ],
    
            '403' => [
                'message' => 'אופס! דף זה אסור. נראה שאין לך הרשאות הדרושות להצגת התוכן הזה.',
                'title'   => 'הוגן 403',
            ],
    
            '500' => [
                'message' => 'אופס! משהו השתבש. נראה שיש לנו בעיות בטעינת הדף שאתה מחפש.',
                'title'   => 'שגיאת שרת פנימית 500',
            ],
    
            '503' => [
                'message' => 'אופס! נראה שאנחנו מועדפים למטה לתחזוקה זמנית. אנא נסה שוב מאוחר יותר.',
                'title'   => 'שירות לא זמין 503',
            ],
        ],
    ],
];
