<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => '注文は正常にキャンセルされました。',

                'error' => [
                    'cancel-error' => '注文をキャンセルできません。',
                ],
            ],

            're-order' => [
                'address-create-success'  => '住所が正常に保存されました',
                'address-not-available'   => '利用可能な配送方法はありません。',
                'create'                  => 'アイテムが正常にカートに追加されました',
                'error'                   => '何かがうまくいかなかった！',
                'order-create-success'    => '注文が正常に完了しました。',
                'payment-create-success'  => '支払い方法が正常に保存されました',
                'shipping-create-success' => '配送方法が正常に保存されました',
            ],

            'invoices' => [
                'create-success' => '請求書が正常に追加されました。',

                'error' => [
                    'creation-error'    => '注文請求書の作成は許可されていません。',
                    'invalid-qty-error' => '商品の請求書に無効な数量が見つかりました。',
                    'product-error'     => '商品なしでは請求書を作成できません。',
                ],
            ],

            'shipments' => [
                'create-success' => '出荷が正常に追加されました。',

                'error' => [
                    'creation-error'    => 'この注文には出荷を作成できません。',
                    'invalid-qty-error' => '出荷アイテムの数量が無効です。',
                ],
            ],

            'refunds' => [
                'create-success' => '返金が正常に追加されました。',

                'error' => [
                    'creation-error'       => 'この注文には返金を作成できません。',
                    'invalid-amount-error' => '返金額はゼロ以外である必要があります。',
                    'invalid-qty-error'    => '返金アイテムの数量が無効です。',
                    'limit-error'          => '返金可能な最大金額は :amount です。',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'この請求書はすでに支払われています。',
                'invoice-missing'            => 'この請求書IDは存在しません。',
                'transaction-amount-exceeds' => 'この取引の指定された金額が請求書の合計金額を超えています。',
                'transaction-saved'          => '取引が保存されました。',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => '商品が正常に追加されました。',
                'delete-success' => '商品が正常に削除されました。',
                'update-success' => '商品が正常に更新されました。',

                'inventories' => [
                    'update-success' => '在庫が正常に更新されました。',
                ],

                'mass-operations' => [
                    'delete-success' => '選択した商品が正常に削除されました。',
                    'update-success' => '選択した商品が正常に更新されました。',
                ],

                'error' => [
                    'configurable-error' => '少なくとも1つの設定可能な属性を選択してください。',
                ],
            ],

            'categories' => [
                'create-success'       => 'カテゴリが正常に追加されました。',
                'delete-success'       => 'カテゴリが正常に削除されました。',
                'root-category-delete' => 'ルートカテゴリーは削除できません。',
                'update-success'       => 'カテゴリが正常に更新されました。',
                'not-exist'            => 'カテゴリが見つかりません。',

                'mass-operations' => [
                    'delete-success' => '選択したカテゴリが正常に削除されました。',
                    'update-success' => '選択したカテゴリが正常に更新されました。',
                ],
            ],

            'attributes' => [
                'create-success' => '属性が正常に追加されました。',
                'delete-success' => '属性が正常に削除されました。',
                'update-success' => '属性が正常に更新されました。',

                'error' => [
                    'cannot-change-type'       => 'タイプフィールドを変更できません。',
                    'system-attributes-delete' => 'システム属性を削除できません。',

                    'mass-operations' => [
                        'resource-not-found' => '選択した属性が見つかりません。',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'ファミリが正常に追加されました。',
                'delete-success' => 'ファミリが正常に削除されました。',
                'update-success' => 'ファミリが正常に更新されました。',

                'error' => [
                    'being-used'       => 'このリソースファミリは :source で使用されています。',
                    'can-not-updated'  => 'コードを更新できません',
                    'last-item-delete' => '少なくとも1つのファミリが必要です。',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => '顧客が正常に追加されました。',
                'delete-success' => '顧客が正常に削除されました。',
                'update-success' => '顧客が正常に更新されました。',

                'mass-operations' => [
                    'delete-success' => '選択した顧客が正常に削除されました。',
                    'update-success' => '選択した顧客が正常に更新されました。',
                ],

                'error' => [
                    'order-pending-account-delete' => 'いくつかの注文が保留中または処理中の状態であるため、顧客アカウントを削除できません。',
                ],

                'notes' => [
                    'note-taken' => 'ノートが取得されました。',
                ],
            ],

            'addresses' => [
                'create-success' => '住所が正常に追加されました。',
                'delete-success' => '住所が正常に削除されました。',
                'update-success' => '住所が正常に更新されました。',

                'mass-operations' => [
                    'delete-success' => '選択した住所が正常に削除されました。',
                ],
            ],

            'groups' => [
                'create-success' => '顧客グループが正常に追加されました。',
                'delete-success' => '顧客グループが正常に削除されました。',
                'update-success' => '顧客グループが正常に更新されました。',

                'error' => [
                    'being-used'           => 'このリソースグループは顧客で使用されています。',
                    'default-group-delete' => 'デフォルトグループは削除できません。',
                ],
            ],

            'reviews' => [
                'delete-success' => 'レビューが正常に削除されました。',
                'update-success' => 'レビューが正常に更新されました。',

                'mass-operations' => [
                    'delete-success' => '選択したレビューが正常に削除されました。',
                    'update-success' => '選択したレビューが正常に更新されました。',
                ],
            ],

            'news-letter' => [
                'create-success'  => 'ニュースレターに正常に登録されました。',
                'warning-message' => 'すでにニュースレターに登録されています。',
            ],
        ],

        'cms' => [
            'create-success' => 'CMSが正常に追加されました。',
            'delete-success' => 'CMSが正常に削除されました。',
            'update-success' => 'CMSが正常に更新されました。',

            'mass-operations' => [
                'delete-success' => '選択したページが正常に削除されました。',
            ],

            'error' => [
                'already-taken' => 'このページはすでに取得されています。',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'キャンペーンが正常に追加されました。',
                    'delete-success' => 'キャンペーンが正常に削除されました。',
                    'update-success' => 'キャンペーンが正常に更新されました。',
                ],

                'events' => [
                    'create-success' => 'イベントが正常に追加されました。',
                    'delete-success' => 'イベントが正常に削除されました。',
                    'update-success' => 'イベントが正常に更新されました。',
                ],

                'templates' => [
                    'create-success' => 'メールテンプレートが正常に追加されました。',
                    'delete-success' => 'メールテンプレートが正常に削除されました。',
                    'update-success' => 'メールテンプレートが正常に更新されました。',
                ],

                'subscribers' => [
                    'delete-success' => 'ニュースレターサブスクリプションが正常に削除されました',
                    'update-failed'  => 'ニュースレターサブスクリプションの更新に失敗しました',
                    'update-success' => 'ニュースレターサブスクリプションが正常に更新されました',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'カートルールが正常に追加されました。',
                    'delete-success' => 'カートルールが正常に削除されました。',
                    'update-success' => 'カートルールが正常に更新されました。',
                ],

                'catalog-rules' => [
                    'create-success' => 'カタログルールが正常に追加されました。',
                    'delete-success' => 'カタログルールが正常に削除されました。',
                    'update-success' => 'カタログルールが正常に更新されました。',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'カートルールクーポンが正常に追加されました。',
                    'delete-success' => 'カートルールクーポンが正常に削除されました。',
                    'update-success' => 'カートルールクーポンが正常に更新されました。',

                    'mass-operations' => [
                        'delete-success' => 'カート ルール クーポンが正常に削除されました'
                    ]
                ],
            ],

            'search-seo' => [
                'url-rewrites' => [
                    'create-success'  => 'URLの書き換えが正常に追加されました。',
                    'delete-success'  => 'URLの書き換えが正常に削除されました。',
                    'update-success'  => 'URLの書き換えが正常に更新されました。',

                    'mass-operations' => [
                        'delete-success' => 'URLの書き換えが正常に削除されました。',
                    ],
                ],

                'search-terms' => [
                    'create-success'  => '検索用語が正常に追加されました。',
                    'delete-success'  => '検索用語が正常に削除されました。',
                    'update-success'  => '検索用語が正常に更新されました。',

                    'mass-operations' => [
                        'delete-success' => '検索用語が正常に削除されました。',
                    ],
                ],

                'search-synonyms' => [
                    'create-success'  => '検索シノニムが正常に追加されました。',
                    'delete-success'  => '検索シノニムが正常に削除されました。',
                    'update-success'  => '検索シノニムが正常に更新されました。',

                    'mass-operations' => [
                        'delete-success' => '検索シノニムが正常に削除されました。',
                    ],
                ],

                'sitemaps' => [
                    'create-success' => 'サイトマップが正常に作成されました。',
                    'delete-success' => 'サイトマップが正常に削除されました。',
                    'update-success' => 'サイトマップが正常に更新されました。',
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'ロケールが正常に追加されました。',
                'delete-success' => 'ロケールが正常に削除されました。',
                'update-success' => 'ロケールが正常に更新されました。',

                'error' => [
                    'last-item-delete' => '少なくとも1つのロケールが必要です。',
                ],
            ],

            'currencies' => [
                'create-success' => '通貨が正常に追加されました。',
                'delete-success' => '通貨が正常に削除されました。',
                'update-success' => '通貨が正常に更新されました。',

                'error' => [
                    'last-item-delete' => '少なくとも1つの通貨が必要です。',
                ],
            ],

            'exchange-rates' => [
                'create-success' => '為替レートが正常に追加されました。',
                'delete-success' => '為替レートが正常に削除されました。',
                'update-success' => '為替レートが正常に更新されました。',
            ],

            'inventory-sources' => [
                'create-success'   => '在庫ソースが正常に追加されました。',
                'delete-success'   => '在庫ソースが正常に削除されました。',
                'update-success'   => '在庫ソースが正常に更新されました。',

                'error' => [
                    'last-item-delete' => '少なくとも1つの在庫ソースが必要です。',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => '税率が正常に追加されました。',
                    'delete-success' => '税率が正常に削除されました。',
                    'update-success' => '税率が正常に更新されました。',
                ],

                'tax-categories' => [
                    'create-success' => '税カテゴリが正常に追加されました。',
                    'delete-success' => '税カテゴリが正常に削除されました。',
                    'error'          => '1つ以上の税率が存在しません。',
                    'update-success' => '税カテゴリが正常に更新されました。',
                ],
            ],

            'channels' => [
                'create-success' => 'チャネルが正常に追加されました。',
                'delete-success' => 'チャネルが正常に削除されました。',
                'update-success' => 'チャネルが正常に更新されました。',

                'error' => [
                    'last-item-delete' => '少なくとも1つのチャネルが必要です。',
                ],
            ],

            'users' => [
                'create-success' => 'ユーザーが正常に追加されました。',
                'delete-success' => 'ユーザーが正常に削除されました。',
                'update-success' => 'ユーザーが正常に更新されました。',

                'error' => [
                    'cannot-change-column' => 'ユーザーを変更できません。',
                    'last-item-delete'     => '少なくとも1つのユーザーが必要です。',
                ],
            ],

            'roles' => [
                'create-success' => 'ロールが正常に追加されました。',
                'delete-success' => 'ロールが正常に削除されました。',
                'update-success' => 'ロールが正常に更新されました。',

                'error' => [
                    'being-used'       => 'このリソースロールは管理ユーザーで使用されています。',
                    'last-item-delete' => '少なくとも1つのロールが必要です。',
                ],
            ],

            'themes' => [
                'create-success' => 'テーマが正常に作成されました',
                'delete-success' => 'テーマが正常に削除されました',
                'update-success' => 'テーマが正常に更新されました',
            ],
        ],

        'configuration' => [
            'create-success' => '設定が正常に追加されました。',
            'delete-success' => '設定が正常に削除されました。',
            'update-success' => '設定が正常に更新されました。',
        ],

        'account' => [
            'create-success'     => 'アカウントが正常に追加されました。',
            'delete-success'     => 'アカウントが正常に削除されました。',
            'logged-in-success'  => '正常にログインしました。',
            'logged-out-success' => '正常にログアウトしました。',
            'update-success'     => 'アカウントが正常に更新されました。',

            'error' => [
                'credential-error'  => '提供された資格情報が正しくありません。',
                'invalid'           => '無効なメールアドレスまたはパスワード',
                'password-mismatch' => '現在のパスワードが一致しません。',
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'おっと！お探しのページは休暇中のようです。お探しのものが見つかりませんでした。',
                'title'   => '404 ページが見つかりません',
            ],

            '401' => [
                'message' => 'おっと！このページにアクセスする権限がありません。必要な資格情報が不足しているようです。',
                'title'   => '401 認証されていません',
            ],

            '403' => [
                'message' => 'おっと！このページは立ち入り禁止です。このコンテンツを表示するために必要な権限がありません。',
                'title'   => '403 禁止されています',
            ],

            '500' => [
                'message' => 'おっと！何か問題が発生しました。お探しのページの読み込みに問題が発生しているようです。',
                'title'   => '500 サーバーエラー',
            ],

            '503' => [
                'message' => 'おっと！一時的にメンテナンス中のようです。少し後で再度チェックしてください。',
                'title'   => '503 サービス利用不可',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'アドレスが正常に作成されました。',
                'delete-success' => 'アドレスが正常に削除されました。',
                'update-success' => 'アドレスが正常に更新されました。',
            ],

            'accounts' => [
                'create-success'     => 'アカウントが正常に作成されました。',
                'delete-success'     => 'アカウントが正常に削除されました。',
                'logged-in-success'  => '正常にログインしました。',
                'logged-out-success' => '正常にログアウトしました。',
                'update-success'     => 'アカウントが正常に更新されました。',

                'error' => [
                    'credential-error'  => '提供された認証情報が間違っています。',
                    'invalid'           => '無効なメールアドレスまたはパスワード',
                    'password-mismatch' => '現在のパスワードが一致しません。',
                    'update-failed'     => 'アカウントの更新中にエラーが発生しました',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => '住所が正常に保存されました。',
            'check-billing-address'   => '請求先住所を確認してください。',
            'check-shipping-address'  => '配送先住所を確認してください。',
            'minimum-order-message'   => '最低注文金額は :amount です。',
            'order-saved'             => '注文が正常に保存されました。',
            'payment-method-saved'    => '支払い方法が正常に保存されました。',
            'shipping-method-saved'   => '配送方法が正常に保存されました。',
            'specify-payment-method'  => '支払い方法を指定してください。',
            'specify-shipping-method' => '配送方法を指定してください。',

            'cart' => [
                'item' => [
                    'empty'           => 'カートは空です。',
                    'error'           => 'ト内の商品が見つかりません。',
                    'inactive-add'    => '無効なアイテムはカートに追加できません',
                    'invalid-product' => '商品IDが無効です。',
                    'success'         => '商品がカートに正常に追加されました。',
                    'success-remove'  => '商品がカートから正常に削除されました。',
                ],

                'quantity' => [
                    'illegal' => '数量は1未満にすることはできません。',
                    'success' => 'カートの商品が正常に更新されました。',
                ],

                'coupon' => [
                    'apply-issue'    => 'クーポンコードは適用できません。',
                    'invalid'        => 'クーポンコードが無効です。',
                    'success-remove' => 'クーポンが正常に削除されました。',
                    'success'        => 'クーポンコードが正常に適用されました。',
                ],

                'move-wishlist' => [
                    'success' => '商品が正常にウィッシュリストに移動しました。',
                ],
            ],
        ],

        'wishlist' => [
            'moved'          => '商品が正常にカートに移動しました。',
            'option-missing' => '製品オプションが不足しているため、アイテムをウィッシュリストに移動できません。',
            'removed'        => '商品が正常にウィッシュリストから削除されました。',
            'success'        => '商品が正常にウィッシュリストに追加されました。',

            'error' => [
                'security-warning' => '不審なアクティビティが検出されました！',

                'mass-operations' => [
                    'resource-not-found' => '選択したウィッシュリストの商品が見つかりません。',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => '注文が正常にキャンセルされました。',

                'error' => [
                    'cancel-error' => '注文をキャンセルできません。',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => '少なくとも1つの設定可能な属性を選択してください。',

                'reviews' => [
                    'create-success' => 'レビューが正常に送信されました。',
                ],
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'おっと！お探しのページは休暇中のようです。お探しのものが見つかりませんでした。',
                'title'   => '404 ページが見つかりません',
            ],

            '401' => [
                'message' => 'おっと！このページにアクセスする権限がありません。必要な資格情報が不足しているようです。',
                'title'   => '401 認証されていません',
            ],

            '403' => [
                'message' => 'おっと！このページは立ち入り禁止です。このコンテンツを表示するために必要な権限がありません。',
                'title'   => '403 禁止されています',
            ],

            '500' => [
                'message' => 'おっと！何か問題が発生しました。お探しのページの読み込みに問題が発生しているようです。',
                'title'   => '500 サーバーエラー',
            ],

            '503' => [
                'message' => 'おっと！一時的にメンテナンス中のようです。少し後で再度チェックしてください。',
                'title'   => '503 サービス利用不可',
            ],
        ],
    ],
];
