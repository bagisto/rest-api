<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'অর্ডারটি সফলভাবে বাতিল হয়েছে।',

                'error' => [
                    'cancel-error' => 'অর্ডারটি বাতিল করা সম্ভব হচ্ছে না।',
                ],
            ],

            'invoices' => [
                'create-success' => 'চালান সফলভাবে যোগ করা হয়েছে।',

                'error' => [
                    'creation-error'    => 'অর্ডার চালান তৈরি করা অনুমোদিত নয়।',
                    'invalid-qty-error' => 'আমরা চালানের পণ্যের জন্য অবৈধ পরিমাণ পেয়েছি।',
                    'product-error'     => 'পণ্য ছাড়া চালান তৈরি করা সম্ভব হচ্ছে না।',
                ],
            ],

            'shipments' => [
                'create-success' => 'শিপমেন্ট সফলভাবে যোগ করা হয়েছে।',

                'error' => [
                    'creation-error'    => 'এই অর্ডারের জন্য শিপমেন্ট তৈরি করা যাবে না।',
                    'invalid-qty-error' => 'আমরা শিপমেন্টের পণ্যের জন্য অবৈধ পরিমাণ পেয়েছি।',
                ],
            ],

            'refunds' => [
                'create-success' => 'ফেরত সফলভাবে যোগ করা হয়েছে।',

                'error' => [
                    'creation-error'       => 'এই অর্ডারের জন্য ফেরত তৈরি করা যাবে না।',
                    'invalid-amount-error' => 'ফেরতের পরিমাণ অবশ্যই অশূন্য হতে হবে।',
                    'invalid-qty-error'    => 'আমরা ফেরতের পণ্যের জন্য অবৈধ পরিমাণ পেয়েছি।',
                    'limit-error'          => 'ফেরতের জন্য উপলব্ধ অর্থের সর্বাধিক পরিমাণ হলো: :amount।',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'এই চালানটি ইতিমধ্যে পরিশোধ করা হয়েছে।',
                'invoice-missing'            => 'এই চালান আইডি বিদ্যমান নেই।',
                'transaction-amount-exceeds' => 'এই লেনদেনের নির্দিষ্ট পরিমাণ চালানের মোট পরিমাণটি অতিক্রম করে।',
                'transaction-saved'          => 'লেনদেনটি সংরক্ষিত হয়েছে।',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'পণ্যটি সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'পণ্যটি সফলভাবে মোছা হয়েছে।',
                'update-success' => 'পণ্যটি সফলভাবে আপডেট হয়েছে।',

                'inventories' => [
                    'update-success' => 'মজুত সফলভাবে আপডেট হয়েছে।',
                ],

                'mass-operations' => [
                    'delete-success'  => 'নির্বাচিত পণ্যগুলি সফলভাবে মোছা হয়েছে।',
                    'update-success'  => 'নির্বাচিত পণ্যগুলি সফলভাবে আপডেট হয়েছে।',
                ],

                'error' => [
                    'configurable-error' => 'অনুগ্রহ করে অন্তত একটি কনফিগারেবল গুণধর্ম নির্বাচন করুন।',
                ],
            ],

            'categories' => [
                'create-success' => 'বিভাগটি সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'বিভাগটি সফলভাবে মোছা হয়েছে।',
                'update-success' => 'বিভাগটি সফলভাবে আপডেট হয়েছে।',

                'mass-operations' => [
                    'delete-success'  => 'নির্বাচিত বিভাগগুলি সফলভাবে মোছা হয়েছে।',
                    'update-success'  => 'নির্বাচিত বিভাগগুলি সফলভাবে আপডেট হয়েছে।',
                ],
            ],

            'attributes' => [
                'create-success' => 'গুণগুলি সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'গুণগুলি সফলভাবে মোছা হয়েছে।',
                'update-success' => 'গুণগুলি সফলভাবে আপডেট হয়েছে।',

                'error' => [
                    'system-attributes-delete' => 'সিস্টেম গুণগুলি মোছা যাবে না।',
                    'cannot-change-type'       => 'ধরন ক্ষেত্র পরিবর্তন করা সম্ভব হচ্ছে না।',

                    'mass-operations' => [
                        'resource-not-found' => 'নির্বাচিত গুণগুলি খুঁজে পাওয়া যায়নি।',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'পরিবারগুলি সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'পরিবারগুলি সফলভাবে মোছা হয়েছে।',
                'update-success' => 'পরিবারগুলি সফলভাবে আপডেট হয়েছে।',

                'error' => [
                    'last-item-delete' => 'অন্তত একটি পরিবার প্রয়োজন।',
                    'being-used'       => 'এই সম্পদ পরিবারগুলি গ্রাহকদের মধ্যে ব্যবহৃত হচ্ছে।',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'গ্রাহক সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'গ্রাহক সফলভাবে মোছা হয়েছে।',
                'update-success' => 'গ্রাহক সফলভাবে আপডেট হয়েছে।',

                'mass-operations' => [
                    'delete-success' => 'নির্বাচিত গ্রাহকগুলি সফলভাবে মোছা হয়েছে।',
                    'update-success' => 'নির্বাচিত গ্রাহকগুলি সফলভাবে আপডেট হয়েছে।',
                ],

                'error' => [
                    'order-pending-account-delete' => 'কিছু অর্ডার অপেক্ষাধীন বা প্রক্রিয়াজাত অবস্থায় আছে তাই গ্রাহকের অ্যাকাউন্ট মুছে ফেলা যাবে না।',
                ],

                'notes' => [
                    'note-taken' => 'নোট নেওয়া হয়েছে।',
                ],
            ],

            'addresses' => [
                'create-success' => 'ঠিকানা সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'ঠিকানা সফলভাবে মোছা হয়েছে।',
                'update-success' => 'ঠিকানা সফলভাবে আপডেট হয়েছে।',

                'mass-operations' => [
                    'delete-success' => 'নির্বাচিত ঠিকানাগুলি সফলভাবে মোছা হয়েছে।',
                ],
            ],

            'groups' => [
                'create-success' => 'গ্রাহক গ্রুপ সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'গ্রাহক গ্রুপ সফলভাবে মোছা হয়েছে।',
                'update-success' => 'গ্রাহক গ্রুপ সফলভাবে আপডেট হয়েছে।',

                'error' => [
                    'being-used'           => 'এই সম্পদ গ্রাহকগুলিতে ব্যবহৃত হচ্ছে।',
                    'default-group-delete' => 'ডিফল্ট গ্রুপ মোছা সম্ভব নয়।',
                ],
            ],

            'reviews' => [
                'delete-success' => 'পর্যালোচনা সফলভাবে মোছা হয়েছে।',
                'update-success' => 'পর্যালোচনা সফলভাবে আপডেট হয়েছে।',

                'mass-operations' => [
                    'delete-success' => 'নির্বাচিত পর্যালোচনাগুলি সফলভাবে মোছা হয়েছে।',
                    'update-success' => 'নির্বাচিত পর্যালোচনাগুলি সফলভাবে আপডেট হয়েছে।',
                ],
            ],
        ],

        'cms' => [
            'create-success' => 'সিএমএস সফলভাবে যোগ করা হয়েছে।',
            'delete-success' => 'সিএমএস সফলভাবে মোছা হয়েছে।',
            'update-success' => 'সিএমএস সফলভাবে আপডেট হয়েছে।',

            'mass-operations' => [
                'delete-success' => 'নির্বাচিত পেজগুলি সফলভাবে মোছা হয়েছে।',
            ],

            'error' => [
                'already-taken' => 'পেজটি ইতিমধ্যে নেওয়া হয়েছে।',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'প্রচারণা সফলভাবে যোগ করা হয়েছে।',
                    'delete-success' => 'প্রচারণা সফলভাবে মোছা হয়েছে।',
                    'update-success' => 'প্রচারণা সফলভাবে আপডেট হয়েছে।',
                ],

                'events' => [
                    'create-success' => 'ইভেন্ট সফলভাবে যোগ করা হয়েছে।',
                    'delete-success' => 'ইভেন্ট সফলভাবে মোছা হয়েছে।',
                    'update-success' => 'ইভেন্ট সফলভাবে আপডেট হয়েছে।',
                ],

                'templates' => [
                    'create-success' => 'ইমেইল টেমপ্লেট সফলভাবে যোগ করা হয়েছে।',
                    'delete-success' => 'ইমেইল টেমপ্লেট সফলভাবে মোছা হয়েছে।',
                    'update-success' => 'ইমেইল টেমপ্লেট সফলভাবে আপডেট হয়েছে।',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'কার্ট বিধি সফলভাবে যোগ করা হয়েছে।',
                    'delete-success' => 'কার্ট বিধি সফলভাবে মোছা হয়েছে।',
                    'update-success' => 'কার্ট বিধি সফলভাবে আপডেট হয়েছে।',
                ],

                'catalog-rules' => [
                    'create-success' => 'ক্যাটালগ বিধি সফলভাবে যোগ করা হয়েছে।',
                    'delete-success' => 'ক্যাটালগ বিধি সফলভাবে মোছা হয়েছে।',
                    'update-success' => 'ক্যাটালগ বিধি সফলভাবে আপডেট হয়েছে।',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'কার্ট বিধি কুপন সফলভাবে যোগ করা হয়েছে।',
                    'delete-success' => 'কার্ট বিধি কুপন সফলভাবে মোছা হয়েছে।',
                    'update-success' => 'কার্ট বিধি কুপন সফলভাবে আপডেট হয়েছে।',

                    'mass-operations' => [
                        'resource-not-found' => 'নির্বাচিত গুণগুলি খুঁজে পাওয়া যায়নি।',
                    ],
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'লোকেল সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'লোকেল সফলভাবে মোছা হয়েছে।',
                'update-success' => 'লোকেল সফলভাবে আপডেট হয়েছে।',

                'error' => [
                    'last-item-delete' => 'অন্তত একটি লোকেল প্রয়োজন।',
                ],
            ],

            'currencies' => [
                'create-success' => 'মুদ্রা সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'মুদ্রা সফলভাবে মোছা হয়েছে।',
                'update-success' => 'মুদ্রা সফলভাবে আপডেট হয়েছে।',

                'error' => [
                    'last-item-delete' => 'অন্তত একটি মুদ্রা প্রয়োজন।',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'বিনিময় হার সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'বিনিময় হার সফলভাবে মোছা হয়েছে।',
                'update-success' => 'বিনিময় হার সফলভাবে আপডেট হয়েছে।',
            ],

            'inventory-sources' => [
                'create-success'   => 'মজুত উৎস সফলভাবে যোগ করা হয়েছে।',
                'delete-success'   => 'মজুত উৎস সফলভাবে মোছা হয়েছে।',
                'update-success'   => 'মজুত উৎস সফলভাবে আপডেট হয়েছে।',

                'error' => [
                    'last-item-delete' => 'অন্তত একটি মজুত উৎস প্রয়োজন।',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'করের হার সফলভাবে যোগ করা হয়েছে।',
                    'delete-success' => 'করের হার সফলভাবে মোছা হয়েছে।',
                    'update-success' => 'করের হার সফলভাবে আপডেট হয়েছে।',
                ],

                'tax-categories' => [
                    'create-success' => 'করের বিভাগ সফলভাবে যোগ করা হয়েছে।',
                    'delete-success' => 'করের বিভাগ সফলভাবে মোছা হয়েছে।',
                    'update-success' => 'করের বিভাগ সফলভাবে আপডেট হয়েছে।',
                ],
            ],

            'channels' => [
                'create-success' => 'চ্যানেল সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'চ্যানেল সফলভাবে মোছা হয়েছে।',
                'update-success' => 'চ্যানেল সফলভাবে আপডেট হয়েছে।',

                'error' => [
                    'last-item-delete' => 'অন্তত একটি চ্যানেল প্রয়োজন।',
                ],
            ],

            'users' => [
                'create-success' => 'ব্যবহারকারী সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'ব্যবহারকারী সফলভাবে মোছা হয়েছে।',
                'update-success' => 'ব্যবহারকারী সফলভাবে আপডেট হয়েছে।',

                'error' => [
                    'cannot-change-column' => 'ব্যবহারকারীদের ক্ষেত্র পরিবর্তন করা সম্ভব হচ্ছে না।',
                    'last-item-delete'     => 'অন্তত একটি ব্যবহারকারী প্রয়োজন।',
                ],
            ],

            'roles' => [
                'create-success' => 'ভূমিকা সফলভাবে যোগ করা হয়েছে।',
                'delete-success' => 'ভূমিকা সফলভাবে মোছা হয়েছে।',
                'update-success' => 'ভূমিকা সফলভাবে আপডেট হয়েছে।',

                'error' => [
                    'being-used'       => 'এই সম্পদ ভূমিকার মধ্যে ব্যবহৃত হচ্ছে।',
                    'last-item-delete' => 'অন্তত একটি ভূমিকা প্রয়োজন।',
                ],
            ],

            'themes' => [
                'create-success' => 'থিম সফলভাবে তৈরি হয়েছে',
                'delete-success' => 'থিম সফলভাবে মোছা হয়েছে',
                'update-success' => 'থিম সফলভাবে আপডেট হয়েছে',
            ],
        ],

        'configuration' => [
            'create-success' => 'কনফিগারেশন সফলভাবে যোগ করা হয়েছে।',
            'delete-success' => 'কনফিগারেশন সফলভাবে মোছা হয়েছে।',
            'update-success' => 'কনফিগারেশন সফলভাবে আপডেট হয়েছে।',
        ],

        'account' => [
            'create-success'     => 'অ্যাকাউন্ট সফলভাবে যোগ করা হয়েছে।',
            'delete-success'     => 'অ্যাকাউন্ট সফলভাবে মোছা হয়েছে।',
            'logged-in-success'  => 'সফলভাবে লগ ইন হয়েছে।',
            'logged-out-success' => 'সফলভাবে লগ আউট হয়েছে।',
            'update-success'     => 'অ্যাকাউন্ট সফলভাবে আপডেট হয়েছে।',

            'error' => [
                'credential-error'  => 'প্রদত্ত শংসা ভুল।',
                'invalid'           => 'অবৈধ ইমেইল বা পাসওয়ার্ড',
                'password-mismatch' => 'বর্তমান পাসওয়ার্ড মিলছে না।',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'আপনার ঠিকানা সফলভাবে তৈরি হয়েছে।',
                'delete-success' => 'আপনার ঠিকানা সফলভাবে মোছা হয়েছে।',
                'update-success' => 'আপনার ঠিকানা সফলভাবে আপডেট হয়েছে।',
            ],

            'accounts' => [
                'create-success'     => 'আপনার অ্যাকাউন্ট সফলভাবে তৈরি হয়েছে।',
                'delete-success'     => 'আপনার অ্যাকাউন্ট সফলভাবে মোছা হয়েছে।',
                'update-success'     => 'আপনার অ্যাকাউন্ট সফলভাবে আপডেট হয়েছে।',
                'logged-in-success'  => 'সফলভাবে লগইন হয়েছে।',
                'logged-out-success' => 'সফলভাবে লগআউট হয়েছে।',

                'error' => [
                    'invalid'          => 'অবৈধ ইমেল বা পাসওয়ার্ড',
                    'credential-error' => 'প্রদত্ত শংকোচ্চে ভুল তথ্য।',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'ঠিকানা সফলভাবে সংরক্ষিত হয়েছে।',
            'check-billing-address'   => 'অনুগ্রহ করে বিলিং ঠিকানা পরীক্ষা করুন।',
            'check-shipping-address'  => 'অনুগ্রহ করে শিপিং ঠিকানা পরীক্ষা করুন।',
            'minimum-order-message'   => 'সর্বনিম্ন অর্ডার পরিমাণ হলো :amount।',
            'order-saved'             => 'অর্ডার সফলভাবে সংরক্ষিত হয়েছে',
            'payment-method-saved'    => 'অর্থ প্রদানের পদ্ধতি সফলভাবে সংরক্ষিত হয়েছে।',
            'shipping-method-saved'   => 'শিপিং পদ্ধতি সফলভাবে সংরক্ষিত হয়েছে।',
            'specify-payment-method'  => 'অনুগ্রহ করে অর্থ প্রদানের পদ্ধতি উল্লেখ করুন।',
            'specify-shipping-method' => 'অনুগ্রহ করে শিপিং পদ্ধতি উল্লেখ করুন।',

            'cart' => [
                'item' => [
                    'success'        => 'আইটেম সফলভাবে কার্টে যুক্ত হয়েছে।',
                    'success-remove' => 'আইটেম সফলভাবে কার্ট থেকে সরানো হয়েছে।',
                ],

                'quantity' => [
                    'illegal' => 'পরিমাণ একের কম হতে পারে না।',
                    'success' => 'কার্ট আইটেম(গুলি) সফলভাবে আপডেট হয়েছে।',
                ],

                'coupon' => [
                    'apply-issue'    => 'কুপন কোড প্রযোগ করা যাবে না।',
                    'invalid'        => 'কুপন কোড অবৈধ।',
                    'success'        => 'কুপন কোড সফলভাবে প্রযোগ করা হয়েছে।',
                    'success-remove' => 'কুপন সফলভাবে সরানো হয়েছে।',
                ],

                'move-wishlist' => [
                    'success' => 'আইটেম সফলভাবে ইচ্ছা তালিকায় সরানো হয়েছে।',
                ],
            ],
        ],

        'wishlist' => [
            'success'        => 'আইটেম সফলভাবে ইচ্ছা তালিকায় যুক্ত হয়েছে',
            'removed'        => 'আইটেম সফলভাবে ইচ্ছা তালিকা থেকে সরানো হয়েছে',
            'moved'          => 'আইটেম সফলভাবে কার্টে সরানো হয়েছে।',
            'option-missing' => 'পণ্যের বিকল্প অনুপস্থিত, তাই আইটেম ইচ্ছা তালিকায় সরাতে পারছে না।',

            'error' => [
                'security-warning' => 'সন্দেহজনক গতিবিধি পাওয়া গেছে!',

                'mass-operations' => [
                    'resource-not-found' => 'নির্বাচিত ইচ্ছা তালিকা পণ্য পাওয়া যায়নি।',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'অর্ডার সফলভাবে বাতিল করা হয়েছে।',

                'error' => [
                    'cancel-error' => 'অর্ডার বাতিল করা যাবে না।',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'অনুগ্রহ করে অন্তত একটি কনফিগারেবল গুণ নির্বাচন করুন।',

                'reviews' => [
                    'create-success' => 'আপনার পর্যালোচনা সফলভাবে জমা দেয়া হয়েছে।',
                ],
            ],
        ],
    ],
];
