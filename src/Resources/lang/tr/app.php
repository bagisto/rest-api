<?php

return [
    'sales' => [
        'orders' => [
            'cancel-error' => 'Sipariş iptal edilemez.',
        ],

        'invoices' => [
            'invalid-qty-error' => 'Öğeleri faturalamak için geçersiz bir miktar bulduk.',
            'creation-error'    => 'Sipariş faturası oluşturmaya izin verilmiyor.',
            'product-error'     => 'Ürünler olmadan fatura oluşturulamaz.',
        ],

        'shipments' => [
            'invalid-qty-error' => 'Sevkiyat kalemleri için geçersiz bir miktar bulduk.',
            'creation-error'    => 'Bu sipariş için gönderi oluşturulamıyor.',
        ],

        'refunds' => [
            'creation-error'       => 'Bu sipariş için geri ödeme oluşturulamaz.',
            'invalid-amount-error' => 'Geri ödeme tutarı sıfır olmamalıdır.',
            'invalid-qty-error'    => 'Geri ödeme ürünleri için geçersiz bir miktar bulduk.',
            'limit-error'          => 'Geri ödenebilecek en fazla para :amount.',
        ],

        'transactions' => [
            'already-paid'      => 'Bu fatura zaten ödendi.',
            'invoice-missing'   => 'Bu fatura kimliği mevcut değil.',
            'transaction-saved' => 'İşlem kaydedildi.',
        ],
    ],

    'catalog' => [
        'products' => [
            'configurable-error' => 'Lütfen en az bir yapılandırılabilir özellik seçin.',
        ],
    ],

    'customers' => [
        'note-cannot-taken' => 'Not alınamaz.',
        'note-taken'        => 'Not alındı.',
    ],

    'wishlist' => [
        'moved'          => 'Ürün başarıyla sepete taşındı.',
        'option-missing' => 'Ürün seçenekleri eksik, bu nedenle ürün istek listesine taşınamıyor.',
    ],

    'checkout' => [
        'cart' => [
            'item' => [
                'error-add'      => 'Ürün sepete eklenemiyor, lütfen daha sonra tekrar deneyin.',
                'error-remove'   => 'Sepetten kaldırılacak ürün yok.',
                'inactive'       => 'Ürün etkin değil ve sepetten kaldırıldı.',
                'inactive-add'   => 'Etkin olmayan ürün sepete eklenemez.',
                'success'        => 'Ürün sepete başarıyla eklendi.',
                'success-remove' => 'Ürün sepetten başarıyla kaldırıldı.',
            ],

            'quantity' => [
                'error'             => 'Öğe(ler) şu anda güncellenemiyor, lütfen daha sonra tekrar deneyin.',
                'illegal'           => 'Miktar birden az olamaz.',
                'inventory-warning' => 'İstenen miktar mevcut değil, lütfen daha sonra tekrar deneyin.',
                'quantity'          => 'Miktar',
                'success'           => 'Sepet Öğeleri başarıyla güncellendi.',
            ],

            'coupon' => [
                'apply-issue'    => 'Kupon kodu uygulanamaz.',
                'invalid'        => 'Kupon kodu geçersiz.',
                'success'        => 'Kupon kodu başarıyla uygulandı.',
                'success-remove' => 'Kupon başarıyla kaldırıldı.',
            ],

            'move-wishlist' => [
                'error'   => 'Öğe istek listesine taşınamıyor, lütfen daha sonra tekrar deneyin.',
                'success' => 'Öğe başarıyla istek listesine taşındı.',
            ],
        ],

        'minimum-order-message'   => 'Minimum sipariş miktarı :amount.',
        'check-shipping-address'  => 'Lütfen teslimat adresini kontrol edin.',
        'check-billing-address'   => 'Lütfen fatura adresini kontrol edin.',
        'specify-shipping-method' => 'Lütfen gönderim yöntemini belirtin.',
        'specify-payment-method'  => 'Lütfen ödeme yöntemini belirtin.',
    ],

    'common-response' => [
        'success' => [
            'add'    => ':name başarıyla eklendi.',
            'cancel' => ':name başarıyla iptal edildi.',
            'create' => ':name başarıyla oluşturuldu.',
            'delete' => ':name başarıyla silindi.',
            'update' => ':name başarıyla güncellendi.',
            'upload' => ':name başarıyla yüklendi.',

            'mass-operations' => [
                'delete'  => 'Seçili :name başarıyla silindi.',
                'partial' => ':name üzerindeki kısıtlı sistem kısıtlamaları nedeniyle bazı eylemler gerçekleştirilemedi.',
                'update'  => 'Seçili :name başarıyla güncellendi.',
            ],
        ],

        'error' => [
            'already-taken'                => ':name zaten alınmış.',
            'base-currency-delete'         => 'Bu para birimi kanal temel para birimi olarak ayarlanmıştır, dolayısıyla silinemez.',
            'being-used'                   => 'Bu kaynak :name :source içinde kullanılıyor.',
            'cannot-change-column'         => ':name değiştirilemez.',
            'default-group-delete'         => 'Varsayılan grup silinemez.',
            'delete-failed'                => ':name silinirken hatayla karşılaşıldı.',
            'last-item-delete'             => 'En az bir :name gerekli.',
            'not-authorized'               => 'Yetkili değil',
            'order-pending-account-delete' => 'Bazı siparişler beklemede veya işlemde olduğundan :name hesabı silinemiyor.',
            'password-mismatch'            => 'Mevcut şifre eşleşmiyor.',
            'root-category-delete'         => 'Kök kategorisi silinemez.',
            'security-warning'             => 'Şüpheli etkinlik bulundu!',
            'something-went-wrong'         => 'Bir şeyler ters gitti!',
            'system-attribute-delete'      => 'Sistem özniteliği silinemez.',

            'mass-operations' => [
                'resource-not-found' => 'Seçildi :name bulunamadı.',
            ],
        ],
    ],
];
