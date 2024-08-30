<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => '订单取消成功。',

                'error' => [
                    'cancel-error' => '订单无法取消。',
                ],
            ],

            're-order' => [
                'address-create-success'  => '地址保存成功',
                'address-not-available'   => '没有可用的配送方式。',
                'create'                  => '商品成功添加到购物车',
                'error'                   => '出错了！',
                'order-create-success'    => '订单成功下达。',
                'payment-create-success'  => '支付方式成功保存',
                'shipping-create-success' => '配送方式成功保存',
            ],

            'invoices' => [
                'create-success' => '发票已成功添加。',

                'error' => [
                    'creation-error'    => '不允许创建订单发票。',
                    'invalid-qty-error' => '我们发现发票项目的数量无效。',
                    'product-error'     => '没有产品无法创建发票。',
                ],
            ],

            'shipments' => [
                'create-success' => '货件已成功添加。',

                'error' => [
                    'creation-error'    => '无法为此订单创建货件。',
                    'invalid-qty-error' => '我们发现货件项目的数量无效。',
                ],
            ],

            'refunds' => [
                'create-success' => '退款已成功添加。',

                'error' => [
                    'creation-error'       => '无法为此订单创建退款。',
                    'invalid-amount-error' => '退款金额应为非零。',
                    'invalid-qty-error'    => '我们发现退款项目的数量无效。',
                    'limit-error'          => '最大可退款金额为：amount。',
                ],
            ],

            'transactions' => [
                'already-paid'               => '此发票已支付。',
                'invoice-missing'            => '此发票ID不存在。',
                'transaction-amount-exceeds' => '此交易金额超过发票总额。',
                'transaction-saved'          => '交易已保存。',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => '产品已成功添加。',
                'delete-success' => '产品已成功删除',
                'update-success' => '产品已成功更新。',

                'inventories' => [
                    'update-success' => '库存已成功更新。',
                ],

                'mass-operations' => [
                    'delete-success'  => '所选产品已成功删除。',
                    'update-success'  => '所选产品已成功更新。',
                ],

                'error' => [
                    'configurable-error' => '请至少选择一个可配置属性。',
                ],
            ],

            'categories' => [
                'create-success'       => '分类已成功添加。',
                'delete-success'       => '分类已成功删除',
                'root-category-delete' => '根类别无法删除。',
                'update-success'       => '分类已成功更新。',
                'not-exist'            => '未找到类别。',

                'mass-operations' => [
                    'delete-success'  => '所选分类已成功删除。',
                    'update-success'  => '所选分类已成功更新。',
                ],
            ],

            'attributes' => [
                'create-success' => '属性已成功添加。',
                'delete-success' => '属性已成功删除',
                'update-success' => '属性已成功更新。',

                'error' => [
                    'cannot-change-type'       => '无法更改类型字段',
                    'system-attributes-delete' => '无法删除系统属性。',

                    'mass-operations' => [
                        'resource-not-found' => '未找到所选属性。',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => '家族已成功添加。',
                'delete-success' => '家族已成功删除',
                'update-success' => '家族已成功更新。',

                'error' => [
                    'being-used'       => '此资源家族正在 :source 中使用。',
                    'can-not-updated'  => '无法更新代码',
                    'last-item-delete' => '至少需要一个家族。',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => '客户已成功添加。',
                'delete-success' => '客户已成功删除',
                'update-success' => '客户已成功更新。',

                'mass-operations' => [
                    'delete-success' => '所选客户已成功删除。',
                    'update-success' => '所选客户已成功更新。',
                ],

                'error' => [
                    'order-pending-account-delete' => '无法删除客户帐户，因为有些订单处于待处理或处理中状态。',
                ],

                'notes' => [
                    'note-taken' => '已记下备注。',
                ],
            ],

            'addresses' => [
                'create-success' => '地址已成功添加。',
                'delete-success' => '地址已成功删除',
                'update-success' => '地址已成功更新。',

                'mass-operations' => [
                    'delete-success' => '所选地址已成功删除。',
                ],
            ],

            'groups' => [
                'create-success' => '客户组已成功添加。',
                'delete-success' => '客户组已成功删除',
                'update-success' => '客户组已成功更新。',

                'error' => [
                    'being-used'           => '此资源组正在客户中使用。',
                    'default-group-delete' => '无法删除默认组。',
                ],
            ],

            'reviews' => [
                'delete-success' => '评论已成功删除',
                'update-success' => '评论已成功更新。',

                'mass-operations' => [
                    'delete-success' => '所选评论已成功删除。',
                    'update-success' => '所选评论已成功更新。',
                ],
            ],

            'news-letter' => [
                'create-success'  => '您已成功订阅我们的新闻通讯。',
                'warning-message' => '您已经订阅了我们的新闻通讯。',
            ],
        ],

        'cms' => [
            'create-success' => 'CMS已成功添加。',
            'delete-success' => 'CMS已成功删除',
            'update-success' => 'CMS已成功更新。',

            'mass-operations' => [
                'delete-success' => '所选页面已成功删除。',
            ],

            'error' => [
                'already-taken' => '该页面已被占用。',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => '活动已成功添加。',
                    'delete-success' => '活动已成功删除',
                    'update-success' => '活动已成功更新。',
                ],

                'events' => [
                    'create-success' => '事件已成功添加。',
                    'delete-success' => '事件已成功删除',
                    'update-success' => '事件已成功更新。',
                ],

                'templates' => [
                    'create-success' => '电子邮件模板已成功添加。',
                    'delete-success' => '电子邮件模板已成功删除',
                    'update-success' => '电子邮件模板已成功更新。',
                ],

                'subscribers' => [
                    'delete-success' => '邮件订阅成功删除',
                    'update-failed'  => '邮件订阅更新失败',
                    'update-success' => '邮件订阅成功更新',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => '购物车规则已成功添加。',
                    'delete-success' => '购物车规则已成功删除',
                    'update-success' => '购物车规则已成功更新。',
                ],

                'catalog-rules' => [
                    'create-success' => '目录规则已成功添加。',
                    'delete-success' => '目录规则已成功删除',
                    'update-success' => '目录规则已成功更新。',
                ],

                'cart-rule-coupons' => [
                    'create-success' => '购物车规则优惠券已成功添加。',
                    'delete-success' => '购物车规则优惠券已成功删除',
                    'update-success' => '购物车规则优惠券已成功更新。',

                    'mass-operations' => [
                        'delete-success' => '购物车规则优惠券已成功删除'
                    ]
                ],
            ],

            'search-seo' => [
                'url-rewrites' => [
                    'create-success'  => 'URL重写成功添加。',
                    'delete-success'  => 'URL重写成功删除。',
                    'update-success'  => 'URL重写成功更新。',

                    'mass-operations' => [
                        'delete-success' => 'URL重写成功删除。',
                    ],
                ],

                'search-terms' => [
                    'create-success'  => '搜索词成功添加。',
                    'delete-success'  => '搜索词成功删除。',
                    'update-success'  => '搜索词成功更新。',

                    'mass-operations' => [
                        'delete-success' => '搜索词成功删除。',
                    ],
                ],

                'search-synonyms' => [
                    'create-success'  => '搜索同义词成功添加。',
                    'delete-success'  => '搜索同义词成功删除。',
                    'update-success'  => '搜索同义词成功更新。',

                    'mass-operations' => [
                        'delete-success' => '搜索同义词成功删除。',
                    ],
                ],

                'sitemaps' => [
                    'create-success' => '站点地图创建成功。',
                    'delete-success' => '站点地图删除成功。',
                    'update-success' => '站点地图更新成功。',
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => '区域设置已成功添加。',
                'delete-success' => '区域设置已成功删除',
                'update-success' => '区域设置已成功更新。',

                'error' => [
                    'last-item-delete' => '至少需要一个区域设置。',
                ],
            ],

            'currencies' => [
                'create-success' => '货币已成功添加。',
                'delete-success' => '货币已成功删除',
                'update-success' => '货币已成功更新。',

                'error' => [
                    'last-item-delete' => '至少需要一个货币。',
                ],
            ],

            'exchange-rates' => [
                'create-success' => '汇率已成功添加。',
                'delete-success' => '汇率已成功删除',
                'update-success' => '汇率已成功更新。',
            ],

            'inventory-sources' => [
                'create-success'   => '库存来源已成功添加。',
                'delete-success'   => '库存来源已成功删除',
                'update-success'   => '库存来源已成功更新。',

                'error' => [
                    'last-item-delete' => '至少需要一个库存来源。',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => '税率已成功添加。',
                    'delete-success' => '税率已成功删除',
                    'update-success' => '税率已成功更新。',
                ],

                'tax-categories' => [
                    'create-success' => '税类别已成功添加。',
                    'delete-success' => '税类别已成功删除',
                    'error'          => '一个或多个税率不存在。',
                    'update-success' => '税类别已成功更新。',
                ],
            ],

            'channels' => [
                'create-success' => '频道已成功添加。',
                'delete-success' => '频道已成功删除',
                'update-success' => '频道已成功更新。',

                'error' => [
                    'last-item-delete' => '至少需要一个频道。',
                ],
            ],

            'users' => [
                'create-success' => '用户已成功添加。',
                'delete-success' => '用户已成功删除',
                'update-success' => '用户已成功更新。',

                'error' => [
                    'cannot-change-column' => '无法更改用户。',
                    'last-item-delete'     => '至少需要一个用户。',
                ],
            ],

            'roles' => [
                'create-success' => '角色已成功添加。',
                'delete-success' => '角色已成功删除',
                'update-success' => '角色已成功更新。',

                'error' => [
                    'being-used'       => '此资源角色正在管理员用户中使用。',
                    'last-item-delete' => '至少需要一个角色。',
                ],
            ],

            'themes' => [
                'create-success' => '主题创建成功',
                'delete-success' => '主题成功删除',
                'update-success' => '主题成功更新',
            ],
        ],

        'configuration' => [
            'create-success' => '配置已成功添加。',
            'delete-success' => '配置已成功删除',
            'update-success' => '配置已成功更新。',
        ],

        'account' => [
            'create-success'     => '帐户已成功添加。',
            'delete-success'     => '帐户已成功删除',
            'logged-in-success'  => '成功登录。',
            'logged-out-success' => '成功登出。',
            'update-success'     => '帐户已成功更新。',

            'error' => [
                'credential-error'  => '提供的凭据不正确。',
                'invalid'           => '电子邮件或密码无效',
                'password-mismatch' => '当前密码不匹配。',
            ],
        ],

        'errors' => [
            '404' => [
                'message' => '糟糕！您正在寻找的页面正在度假中。看来我们找不到您要搜索的内容。',
                'title'   => '404 页面未找到',
            ],

            '401' => [
                'message' => '糟糕！看来您无权访问此页面。似乎您缺少必要的凭据。',
                'title'   => '401 未经授权',
            ],

            '403' => [
                'message' => '糟糕！这个页面是禁止访问的。您似乎没有查看此内容所需的权限。',
                'title'   => '403 禁止访问',
            ],

            '500' => [
                'message' => '糟糕！出了些问题。看来我们在加载您正在寻找的页面时遇到了麻烦。',
                'title'   => '500 内部服务器错误',
            ],

            '503' => [
                'message' => '糟糕！这个页面不可用。请稍后再试。',
                'title'   => '503 服务不可用',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => '您的地址已成功创建。',
                'delete-success' => '您的地址已成功删除。',
                'update-success' => '您的地址已成功更新。',
            ],

            'accounts' => [
                'create-success'     => '您的账户已成功创建。',
                'delete-success'     => '您的账户已成功删除。',
                'logged-in-success'  => '成功登录。',
                'logged-out-success' => '成功登出。',
                'update-success'     => '您的账户已成功更新。',

                'error' => [
                    'credential-error'  => '提供的凭据不正确。',
                    'invalid'           => '无效的电子邮件或密码',
                    'password-mismatch' => '当前密码不匹配。',
                    'update-failed'     => '更新您的帐户时出错',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => '地址保存成功。',
            'check-billing-address'   => '请检查账单地址。',
            'check-shipping-address'  => '请检查送货地址。',
            'minimum-order-message'   => '最低订单金额为：amount。',
            'order-saved'             => '订单保存成功',
            'payment-method-saved'    => '付款方式保存成功。',
            'shipping-method-saved'   => '运输方式保存成功。',
            'specify-payment-method'  => '请指定付款方式。',
            'specify-shipping-method' => '请指定运输方式。',

            'cart' => [
                'item' => [
                    'empty'           => '购物车是空的。',
                    'error'           => '购物车中的项目未找到。',
                    'inactive-add'    => '无法将非活动商品添加到购物车。',
                    'invalid-product' => '产品 ID 无效。',
                    'success'         => '商品已成功添加到购物车。',
                    'success-remove'  => '商品已成功从购物车中移除。',
                ],

                'quantity' => [
                    'illegal' => '数量不能少于一。',
                    'success' => '购物车商品已成功更新。',
                ],

                'coupon' => [
                    'apply-issue'    => '无法应用优惠券代码。',
                    'invalid'        => '优惠券代码无效。',
                    'success-remove' => '优惠券已成功移除。',
                    'success'        => '优惠券代码已成功应用。',
                ],

                'move-wishlist' => [
                    'success' => '商品已成功移至愿望清单。',
                ],
            ],
        ],

        'wishlist' => [
            'moved'          => '商品已成功移至购物车。',
            'option-missing' => '由于缺少产品选项，因此无法将商品移至愿望清单。',
            'removed'        => '商品已成功从愿望清单中移除',
            'success'        => '商品已成功添加到愿望清单',

            'error' => [
                'security-warning' => '发现可疑活动！',

                'mass-operations' => [
                    'resource-not-found' => '未找到所选愿望清单产品。',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => '订单取消成功。',

                'error' => [
                    'cancel-error' => '订单无法取消。',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => '请至少选择一个可配置属性。',

                'reviews' => [
                    'create-success' => '您的评论提交成功。',
                ],
            ],
        ],

        'errors' => [
            '404' => [
                'message' => '糟糕！您正在寻找的页面正在度假中。看来我们找不到您要搜索的内容。',
                'title'   => '404 页面未找到',
            ],

            '401' => [
                'message' => '糟糕！看来您无权访问此页面。似乎您缺少必要的凭据。',
                'title'   => '401 未经授权',
            ],

            '403' => [
                'message' => '糟糕！这个页面是禁止访问的。您似乎没有查看此内容所需的权限。',
                'title'   => '403 禁止访问',
            ],

            '500' => [
                'message' => '糟糕！出了些问题。看来我们在加载您正在寻找的页面时遇到了麻烦。',
                'title'   => '500 内部服务器错误',
            ],

            '503' => [
                'message' => '糟糕！这个页面不可用。请稍后再试。',
                'title'   => '503 服务不可用',
            ],
        ],
    ],
];
