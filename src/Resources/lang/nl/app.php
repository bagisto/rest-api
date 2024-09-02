<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'Bestelling succesvol geannuleerd.',

                'error' => [
                    'cancel-error' => 'Bestelling kan niet geannuleerd worden.',
                ],
            ],

            're-order' => [
                'address-create-success'  => 'Adres succesvol opgeslagen',
                'address-not-available'   => 'Er zijn geen verzendmethoden beschikbaar.',
                'create'                  => 'Artikel succesvol aan winkelwagentje toegevoegd',
                'error'                   => 'Er is iets fout gegaan!',
                'order-create-success'    => 'Bestelling is succesvol geplaatst.',
                'payment-create-success'  => 'Betaalmethode succesvol opgeslagen',
                'shipping-create-success' => 'Verzendmethode succesvol opgeslagen',
            ],

            'invoices' => [
                'create-success' => 'Factuur is succesvol toegevoegd.',

                'error' => [
                    'creation-error'    => 'Factuur creatie is niet toegestaan voor deze bestelling.',
                    'invalid-qty-error' => 'We hebben een ongeldige hoeveelheid gevonden om factuuritems te factureren.',
                    'product-error'     => 'Factuur kan niet worden aangemaakt zonder producten.',
                ],
            ],

            'shipments' => [
                'create-success' => 'Verzending is succesvol toegevoegd.',

                'error' => [
                    'creation-error'    => 'Verzending kan niet worden aangemaakt voor deze bestelling.',
                    'invalid-qty-error' => 'We hebben een ongeldige hoeveelheid gevonden voor verzenditems.',
                ],
            ],

            'refunds' => [
                'create-success' => 'Terugbetaling is succesvol toegevoegd.',

                'error' => [
                    'creation-error'       => 'Terugbetaling kan niet worden aangemaakt voor deze bestelling.',
                    'invalid-amount-error' => 'Terugbetalingsbedrag moet niet nul zijn.',
                    'invalid-qty-error'    => 'We hebben een ongeldige hoeveelheid gevonden voor terugbetalingsitems.',
                    'limit-error'          => 'Het maximale bedrag dat kan worden terugbetaald is :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'Deze factuur is al betaald.',
                'invoice-missing'            => 'Dit factuurnummer bestaat niet.',
                'transaction-amount-exceeds' => 'Het gespecificeerde bedrag van deze transactie overschrijdt het totale bedrag van de factuur.',
                'transaction-saved'          => 'De transactie is opgeslagen.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'Product is succesvol toegevoegd.',
                'delete-success' => 'Product succesvol verwijderd.',
                'update-success' => 'Product succesvol bijgewerkt.',

                'inventories' => [
                    'update-success' => 'Inventaris succesvol bijgewerkt.',
                ],

                'mass-operations' => [
                    'delete-success'  => 'Geselecteerde producten succesvol verwijderd.',
                    'update-success'  => 'Geselecteerde producten succesvol bijgewerkt.',
                ],

                'error' => [
                    'configurable-error' => 'Selecteer minimaal één configureerbare eigenschap.',
                ],
            ],

            'categories' => [
                'create-success'       => 'Categorie is succesvol toegevoegd.',
                'delete-success'       => 'Categorie succesvol verwijderd.',
                'root-category-delete' => 'De rootcategorie kan niet worden verwijderd.',
                'update-success'       => 'Categorie succesvol bijgewerkt.',
                'not-exist'            => 'Categorie niet gevonden.',

                'mass-operations' => [
                    'delete-success'  => 'Geselecteerde categorieën succesvol verwijderd.',
                    'update-success'  => 'Geselecteerde categorieën succesvol bijgewerkt.',
                ],
            ],

            'attributes' => [
                'create-success' => 'Attribuut is succesvol toegevoegd.',
                'delete-success' => 'Attribuut succesvol verwijderd.',
                'update-success' => 'Attribuut succesvol bijgewerkt.',

                'error' => [
                    'system-attributes-delete' => 'Kan de systeemattributen niet verwijderen.',
                    'cannot-change-type'       => 'Kan het typeveld niet wijzigen.',

                    'mass-operations' => [
                        'resource-not-found' => 'Geselecteerde attributen niet gevonden.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'Familie is succesvol toegevoegd.',
                'delete-success' => 'Familie succesvol verwijderd.',
                'update-success' => 'Familie succesvol bijgewerkt.',

                'error' => [
                    'last-item-delete' => 'Er is minimaal één familie vereist.',
                    'can-not-updated'  => 'Kan de code niet bijwerken',
                    'being-used'       => 'Deze resource families wordt gebruikt in :source.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'Klant is succesvol toegevoegd.',
                'delete-success' => 'Klant succesvol verwijderd.',
                'update-success' => 'Klant succesvol bijgewerkt.',

                'mass-operations' => [
                    'delete-success' => 'Geselecteerde klanten succesvol verwijderd.',
                    'update-success' => 'Geselecteerde klanten succesvol bijgewerkt.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'Kan klantaccount niet verwijderen omdat sommige bestellingen in behandeling zijn of in verwerkingsstatus zijn.',
                ],

                'notes' => [
                    'note-taken' => 'Notitie genomen.',
                ],
            ],

            'addresses' => [
                'create-success' => 'Adres is succesvol toegevoegd.',
                'delete-success' => 'Adres succesvol verwijderd.',
                'update-success' => 'Adres succesvol bijgewerkt.',

                'mass-operations' => [
                    'delete-success' => 'Geselecteerde adressen succesvol verwijderd.',
                ],
            ],

            'groups' => [
                'create-success' => 'Klantengroep is succesvol toegevoegd.',
                'delete-success' => 'Klantengroep succesvol verwijderd.',
                'update-success' => 'Klantengroep succesvol bijgewerkt.',

                'error' => [
                    'being-used'           => 'Deze resourcegroepen worden gebruikt in Klanten.',
                    'default-group-delete' => 'Kan de standaardgroep niet verwijderen.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'Recensie succesvol verwijderd.',
                'update-success' => 'Recensie succesvol bijgewerkt.',

                'mass-operations' => [
                    'delete-success' => 'Geselecteerde recensies succesvol verwijderd.',
                    'update-success' => 'Geselecteerde recensies succesvol bijgewerkt.',
                ],
            ],

            'news-letter' => [
                'create-success'  => 'U bent succesvol geabonneerd op onze nieuwsbrief.',
                'warning-message' => 'U bent al geabonneerd op onze nieuwsbrief.',
            ],
        ],

        'cms' => [
            'create-success' => 'CMS is succesvol toegevoegd.',
            'delete-success' => 'CMS succesvol verwijderd.',
            'update-success' => 'CMS succesvol bijgewerkt.',

            'mass-operations' => [
                'delete-success' => 'Geselecteerde pagina\'s succesvol verwijderd.',
            ],

            'error' => [
                'already-taken' => 'De pagina\'s zijn al in gebruik genomen.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'Campagne is succesvol toegevoegd.',
                    'delete-success' => 'Campagne succesvol verwijderd.',
                    'update-success' => 'Campagne succesvol bijgewerkt.',
                ],

                'events' => [
                    'create-success' => 'Evenement is succesvol toegevoegd.',
                    'delete-success' => 'Evenement succesvol verwijderd.',
                    'update-success' => 'Evenement succesvol bijgewerkt.',
                ],

                'templates' => [
                    'create-success' => 'E-mailsjabloon is succesvol toegevoegd.',
                    'delete-success' => 'E-mailsjabloon succesvol verwijderd.',
                    'update-success' => 'E-mailsjabloon succesvol bijgewerkt.',
                ],

                'subscribers' => [
                    'delete-success' => 'Nieuwsbriefabonnement succesvol verwijderd',
                    'update-failed'  => 'Bijwerken van nieuwsbriefabonnement mislukt',
                    'update-success' => 'Nieuwsbriefabonnement succesvol bijgewerkt',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'Winkelwagenregel is succesvol toegevoegd.',
                    'delete-success' => 'Winkelwagenregel succesvol verwijderd.',
                    'update-success' => 'Winkelwagenregel succesvol bijgewerkt.',
                ],

                'catalog-rules' => [
                    'create-success' => 'Catalogusregel is succesvol toegevoegd.',
                    'delete-success' => 'Catalogusregel succesvol verwijderd.',
                    'update-success' => 'Catalogusregel succesvol bijgewerkt.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'Coupon voor winkelwagenregel is succesvol toegevoegd.',
                    'delete-success' => 'Coupon voor winkelwagenregel succesvol verwijderd.',
                    'update-success' => 'Coupon voor winkelwagenregel succesvol bijgewerkt.',

                    'mass-operations' => [
                        'delete-success' => 'Winkelwagenregelcoupons zijn succesvol verwijderd'
                    ]
                ],
            ],

            'search-seo' => [
                'url-rewrites' => [
                    'create-success'  => 'URL-omleiding succesvol toegevoegd.',
                    'delete-success'  => 'URL-omleiding succesvol verwijderd.',
                    'update-success'  => 'URL-omleiding succesvol bijgewerkt.',

                    'mass-operations' => [
                        'delete-success' => 'URL-omleiding succesvol verwijderd.',
                    ],
                ],

                'search-terms' => [
                    'create-success'  => 'Zoektermen succesvol toegevoegd.',
                    'delete-success'  => 'Zoektermen succesvol verwijderd.',
                    'update-success'  => 'Zoektermen succesvol bijgewerkt.',

                    'mass-operations' => [
                        'delete-success' => 'Zoektermen succesvol verwijderd.',
                    ],
                ],

                'search-synonyms' => [
                    'create-success'  => 'Zoeksynoniemen succesvol toegevoegd.',
                    'delete-success'  => 'Zoeksynoniemen succesvol verwijderd.',
                    'update-success'  => 'Zoeksynoniemen succesvol bijgewerkt.',

                    'mass-operations' => [
                        'delete-success' => 'Zoeksynoniemen succesvol verwijderd.',
                    ],
                ],

                'sitemaps' => [
                    'create-success' => 'Sitemaps succesvol aangemaakt.',
                    'delete-success' => 'Sitemaps succesvol verwijderd.',
                    'update-success' => 'Sitemaps succesvol bijgewerkt.',
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'Locatie is succesvol toegevoegd.',
                'delete-success' => 'Locatie succesvol verwijderd.',
                'update-success' => 'Locatie succesvol bijgewerkt.',

                'error' => [
                    'last-item-delete' => 'Er is minimaal één locatie vereist.',
                ],
            ],

            'currencies' => [
                'create-success' => 'Valuta is succesvol toegevoegd.',
                'delete-success' => 'Valuta succesvol verwijderd.',
                'update-success' => 'Valuta succesvol bijgewerkt.',

                'error' => [
                    'last-item-delete' => 'Er is minimaal één valuta vereist.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'Wisselkoers is succesvol toegevoegd.',
                'delete-success' => 'Wisselkoers succesvol verwijderd.',
                'update-success' => 'Wisselkoers succesvol bijgewerkt.',
            ],

            'inventory-sources' => [
                'create-success'   => 'Voorraadbron is succesvol toegevoegd.',
                'delete-success'   => 'Voorraadbron succesvol verwijderd.',
                'update-success'   => 'Voorraadbron succesvol bijgewerkt.',

                'error' => [
                    'last-item-delete' => 'Er is minimaal één voorraadbron vereist.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'Belastingtarief is succesvol toegevoegd.',
                    'delete-success' => 'Belastingtarief succesvol verwijderd.',
                    'update-success' => 'Belastingtarief succesvol bijgewerkt.',
                ],

                'tax-categories' => [
                    'create-success' => 'Belastingcategorie is succesvol toegevoegd.',
                    'delete-success' => 'Belastingcategorie succesvol verwijderd.',
                    'error'          => 'Een of meer belastingtarieven bestaan niet.',
                    'update-success' => 'Belastingcategorie succesvol bijgewerkt.',
                ],
            ],

            'channels' => [
                'create-success' => 'Kanaal is succesvol toegevoegd.',
                'delete-success' => 'Kanaal succesvol verwijderd.',
                'update-success' => 'Kanaal succesvol bijgewerkt.',

                'error' => [
                    'last-item-delete' => 'Er is minimaal één kanaal vereist.',
                ],
            ],

            'users' => [
                'create-success' => 'Gebruiker is succesvol toegevoegd.',
                'delete-success' => 'Gebruiker succesvol verwijderd.',
                'update-success' => 'Gebruiker succesvol bijgewerkt.',

                'error' => [
                    'cannot-change-column' => 'Kan de gebruikerskolom niet wijzigen.',
                    'last-item-delete'     => 'Er is minimaal één gebruiker vereist.',
                ],
            ],

            'roles' => [
                'create-success' => 'Rol is succesvol toegevoegd.',
                'delete-success' => 'Rol succesvol verwijderd.',
                'update-success' => 'Rol succesvol bijgewerkt.',

                'error' => [
                    'being-used'       => 'Deze resource rollen worden gebruikt in admin-gebruiker.',
                    'last-item-delete' => 'Er is minimaal één rol vereist.',
                ],
            ],

            'themes' => [
                'create-success' => 'Thema succesvol aangemaakt',
                'delete-success' => 'Thema succesvol verwijderd',
                'update-success' => 'Thema succesvol bijgewerkt',
            ],
        ],

        'configuration' => [
            'create-success' => 'Configuratie is succesvol toegevoegd.',
            'delete-success' => 'Configuratie succesvol verwijderd.',
            'update-success' => 'Configuratie succesvol bijgewerkt.',
        ],

        'account' => [
            'create-success'     => 'Account is succesvol toegevoegd.',
            'delete-success'     => 'Account succesvol verwijderd.',
            'logged-in-success'  => 'Succesvol ingelogd.',
            'logged-out-success' => 'Succesvol uitgelogd.',
            'update-success'     => 'Account succesvol bijgewerkt.',

            'error' => [
                'credential-error'  => 'De verstrekte inloggegevens zijn onjuist.',
                'invalid'           => 'Ongeldig e-mailadres of wachtwoord.',
                'password-mismatch' => 'Huidig wachtwoord komt niet overeen.',
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'Oeps! De pagina die je zoekt, is met vakantie. Het lijkt erop dat we niet hebben gevonden wat je zocht.',
                'title'   => '404 Pagina niet gevonden',
            ],

            '401' => [
                'message' => 'Oeps! Het lijkt erop dat je geen toegang hebt tot deze pagina. Het lijkt erop dat je de benodigde referenties mist.',
                'title'   => '401 Onbevoegd',
            ],

            '403' => [
                'message' => 'Oeps! Deze pagina is verboden terrein. Het lijkt erop dat je niet over de vereiste rechten beschikt om deze inhoud te bekijken.',
                'title'   => '403 Verboden',
            ],

            '500' => [
                'message' => 'Oeps! Er is iets misgegaan. Het lijkt erop dat we problemen hebben met het laden van de pagina die je zoekt.',
                'title'   => '500 Interne serverfout',
            ],

            '503' => [
                'message' => 'Oeps! Het lijkt erop dat we tijdelijk offline zijn voor onderhoud. Kom later terug.',
                'title'   => '503 Service Niet Beschikbaar',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'Uw adres is succesvol aangemaakt.',
                'delete-success' => 'Uw adres is succesvol verwijderd.',
                'update-success' => 'Uw adres is succesvol bijgewerkt.',
            ],

            'accounts' => [
                'create-success'     => 'Uw account is succesvol aangemaakt.',
                'delete-success'     => 'Uw account is succesvol verwijderd.',
                'logged-in-success'  => 'Succesvol ingelogd.',
                'logged-out-success' => 'Succesvol uitgelogd.',
                'update-success'     => 'Uw account is succesvol bijgewerkt.',

                'error' => [
                    'credential-error'  => 'De verstrekte inloggegevens zijn onjuist.',
                    'invalid'           => 'Ongeldig e-mailadres of wachtwoord',
                    'password-mismatch' => 'Het huidige wachtwoord komt niet overeen.',
                    'update-failed'     => 'Er is een fout opgetreden bij het bijwerken van uw account',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'Adres succesvol opgeslagen.',
            'check-billing-address'   => 'Controleer het factuuradres.',
            'check-shipping-address'  => 'Controleer het verzendadres.',
            'minimum-order-message'   => 'Minimale bestelhoeveelheid is :amount.',
            'order-saved'             => 'Bestelling succesvol opgeslagen.',
            'payment-method-saved'    => 'Betaalmethode succesvol opgeslagen.',
            'shipping-method-saved'   => 'Verzendmethode succesvol opgeslagen.',
            'specify-payment-method'  => 'Specificeer alstublieft de betaalmethode.',
            'specify-shipping-method' => 'Specificeer alstublieft de verzendmethode.',

            'cart' => [
                'item' => [
                    'empty'           => 'Je winkelwagentje is leeg.',
                    'error'           => 'Artikeltje in het winkelwagentje niet gevonden.',
                    'inactive-add'    => 'Inactief item kan niet aan de winkelwagen worden toegevoegd.',
                    'invalid-product' => 'Product-ID is ongeldig.',
                    'success'         => 'Item is succesvol toegevoegd aan winkelwagen.',
                    'success-remove'  => 'Item is succesvol verwijderd uit de winkelwagen.',
                ],

                'quantity' => [
                    'illegal' => 'Aantal kan niet minder zijn dan één.',
                    'success' => 'Winkelwagen item(s) succesvol bijgewerkt.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Couponcode kan niet worden toegepast.',
                    'invalid'        => 'Couponcode is ongeldig.',
                    'success-remove' => 'Coupon succesvol verwijderd.',
                    'success'        => 'Couponcode succesvol toegepast.',
                ],

                'move-wishlist' => [
                    'success' => 'Item succesvol verplaatst naar verlanglijstje.',
                ],
            ],
        ],

        'wishlist' => [
            'moved'          => 'Item succesvol verplaatst naar winkelwagen.',
            'option-missing' => 'Productopties ontbreken, dus item kan niet naar het verlanglijstje worden verplaatst.',
            'removed'        => 'Item succesvol verwijderd uit verlanglijstje.',
            'success'        => 'Item succesvol toegevoegd aan verlanglijstje.',

            'error' => [
                'security-warning' => 'Verdachte activiteit gevonden!',

                'mass-operations' => [
                    'resource-not-found' => 'Geselecteerd product in verlanglijstje niet gevonden.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'Bestelling succesvol geannuleerd.',

                'error' => [
                    'cancel-error' => 'Bestelling kan niet worden geannuleerd.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'Selecteer alstublieft minimaal één configureerbaar attribuut.',

                'reviews' => [
                    'create-success' => 'Uw beoordeling is succesvol ingediend.',
                ],
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'Oeps! De pagina die je zoekt, is met vakantie. Het lijkt erop dat we niet hebben gevonden wat je zocht.',
                'title'   => '404 Pagina niet gevonden',
            ],

            '401' => [
                'message' => 'Oeps! Het lijkt erop dat je geen toegang hebt tot deze pagina. Het lijkt erop dat je de benodigde referenties mist.',
                'title'   => '401 Onbevoegd',
            ],

            '403' => [
                'message' => 'Oeps! Deze pagina is verboden terrein. Het lijkt erop dat je niet over de vereiste rechten beschikt om deze inhoud te bekijken.',
                'title'   => '403 Verboden',
            ],

            '500' => [
                'message' => 'Oeps! Er is iets misgegaan. Het lijkt erop dat we problemen hebben met het laden van de pagina die je zoekt.',
                'title'   => '500 Interne serverfout',
            ],

            '503' => [
                'message' => 'Oeps! Het lijkt erop dat we tijdelijk offline zijn voor onderhoud. Kom later terug.',
                'title'   => '503 Service Niet Beschikbaar',
            ],
        ],
    ],
];
