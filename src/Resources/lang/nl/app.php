<?php

return [
    'sales' => [
        'orders' => [
            'cancel-error' => 'Bestelling kan niet worden geannuleerd.',
        ],

        'invoices' => [
            'invalid-qty-error' => 'We hebben een ongeldig aantal gevonden om artikelen te factureren.',
            'creation-error'    => 'Het aanmaken van een orderfactuur is niet toegestaan.',
            'product-error'     => 'Factuur kan niet worden aangemaakt zonder producten.',
        ],

        'shipments' => [
            'invalid-qty-error' => 'We hebben een ongeldig aantal voor verzendingsitems gevonden.',
            'creation-error'    => 'Zending kan niet worden aangemaakt voor deze bestelling.',
        ],

        'refunds' => [
            'creation-error'       => 'Restitutie kan niet worden aangemaakt voor deze bestelling.',
            'invalid-amount-error' => 'Terugbetaling mag niet nul zijn.',
            'invalid-qty-error'    => 'We hebben een ongeldig aantal gevonden voor restitutieartikelen.',
            'limit-error'          => 'Het meeste geld dat beschikbaar is om terug te betalen is :amount.',
        ],

        'transactions' => [
            'already-paid'      => 'Deze factuur is al betaald.',
            'invoice-missing'   => 'Deze factuur-ID bestaat niet.',
            'transaction-saved' => 'De transactie is opgeslagen.',
        ],
    ],

    'catalog' => [
        'products' => [
            'configurable-error' => 'Selecteer ten minste één configureerbaar kenmerk.',
        ],
    ],

    'customers' => [
        'note-cannot-taken' => 'Notitie kan niet worden gemaakt.',
        'note-taken'        => 'Notitie gemaakt.',
    ],

    'wishlist' => [
        'moved'          => 'Artikel succesvol verplaatst naar winkelwagen.',
        'option-missing' => 'Productopties ontbreken, dus artikel kan niet naar de verlanglijst worden verplaatst.',
    ],

    'checkout' => [
        'cart' => [
            'item' => [
                'error-add'      => 'Artikel kan niet aan winkelwagen worden toegevoegd, probeer het later opnieuw.',
                'error-remove'   => 'Geen items om uit de winkelwagen te verwijderen.',
                'inactive'       => 'Artikel is inactief en is verwijderd uit winkelwagen.',
                'inactive-add'   => 'Inactief artikel kan niet aan winkelwagen worden toegevoegd.',
                'success'        => 'Artikel is succesvol toegevoegd aan winkelwagen.',
                'success-remove' => 'Item is succesvol verwijderd uit de winkelwagen.',
            ],

            'quantity' => [
                'error'             => 'Kan de item(s) momenteel niet bijwerken, probeer het later opnieuw.',
                'illegal'           => 'Aantal kan niet kleiner zijn dan één.',
                'inventory-warning' => 'De gevraagde hoeveelheid is niet beschikbaar, probeer het later opnieuw.',
                'quantity'          => 'Aantal',
                'success'           => 'Winkelwagenitem(s) succesvol bijgewerkt.',
            ],

            'coupon' => [
                'apply-issue'    => 'Couponcode kan niet worden toegepast.',
                'invalid'        => 'Couponcode is ongeldig.',
                'success'        => 'Couponcode succesvol toegepast.',
                'success-remove' => 'Coupon succesvol verwijderd.',
            ],

            'move-wishlist' => [
                'error'   => 'Kan item niet naar verlanglijst verplaatsen, probeer het later opnieuw.',
                'success' => 'Artikel succesvol naar verlanglijst verplaatst.',
            ],
        ],

        'minimum-order-message'   => 'Minimum orderbedrag is :amount.',
        'check-shipping-address'  => 'Controleer het verzendadres.',
        'check-billing-address'   => 'Controleer het factuuradres.',
        'specify-shipping-method' => 'Geef de verzendmethode op.',
        'specify-payment-method'  => 'Geef de betalingsmethode op.',
    ],

    'common-response' => [
        'success' => [
            'add'    => ':name succesvol toegevoegd.',
            'cancel' => ':name succesvol geannuleerd.',
            'create' => ':name succesvol aangemaakt.',
            'delete' => ':name succesvol verwijderd.',
            'update' => ':name succesvol geüpdatet.',
            'upload' => ':name succesvol geüpload.',

            'mass-operations' => [
                'delete'  => 'Geselecteerd :name succesvol verwijderd.',
                'partial' => 'Sommige acties zijn niet uitgevoerd vanwege beperkte systeembeperkingen op :name.',
                'update'  => 'Geselecteerd :name succesvol geüpdatet.',
            ],
        ],

        'error' => [
            'already-taken'                => 'De :name is al in gebruik.',
            'base-currency-delete'         => 'Deze valuta is ingesteld als basisvaluta van het kanaal en kan dus niet worden verwijderd.',
            'being-used'                   => 'Deze resource :name wordt gebruikt in :source.',
            'cannot-change-column'         => 'Kan de :name niet wijzigen.',
            'default-group-delete'         => 'Kan de standaardgroep niet verwijderen.',
            'delete-failed'                => 'Fout opgetreden bij het verwijderen van :name.',
            'last-item-delete'             => 'Minstens één :name is vereist.',
            'not-authorized'               => 'Geen bevoegdheid',
            'order-pending-account-delete' => 'Kan :name account niet verwijderen omdat sommige bestellingen in behandeling zijn of in verwerking zijn.',
            'password-mismatch'            => 'Huidig ​​wachtwoord komt niet overeen.',
            'root-category-delete'         => 'Kan de root-categorie niet verwijderen.',
            'security-warning'             => 'Verdachte activiteit gevonden!',
            'something-went-wrong'         => 'Er ging iets mis!',
            'system-attribute-delete'      => 'Kan het systeemkenmerk niet verwijderen.',

            'mass-operations' => [
                'resource-not-found' => 'Geselecteerd :name niet gevonden.',
            ],
        ],
    ],
];
