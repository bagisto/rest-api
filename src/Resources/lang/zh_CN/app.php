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
                'create-success' => '分类已成功添加。',
                'delete-success' => '分类已成功删除',
                'update-success' => '分类已成功更新。',

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
                    'system-attributes-delete' => '无法删除系统属性。',
                    'cannot-change-type'       => '无法更改类型字段',

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
                    'last-item-delete' => '至少需要一个家族。',
                    'being-used'       => '此资源家族正在 :source 中使用。',
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
                        'delete-success' => '所选页面已成功删除。',
                    ],
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
                'update-success'     => '您的账户已成功更新。',
                'logged-in-success'  => '成功登录。',
                'logged-out-success' => '成功登出。',

                'error' => [
                    'invalid'          => '电子邮件或密码无效。',
                    'credential-error' => '提供的凭据不正确。',
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
                    'success'        => '商品已成功添加到购物车。',
                    'success-remove' => '商品已成功从购物车中移除。',
                ],

                'quantity' => [
                    'illegal' => '数量不能少于一。',
                    'success' => '购物车商品已成功更新。',
                ],

                'coupon' => [
                    'apply-issue'    => '无法应用优惠券代码。',
                    'invalid'        => '优惠券代码无效。',
                    'success'        => '优惠券代码已成功应用。',
                    'success-remove' => '优惠券已成功移除。',
                ],

                'move-wishlist' => [
                    'success' => '商品已成功移至愿望清单。',
                ],
            ],
        ],

        'wishlist' => [
            'success'        => '商品已成功添加到愿望清单',
            'removed'        => '商品已成功从愿望清单中移除',
            'moved'          => '商品已成功移至购物车。',
            'option-missing' => '由于缺少产品选项，因此无法将商品移至愿望清单。',

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
    ],
];
