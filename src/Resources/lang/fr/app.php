<?php

return [
    'sales' => [
        'orders' => [
            'cancel-error' => 'La commande ne peut pas être annulée.',
        ],

        'invoices' => [
            'invalid-qty-error' => 'Nous avons trouvé une quantité invalide pour facturer les articles.',
            'creation-error'    => 'La création de facture de commande n\'est pas autorisée.',
            'product-error'     => 'La facture ne peut pas être créée sans produits.',
        ],

        'shipments' => [
            'invalid-qty-error' => 'Nous avons trouvé une quantité invalide pour les articles d\'expédition.',
            'creation-error'    => 'L\'envoi ne peut pas être créé pour cette commande.',
        ],

        'refunds' => [
            'creation-error'       => 'Le remboursement ne peut pas être créé pour cette commande.',
            'invalid-amount-error' => 'Le montant du remboursement doit être différent de zéro.',
            'invalid-qty-error'    => 'Nous avons trouvé une quantité invalide pour les articles remboursés.',
            'limit-error'          => 'Le plus d\'argent disponible à rembourser est :amount.',
        ],

        'transactions' => [
            'already-paid'      => 'Cette facture a déjà été payée.',
            'invoice-missing'   => 'Cet identifiant de facture n\'existe pas.',
            'transaction-saved' => 'La transaction a été enregistrée.',
        ],
    ],

    'catalog' => [
        'products' => [
            'configurable-error' => 'Veuillez sélectionner au moins un attribut configurable.',
        ],
    ],

    'customers' => [
        'note-cannot-taken' => 'La note ne peut pas être prise.',
        'note-taken'        => 'Note prise.',
    ],

    'common-response' => [
        'success' => [
            'add'    => ':name ajouté avec succès.',
            'cancel' => ':name annulé avec succès.',
            'create' => ':name créé avec succès.',
            'delete' => ':name supprimé avec succès.',
            'update' => ':name mis à jour avec succès.',
            'upload' => ':name uploaded with success.',

            'mass-operations' => [
                'delete'  => 'Sélectionné :name supprimé avec succès.',
                'partial' => 'Certaines actions n\'ont pas été effectuées en raison de contraintes système restreintes sur :name.',
                'update'  => 'Sélectionné :name mis à jour avec succès.',
            ],
        ],

        'error' => [
            'already-taken'                => 'Le :name a déjà été pris.',
            'base-currency-delete'         => 'Cette devise est définie comme devise de base du canal, elle ne peut donc pas être supprimée.',
            'being-used'                   => 'Cette ressource :name est utilisée dans :source.',
            'cannot-change-column'         => 'Impossible de changer le :name.',
            'default-group-delete'         => 'Impossible de supprimer le groupe par défaut.',
            'delete-failed'                => 'Erreur rencontrée lors de la suppression de :name.',
            'last-item-delete'             => 'Au moins un :name est requis.',
            'not-authorized'               => 'Pas autorisé',
            'order-pending-account-delete' => 'Impossible de supprimer :name account car certaines commandes sont en attente ou en cours de traitement.',
            'password-mismatch'            => 'Le mot de passe actuel ne correspond pas.',
            'root-category-delete'         => 'Impossible de supprimer la catégorie racine.',
            'something-went-wrong'         => 'Quelque chose s\'est mal passé !',
            'system-attribute-delete'      => 'Impossible de supprimer l\'attribut système.',
        ],
    ],
];
