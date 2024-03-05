<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'Zamówienie zostało pomyślnie anulowane.',

                'error' => [
                    'cancel-error' => 'Nie można anulować zamówienia.',
                ],
            ],

            'invoices' => [
                'create-success' => 'Faktura została pomyślnie dodana.',

                'error' => [
                    'creation-error'    => 'Nie można tworzyć faktury dla tego zamówienia.',
                    'invalid-qty-error' => 'Znaleziono nieprawidłową ilość produktów do wystawienia faktury.',
                    'product-error'     => 'Nie można utworzyć faktury bez produktów.',
                ],
            ],

            'shipments' => [
                'create-success' => 'Wysyłka została pomyślnie dodana.',

                'error' => [
                    'creation-error'    => 'Nie można utworzyć przesyłki dla tego zamówienia.',
                    'invalid-qty-error' => 'Znaleziono nieprawidłową ilość produktów do wysyłki.',
                ],
            ],

            'refunds' => [
                'create-success' => 'Zwrot został pomyślnie dodany.',

                'error' => [
                    'creation-error'       => 'Nie można utworzyć zwrotu dla tego zamówienia.',
                    'invalid-amount-error' => 'Kwota zwrotu powinna być różna od zera.',
                    'invalid-qty-error'    => 'Znaleziono nieprawidłową ilość produktów do zwrotu.',
                    'limit-error'          => 'Największa dostępna kwota do zwrotu to :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'Ta faktura została już opłacona.',
                'invoice-missing'            => 'Ten identyfikator faktury nie istnieje.',
                'transaction-amount-exceeds' => 'Określona kwota tej transakcji przekracza całkowitą kwotę faktury.',
                'transaction-saved'          => 'Transakcja została zapisana.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'Produkt został pomyślnie dodany.',
                'delete-success' => 'Produkt pomyślnie usunięty.',
                'update-success' => 'Produkt został pomyślnie zaktualizowany.',

                'inventories' => [
                    'update-success' => 'Stan magazynowy został pomyślnie zaktualizowany.',
                ],

                'mass-operations' => [
                    'delete-success'  => 'Wybrane produkty pomyślnie usunięte.',
                    'update-success'  => 'Wybrane produkty pomyślnie zaktualizowane.',
                ],

                'error' => [
                    'configurable-error' => 'Proszę wybrać co najmniej jeden atrybut konfigurowalny.',
                ],
            ],

            'categories' => [
                'create-success' => 'Kategoria została pomyślnie dodana.',
                'delete-success' => 'Kategoria pomyślnie usunięta.',
                'update-success' => 'Kategoria została pomyślnie zaktualizowana.',

                'mass-operations' => [
                    'delete-success'  => 'Wybrane kategorie pomyślnie usunięte.',
                    'update-success'  => 'Wybrane kategorie pomyślnie zaktualizowane.',
                ],
            ],

            'attributes' => [
                'create-success' => 'Atrybut został pomyślnie dodany.',
                'delete-success' => 'Atrybut pomyślnie usunięty.',
                'update-success' => 'Atrybut został pomyślnie zaktualizowany.',

                'error' => [
                    'system-attributes-delete' => 'Nie można usunąć atrybutów systemowych.',
                    'cannot-change-type'       => 'Nie można zmienić pola typu.',

                    'mass-operations' => [
                        'resource-not-found' => 'Wybrane atrybuty nie znalezione.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'Grupa została pomyślnie dodana.',
                'delete-success' => 'Grupa pomyślnie usunięta.',
                'update-success' => 'Grupa została pomyślnie zaktualizowana.',

                'error' => [
                    'last-item-delete' => 'Wymagana jest co najmniej jedna grupa.',
                    'being-used'       => 'Ta grupa zasobów jest używana w: :source.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'Klient został pomyślnie dodany.',
                'delete-success' => 'Klient pomyślnie usunięty.',
                'update-success' => 'Klient został pomyślnie zaktualizowany.',

                'mass-operations' => [
                    'delete-success' => 'Wybrani klienci pomyślnie usunięci.',
                    'update-success' => 'Wybrani klienci pomyślnie zaktualizowani.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'Nie można usunąć konta klienta, ponieważ niektóre zamówienia są oczekujące lub w stanie przetwarzania.',
                ],

                'notes' => [
                    'note-taken' => 'Notatka zapisana.',
                ],
            ],

            'addresses' => [
                'create-success' => 'Adres został pomyślnie dodany.',
                'delete-success' => 'Adres pomyślnie usunięty.',
                'update-success' => 'Adres został pomyślnie zaktualizowany.',

                'mass-operations' => [
                    'delete-success' => 'Wybrane adresy pomyślnie usunięte.',
                ],
            ],

            'groups' => [
                'create-success' => 'Grupa klientów została pomyślnie dodana.',
                'delete-success' => 'Grupa klientów pomyślnie usunięta.',
                'update-success' => 'Grupa klientów została pomyślnie zaktualizowana.',

                'error' => [
                    'being-used'           => 'Ta grupa zasobów jest używana w Klientach.',
                    'default-group-delete' => 'Nie można usunąć domyślnej grupy.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'Recenzja pomyślnie usunięta.',
                'update-success' => 'Recenzja pomyślnie zaktualizowana.',

                'mass-operations' => [
                    'delete-success' => 'Wybrane recenzje pomyślnie usunięte.',
                    'update-success' => 'Wybrane recenzje pomyślnie zaktualizowane.',
                ],
            ],
        ],

        'cms' => [
            'create-success' => 'Strona CMS została pomyślnie dodana.',
            'delete-success' => 'Strona CMS pomyślnie usunięta.',
            'update-success' => 'Strona CMS została pomyślnie zaktualizowana.',

            'mass-operations' => [
                'delete-success' => 'Wybrane strony pomyślnie usunięte.',
            ],

            'error' => [
                'already-taken' => 'Strona już została zajęta.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'Kampania została pomyślnie dodana.',
                    'delete-success' => 'Kampania pomyślnie usunięta.',
                    'update-success' => 'Kampania została pomyślnie zaktualizowana.',
                ],

                'events' => [
                    'create-success' => 'Wydarzenie zostało pomyślnie dodane.',
                    'delete-success' => 'Wydarzenie pomyślnie usunięte.',
                    'update-success' => 'Wydarzenie zostało pomyślnie zaktualizowane.',
                ],

                'templates' => [
                    'create-success' => 'Szablon e-mail został pomyślnie dodany.',
                    'delete-success' => 'Szablon e-mail pomyślnie usunięty.',
                    'update-success' => 'Szablon e-mail został pomyślnie zaktualizowany.',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'Reguła koszyka została pomyślnie dodana.',
                    'delete-success' => 'Reguła koszyka pomyślnie usunięta.',
                    'update-success' => 'Reguła koszyka została pomyślnie zaktualizowana.',
                ],

                'catalog-rules' => [
                    'create-success' => 'Reguła katalogu została pomyślnie dodana.',
                    'delete-success' => 'Reguła katalogu pomyślnie usunięta.',
                    'update-success' => 'Reguła katalogu została pomyślnie zaktualizowana.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'Kupon reguły koszyka został pomyślnie dodany.',
                    'delete-success' => 'Kupon reguły koszyka pomyślnie usunięty.',
                    'update-success' => 'Kupon reguły koszyka został pomyślnie zaktualizowany.',

                    'mass-operations' => [
                        'delete-success' => 'Wybrane strony pomyślnie usunięte.',
                    ],
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'Ustawienia regionalne zostały pomyślnie dodane.',
                'delete-success' => 'Ustawienia regionalne pomyślnie usunięte.',
                'update-success' => 'Ustawienia regionalne zostały pomyślnie zaktualizowane.',

                'error' => [
                    'last-item-delete' => 'Wymagane jest co najmniej jedno ustawienie regionalne.',
                ],
            ],

            'currencies' => [
                'create-success' => 'Waluta została pomyślnie dodana.',
                'delete-success' => 'Waluta pomyślnie usunięta.',
                'update-success' => 'Waluta została pomyślnie zaktualizowana.',

                'error' => [
                    'last-item-delete' => 'Wymagana jest co najmniej jedna waluta.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'Kurs wymiany został pomyślnie dodany.',
                'delete-success' => 'Kurs wymiany pomyślnie usunięty.',
                'update-success' => 'Kurs wymiany został pomyślnie zaktualizowany.',
            ],

            'inventory-sources' => [
                'create-success'   => 'Źródło inwentarza zostało pomyślnie dodane.',
                'delete-success'   => 'Źródło inwentarza pomyślnie usunięte.',
                'update-success'   => 'Źródło inwentarza zostało pomyślnie zaktualizowane.',

                'error' => [
                    'last-item-delete' => 'Wymagane jest co najmniej jedno źródło inwentarza.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'Stawka podatkowa została pomyślnie dodana.',
                    'delete-success' => 'Stawka podatkowa pomyślnie usunięta.',
                    'update-success' => 'Stawka podatkowa została pomyślnie zaktualizowana.',
                ],

                'tax-categories' => [
                    'create-success' => 'Kategoria podatkowa została pomyślnie dodana.',
                    'delete-success' => 'Kategoria podatkowa pomyślnie usunięta.',
                    'update-success' => 'Kategoria podatkowa została pomyślnie zaktualizowana.',
                ],
            ],

            'channels' => [
                'create-success' => 'Kanał został pomyślnie dodany.',
                'delete-success' => 'Kanał pomyślnie usunięty.',
                'update-success' => 'Kanał został pomyślnie zaktualizowany.',

                'error' => [
                    'last-item-delete' => 'Wymagany jest co najmniej jeden kanał.',
                ],
            ],

            'users' => [
                'create-success' => 'Użytkownik został pomyślnie dodany.',
                'delete-success' => 'Użytkownik pomyślnie usunięty.',
                'update-success' => 'Użytkownik został pomyślnie zaktualizowany.',

                'error' => [
                    'cannot-change-column' => 'Nie można zmieniać użytkowników.',
                    'last-item-delete'     => 'Wymagany jest co najmniej jeden użytkownik.',
                ],
            ],

            'roles' => [
                'create-success' => 'Rola została pomyślnie dodana.',
                'delete-success' => 'Rola pomyślnie usunięta.',
                'update-success' => 'Rola została pomyślnie zaktualizowana.',

                'error' => [
                    'being-used'       => 'Ten zasób ról jest używany w użytkowniku admin.',
                    'last-item-delete' => 'Wymagana jest co najmniej jedna rola.',
                ],
            ],

            'themes' => [
                'create-success' => 'Temat został pomyślnie utworzony',
                'delete-success' => 'Temat został pomyślnie usunięty',
                'update-success' => 'Temat został pomyślnie zaktualizowany',
            ],
        ],

        'configuration' => [
            'create-success' => 'Konfiguracja została pomyślnie dodana.',
            'delete-success' => 'Konfiguracja pomyślnie usunięta.',
            'update-success' => 'Konfiguracja została pomyślnie zaktualizowana.',
        ],

        'account' => [
            'create-success'     => 'Konto zostało pomyślnie dodane.',
            'delete-success'     => 'Konto pomyślnie usunięte.',
            'logged-in-success'  => 'Zalogowano pomyślnie.',
            'logged-out-success' => 'Wylogowano pomyślnie.',
            'update-success'     => 'Konto zostało pomyślnie zaktualizowane.',

            'error' => [
                'credential-error'  => 'Podane dane uwierzytelniające są nieprawidłowe.',
                'invalid'           => 'Nieprawidłowy adres e-mail lub hasło',
                'password-mismatch' => 'Aktualne hasło nie pasuje.',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'Twój adres został pomyślnie dodany.',
                'delete-success' => 'Twój adres został pomyślnie usunięty.',
                'update-success' => 'Twój adres został pomyślnie zaktualizowany.',
            ],

            'accounts' => [
                'create-success'     => 'Twoje konto zostało pomyślnie utworzone.',
                'delete-success'     => 'Twoje konto zostało pomyślnie usunięte.',
                'update-success'     => 'Twoje konto zostało pomyślnie zaktualizowane.',
                'logged-in-success'  => 'Zalogowano pomyślnie.',
                'logged-out-success' => 'Wylogowano pomyślnie.',

                'error' => [
                    'invalid'          => 'Nieprawidłowy adres email lub hasło.',
                    'credential-error' => 'Podane dane uwierzytelniające są niepoprawne.',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'Adres zapisano pomyślnie.',
            'check-billing-address'   => 'Proszę sprawdzić adres rozliczeniowy.',
            'check-shipping-address'  => 'Proszę sprawdzić adres dostawy.',
            'minimum-order-message'   => 'Minimalna kwota zamówienia to :amount.',
            'order-saved'             => 'Zamówienie zapisane pomyślnie.',
            'payment-method-saved'    => 'Metoda płatności zapisana pomyślnie.',
            'shipping-method-saved'   => 'Metoda dostawy zapisana pomyślnie.',
            'specify-payment-method'  => 'Proszę określić metodę płatności.',
            'specify-shipping-method' => 'Proszę określić metodę dostawy.',

            'cart' => [
                'item' => [
                    'success'        => 'Produkt został pomyślnie dodany do koszyka.',
                    'success-remove' => 'Produkt został pomyślnie usunięty z koszyka.',
                ],

                'quantity' => [
                    'illegal' => 'Ilość nie może być mniejsza niż jeden.',
                    'success' => 'Produkt(y) w koszyku pomyślnie zaktualizowane.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Kod kuponu nie może zostać zastosowany.',
                    'invalid'        => 'Kod kuponu jest nieprawidłowy.',
                    'success'        => 'Kod kuponu został pomyślnie zastosowany.',
                    'success-remove' => 'Kupon został pomyślnie usunięty.',
                ],

                'move-wishlist' => [
                    'success' => 'Produkt przeniesiony do listy życzeń pomyślnie.',
                ],
            ],
        ],

        'wishlist' => [
            'success'        => 'Produkt pomyślnie dodany do listy życzeń.',
            'removed'        => 'Produkt pomyślnie usunięty z listy życzeń.',
            'moved'          => 'Produkt pomyślnie przeniesiony do koszyka.',
            'option-missing' => 'Opcje produktu są brakujące, więc produkt nie może zostać przeniesiony do listy życzeń.',

            'error' => [
                'security-warning' => 'Wykryto podejrzaną aktywność!',

                'mass-operations' => [
                    'resource-not-found' => 'Wybrany produkt z listy życzeń nie został znaleziony.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'Zamówienie zostało pomyślnie anulowane.',

                'error' => [
                    'cancel-error' => 'Zamówienie nie może być anulowane.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'Proszę wybrać co najmniej jedną konfigurowalną cechę.',

                'reviews' => [
                    'create-success' => 'Twoja recenzja została pomyślnie przesłana.',
                ],
            ],
        ],
    ],
];
