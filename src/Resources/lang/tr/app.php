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

            're-order' => [
                'address-create-success'  => 'Adres Başarıyla Kaydedildi',
                'address-not-available'   => 'Hiçbir gönderim yöntemi mevcut değil.',
                'create'                  => 'Ürün başarıyla sepete eklendi',
                'error'                   => 'Bir şeyler yanlış gitti!',
                'order-create-success'    => 'Sipariş başarıyla verildi.',
                'payment-create-success'  => 'Ödeme Yöntemi Başarıyla Kaydedildi',
                'shipping-create-success' => 'Gönderim Yöntemi Başarıyla Kaydedildi',
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
                'create-success'       => 'Kategori başarıyla eklendi.',
                'delete-success'       => 'Kategori başarıyla silindi.',
                'root-category-delete' => 'Kök kategori silinemiyor.',
                'update-success'       => 'Kategori başarıyla güncellendi.',
                'not-exist'            => 'Kategori bulunamadı.',

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
                    'cannot-change-type'       => 'Tür alanı değiştirilemez.',
                    'system-attributes-delete' => 'Sistem özellikleri silinemez.',

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
                    'being-used'       => 'Bu kaynak ailesi :source içinde kullanılıyor.',
                    'can-not-updated'  => 'Kod güncellenemez',
                    'last-item-delete' => 'En az bir aile gerekli.',
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

            'news-letter' => [
                'create-success'  => 'Bültenimize başarıyla abone oldunuz.',
                'warning-message' => 'Bültenimize zaten abone oldunuz.',
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

                'subscribers' => [
                    'delete-success' => 'Bülten Aboneliği Başarıyla Silindi',
                    'update-failed'  => 'Bülten Aboneliği Güncelleme Başarısız',
                    'update-success' => 'Bülten Aboneliği Başarıyla Güncellendi',
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
                        'delete-success' => 'Sepet Kuralı Kuponları başarıyla silindi'
                    ]
                ],
            ],

            'search-seo' => [
                'url-rewrites' => [
                    'create-success'  => 'URL Yönlendirmesi başarıyla eklendi.',
                    'delete-success'  => 'URL Yönlendirmesi başarıyla silindi.',
                    'update-success'  => 'URL Yönlendirmesi başarıyla güncellendi.',

                    'mass-operations' => [
                        'delete-success' => 'URL Yönlendirmesi başarıyla silindi.',
                    ],
                ],

                'search-terms' => [
                    'create-success'  => 'Arama Terimleri başarıyla eklendi.',
                    'delete-success'  => 'Arama Terimleri başarıyla silindi.',
                    'update-success'  => 'Arama Terimleri başarıyla güncellendi.',

                    'mass-operations' => [
                        'delete-success' => 'Arama Terimleri başarıyla silindi.',
                    ],
                ],

                'search-synonyms' => [
                    'create-success'  => 'Arama Eşanlamlıları başarıyla eklendi.',
                    'delete-success'  => 'Arama Eşanlamlıları başarıyla silindi.',
                    'update-success'  => 'Arama Eşanlamlıları başarıyla güncellendi.',

                    'mass-operations' => [
                        'delete-success' => 'Arama Eşanlamlıları başarıyla silindi.',
                    ],
                ],

                'sitemaps' => [
                    'create-success' => 'Site haritaları başarıyla oluşturuldu.',
                    'delete-success' => 'Site haritaları başarıyla silindi.',
                    'update-success' => 'Site haritaları başarıyla güncellendi.',
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
                    'error'          => 'Bir veya daha fazla vergi oranı mevcut değil.',
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

        'errors' => [
            '404' => [
                'message' => 'Üzgünüz! Aradığınız sayfa tatilde. Aradığınızı bulamadık gibi görünüyor.',
                'title'   => '404 Sayfa Bulunamadı',
            ],

            '401' => [
                'message' => 'Üzgünüz! Bu sayfaya erişme izniniz yok gibi görünüyor. Gerekli kimlik bilgilerini eksik gördük.',
                'title'   => '401 Yetkisiz Erişim',
            ],

            '403' => [
                'message' => 'Üzgünüz! Bu sayfa yasaklanmış durumda. İçeriği görüntülemek için gerekli izinlere sahip değilsiniz gibi görünüyor.',
                'title'   => '403 Yasak',
            ],

            '500' => [
                'message' => 'Üzgünüz! Bir şeyler yanlış gitti. Aradığınız sayfayı yüklerken sorun yaşadığımız görünüyor.',
                'title'   => '500 İç Sunucu Hatası',
            ],

            '503' => [
                'message' => 'Üzgünüz! Geçici olarak bakımda gibi görünüyoruz. Lütfen biraz sonra tekrar kontrol edin.',
                'title'   => '503 Hizmet Kullanılamıyor',
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
                'logged-in-success'  => 'Başarıyla giriş yapıldı.',
                'logged-out-success' => 'Başarıyla çıkış yapıldı.',
                'update-success'     => 'Hesabınız başarıyla güncellendi.',

                'error' => [
                    'credential-error'  => 'Sağlanan kimlik bilgileri yanlış.',
                    'invalid'           => 'Geçersiz E-posta veya Parola',
                    'password-mismatch' => 'Mevcut şifre eşleşmiyor.',
                    'update-failed'     => 'Hesabınızı güncelleştirirken bir hata oluştu',
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
                    'empty'           => 'Sepetiniz boş.',
                    'error'           => 'Sepet ürünü bulunamadı.',
                    'inactive-add'    => 'Etkin olmayan ürün sepete eklenemez.',
                    'invalid-product' => 'Ürün ID\'si geçersiz.',
                    'success'         => 'Ürün başarıyla sepete eklendi.',
                    'success-remove'  => 'Ürün sepetten başarıyla kaldırıldı.',
                ],

                'quantity' => [
                    'illegal' => 'Miktar birden küçük olamaz.',
                    'success' => 'Sepet ürün(ler)i başarıyla güncellendi.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Kupon kodu uygulanamıyor.',
                    'invalid'        => 'Kupon kodu geçersiz.',
                    'success-remove' => 'Kupon başarıyla kaldırıldı.',
                    'success'        => 'Kupon kodu başarıyla uygulandı.',
                ],

                'move-wishlist' => [
                    'success' => 'Ürün başarıyla dilek listesine taşındı.',
                ],
            ],
        ],

        'wishlist' => [
            'moved'          => 'Ürün başarıyla sepete taşındı.',
            'option-missing' => 'Ürün seçenekleri eksik olduğundan, ürün dilek listesine taşınamaz.',
            'removed'        => 'Ürün Başarıyla Dilek Listesinden Kaldırıldı',
            'success'        => 'Ürün Başarıyla Dilek Listesine Eklendi',

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

        'errors' => [
            '404' => [
                'message' => 'Üzgünüz! Aradığınız sayfa tatilde. Aradığınızı bulamadık gibi görünüyor.',
                'title'   => '404 Sayfa Bulunamadı',
            ],

            '401' => [
                'message' => 'Üzgünüz! Bu sayfaya erişme izniniz yok gibi görünüyor. Gerekli kimlik bilgilerini eksik gördük.',
                'title'   => '401 Yetkisiz Erişim',
            ],

            '403' => [
                'message' => 'Üzgünüz! Bu sayfa yasaklanmış durumda. İçeriği görüntülemek için gerekli izinlere sahip değilsiniz gibi görünüyor.',
                'title'   => '403 Yasak',
            ],

            '500' => [
                'message' => 'Üzgünüz! Bir şeyler yanlış gitti. Aradığınız sayfayı yüklerken sorun yaşadığımız görünüyor.',
                'title'   => '500 İç Sunucu Hatası',
            ],

            '503' => [
                'message' => 'Üzgünüz! Geçici olarak bakımda gibi görünüyoruz. Lütfen biraz sonra tekrar kontrol edin.',
                'title'   => '503 Hizmet Kullanılamıyor',
            ],
        ],
    ],
];
