<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'Commande annulée avec succès.',

                'error' => [
                    'cancel-error' => 'La commande ne peut pas être annulée.',
                ],
            ],

            'invoices' => [
                'create-success' => 'Facture ajoutée avec succès.',

                'error' => [
                    'creation-error'    => 'La création de la facture de commande n\'est pas autorisée.',
                    'invalid-qty-error' => 'Nous avons trouvé une quantité invalide pour les articles de facture.',
                    'product-error'     => 'La facture ne peut pas être créée sans produits.',
                ],
            ],

            'shipments' => [
                'create-success' => 'Expédition ajoutée avec succès.',

                'error' => [
                    'creation-error'    => 'L\'expédition ne peut pas être créée pour cette commande.',
                    'invalid-qty-error' => 'Nous avons trouvé une quantité invalide pour les articles expédiés.',
                ],
            ],

            'refunds' => [
                'create-success' => 'Remboursement ajouté avec succès.',

                'error' => [
                    'creation-error'       => 'Le remboursement ne peut pas être créé pour cette commande.',
                    'invalid-amount-error' => 'Le montant du remboursement doit être non nul.',
                    'invalid-qty-error'    => 'Nous avons trouvé une quantité invalide pour les articles remboursés.',
                    'limit-error'          => 'La somme la plus élevée disponible pour le remboursement est :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'Cette facture a déjà été payée.',
                'invoice-missing'            => 'Cet identifiant de facture n\'existe pas.',
                'transaction-amount-exceeds' => 'Le montant spécifié de cette transaction dépasse le montant total de la facture.',
                'transaction-saved'          => 'La transaction a été enregistrée.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'Produit ajouté avec succès.',
                'delete-success' => 'Produit supprimé avec succès',
                'update-success' => 'Produit mis à jour avec succès.',

                'inventories' => [
                    'update-success' => 'Inventaire mis à jour avec succès.',
                ],

                'mass-operations' => [
                    'delete-success'  => 'Produits sélectionnés supprimés avec succès.',
                    'update-success'  => 'Produits sélectionnés mis à jour avec succès.',
                ],

                'error' => [
                    'configurable-error' => 'Veuillez sélectionner au moins un attribut configurable.',
                ],
            ],

            'categories' => [
                'create-success' => 'Catégorie ajoutée avec succès.',
                'delete-success' => 'Catégorie supprimée avec succès',
                'update-success' => 'Catégorie mise à jour avec succès.',

                'mass-operations' => [
                    'delete-success'  => 'Catégories sélectionnées supprimées avec succès.',
                    'update-success'  => 'Catégories sélectionnées mises à jour avec succès.',
                ],
            ],

            'attributes' => [
                'create-success' => 'Attribut ajouté avec succès.',
                'delete-success' => 'Attribut supprimé avec succès',
                'update-success' => 'Attribut mis à jour avec succès.',

                'error' => [
                    'system-attributes-delete' => 'Impossible de supprimer les attributs système.',
                    'cannot-change-type'       => 'Impossible de modifier le champ de type',

                    'mass-operations' => [
                        'resource-not-found' => 'Attributs sélectionnés non trouvés.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'Famille ajoutée avec succès.',
                'delete-success' => 'Famille supprimée avec succès',
                'update-success' => 'Famille mise à jour avec succès.',

                'error' => [
                    'last-item-delete' => 'Au moins une famille est requise.',
                    'being-used'       => 'Cette famille de ressources est utilisée dans :source.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'Client ajouté avec succès.',
                'delete-success' => 'Client supprimé avec succès',
                'update-success' => 'Client mis à jour avec succès.',

                'mass-operations' => [
                    'delete-success' => 'Clients sélectionnés supprimés avec succès.',
                    'update-success' => 'Clients sélectionnés mis à jour avec succès.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'Impossible de supprimer le compte des clients car certaines commandes sont en attente ou dans l\'état de traitement.',
                ],

                'notes' => [
                    'note-taken' => 'Note prise.',
                ],
            ],

            'addresses' => [
                'create-success' => 'Adresse ajoutée avec succès.',
                'delete-success' => 'Adresse supprimée avec succès',
                'update-success' => 'Adresse mise à jour avec succès.',

                'mass-operations' => [
                    'delete-success' => 'Adresses sélectionnées supprimées avec succès.',
                ],
            ],

            'groups' => [
                'create-success' => 'Groupe de clients ajouté avec succès.',
                'delete-success' => 'Groupe de clients supprimé avec succès',
                'update-success' => 'Groupe de clients mis à jour avec succès.',

                'error' => [
                    'being-used'           => 'Cette ressource de groupes est utilisée chez les clients.',
                    'default-group-delete' => 'Impossible de supprimer le groupe par défaut.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'Avis supprimé avec succès',
                'update-success' => 'Avis mis à jour avec succès.',

                'mass-operations' => [
                    'delete-success' => 'Avis sélectionnés supprimés avec succès.',
                    'update-success' => 'Avis sélectionnés mis à jour avec succès.',
                ],
            ],
        ],

        'cms' => [
            'create-success' => 'CMS ajouté avec succès.',
            'delete-success' => 'CMS supprimé avec succès',
            'update-success' => 'CMS mis à jour avec succès.',

            'mass-operations' => [
                'delete-success' => 'Pages sélectionnées supprimées avec succès.',
            ],

            'error' => [
                'already-taken' => 'Les pages ont déjà été prises.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'Campagne ajoutée avec succès.',
                    'delete-success' => 'Campagne supprimée avec succès',
                    'update-success' => 'Campagne mise à jour avec succès.',
                ],

                'events' => [
                    'create-success' => 'Événement ajouté avec succès.',
                    'delete-success' => 'Événement supprimé avec succès',
                    'update-success' => 'Événement mis à jour avec succès.',
                ],

                'templates' => [
                    'create-success' => 'Modèle d\'e-mail ajouté avec succès.',
                    'delete-success' => 'Modèle d\'e-mail supprimé avec succès',
                    'update-success' => 'Modèle d\'e-mail mis à jour avec succès.',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'Règle de panier ajoutée avec succès.',
                    'delete-success' => 'Règle de panier supprimée avec succès',
                    'update-success' => 'Règle de panier mise à jour avec succès.',
                ],

                'catalog-rules' => [
                    'create-success' => 'Règle de catalogue ajoutée avec succès.',
                    'delete-success' => 'Règle de catalogue supprimée avec succès',
                    'update-success' => 'Règle de catalogue mise à jour avec succès.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'Coupon de règle de panier ajouté avec succès.',
                    'delete-success' => 'Coupon de règle de panier supprimé avec succès',
                    'update-success' => 'Coupon de règle de panier mis à jour avec succès.',

                    'mass-operations' => [
                        'delete-success' => 'Pages sélectionnées supprimées avec succès.',
                    ],
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'Locale ajoutée avec succès.',
                'delete-success' => 'Locale supprimée avec succès',
                'update-success' => 'Locale mise à jour avec succès.',

                'error' => [
                    'last-item-delete' => 'Au moins une localisation est requise.',
                ],
            ],

            'currencies' => [
                'create-success' => 'Devise ajoutée avec succès.',
                'delete-success' => 'Devise supprimée avec succès',
                'update-success' => 'Devise mise à jour avec succès.',

                'error' => [
                    'last-item-delete' => 'Au moins une devise est requise.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'Taux de change ajouté avec succès.',
                'delete-success' => 'Taux de change supprimé avec succès',
                'update-success' => 'Taux de change mis à jour avec succès.',
            ],

            'inventory-sources' => [
                'create-success'   => 'Source d\'inventaire ajoutée avec succès.',
                'delete-success'   => 'Source d\'inventaire supprimée avec succès',
                'update-success'   => 'Source d\'inventaire mise à jour avec succès.',

                'error' => [
                    'last-item-delete' => 'Au moins une source d\'inventaire est requise.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'Taux de taxe ajouté avec succès.',
                    'delete-success' => 'Taux de taxe supprimé avec succès',
                    'update-success' => 'Taux de taxe mis à jour avec succès.',
                ],

                'tax-categories' => [
                    'create-success' => 'Catégorie de taxe ajoutée avec succès.',
                    'delete-success' => 'Catégorie de taxe supprimée avec succès',
                    'update-success' => 'Catégorie de taxe mise à jour avec succès.',
                ],
            ],

            'channels' => [
                'create-success' => 'Canal ajouté avec succès.',
                'delete-success' => 'Canal supprimé avec succès',
                'update-success' => 'Canal mis à jour avec succès.',

                'error' => [
                    'last-item-delete' => 'Au moins un canal est requis.',
                ],
            ],

            'users' => [
                'create-success' => 'Utilisateur ajouté avec succès.',
                'delete-success' => 'Utilisateur supprimé avec succès',
                'update-success' => 'Utilisateur mis à jour avec succès.',

                'error' => [
                    'cannot-change-column' => 'Impossible de modifier les utilisateurs.',
                    'last-item-delete'     => 'Au moins un utilisateur est requis.',
                ],
            ],

            'roles' => [
                'create-success' => 'Rôle ajouté avec succès.',
                'delete-success' => 'Rôle supprimé avec succès',
                'update-success' => 'Rôle mis à jour avec succès.',

                'error' => [
                    'being-used'       => 'Cette ressource de rôles est utilisée chez l\'utilisateur administrateur.',
                    'last-item-delete' => 'Au moins un rôle est requis.',
                ],
            ],

            'themes' => [
                'create-success' => 'Thème créé avec succès',
                'delete-success' => 'Thème supprimé avec succès',
                'update-success' => 'Thème mis à jour avec succès',
            ],
        ],

        'configuration' => [
            'create-success' => 'Configuration ajoutée avec succès.',
            'delete-success' => 'Configuration supprimée avec succès',
            'update-success' => 'Configuration mise à jour avec succès.',
        ],

        'account' => [
            'create-success'     => 'Compte ajouté avec succès.',
            'delete-success'     => 'Compte supprimé avec succès',
            'logged-in-success'  => 'Connecté avec succès.',
            'logged-out-success' => 'Déconnecté avec succès.',
            'update-success'     => 'Compte mis à jour avec succès.',

            'error' => [
                'credential-error'  => 'Les informations d\'identification fournies sont incorrectes.',
                'invalid'           => 'E-mail ou mot de passe invalide',
                'password-mismatch' => 'Le mot de passe actuel ne correspond pas.',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'Votre adresse a été créée avec succès.',
                'delete-success' => 'Votre adresse a été supprimée avec succès.',
                'update-success' => 'Votre adresse a été mise à jour avec succès.',
            ],

            'accounts' => [
                'create-success'     => 'Votre compte a été créé avec succès.',
                'delete-success'     => 'Votre compte a été supprimé avec succès.',
                'update-success'     => 'Votre compte a été mis à jour avec succès.',
                'logged-in-success'  => 'Connecté avec succès.',
                'logged-out-success' => 'Déconnecté avec succès.',

                'error' => [
                    'invalid'          => 'E-mail ou mot de passe invalide',
                    'credential-error' => 'Les informations d\'identification fournies sont incorrectes.',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'Adresse enregistrée avec succès.',
            'check-billing-address'   => 'Veuillez vérifier l\'adresse de facturation.',
            'check-shipping-address'  => 'Veuillez vérifier l\'adresse de livraison.',
            'minimum-order-message'   => 'Le montant minimum de commande est de :amount.',
            'order-saved'             => 'Commande enregistrée avec succès',
            'payment-method-saved'    => 'Méthode de paiement enregistrée avec succès.',
            'shipping-method-saved'   => 'Méthode d\'expédition enregistrée avec succès.',
            'specify-payment-method'  => 'Veuillez spécifier la méthode de paiement.',
            'specify-shipping-method' => 'Veuillez spécifier la méthode d\'expédition.',

            'cart' => [
                'item' => [
                    'success'        => 'L\'article a été ajouté au panier avec succès.',
                    'success-remove' => 'L\'article a été supprimé du panier avec succès.',
                ],

                'quantity' => [
                    'illegal' => 'La quantité ne peut pas être inférieure à un.',
                    'success' => 'Article(s) du panier mis à jour avec succès.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Le code de coupon ne peut pas être appliqué.',
                    'invalid'        => 'Le code de coupon est invalide.',
                    'success'        => 'Code de coupon appliqué avec succès.',
                    'success-remove' => 'Coupon supprimé avec succès.',
                ],

                'move-wishlist' => [
                    'success' => 'L\'article a été déplacé vers la liste de souhaits avec succès.',
                ],
            ],
        ],

        'wishlist' => [
            'success'        => 'Article ajouté à la liste de souhaits avec succès',
            'removed'        => 'Article supprimé de la liste de souhaits avec succès',
            'moved'          => 'Article déplacé avec succès vers le panier.',
            'option-missing' => 'Les options de produit sont manquantes, donc l\'article ne peut pas être déplacé vers la liste de souhaits.',

            'error' => [
                'security-warning' => 'Activité suspecte détectée !',

                'mass-operations' => [
                    'resource-not-found' => 'Le produit de la liste de souhaits sélectionné est introuvable.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'Commande annulée avec succès.',

                'error' => [
                    'cancel-error' => 'La commande ne peut pas être annulée.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'Veuillez sélectionner au moins un attribut configurable.',

                'reviews' => [
                    'create-success' => 'Votre avis a été soumis avec succès.',
                ],
            ],
        ],
    ],
];
