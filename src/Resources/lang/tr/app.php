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
            'something-went-wrong'         => 'Bir şeyler ters gitti!',
            'system-attribute-delete'      => 'Sistem özniteliği silinemez.',
        ],
    ],
];
