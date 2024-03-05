<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'Sipariş başarıyla iptal edildi.',

                'error' => [
                    'cancel-error' => 'Sipariş iptal edilemiyor.',
                ],
            ],

            'invoices' => [
                'create-success' => 'Fatura başarıyla eklendi.',

                'error' => [
                    'creation-error'    => 'Sipariş faturası oluşturulamıyor.',
                    'invalid-qty-error' => 'Fatura kalemleri için geçersiz miktar bulundu.',
                    'product-error'     => 'Ürün olmadan fatura oluşturulamaz.',
                ],
            ],

            'shipments' => [
                'create-success' => 'Gönderim başarıyla eklendi.',

                'error' => [
                    'creation-error'    => 'Bu sipariş için gönderim oluşturulamaz.',
                    'invalid-qty-error' => 'Gönderim kalemleri için geçersiz miktar bulundu.',
                ],
            ],

            'refunds' => [
                'create-success' => 'İade başarıyla eklendi.',

                'error' => [
                    'creation-error'       => 'Bu sipariş için iade oluşturulamaz.',
                    'invalid-amount-error' => 'İade tutarı sıfırdan farklı olmalıdır.',
                    'invalid-qty-error'    => 'İade kalemleri için geçersiz miktar bulundu.',
                    'limit-error'          => 'İade edilebilecek maksimum miktar :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'Bu fatura zaten ödendi.',
                'invoice-missing'            => 'Bu fatura kimliği mevcut değil.',
                'transaction-amount-exceeds' => 'Bu işlemin belirtilen tutarı faturanın toplam tutarını aşıyor.',
                'transaction-saved'          => 'İşlem kaydedildi.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'Ürün başarıyla eklendi.',
                'delete-success' => 'Ürün başarıyla silindi.',
                'update-success' => 'Ürün başarıyla güncellendi.',

                'inventories' => [
                    'update-success' => 'Envanter başarıyla güncellendi.',
                ],

                'mass-operations' => [
                    'delete-success' => 'Seçilen Ürünler başarıyla silindi.',
                    'update-success' => 'Seçilen Ürünler başarıyla güncellendi.',
                ],

                'error' => [
                    'configurable-error' => 'Lütfen en az bir yapılandırılabilir özellik seçin.',
                ],
            ],

            'categories' => [
                'create-success' => 'Kategori başarıyla eklendi.',
                'delete-success' => 'Kategori başarıyla silindi.',
                'update-success' => 'Kategori başarıyla güncellendi.',

                'mass-operations' => [
                    'delete-success' => 'Seçilen Kategoriler başarıyla silindi.',
                    'update-success' => 'Seçilen Kategoriler başarıyla güncellendi.',
                ],
            ],

            'attributes' => [
                'create-success' => 'Özellik başarıyla eklendi.',
                'delete-success' => 'Özellik başarıyla silindi.',
                'update-success' => 'Özellik başarıyla güncellendi.',

                'error' => [
                    'system-attributes-delete' => 'Sistem özellikleri silinemez.',
                    'cannot-change-type'       => 'Tür alanı değiştirilemez.',

                    'mass-operations' => [
                        'resource-not-found' => 'Seçilen özellikler bulunamadı.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'Aile başarıyla eklendi.',
                'delete-success' => 'Aile başarıyla silindi.',
                'update-success' => 'Aile başarıyla güncellendi.',

                'error' => [
                    'last-item-delete' => 'En az bir aile gerekli.',
                    'being-used'       => 'Bu kaynak ailesi :source içinde kullanılıyor.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'Müşteri başarıyla eklendi.',
                'delete-success' => 'Müşteri başarıyla silindi.',
                'update-success' => 'Müşteri başarıyla güncellendi.',

                'mass-operations' => [
                    'delete-success' => 'Seçilen müşteriler başarıyla silindi.',
                    'update-success' => 'Seçilen müşteriler başarıyla güncellendi.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'Bazı siparişler bekliyor veya işlem aşamasında olduğu için müşteri hesabı silinemez.',
                ],

                'notes' => [
                    'note-taken' => 'Not alındı.',
                ],
            ],

            'addresses' => [
                'create-success' => 'Adres başarıyla eklendi.',
                'delete-success' => 'Adres başarıyla silindi.',
                'update-success' => 'Adres başarıyla güncellendi.',

                'mass-operations' => [
                    'delete-success' => 'Seçilen adresler başarıyla silindi.',
                ],
            ],

            'groups' => [
                'create-success' => 'Müşteri grubu başarıyla eklendi.',
                'delete-success' => 'Müşteri grubu başarıyla silindi.',
                'update-success' => 'Müşteri grubu başarıyla güncellendi.',

                'error' => [
                    'being-used'           => 'Bu kaynak grupları Müşterilerde kullanılıyor.',
                    'default-group-delete' => 'Varsayılan grup silinemez.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'İnceleme başarıyla silindi.',
                'update-success' => 'İnceleme başarıyla güncellendi.',

                'mass-operations' => [
                    'delete-success' => 'Seçilen incelemeler başarıyla silindi.',
                    'update-success' => 'Seçilen incelemeler başarıyla güncellendi.',
                ],
            ],
        ],

        'cms' => [
            'create-success' => 'CMS başarıyla eklendi.',
            'delete-success' => 'CMS başarıyla silindi.',
            'update-success' => 'CMS başarıyla güncellendi.',

            'mass-operations' => [
                'delete-success' => 'Seçilen sayfalar başarıyla silindi.',
            ],

            'error' => [
                'already-taken' => 'Sayfalar zaten alındı.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'Kampanya başarıyla eklendi.',
                    'delete-success' => 'Kampanya başarıyla silindi.',
                    'update-success' => 'Kampanya başarıyla güncellendi.',
                ],

                'events' => [
                    'create-success' => 'Etkinlik başarıyla eklendi.',
                    'delete-success' => 'Etkinlik başarıyla silindi.',
                    'update-success' => 'Etkinlik başarıyla güncellendi.',
                ],

                'templates' => [
                    'create-success' => 'E-posta Şablonu başarıyla eklendi.',
                    'delete-success' => 'E-posta Şablonu başarıyla silindi.',
                    'update-success' => 'E-posta Şablonu başarıyla güncellendi.',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'Sepet Kuralı başarıyla eklendi.',
                    'delete-success' => 'Sepet Kuralı başarıyla silindi.',
                    'update-success' => 'Sepet Kuralı başarıyla güncellendi.',
                ],

                'catalog-rules' => [
                    'create-success' => 'Katalog Kuralı başarıyla eklendi.',
                    'delete-success' => 'Katalog Kuralı başarıyla silindi.',
                    'update-success' => 'Katalog Kuralı başarıyla güncellendi.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'Sepet Kuralı Kuponu başarıyla eklendi.',
                    'delete-success' => 'Sepet Kuralı Kuponu başarıyla silindi.',
                    'update-success' => 'Sepet Kuralı Kuponu başarıyla güncellendi.',

                    'mass-operations' => [
                        'delete-success' => 'Seçilen sayfalar başarıyla silindi.',
                    ],
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'Yerelleştirme başarıyla eklendi.',
                'delete-success' => 'Yerelleştirme başarıyla silindi.',
                'update-success' => 'Yerelleştirme başarıyla güncellendi.',

                'error' => [
                    'last-item-delete' => 'En az bir yerelleştirme gerekli.',
                ],
            ],

            'currencies' => [
                'create-success' => 'Para birimi başarıyla eklendi.',
                'delete-success' => 'Para birimi başarıyla silindi.',
                'update-success' => 'Para birimi başarıyla güncellendi.',

                'error' => [
                    'last-item-delete' => 'En az bir para birimi gerekli.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'Döviz kuru başarıyla eklendi.',
                'delete-success' => 'Döviz kuru başarıyla silindi.',
                'update-success' => 'Döviz kuru başarıyla güncellendi.',
            ],

            'inventory-sources' => [
                'create-success'   => 'Envanter Kaynağı başarıyla eklendi.',
                'delete-success'   => 'Envanter Kaynağı başarıyla silindi.',
                'update-success'   => 'Envanter Kaynağı başarıyla güncellendi.',

                'error' => [
                    'last-item-delete' => 'En az bir envanter kaynağı gerekli.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'Vergi Oranı başarıyla eklendi.',
                    'delete-success' => 'Vergi Oranı başarıyla silindi.',
                    'update-success' => 'Vergi Oranı başarıyla güncellendi.',
                ],

                'tax-categories' => [
                    'create-success' => 'Vergi Kategorisi başarıyla eklendi.',
                    'delete-success' => 'Vergi Kategorisi başarıyla silindi.',
                    'update-success' => 'Vergi Kategorisi başarıyla güncellendi.',
                ],
            ],

            'channels' => [
                'create-success' => 'Kanal başarıyla eklendi.',
                'delete-success' => 'Kanal başarıyla silindi.',
                'update-success' => 'Kanal başarıyla güncellendi.',

                'error' => [
                    'last-item-delete' => 'En az bir kanal gerekli.',
                ],
            ],

            'users' => [
                'create-success' => 'Kullanıcı başarıyla eklendi.',
                'delete-success' => 'Kullanıcı başarıyla silindi.',
                'update-success' => 'Kullanıcı başarıyla güncellendi.',

                'error' => [
                    'cannot-change-column' => 'Kullanıcılar değiştirilemez.',
                    'last-item-delete'     => 'En az bir kullanıcı gerekli.',
                ],
            ],

            'roles' => [
                'create-success' => 'Rol başarıyla eklendi.',
                'delete-success' => 'Rol başarıyla silindi.',
                'update-success' => 'Rol başarıyla güncellendi.',

                'error' => [
                    'being-used'       => 'Bu kaynak rolleri admin kullanıcısında kullanılıyor.',
                    'last-item-delete' => 'En az bir rol gerekli.',
                ],
            ],

            'themes' => [
                'create-success' => 'Tema başarıyla oluşturuldu',
                'delete-success' => 'Tema başarıyla silindi',
                'update-success' => 'Tema başarıyla güncellendi',
            ],
        ],

        'configuration' => [
            'create-success' => 'Yapılandırma başarıyla eklendi.',
            'delete-success' => 'Yapılandırma başarıyla silindi.',
            'update-success' => 'Yapılandırma başarıyla güncellendi.',
        ],

        'account' => [
            'create-success'     => 'Hesap başarıyla eklendi.',
            'delete-success'     => 'Hesap başarıyla silindi.',
            'logged-in-success'  => 'Başarıyla oturum açıldı.',
            'logged-out-success' => 'Başarıyla oturum kapatıldı.',
            'update-success'     => 'Hesap başarıyla güncellendi.',

            'error' => [
                'credential-error'  => 'Sağlanan kimlik bilgileri yanlış.',
                'invalid'           => 'Geçersiz E-posta veya Şifre',
                'password-mismatch' => 'Mevcut şifre eşleşmiyor.',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'Adresiniz başarıyla oluşturuldu.',
                'delete-success' => 'Adresiniz başarıyla silindi.',
                'update-success' => 'Adresiniz başarıyla güncellendi.',
            ],

            'accounts' => [
                'create-success'     => 'Hesabınız başarıyla oluşturuldu.',
                'delete-success'     => 'Hesabınız başarıyla silindi.',
                'update-success'     => 'Hesabınız başarıyla güncellendi.',
                'logged-in-success'  => 'Başarıyla giriş yapıldı.',
                'logged-out-success' => 'Başarıyla çıkış yapıldı.',

                'error' => [
                    'invalid'          => 'Geçersiz E-posta veya Şifre',
                    'credential-error' => 'Sağlanan kimlik bilgileri yanlış.',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'Adres başarıyla kaydedildi.',
            'check-billing-address'   => 'Lütfen fatura adresini kontrol edin.',
            'check-shipping-address'  => 'Lütfen teslimat adresini kontrol edin.',
            'minimum-order-message'   => 'Minimum sipariş tutarı :amount.',
            'order-saved'             => 'Sipariş başarıyla kaydedildi.',
            'payment-method-saved'    => 'Ödeme yöntemi başarıyla kaydedildi.',
            'shipping-method-saved'   => 'Kargo yöntemi başarıyla kaydedildi.',
            'specify-payment-method'  => 'Lütfen ödeme yöntemini belirtin.',
            'specify-shipping-method' => 'Lütfen kargo yöntemini belirtin.',

            'cart' => [
                'item' => [
                    'success'        => 'Ürün başarıyla sepete eklendi.',
                    'success-remove' => 'Ürün sepetten başarıyla kaldırıldı.',
                ],

                'quantity' => [
                    'illegal' => 'Miktar birden küçük olamaz.',
                    'success' => 'Sepet ürün(ler)i başarıyla güncellendi.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Kupon kodu uygulanamıyor.',
                    'invalid'        => 'Kupon kodu geçersiz.',
                    'success'        => 'Kupon kodu başarıyla uygulandı.',
                    'success-remove' => 'Kupon başarıyla kaldırıldı.',
                ],

                'move-wishlist' => [
                    'success' => 'Ürün başarıyla dilek listesine taşındı.',
                ],
            ],
        ],

        'wishlist' => [
            'success'        => 'Ürün Başarıyla Dilek Listesine Eklendi',
            'removed'        => 'Ürün Başarıyla Dilek Listesinden Kaldırıldı',
            'moved'          => 'Ürün başarıyla sepete taşındı.',
            'option-missing' => 'Ürün seçenekleri eksik olduğundan, ürün dilek listesine taşınamaz.',

            'error' => [
                'security-warning' => 'Şüpheli aktivite tespit edildi!',

                'mass-operations' => [
                    'resource-not-found' => 'Seçilen dilek listesi ürünü bulunamadı.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'Sipariş başarıyla iptal edildi.',

                'error' => [
                    'cancel-error' => 'Sipariş iptal edilemiyor.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'Lütfen en az bir yapılandırılabilir özellik seçin.',

                'reviews' => [
                    'create-success' => 'İncelemeniz başarıyla gönderildi.',
                ],
            ],
        ],
    ],
];
