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

            're-order' => [
                'address-create-success'  => 'Adresse enregistrée avec succès.',
                'address-not-available'   => 'Aucune méthode d\'expédition disponible.',
                'create'                  => 'Article ajouté au panier avec succès.',
                'error'                   => 'Quelque chose s\'est mal passé!',
                'order-create-success'    => 'La commande a été passée avec succès.',
                'payment-create-success'  => 'Méthode de paiement enregistrée avec succès.',
                'shipping-create-success' => 'Méthode d\'expédition enregistrée avec succès.',
            ],

            'invoices' => [
                'create-success' => 'La facture a été ajoutée avec succès.',

                'error' => [
                    'creation-error'    => 'La création de factures de commande n\'est pas autorisée.',
                    'invalid-qty-error' => 'Une quantité invalide a été trouvée pour facturer les articles.',
                    'product-error'     => 'Impossible de créer une facture sans produits.',
                ],
            ],

            'shipments' => [
                'create-success' => 'L\'expédition a été ajoutée avec succès.',

                'error' => [
                    'creation-error'    => 'Impossible de créer l\'expédition pour cette commande.',
                    'invalid-qty-error' => 'Une quantité invalide a été trouvée pour les articles d\'expédition.',
                ],
            ],

            'refunds' => [
                'create-success' => 'Le remboursement a été ajouté avec succès.',

                'error' => [
                    'creation-error'       => 'Impossible de créer le remboursement pour cette commande.',
                    'invalid-amount-error' => 'Le montant du remboursement doit être supérieur à zéro.',
                    'invalid-qty-error'    => 'Une quantité invalide a été trouvée pour les articles de remboursement.',
                    'limit-error'          => 'Le montant maximum disponible pour le remboursement est :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'Cette facture a déjà été payée.',
                'invoice-missing'            => 'Cet identifiant de facture n\'existe pas.',
                'transaction-amount-exceeds' => 'Le montant spécifié de cette transaction dépasse le montant total de la facture.',
                'transaction-saved'          => 'La transaction a été enregistrée avec succès.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'Le produit a été ajouté avec succès.',
                'delete-success' => 'Le produit a été supprimé avec succès.',
                'update-success' => 'Le produit a été mis à jour avec succès.',

                'inventories' => [
                    'update-success' => 'L\'inventaire a été mis à jour avec succès.',
                ],

                'mass-operations' => [
                    'delete-success'  => 'Les produits sélectionnés ont été supprimés avec succès.',
                    'update-success'  => 'Les produits sélectionnés ont été mis à jour avec succès.',
                ],

                'error' => [
                    'configurable-error' => 'Veuillez sélectionner au moins un attribut configurable.',
                ],
            ],

            'categories' => [
                'create-success'       => 'La catégorie a été ajoutée avec succès.',
                'delete-success'       => 'La catégorie a été supprimée avec succès.',
                'root-category-delete' => 'La catégorie racine ne peut pas être supprimée.',
                'update-success'       => 'La catégorie a été mise à jour avec succès.',
                'not-exist'            => 'Catégorie introuvable.',

                'mass-operations' => [
                    'delete-success'  => 'Les catégories sélectionnées ont été supprimées avec succès.',
                    'update-success'  => 'Les catégories sélectionnées ont été mises à jour avec succès.',
                ],
            ],

            'attributes' => [
                'create-success' => 'L\'attribut a été ajouté avec succès.',
                'delete-success' => 'L\'attribut a été supprimé avec succès.',
                'update-success' => 'L\'attribut a été mis à jour avec succès.',

                'error' => [
                    'cannot-change-type'       => 'Impossible de changer le champ de type.',
                    'system-attributes-delete' => 'Les attributs système ne peuvent pas être supprimés.',

                    'mass-operations' => [
                        'resource-not-found' => 'Les attributs sélectionnés sont introuvables.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'La famille a été ajoutée avec succès.',
                'delete-success' => 'La famille a été supprimée avec succès.',
                'update-success' => 'La famille a été mise à jour avec succès.',

                'error' => [
                    'being-used'       => 'Cette ressource de familles est utilisée dans :source.',
                    'can-not-updated'  => 'Impossible de mettre à jour le code.',
                    'last-item-delete' => 'Au moins une famille est requise.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'Le client a été ajouté avec succès.',
                'delete-success' => 'Le client a été supprimé avec succès.',
                'update-success' => 'Le client a été mis à jour avec succès.',

                'mass-operations' => [
                    'delete-success' => 'Les clients sélectionnés ont été supprimés avec succès.',
                    'update-success' => 'Les clients sélectionnés ont été mis à jour avec succès.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'Impossible de supprimer le compte client car il y a des commandes en attente ou en cours.',
                ],

                'notes' => [
                    'note-taken' => 'Note prise.',
                ],
            ],

            'addresses' => [
                'create-success' => 'L\'adresse a été ajoutée avec succès.',
                'delete-success' => 'L\'adresse a été supprimée avec succès.',
                'update-success' => 'L\'adresse a été mise à jour avec succès.',

                'mass-operations' => [
                    'delete-success' => 'Les adresses sélectionnées ont été supprimées avec succès.',
                ],
            ],

            'groups' => [
                'create-success' => 'Le groupe de clients a été ajouté avec succès.',
                'delete-success' => 'Le groupe de clients a été supprimé avec succès.',
                'update-success' => 'Le groupe de clients a été mis à jour avec succès.',

                'error' => [
                    'being-used'           => 'Cette ressource de groupes est utilisée dans des clients.',
                    'default-group-delete' => 'Impossible de supprimer le groupe par défaut.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'L\'avis a été supprimé avec succès.',
                'update-success' => 'L\'avis a été mis à jour avec succès.',

                'mass-operations' => [
                    'delete-success' => 'Les avis sélectionnés ont été supprimés avec succès.',
                    'update-success' => 'Les avis sélectionnés ont été mis à jour avec succès.',
                ],
            ],

            'news-letter' => [
                'create-success'  => 'Vous vous êtes abonné avec succès à notre newsletter.',
                'warning-message' => 'Vous êtes déjà abonné à notre newsletter.',
            ],
        ],

        'cms' => [
            'create-success' => 'Le CMS a été ajouté avec succès.',
            'delete-success' => 'Le CMS a été supprimé avec succès.',
            'update-success' => 'Le CMS a été mis à jour avec succès.',

            'mass-operations' => [
                'delete-success' => 'Les pages sélectionnées ont été supprimées avec succès.',
            ],

            'error' => [
                'already-taken' => 'Les pages ont déjà été prises.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'Campagne ajoutée avec succès.',
                    'delete-success' => 'Campagne supprimée avec succès.',
                    'update-success' => 'Campagne mise à jour avec succès.',
                ],

                'events' => [
                    'create-success' => 'Événement ajouté avec succès.',
                    'delete-success' => 'Événement supprimé avec succès.',
                    'update-success' => 'Événement mis à jour avec succès.',
                ],

                'templates' => [
                    'create-success' => 'Modèle d\'e-mail ajouté avec succès.',
                    'delete-success' => 'Modèle d\'e-mail supprimé avec succès.',
                    'update-success' => 'Modèle d\'e-mail mis à jour avec succès.',
                ],

                'subscribers' => [
                    'delete-success' => 'Abonnement à la newsletter supprimé avec succès.',
                    'update-failed'  => 'Échec de la mise à jour de l\'abonnement à la newsletter.',
                    'update-success' => 'Abonnement à la newsletter mis à jour avec succès.',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'Règle de panier ajoutée avec succès.',
                    'delete-success' => 'Règle de panier supprimée avec succès.',
                    'update-success' => 'Règle de panier mise à jour avec succès.',
                ],

                'catalog-rules' => [
                    'create-success' => 'Règle de catalogue ajoutée avec succès.',
                    'delete-success' => 'Règle de catalogue supprimée avec succès.',
                    'update-success' => 'Règle de catalogue mise à jour avec succès.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'Coupon de règle de panier ajouté avec succès.',
                    'delete-success' => 'Coupon de règle de panier supprimé avec succès.',
                    'update-success' => 'Coupon de règle de panier mis à jour avec succès.',

                    'mass-operations' => [
                        'delete-success' => 'Coupons de règle de panier supprimés avec succès.',
                    ],
                ],
            ],

            'search-seo' => [
                'url-rewrites' => [
                    'create-success'  => 'Réécriture d\'URL ajoutée avec succès.',
                    'delete-success'  => 'Réécriture d\'URL supprimée avec succès.',
                    'update-success'  => 'Réécriture d\'URL mise à jour avec succès.',

                    'mass-operations' => [
                        'delete-success' => 'Réécritures d\'URL supprimées avec succès.',
                    ],
                ],

                'search-terms' => [
                    'create-success'  => 'Termes de recherche ajoutés avec succès.',
                    'delete-success'  => 'Termes de recherche supprimés avec succès.',
                    'update-success'  => 'Termes de recherche mis à jour avec succès.',

                    'mass-operations' => [
                        'delete-success' => 'Termes de recherche supprimés avec succès.',
                    ],
                ],

                'search-synonyms' => [
                    'create-success'  => 'Synonymes de recherche ajoutés avec succès.',
                    'delete-success'  => 'Synonymes de recherche supprimés avec succès.',
                    'update-success'  => 'Synonymes de recherche mis à jour avec succès.',

                    'mass-operations' => [
                        'delete-success' => 'Synonymes de recherche supprimés avec succès.',
                    ],
                ],

                'sitemaps' => [
                    'create-success'  => 'Plan du site créé avec succès.',
                    'delete-success'  => 'Plan du site supprimé avec succès.',
                    'update-success'  => 'Plan du site mis à jour avec succès.',
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'Langue ajoutée avec succès.',
                'delete-success' => 'Langue supprimée avec succès.',
                'update-success' => 'Langue mise à jour avec succès.',

                'error' => [
                    'last-item-delete' => 'Au moins une langue est requise.',
                ],
            ],

            'currencies' => [
                'create-success' => 'Devise ajoutée avec succès.',
                'delete-success' => 'Devise supprimée avec succès.',
                'update-success' => 'Devise mise à jour avec succès.',

                'error' => [
                    'last-item-delete' => 'Au moins une devise est requise.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'Taux de change ajouté avec succès.',
                'delete-success' => 'Taux de change supprimé avec succès.',
                'update-success' => 'Taux de change mis à jour avec succès.',
            ],

            'inventory-sources' => [
                'create-success'   => 'Source d\'inventaire ajoutée avec succès.',
                'delete-success'   => 'Source d\'inventaire supprimée avec succès.',
                'update-success'   => 'Source d\'inventaire mise à jour avec succès.',

                'error' => [
                    'last-item-delete' => 'Au moins une source d\'inventaire est requise.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'Taux de taxe ajouté avec succès.',
                    'delete-success' => 'Taux de taxe supprimé avec succès.',
                    'update-success' => 'Taux de taxe mis à jour avec succès.',
                ],

                'tax-categories' => [
                    'create-success' => 'Catégorie de taxe ajoutée avec succès.',
                    'delete-success' => 'Catégorie de taxe supprimée avec succès.',
                    'error'          => 'Une ou plusieurs taxes n\'existent pas.',
                    'update-success' => 'Catégorie de taxe mise à jour avec succès.',
                ],
            ],

            'channels' => [
                'create-success' => 'Canal ajouté avec succès.',
                'delete-success' => 'Canal supprimé avec succès.',
                'update-success' => 'Canal mis à jour avec succès.',

                'error' => [
                    'last-item-delete' => 'Au moins un canal est requis.',
                ],
            ],

            'users' => [
                'create-success' => 'Utilisateur ajouté avec succès.',
                'delete-success' => 'Utilisateur supprimé avec succès.',
                'update-success' => 'Utilisateur mis à jour avec succès.',

                'error' => [
                    'cannot-change-column' => 'Impossible de modifier les utilisateurs.',
                    'last-item-delete'     => 'Au moins un utilisateur est requis.',
                ],
            ],

            'roles' => [
                'create-success' => 'Rôle ajouté avec succès.',
                'delete-success' => 'Rôle supprimé avec succès.',
                'update-success' => 'Rôle mis à jour avec succès.',

                'error' => [
                    'being-used'       => 'Cette ressource de rôles est utilisée dans un utilisateur administrateur.',
                    'last-item-delete' => 'Au moins un rôle est requis.',
                ],
            ],

            'themes' => [
                'create-success' => 'Thème créé avec succès.',
                'delete-success' => 'Thème supprimé avec succès.',
                'update-success' => 'Thème mis à jour avec succès.',
            ],
        ],

        'configuration' => [
            'create-success' => 'La configuration a été ajoutée avec succès.',
            'delete-success' => 'La configuration a été supprimée avec succès.',
            'update-success' => 'La configuration a été mise à jour avec succès.',
        ],

        'account' => [
            'create-success'     => 'Le compte a été ajouté avec succès.',
            'delete-success'     => 'Le compte a été supprimé avec succès.',
            'logged-in-success'  => 'Connecté avec succès.',
            'logged-out-success' => 'Déconnecté avec succès.',
            'update-success'     => 'Le compte a été mis à jour avec succès.',

            'error' => [
                'credential-error'  => 'Les informations d\'identification fournies sont incorrectes.',
                'invalid'           => 'E-mail ou mot de passe invalide.',
                'password-mismatch' => 'Le mot de passe actuel ne correspond pas.',
            ],
        ],

        'errors' => [
            '404' => [
                'message' => 'Oups! La page que vous recherchez est en vacances. Il semble que nous n\'ayons pas trouvé ce que vous cherchiez.',
                'title'   => '404 Page non trouvée',
            ],

            '401' => [
                'message' => 'Oups! Il semble que vous n\'êtes pas autorisé à accéder à cette page. Il semble que vous n\'ayez pas les informations d\'identification nécessaires.',
                'title'   => '401 Non autorisé',
            ],

            '403' => [
                'message' => 'Oups! Cette page est hors limites. Il semble que vous n\'ayez pas les autorisations nécessaires pour voir ce contenu.',
                'title'   => '403 Interdit',
            ],

            '500' => [
                'message' => 'Oups! Quelque chose s\'est mal passé. Il semble que nous ayons des difficultés à charger la page que vous recherchez.',
                'title'   => '500 Erreur interne du serveur',
            ],

            '503' => [
                'message' => 'Oups! Il semble que nous soyons temporairement en maintenance. Veuillez revenir dans un moment.',
                'title'   => '503 Service indisponible',
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
                'logged-in-success'  => 'Connecté avec succès.',
                'logged-out-success' => 'Déconnecté avec succès.',
                'update-success'     => 'Votre compte a été mis à jour avec succès.',

                'error' => [
                    'credential-error'  => 'Les informations d\'identification fournies sont incorrectes.',
                    'invalid'           => 'E-mail ou mot de passe invalide.',
                    'password-mismatch' => 'Le mot de passe actuel ne correspond pas.',
                    'update-failed'     => 'Une erreur s\'est produite lors de la mise à jour de votre compte.',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'Adresse enregistrée avec succès.',
            'check-billing-address'   => 'Veuillez vérifier l\'adresse de facturation.',
            'check-shipping-address'  => 'Veuillez vérifier l\'adresse de livraison.',
            'minimum-order-message'   => 'Le montant minimum de commande est de :amount.',
            'order-saved'             => 'Commande enregistrée avec succès.',
            'payment-method-saved'    => 'Méthode de paiement enregistrée avec succès.',
            'shipping-method-saved'   => 'Méthode d\'expédition enregistrée avec succès.',
            'specify-payment-method'  => 'Veuillez spécifier une méthode de paiement.',
            'specify-shipping-method' => 'Veuillez spécifier une méthode d\'expédition.',

            'cart' => [
                'item' => [
                    'empty'           => 'Votre panier est vide.',
                    'error'           => 'Article du panier introuvable.',
                    'inactive-add'    => 'Un article inactif ne peut pas être ajouté au panier.',
                    'invalid-product' => 'L\'identifiant du produit est invalide.',
                    'success'         => 'L\'article a été ajouté au panier avec succès.',
                    'success-remove'  => 'L\'article a été retiré du panier avec succès.',
                ],

                'quantity' => [
                    'illegal' => 'La quantité ne peut pas être inférieure à un.',
                    'success' => 'Article(s) du panier mis à jour avec succès.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Le code promo ne peut pas être appliqué.',
                    'invalid'        => 'Le code promo est invalide.',
                    'success-remove' => 'Le coupon a été supprimé avec succès.',
                    'success'        => 'Le code promo a été appliqué avec succès.',
                ],

                'move-wishlist' => [
                    'success' => 'L\'article a été déplacé avec succès vers la liste de souhaits.',
                ],
            ],
        ],

        'wishlist' => [
            'moved'          => 'L\'article a été déplacé avec succès vers le panier.',
            'option-missing' => 'Les options du produit sont manquantes, l\'article ne peut pas être déplacé vers la liste de souhaits.',
            'removed'        => 'L\'article a été supprimé avec succès de la liste de souhaits.',
            'remove-fail'    => 'L\'article ne peut pas être supprimé de la liste de souhaits.',
            'success'        => 'L\'article a été ajouté avec succès à la liste de souhaits.',

            'error' => [
                'security-warning' => 'Activité suspecte détectée!',

                'mass-operations' => [
                    'resource-not-found' => 'Le produit sélectionné dans la liste de souhaits est introuvable.',
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

        'errors' => [
            '404' => [
                'message' => 'Oups! La page que vous recherchez est en vacances. Il semble que nous n\'ayons pas trouvé ce que vous cherchiez.',
                'title'   => '404 Page non trouvée',
            ],

            '401' => [
                'message' => 'Oups! Il semble que vous n\'êtes pas autorisé à accéder à cette page. Il semble que vous n\'ayez pas les informations d\'identification nécessaires.',
                'title'   => '401 Non autorisé',
            ],

            '403' => [
                'message' => 'Oups! Cette page est hors limites. Il semble que vous n\'ayez pas les autorisations nécessaires pour voir ce contenu.',
                'title'   => '403 Interdit',
            ],

            '500' => [
                'message' => 'Oups! Quelque chose s\'est mal passé. Il semble que nous ayons des difficultés à charger la page que vous recherchez.',
                'title'   => '500 Erreur interne du serveur',
            ],

            '503' => [
                'message' => 'Oups! Il semble que nous soyons temporairement en maintenance. Veuillez revenir dans un moment.',
                'title'   => '503 Service indisponible',
            ],
        ],
    ],
];
