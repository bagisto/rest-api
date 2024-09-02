<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'Bestellung erfolgreich storniert.',

                'error' => [
                    'cancel-error' => 'Bestellung kann nicht storniert werden.',
                ],
            ],

            're-order' => [
                'address-create-success'  => 'Adresse erfolgreich gespeichert',
                'address-not-available'   => 'Es sind keine Versandmethoden verfügbar.',
                'create'                  => 'Artikel erfolgreich in den Warenkorb gelegt',
                'error'                   => 'Etwas ist schiefgegangen!',
                'order-create-success'    => 'Bestellung wurde erfolgreich aufgegeben.',
                'payment-create-success'  => 'Zahlungsmethode erfolgreich gespeichert',
                'shipping-create-success' => 'Versandmethode erfolgreich gespeichert',
            ],

            'invoices' => [
                'create-success' => 'Rechnung wurde erfolgreich hinzugefügt.',

                'error' => [
                    'creation-error'    => 'Erstellen einer Rechnung für diese Bestellung ist nicht erlaubt.',
                    'invalid-qty-error' => 'Ungültige Menge zum Rechnen von Artikel gefunden.',
                    'product-error'     => 'Rechnung kann nicht ohne Produkte erstellt werden.',
                ],
            ],

            'shipments' => [
                'create-success' => 'Versand wurde erfolgreich hinzugefügt.',

                'error' => [
                    'creation-error'    => 'Für diese Bestellung kann kein Versand erstellt werden.',
                    'invalid-qty-error' => 'Ungültige Menge für Versandartikel gefunden.',
                ],
            ],

            'refunds' => [
                'create-success' => 'Rückerstattung wurde erfolgreich hinzugefügt.',

                'error' => [
                    'creation-error'       => 'Für diese Bestellung kann keine Rückerstattung erstellt werden.',
                    'invalid-amount-error' => 'Rückerstattungsbetrag sollte nicht Null sein.',
                    'invalid-qty-error'    => 'Ungültige Menge für rückerstattbare Artikel gefunden.',
                    'limit-error'          => 'Der maximale verfügbare Rückerstattungsbetrag beträgt :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'Diese Rechnung wurde bereits bezahlt.',
                'invoice-missing'            => 'Diese Rechnungs-ID existiert nicht.',
                'transaction-amount-exceeds' => 'Der angegebene Betrag dieser Transaktion übersteigt den Gesamtbetrag der Rechnung.',
                'transaction-saved'          => 'Die Transaktion wurde gespeichert.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'Produkt wurde erfolgreich hinzugefügt.',
                'delete-success' => 'Produkt erfolgreich gelöscht',
                'update-success' => 'Produkt erfolgreich aktualisiert.',

                'inventories' => [
                    'update-success' => 'Inventar erfolgreich aktualisiert.',
                ],

                'mass-operations' => [
                    'delete-success' => 'Ausgewählte Produkte erfolgreich gelöscht.',
                    'update-success' => 'Ausgewählte Produkte erfolgreich aktualisiert.',
                ],

                'error' => [
                    'configurable-error' => 'Bitte wählen Sie mindestens ein konfigurierbares Attribut aus.',
                ],
            ],

            'categories' => [
                'create-success'       => 'Kategorie wurde erfolgreich hinzugefügt.',
                'delete-success'       => 'Kategorie erfolgreich gelöscht',
                'root-category-delete' => 'Die Stammkategorie kann nicht gelöscht werden.',
                'update-success'       => 'Kategorie erfolgreich aktualisiert.',
                'not-exist'            => 'Kategorie nicht gefunden.',

                'mass-operations' => [
                    'delete-success' => 'Ausgewählte Kategorien erfolgreich gelöscht.',
                    'update-success' => 'Ausgewählte Kategorien erfolgreich aktualisiert.',
                ],
            ],

            'attributes' => [
                'create-success' => 'Attribut wurde erfolgreich hinzugefügt.',
                'delete-success' => 'Attribut erfolgreich gelöscht',
                'update-success' => 'Attribut erfolgreich aktualisiert.',

                'error' => [
                    'cannot-change-type'       => 'Feldtyp kann nicht geändert werden',
                    'system-attributes-delete' => 'Systemattribute können nicht gelöscht werden.',

                    'mass-operations' => [
                        'resource-not-found' => 'Ausgewählte Attribute nicht gefunden.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'Familie wurde erfolgreich hinzugefügt.',
                'delete-success' => 'Familie erfolgreich gelöscht',
                'update-success' => 'Familie erfolgreich aktualisiert.',

                'error' => [
                    'being-used'       => 'Diese Ressourcenfamilie wird in :source verwendet.',
                    'can-not-updated'  => 'Code kann nicht aktualisiert werden',
                    'last-item-delete' => 'Mindestens eine Familie ist erforderlich.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'Kunde wurde erfolgreich hinzugefügt.',
                'delete-success' => 'Kunde erfolgreich gelöscht',
                'update-success' => 'Kunde erfolgreich aktualisiert.',

                'mass-operations' => [
                    'delete-success' => 'Ausgewählte Kunden erfolgreich gelöscht.',
                    'update-success' => 'Ausgewählte Kunden erfolgreich aktualisiert.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'Kundenkonto kann nicht gelöscht werden, da einige Bestellungen ausstehen oder sich im Bearbeitungsstatus befinden.',
                ],

                'notes' => [
                    'note-taken' => 'Hinweis aufgenommen.',
                ],
            ],

            'addresses' => [
                'create-success' => 'Adresse wurde erfolgreich hinzugefügt.',
                'delete-success' => 'Adresse erfolgreich gelöscht',
                'update-success' => 'Adresse erfolgreich aktualisiert.',

                'mass-operations' => [
                    'delete-success' => 'Ausgewählte Adressen erfolgreich gelöscht.',
                ],
            ],

            'groups' => [
                'create-success' => 'Kundengruppe wurde erfolgreich hinzugefügt.',
                'delete-success' => 'Kundengruppe erfolgreich gelöscht',
                'update-success' => 'Kundengruppe erfolgreich aktualisiert.',

                'error' => [
                    'being-used'           => 'Diese Ressourcengruppen werden bei Kunden verwendet.',
                    'default-group-delete' => 'Die Standardgruppe kann nicht gelöscht werden.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'Bewertung erfolgreich gelöscht',
                'update-success' => 'Bewertung erfolgreich aktualisiert.',

                'mass-operations' => [
                    'delete-success' => 'Ausgewählte Bewertungen erfolgreich gelöscht.',
                    'update-success' => 'Ausgewählte Bewertungen erfolgreich aktualisiert.',
                ],
            ],

            'news-letter' => [
                'create-success'  => 'Sie haben sich erfolgreich für unseren Newsletter angemeldet.',
                'warning-message' => 'Sie haben sich bereits für unseren Newsletter angemeldet.',
            ],
        ],

        'cms' => [
            'create-success' => 'CMS wurde erfolgreich hinzugefügt.',
            'delete-success' => 'CMS erfolgreich gelöscht',
            'update-success' => 'CMS erfolgreich aktualisiert.',

            'mass-operations' => [
                'delete-success' => 'Ausgewählte Seiten erfolgreich gelöscht.',
            ],

            'error' => [
                'already-taken' => 'Die Seiten wurden bereits übernommen.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'Kampagne wurde erfolgreich hinzugefügt.',
                    'delete-success' => 'Kampagne erfolgreich gelöscht',
                    'update-success' => 'Kampagne erfolgreich aktualisiert.',
                ],

                'events' => [
                    'create-success' => 'Ereignis wurde erfolgreich hinzugefügt.',
                    'delete-success' => 'Ereignis erfolgreich gelöscht',
                    'update-success' => 'Ereignis erfolgreich aktualisiert.',
                ],

                'templates' => [
                    'create-success' => 'E-Mail-Vorlage wurde erfolgreich hinzugefügt.',
                    'delete-success' => 'E-Mail-Vorlage erfolgreich gelöscht',
                    'update-success' => 'E-Mail-Vorlage erfolgreich aktualisiert.',
                ],

                'subscribers' => [
                    'delete-success' => 'Newsletter-Abonnement erfolgreich gelöscht.',
                    'update-failed'  => 'Fehler beim Aktualisieren des Newsletter-Abonnements.',
                    'update-success' => 'Newsletter-Abonnement erfolgreich aktualisiert.',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'Warenkorbregel wurde erfolgreich hinzugefügt.',
                    'delete-success' => 'Warenkorbregel erfolgreich gelöscht',
                    'update-success' => 'Warenkorbregel erfolgreich aktualisiert.',
                ],

                'catalog-rules' => [
                    'create-success' => 'Katalogregel wurde erfolgreich hinzugefügt.',
                    'delete-success' => 'Katalogregel erfolgreich gelöscht',
                    'update-success' => 'Katalogregel erfolgreich aktualisiert.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'Warenkorbregel-Coupon wurde erfolgreich hinzugefügt.',
                    'delete-success' => 'Warenkorbregel-Coupon erfolgreich gelöscht',
                    'update-success' => 'Warenkorbregel-Coupon erfolgreich aktualisiert.',

                    'mass-operations' => [
                        'delete-success' => 'Warenkorbregel-Gutscheine erfolgreich gelöscht'
                    ]
                ],
            ],

            'search-seo' => [
                'url-rewrites' => [
                    'create-success'  => 'URL-Umschreibung wurde erfolgreich hinzugefügt.',
                    'delete-success'  => 'URL-Umschreibung wurde erfolgreich gelöscht.',
                    'update-success'  => 'URL-Umschreibung wurde erfolgreich aktualisiert.',

                    'mass-operations' => [
                        'delete-success' => 'URL-Umschreibung wurde erfolgreich gelöscht.',
                    ],
                ],

                'search-terms' => [
                    'create-success'  => 'Suchbegriffe wurden erfolgreich hinzugefügt.',
                    'delete-success'  => 'Suchbegriffe wurden erfolgreich gelöscht.',
                    'update-success'  => 'Suchbegriffe wurden erfolgreich aktualisiert.',

                    'mass-operations' => [
                        'delete-success' => 'Suchbegriffe wurden erfolgreich gelöscht.',
                    ],
                ],

                'search-synonyms' => [
                    'create-success'  => 'Synonyme wurden erfolgreich hinzugefügt.',
                    'delete-success'  => 'Synonyme wurden erfolgreich gelöscht.',
                    'update-success'  => 'Synonyme wurden erfolgreich aktualisiert.',

                    'mass-operations' => [
                        'delete-success' => 'Synonyme wurden erfolgreich gelöscht.',
                    ],
                ],

                'sitemaps' => [
                    'create-success' => 'Sitemaps wurden erfolgreich erstellt.',
                    'delete-success' => 'Sitemaps wurden erfolgreich gelöscht.',
                    'update-success' => 'Sitemaps wurden erfolgreich aktualisiert.',
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'Standort wurde erfolgreich hinzugefügt.',
                'delete-success' => 'Standort erfolgreich gelöscht',
                'update-success' => 'Standort erfolgreich aktualisiert.',

                'error' => [
                    'last-item-delete' => 'Mindestens ein Standort ist erforderlich.',
                ],
            ],

            'currencies' => [
                'create-success' => 'Währung wurde erfolgreich hinzugefügt.',
                'delete-success' => 'Währung erfolgreich gelöscht',
                'update-success' => 'Währung erfolgreich aktualisiert.',

                'error' => [
                    'last-item-delete' => 'Mindestens eine Währung ist erforderlich.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'Wechselkurs wurde erfolgreich hinzugefügt.',
                'delete-success' => 'Wechselkurs erfolgreich gelöscht',
                'update-success' => 'Wechselkurs erfolgreich aktualisiert.',
            ],

            'inventory-sources' => [
                'create-success'   => 'Bestandsquelle wurde erfolgreich hinzugefügt.',
                'delete-success'   => 'Bestandsquelle erfolgreich gelöscht',
                'update-success'   => 'Bestandsquelle erfolgreich aktualisiert.',

                'error' => [
                    'last-item-delete' => 'Mindestens eine Bestandsquelle ist erforderlich.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'Steuersatz wurde erfolgreich hinzugefügt.',
                    'delete-success' => 'Steuersatz erfolgreich gelöscht',
                    'update-success' => 'Steuersatz erfolgreich aktualisiert.',
                ],

                'tax-categories' => [
                    'create-success' => 'Steuerkategorie wurde erfolgreich hinzugefügt.',
                    'delete-success' => 'Steuerkategorie erfolgreich gelöscht',
                    'error'          => 'Eine oder mehrere Steuersätze existieren nicht.',
                    'update-success' => 'Steuerkategorie erfolgreich aktualisiert.',
                ],
            ],

            'channels' => [
                'create-success' => 'Kanal wurde erfolgreich hinzugefügt.',
                'delete-success' => 'Kanal erfolgreich gelöscht',
                'update-success' => 'Kanal erfolgreich aktualisiert.',

                'error' => [
                    'last-item-delete' => 'Mindestens ein Kanal ist erforderlich.',
                ],
            ],

            'users' => [
                'create-success' => 'Benutzer wurde erfolgreich hinzugefügt.',
                'delete-success' => 'Benutzer erfolgreich gelöscht',
                'update-success' => 'Benutzer erfolgreich aktualisiert.',

                'error' => [
                    'cannot-change-column' => 'Benutzer kann nicht geändert werden.',
                    'last-item-delete'     => 'Mindestens ein Benutzer ist erforderlich.',
                ],
            ],

            'roles' => [
                'create-success' => 'Rolle wurde erfolgreich hinzugefügt.',
                'delete-success' => 'Rolle erfolgreich gelöscht',
                'update-success' => 'Rolle erfolgreich aktualisiert.',

                'error' => [
                    'being-used'       => 'Diese Ressourcenrollen werden im Administrationsbenutzer verwendet.',
                    'last-item-delete' => 'Mindestens eine Rolle ist erforderlich.',
                ],
            ],

            'themes' => [
                'create-success' => 'Thema erfolgreich erstellt',
                'delete-success' => 'Thema erfolgreich gelöscht',
                'update-success' => 'Thema erfolgreich aktualisiert',
            ],
        ],

        'configuration' => [
            'create-success' => 'Konfiguration wurde erfolgreich hinzugefügt.',
            'delete-success' => 'Konfiguration erfolgreich gelöscht',
            'update-success' => 'Konfiguration erfolgreich aktualisiert.',
        ],

        'account' => [
            'create-success'     => 'Konto wurde erfolgreich hinzugefügt.',
            'delete-success'     => 'Konto erfolgreich gelöscht',
            'logged-in-success'  => 'Erfolgreich eingeloggt.',
            'logged-out-success' => 'Erfolgreich ausgeloggt.',
            'update-success'     => 'Konto erfolgreich aktualisiert.',

            'error' => [
                'credential-error'  => 'Die bereitgestellten Anmeldeinformationen sind falsch.',
                'invalid'           => 'Ungültige E-Mail oder Passwort',
                'password-mismatch' => 'Das aktuelle Passwort stimmt nicht überein.',
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'Hoppla! Die Seite, die Sie suchen, ist im Urlaub. Es scheint, dass wir nicht finden konnten, wonach Sie gesucht haben.',
                'title'   => '404 Seite nicht gefunden',
            ],

            '401' => [
                'message' => 'Hoppla! Es sieht so aus, als hätten Sie keine Berechtigung, auf diese Seite zuzugreifen. Es scheint, dass Ihnen die erforderlichen Zugangsdaten fehlen.',
                'title'   => '401 Nicht autorisiert',
            ],

            '403' => [
                'message' => 'Hoppla! Diese Seite ist tabu. Es sieht so aus, als hätten Sie nicht die erforderlichen Berechtigungen, um diesen Inhalt anzuzeigen.',
                'title'   => '403 Verboten',
            ],

            '500' => [
                'message' => 'Hoppla! Etwas ist schiefgelaufen. Es scheint, dass wir Probleme haben, die Seite, nach der Sie suchen, zu laden.',
                'title'   => '500 Interner Serverfehler',
            ],

            '503' => [
                'message' => 'Hoppla! Es sieht so aus, als wären wir vorübergehend wegen Wartungsarbeiten nicht erreichbar. Bitte kommen Sie später wieder vorbei.',
                'title'   => '503 Dienst nicht verfügbar',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'Ihre Adresse wurde erfolgreich erstellt.',
                'delete-success' => 'Ihre Adresse wurde erfolgreich gelöscht.',
                'update-success' => 'Ihre Adresse wurde erfolgreich aktualisiert.',
            ],

            'accounts' => [
                'create-success'     => 'Ihr Konto wurde erfolgreich erstellt.',
                'delete-success'     => 'Ihr Konto wurde erfolgreich gelöscht.',
                'logged-in-success'  => 'Erfolgreich eingeloggt.',
                'logged-out-success' => 'Erfolgreich ausgeloggt.',
                'update-success'     => 'Ihr Konto wurde erfolgreich aktualisiert.',

                'error' => [
                    'credential-error'  => 'Die angegebenen Anmeldedaten sind inkorrekt.',
                    'invalid'           => 'Ungültige E-Mail oder Passwort',
                    'password-mismatch' => 'Das aktuelle Passwort stimmt nicht überein.',
                    'update-failed'     => 'Beim Aktualisieren Ihres Kontos ist ein Fehler aufgetreten',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'Adresse erfolgreich gespeichert.',
            'check-billing-address'   => 'Bitte überprüfen Sie die Rechnungsadresse.',
            'check-shipping-address'  => 'Bitte überprüfen Sie die Versandadresse.',
            'minimum-order-message'   => 'Mindestbestellmenge beträgt :amount.',
            'order-saved'             => 'Bestellung erfolgreich gespeichert',
            'payment-method-saved'    => 'Zahlungsmethode erfolgreich gespeichert.',
            'shipping-method-saved'   => 'Versandmethode erfolgreich gespeichert.',
            'specify-payment-method'  => 'Bitte geben Sie die Zahlungsmethode an.',
            'specify-shipping-method' => 'Bitte geben Sie die Versandmethode an.',

            'cart' => [
                'item' => [
                    'empty'           => 'Ihr Warenkorb ist leer.',
                    'error'           => 'Artikel im Warenkorb nicht gefunden.',
                    'inactive-add'    => 'Inaktiver Artikel kann nicht in den Warenkorb gelegt werden.',
                    'invalid-product' => 'Produkt-ID ist ungültig.',
                    'success'         => 'Artikel wurde erfolgreich zum Warenkorb hinzugefügt.',
                    'success-remove'  => 'Artikel wurde erfolgreich aus dem Warenkorb entfernt.',
                ],

                'quantity' => [
                    'illegal' => 'Die Menge darf nicht weniger als eins sein.',
                    'success' => 'Warenkorbartikel erfolgreich aktualisiert.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Gutscheincode kann nicht angewendet werden.',
                    'invalid'        => 'Gutscheincode ist ungültig.',
                    'success-remove' => 'Gutschein erfolgreich entfernt.',
                    'success'        => 'Gutscheincode erfolgreich angewendet.',
                ],

                'move-wishlist' => [
                    'success' => 'Artikel erfolgreich zur Wunschliste verschoben.',
                ],
            ],
        ],

        'wishlist' => [
            'moved'          => 'Artikel erfolgreich in den Warenkorb verschoben.',
            'option-missing' => 'Produktoptionen fehlen, daher kann der Artikel nicht zur Wunschliste verschoben werden.',
            'removed'        => 'Artikel erfolgreich aus der Wunschliste entfernt',
            'success'        => 'Artikel erfolgreich zur Wunschliste hinzugefügt',

            'error' => [
                'security-warning' => 'Verdächtige Aktivität festgestellt!',

                'mass-operations' => [
                    'resource-not-found' => 'Ausgewähltes Wunschlistenprodukt nicht gefunden.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'Bestellung erfolgreich storniert.',

                'error' => [
                    'cancel-error' => 'Bestellung kann nicht storniert werden.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'Bitte wählen Sie mindestens ein konfigurierbares Attribut aus.',

                'reviews' => [
                    'create-success' => 'Ihre Bewertung wurde erfolgreich eingereicht.',
                ],
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'Hoppla! Die Seite, die Sie suchen, ist im Urlaub. Es scheint, dass wir nicht finden konnten, wonach Sie gesucht haben.',
                'title'   => '404 Seite nicht gefunden',
            ],

            '401' => [
                'message' => 'Hoppla! Es sieht so aus, als hätten Sie keine Berechtigung, auf diese Seite zuzugreifen. Es scheint, dass Ihnen die erforderlichen Zugangsdaten fehlen.',
                'title'   => '401 Nicht autorisiert',
            ],

            '403' => [
                'message' => 'Hoppla! Diese Seite ist tabu. Es sieht so aus, als hätten Sie nicht die erforderlichen Berechtigungen, um diesen Inhalt anzuzeigen.',
                'title'   => '403 Verboten',
            ],

            '500' => [
                'message' => 'Hoppla! Etwas ist schiefgelaufen. Es scheint, dass wir Probleme haben, die Seite, nach der Sie suchen, zu laden.',
                'title'   => '500 Interner Serverfehler',
            ],

            '503' => [
                'message' => 'Hoppla! Es sieht so aus, als wären wir vorübergehend wegen Wartungsarbeiten nicht erreichbar. Bitte kommen Sie später wieder vorbei.',
                'title'   => '503 Dienst nicht verfügbar',
            ],
        ],
    ],
];
