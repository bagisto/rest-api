<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'Ordine annullato con successo.',

                'error' => [
                    'cancel-error' => 'Impossibile annullare l\'ordine.',
                ],
            ],

            're-order' => [
                'address-create-success'  => 'Indirizzo salvato con successo',
                'address-not-available'   => 'Nessun metodo di spedizione disponibile.',
                'create'                  => 'Articolo aggiunto con successo al carrello',
                'error'                   => 'Qualcosa è andato storto!',
                'order-create-success'    => 'Ordine effettuato con successo.',
                'payment-create-success'  => 'Metodo di pagamento salvato con successo',
                'shipping-create-success' => 'Metodo di spedizione salvato con successo',
            ],

            'invoices' => [
                'create-success' => 'Fattura aggiunta con successo.',

                'error' => [
                    'creation-error'    => 'La creazione della fattura dell\'ordine non è consentita.',
                    'invalid-qty-error' => 'Abbiamo trovato una quantità non valida per le voci della fattura.',
                    'product-error'     => 'La fattura non può essere creata senza prodotti.',
                ],
            ],

            'shipments' => [
                'create-success' => 'Spedizione aggiunta con successo.',

                'error' => [
                    'creation-error'    => 'Impossibile creare la spedizione per questo ordine.',
                    'invalid-qty-error' => 'Abbiamo trovato una quantità non valida per gli articoli della spedizione.',
                ],
            ],

            'refunds' => [
                'create-success' => 'Rimborso aggiunto con successo.',

                'error' => [
                    'creation-error'       => 'Impossibile creare il rimborso per questo ordine.',
                    'invalid-amount-error' => 'L\'importo del rimborso deve essere diverso da zero.',
                    'invalid-qty-error'    => 'Abbiamo trovato una quantità non valida per gli articoli del rimborso.',
                    'limit-error'          => 'Il massimo denaro disponibile per il rimborso è :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'Questa fattura è già stata pagata.',
                'invoice-missing'            => 'Questo ID fattura non esiste.',
                'transaction-amount-exceeds' => 'L\'importo specificato di questa transazione supera l\'importo totale della fattura.',
                'transaction-saved'          => 'La transazione è stata salvata.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'Prodotto aggiunto con successo.',
                'delete-success' => 'Prodotto eliminato con successo.',
                'update-success' => 'Prodotto aggiornato con successo.',

                'inventories' => [
                    'update-success' => 'Inventario aggiornato con successo.',
                ],

                'mass-operations' => [
                    'delete-success' => 'Prodotti selezionati eliminati con successo.',
                    'update-success' => 'Prodotti selezionati aggiornati con successo.',
                ],

                'error' => [
                    'configurable-error' => 'Seleziona almeno un attributo configurabile.',
                ],
            ],

            'categories' => [
                'create-success'       => 'Categoria aggiunta con successo.',
                'delete-success'       => 'Categoria eliminata con successo.',
                'root-category-delete' => 'La categoria radice non può essere eliminata.',
                'update-success'       => 'Categoria aggiornata con successo.',
                'not-exist'            => 'Categoria non trovata.',

                'mass-operations' => [
                    'delete-success' => 'Categorie selezionate eliminate con successo.',
                    'update-success' => 'Categorie selezionate aggiornate con successo.',
                ],
            ],

            'attributes' => [
                'create-success' => 'Attributo aggiunto con successo.',
                'delete-success' => 'Attributo eliminato con successo.',
                'update-success' => 'Attributo aggiornato con successo.',

                'error' => [
                    'cannot-change-type'       => 'Impossibile cambiare il campo di tipo.',
                    'system-attributes-delete' => 'Impossibile eliminare gli attributi di sistema.',

                    'mass-operations' => [
                        'resource-not-found' => 'Attributi selezionati non trovati.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'Famiglia aggiunta con successo.',
                'delete-success' => 'Famiglia eliminata con successo.',
                'update-success' => 'Famiglia aggiornata con successo.',

                'error' => [
                    'being-used'       => 'Questa famiglia di risorse è utilizzata in :source.',
                    'can-not-updated'  => 'Impossibile aggiornare il codice',
                    'last-item-delete' => 'È richiesta almeno una famiglia.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'Cliente aggiunto con successo.',
                'delete-success' => 'Cliente eliminato con successo.',
                'update-success' => 'Cliente aggiornato con successo.',

                'mass-operations' => [
                    'delete-success' => 'Clienti selezionati eliminati con successo.',
                    'update-success' => 'Clienti selezionati aggiornati con successo.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'Impossibile eliminare l\'account dei clienti perché alcuni ordini sono in sospeso o nello stato di elaborazione.',
                ],

                'notes' => [
                    'note-taken' => 'Nota presa.',
                ],
            ],

            'addresses' => [
                'create-success' => 'Indirizzo aggiunto con successo.',
                'delete-success' => 'Indirizzo eliminato con successo.',
                'update-success' => 'Indirizzo aggiornato con successo.',

                'mass-operations' => [
                    'delete-success' => 'Indirizzi selezionati eliminati con successo.',
                ],
            ],

            'groups' => [
                'create-success' => 'Gruppo clienti aggiunto con successo.',
                'delete-success' => 'Gruppo clienti eliminato con successo.',
                'update-success' => 'Gruppo clienti aggiornato con successo.',

                'error' => [
                    'being-used'           => 'Questo gruppo di risorse è utilizzato in Clienti.',
                    'default-group-delete' => 'Impossibile eliminare il gruppo predefinito.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'Recensione eliminata con successo.',
                'update-success' => 'Recensione aggiornata con successo.',

                'mass-operations' => [
                    'delete-success' => 'Recensioni selezionate eliminate con successo.',
                    'update-success' => 'Recensioni selezionate aggiornate con successo.',
                ],
            ],

            'news-letter' => [
                'create-success'  => 'Ti sei iscritto con successo alla nostra newsletter.',
                'warning-message' => 'Sei già iscritto alla nostra newsletter.',
            ],
        ],

        'cms' => [
            'create-success' => 'CMS aggiunto con successo.',
            'delete-success' => 'CMS eliminato con successo.',
            'update-success' => 'CMS aggiornato con successo.',

            'mass-operations' => [
                'delete-success' => 'Pagine selezionate eliminate con successo.',
            ],

            'error' => [
                'already-taken' => 'Le pagine sono già state prese.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'Campagna aggiunta con successo.',
                    'delete-success' => 'Campagna eliminata con successo.',
                    'update-success' => 'Campagna aggiornata con successo.',
                ],

                'events' => [
                    'create-success' => 'Evento aggiunto con successo.',
                    'delete-success' => 'Evento eliminato con successo.',
                    'update-success' => 'Evento aggiornato con successo.',
                ],

                'templates' => [
                    'create-success' => 'Modello di email aggiunto con successo.',
                    'delete-success' => 'Modello di email eliminato con successo.',
                    'update-success' => 'Modello di email aggiornato con successo.',
                ],

                'subscribers' => [
                    'delete-success' => 'Abbonamento alla newsletter eliminato con successo',
                    'update-failed'  => 'Aggiornamento dell\'abbonamento alla newsletter fallito',
                    'update-success' => 'Abbonamento alla newsletter aggiornato con successo',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'Regola del carrello aggiunta con successo.',
                    'delete-success' => 'Regola del carrello eliminata con successo.',
                    'update-success' => 'Regola del carrello aggiornata con successo.',
                ],

                'catalog-rules' => [
                    'create-success' => 'Regola del catalogo aggiunta con successo.',
                    'delete-success' => 'Regola del catalogo eliminata con successo.',
                    'update-success' => 'Regola del catalogo aggiornata con successo.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'Coupon della regola del carrello aggiunto con successo.',
                    'delete-success' => 'Coupon della regola del carrello eliminato con successo.',
                    'update-success' => 'Coupon della regola del carrello aggiornato con successo.',

                    'mass-operations' => [
                        'delete-success' => 'Coupon delle regole del carrello eliminati con successo'
                    ]
                ],
            ],

            'search-seo' => [
                'url-rewrites' => [
                    'create-success'  => 'Riscrittura URL aggiunta con successo.',
                    'delete-success'  => 'Riscrittura URL eliminata con successo.',
                    'update-success'  => 'Riscrittura URL aggiornata con successo.',

                    'mass-operations' => [
                        'delete-success' => 'Riscrittura URL eliminata con successo.',
                    ],
                ],

                'search-terms' => [
                    'create-success'  => 'Termini di ricerca aggiunti con successo.',
                    'delete-success'  => 'Termini di ricerca eliminati con successo.',
                    'update-success'  => 'Termini di ricerca aggiornati con successo.',

                    'mass-operations' => [
                        'delete-success' => 'Termini di ricerca eliminati con successo.',
                    ],
                ],

                'search-synonyms' => [
                    'create-success'  => 'Sinonimi di ricerca aggiunti con successo.',
                    'delete-success'  => 'Sinonimi di ricerca eliminati con successo.',
                    'update-success'  => 'Sinonimi di ricerca aggiornati con successo.',

                    'mass-operations' => [
                        'delete-success' => 'Sinonimi di ricerca eliminati con successo.',
                    ],
                ],

                'sitemaps' => [
                    'create-success' => 'Le sitemap sono state create con successo.',
                    'delete-success' => 'Le sitemap sono state eliminate con successo.',
                    'update-success' => 'Le sitemap sono state aggiornate con successo.',
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'Località aggiunta con successo.',
                'delete-success' => 'Località eliminata con successo.',
                'update-success' => 'Località aggiornata con successo.',

                'error' => [
                    'last-item-delete' => 'È richiesta almeno una località.',
                ],
            ],

            'currencies' => [
                'create-success' => 'Valuta aggiunta con successo.',
                'delete-success' => 'Valuta eliminata con successo.',
                'update-success' => 'Valuta aggiornata con successo.',

                'error' => [
                    'last-item-delete' => 'È richiesta almeno una valuta.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'Tasso di cambio aggiunto con successo.',
                'delete-success' => 'Tasso di cambio eliminato con successo.',
                'update-success' => 'Tasso di cambio aggiornato con successo.',
            ],

            'inventory-sources' => [
                'create-success'   => 'Fonte inventario aggiunta con successo.',
                'delete-success'   => 'Fonte inventario eliminata con successo.',
                'update-success'   => 'Fonte inventario aggiornata con successo.',

                'error' => [
                    'last-item-delete' => 'È richiesta almeno una fonte di inventario.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'Aliquota fiscale aggiunta con successo.',
                    'delete-success' => 'Aliquota fiscale eliminata con successo.',
                    'update-success' => 'Aliquota fiscale aggiornata con successo.',
                ],

                'tax-categories' => [
                    'create-success' => 'Categoria fiscale aggiunta con successo.',
                    'delete-success' => 'Categoria fiscale eliminata con successo.',
                    'error'          => 'Una o più aliquote fiscali non esistono.',
                    'update-success' => 'Categoria fiscale aggiornata con successo.',
                ],
            ],

            'channels' => [
                'create-success' => 'Canale aggiunto con successo.',
                'delete-success' => 'Canale eliminato con successo.',
                'update-success' => 'Canale aggiornato con successo.',

                'error' => [
                    'last-item-delete' => 'È richiesto almeno un canale.',
                ],
            ],

            'users' => [
                'create-success' => 'Utente aggiunto con successo.',
                'delete-success' => 'Utente eliminato con successo.',
                'update-success' => 'Utente aggiornato con successo.',

                'error' => [
                    'cannot-change-column' => 'Impossibile modificare gli utenti.',
                    'last-item-delete'     => 'È richiesto almeno un utente.',
                ],
            ],

            'roles' => [
                'create-success' => 'Ruolo aggiunto con successo.',
                'delete-success' => 'Ruolo eliminato con successo.',
                'update-success' => 'Ruolo aggiornato con successo.',

                'error' => [
                    'being-used'       => 'Questa risorsa ruoli è utilizzata nell\'utente admin.',
                    'last-item-delete' => 'È richiesto almeno un ruolo.',
                ],
            ],

            'themes' => [
                'create-success' => 'Tema creato con successo',
                'delete-success' => 'Tema eliminato con successo',
                'update-success' => 'Tema aggiornato con successo',
            ],
        ],

        'configuration' => [
            'create-success' => 'Configurazione aggiunta con successo.',
            'delete-success' => 'Configurazione eliminata con successo.',
            'update-success' => 'Configurazione aggiornata con successo.',
        ],

        'account' => [
            'create-success'     => 'Account aggiunto con successo.',
            'delete-success'     => 'Account eliminato con successo.',
            'logged-in-success'  => 'Accesso eseguito con successo.',
            'logged-out-success' => 'Disconnessione eseguita con successo.',
            'update-success'     => 'Account aggiornato con successo.',

            'error' => [
                'credential-error'  => 'Le credenziali fornite non sono corrette.',
                'invalid'           => 'Email o password non valide',
                'password-mismatch' => 'La password attuale non corrisponde.',
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'Oops! La pagina che stai cercando è in vacanza. Sembra che non siamo riusciti a trovare quello che cercavi.',
                'title'   => '404 Pagina non trovata',
            ],

            '401' => [
                'message' => 'Oops! Sembra che tu non abbia il permesso di accedere a questa pagina. Sembra che ti manchino le credenziali necessarie.',
                'title'   => '401 Non autorizzato',
            ],

            '403' => [
                'message' => 'Oops! Questa pagina è off-limits. Sembra che tu non abbia i permessi necessari per visualizzare questo contenuto.',
                'title'   => '403 Vietato',
            ],

            '500' => [
                'message' => 'Oops! Qualcosa è andato storto. Sembra che stiamo avendo problemi a caricare la pagina che stai cercando.',
                'title'   => '500 Errore interno del server',
            ],

            '503' => [
                'message' => 'Oops! Sembra che siamo temporaneamente offline per manutenzione. Torna tra un po\'.',
                'title'   => '503 Servizio non disponibile',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'Il tuo indirizzo è stato creato con successo.',
                'delete-success' => 'Il tuo indirizzo è stato eliminato con successo.',
                'update-success' => 'Il tuo indirizzo è stato aggiornato con successo.',
            ],

            'accounts' => [
                'create-success'     => 'Il tuo account è stato creato con successo.',
                'delete-success'     => 'Il tuo account è stato eliminato con successo.',
                'logged-in-success'  => 'Accesso eseguito con successo.',
                'logged-out-success' => 'Disconnessione eseguita con successo.',
                'update-success'     => 'Il tuo account è stato aggiornato con successo.',

                'error' => [
                    'credential-error'  => 'Le credenziali fornite non sono corrette.',
                    'invalid'           => 'Email o password non valide',
                    'password-mismatch' => 'La password attuale non corrisponde.',
                    'update-failed'     => 'Si è verificato un errore durante l\'aggiornamento del tuo account',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'Indirizzo salvato con successo.',
            'check-billing-address'   => 'Si prega di controllare l\'indirizzo di fatturazione.',
            'check-shipping-address'  => 'Si prega di controllare l\'indirizzo di spedizione.',
            'minimum-order-message'   => 'L\'importo minimo dell\'ordine è :amount.',
            'order-saved'             => 'Ordine salvato con successo',
            'payment-method-saved'    => 'Metodo di pagamento salvato con successo.',
            'shipping-method-saved'   => 'Metodo di spedizione salvato con successo.',
            'specify-payment-method'  => 'Si prega di specificare il metodo di pagamento.',
            'specify-shipping-method' => 'Si prega di specificare il metodo di spedizione.',

            'cart' => [
                'item' => [
                    'empty'           => 'Il tuo carrello è vuoto.',
                    'error'           => 'Articolo nel carrello non trovato.',
                    'inactive-add'    => 'L\'articolo inattivo non può essere aggiunto al carrello.',
                    'invalid-product' => 'L\'ID del prodotto non è valido.',
                    'success'         => 'Articolo aggiunto al carrello con successo.',
                    'success-remove'  => 'Articolo rimosso con successo dal carrello.',
                ],

                'quantity' => [
                    'illegal' => 'La quantità non può essere inferiore a uno.',
                    'success' => 'Articolo/i nel carrello aggiornato/i con successo.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Il codice del coupon non può essere applicato.',
                    'invalid'        => 'Il codice del coupon non è valido.',
                    'success-remove' => 'Coupon rimosso con successo.',
                    'success'        => 'Codice del coupon applicato con successo.',
                ],

                'move-wishlist' => [                    
                    'success' => 'Articolo spostato nella lista dei desideri con successo.',
                ],
            ],
        ],

        'wishlist' => [
            'moved'          => 'Articolo spostato con successo nel carrello.',
            'option-missing' => 'Le opzioni del prodotto mancano, quindi l\'articolo non può essere spostato nella lista dei desideri.',
            'removed'        => 'Articolo rimosso con successo dalla lista dei desideri',
            'success'        => 'Articolo aggiunto con successo alla lista dei desideri',

            'error' => [
                'security-warning' => 'Attività sospetta trovata!',

                'mass-operations' => [
                    'resource-not-found' => 'Prodotto desiderato selezionato non trovato.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'Ordine annullato con successo.',

                'error' => [
                    'cancel-error' => 'L\'ordine non può essere annullato.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'Si prega di selezionare almeno un attributo configurabile.',

                'reviews' => [
                    'create-success' => 'La tua recensione è stata inviata con successo.',
                ],
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'Oops! La pagina che stai cercando è in vacanza. Sembra che non siamo riusciti a trovare quello che cercavi.',
                'title'   => '404 Pagina non trovata',
            ],

            '401' => [
                'message' => 'Oops! Sembra che tu non abbia il permesso di accedere a questa pagina. Sembra che ti manchino le credenziali necessarie.',
                'title'   => '401 Non autorizzato',
            ],

            '403' => [
                'message' => 'Oops! Questa pagina è off-limits. Sembra che tu non abbia i permessi necessari per visualizzare questo contenuto.',
                'title'   => '403 Vietato',
            ],

            '500' => [
                'message' => 'Oops! Qualcosa è andato storto. Sembra che stiamo avendo problemi a caricare la pagina che stai cercando.',
                'title'   => '500 Errore interno del server',
            ],

            '503' => [
                'message' => 'Oops! Sembra che siamo temporaneamente offline per manutenzione. Torna tra un po\'.',
                'title'   => '503 Servizio non disponibile',
            ],
        ],
    ],
];
