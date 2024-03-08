<?php

return [
    'admin' => [
        'sales' => [
            'orders' => [
                'cancel-success' => 'Pedido cancelado com sucesso.',

                'error' => [
                    'cancel-error' => 'Pedido não pode ser cancelado.',
                ],
            ],

            'invoices' => [
                'create-success' => 'Fatura adicionada com sucesso.',

                'error' => [
                    'creation-error'    => 'Criação de fatura de pedido não permitida.',
                    'invalid-qty-error' => 'Encontramos uma quantidade inválida para os itens da fatura.',
                    'product-error'     => 'Não é possível criar fatura sem produtos.',
                ],
            ],

            'shipments' => [
                'create-success' => 'Envio adicionado com sucesso.',

                'error' => [
                    'creation-error'    => 'Não é possível criar envio para este pedido.',
                    'invalid-qty-error' => 'Encontramos uma quantidade inválida para os itens do envio.',
                ],
            ],

            'refunds' => [
                'create-success' => 'Reembolso adicionado com sucesso.',

                'error' => [
                    'creation-error'       => 'Não é possível criar reembolso para este pedido.',
                    'invalid-amount-error' => 'O valor do reembolso deve ser diferente de zero.',
                    'invalid-qty-error'    => 'Encontramos uma quantidade inválida para os itens do reembolso.',
                    'limit-error'          => 'O máximo de dinheiro disponível para reembolso é :amount.',
                ],
            ],

            'transactions' => [
                'already-paid'               => 'Esta fatura já foi paga.',
                'invoice-missing'            => 'Este ID de fatura não existe.',
                'transaction-amount-exceeds' => 'O valor especificado desta transação excede o valor total da fatura.',
                'transaction-saved'          => 'A transação foi salva.',
            ],
        ],

        'catalog' => [
            'products' => [
                'create-success' => 'Produto adicionado com sucesso.',
                'delete-success' => 'Produto excluído com sucesso.',
                'update-success' => 'Produto atualizado com sucesso.',

                'inventories' => [
                    'update-success' => 'Inventário atualizado com sucesso.',
                ],

                'mass-operations' => [
                    'delete-success' => 'Produtos selecionados excluídos com sucesso.',
                    'update-success' => 'Produtos selecionados atualizados com sucesso.',
                ],

                'error' => [
                    'configurable-error' => 'Por favor, selecione pelo menos um atributo configurável.',
                ],
            ],

            'categories' => [
                'create-success' => 'Categoria adicionada com sucesso.',
                'delete-success' => 'Categoria excluída com sucesso.',
                'update-success' => 'Categoria atualizada com sucesso.',

                'mass-operations' => [
                    'delete-success' => 'Categorias selecionadas excluídas com sucesso.',
                    'update-success' => 'Categorias selecionadas atualizadas com sucesso.',
                ],
            ],

            'attributes' => [
                'create-success' => 'Atributo adicionado com sucesso.',
                'delete-success' => 'Atributo excluído com sucesso.',
                'update-success' => 'Atributo atualizado com sucesso.',

                'error' => [
                    'system-attributes-delete' => 'Não é possível excluir os atributos do sistema.',
                    'cannot-change-type'       => 'Não é possível alterar o tipo de campo.',

                    'mass-operations' => [
                        'resource-not-found' => 'Atributos selecionados não encontrados.',
                    ],
                ],
            ],

            'families'   => [
                'create-success' => 'Família adicionada com sucesso.',
                'delete-success' => 'Família excluída com sucesso.',
                'update-success' => 'Família atualizada com sucesso.',

                'error' => [
                    'last-item-delete' => 'Pelo menos uma família é necessária.',
                    'being-used'       => 'Esta família de recursos está sendo usada em: source.',
                ],
            ],
        ],

        'customers' => [
            'customers' => [
                'create-success' => 'Cliente adicionado com sucesso.',
                'delete-success' => 'Cliente excluído com sucesso.',
                'update-success' => 'Cliente atualizado com sucesso.',

                'mass-operations' => [
                    'delete-success' => 'Clientes selecionados excluídos com sucesso.',
                    'update-success' => 'Clientes selecionados atualizados com sucesso.',
                ],

                'error' => [
                    'order-pending-account-delete' => 'Não é possível excluir a conta do cliente porque existem pedidos pendentes ou em processamento.',
                ],

                'notes' => [
                    'note-taken' => 'Nota registrada.',
                ],
            ],

            'addresses' => [
                'create-success' => 'Endereço adicionado com sucesso.',
                'delete-success' => 'Endereço excluído com sucesso.',
                'update-success' => 'Endereço atualizado com sucesso.',

                'mass-operations' => [
                    'delete-success' => 'Endereços selecionados excluídos com sucesso.',
                ],
            ],

            'groups' => [
                'create-success' => 'Grupo de clientes adicionado com sucesso.',
                'delete-success' => 'Grupo de clientes excluído com sucesso.',
                'update-success' => 'Grupo de clientes atualizado com sucesso.',

                'error' => [
                    'being-used'           => 'Este recurso de grupos está sendo usado em Clientes.',
                    'default-group-delete' => 'Não é possível excluir o grupo padrão.',
                ],
            ],

            'reviews' => [
                'delete-success' => 'Revisão excluída com sucesso.',
                'update-success' => 'Revisão atualizada com sucesso.',

                'mass-operations' => [
                    'delete-success' => 'Revisões selecionadas excluídas com sucesso.',
                    'update-success' => 'Revisões selecionadas atualizadas com sucesso.',
                ],
            ],
        ],

        'cms' => [
            'create-success' => 'CMS adicionado com sucesso.',
            'delete-success' => 'CMS excluído com sucesso.',
            'update-success' => 'CMS atualizado com sucesso.',

            'mass-operations' => [
                'delete-success' => 'Páginas selecionadas excluídas com sucesso.',
            ],

            'error' => [
                'already-taken' => 'As páginas já foram registradas.',
            ],
        ],

        'marketing' => [
            'communications' => [
                'campaigns' => [
                    'create-success' => 'Campanha adicionada com sucesso.',
                    'delete-success' => 'Campanha excluída com sucesso.',
                    'update-success' => 'Campanha atualizada com sucesso.',
                ],

                'events' => [
                    'create-success' => 'Evento adicionado com sucesso.',
                    'delete-success' => 'Evento excluído com sucesso.',
                    'update-success' => 'Evento atualizado com sucesso.',
                ],

                'templates' => [
                    'create-success' => 'Modelo de email adicionado com sucesso.',
                    'delete-success' => 'Modelo de email excluído com sucesso.',
                    'update-success' => 'Modelo de email atualizado com sucesso.',
                ],
            ],

            'promotions' => [
                'cart-rules' => [
                    'create-success' => 'Regra de carrinho adicionada com sucesso.',
                    'delete-success' => 'Regra de carrinho excluída com sucesso.',
                    'update-success' => 'Regra de carrinho atualizada com sucesso.',
                ],

                'catalog-rules' => [
                    'create-success' => 'Regra de catálogo adicionada com sucesso.',
                    'delete-success' => 'Regra de catálogo excluída com sucesso.',
                    'update-success' => 'Regra de catálogo atualizada com sucesso.',
                ],

                'cart-rule-coupons' => [
                    'create-success' => 'Cupom de regra de carrinho adicionado com sucesso.',
                    'delete-success' => 'Cupom de regra de carrinho excluído com sucesso.',
                    'update-success' => 'Cupom de regra de carrinho atualizado com sucesso.',

                    'mass-operations' => [
                        'delete-success' => 'Páginas selecionadas excluídas com sucesso.',
                    ],
                ],
            ],
        ],

        'settings' => [
            'locales' => [
                'create-success' => 'Local adicionado com sucesso.',
                'delete-success' => 'Local excluído com sucesso.',
                'update-success' => 'Local atualizado com sucesso.',

                'error' => [
                    'last-item-delete' => 'Pelo menos um local é necessário.',
                ],
            ],

            'currencies' => [
                'create-success' => 'Moeda adicionada com sucesso.',
                'delete-success' => 'Moeda excluída com sucesso.',
                'update-success' => 'Moeda atualizada com sucesso.',

                'error' => [
                    'last-item-delete' => 'Pelo menos uma moeda é necessária.',
                ],
            ],

            'exchange-rates' => [
                'create-success' => 'Taxa de câmbio adicionada com sucesso.',
                'delete-success' => 'Taxa de câmbio excluída com sucesso.',
                'update-success' => 'Taxa de câmbio atualizada com sucesso.',
            ],

            'inventory-sources' => [
                'create-success' => 'Fonte de inventário adicionada com sucesso.',
                'delete-success' => 'Fonte de inventário excluída com sucesso.',
                'update-success' => 'Fonte de inventário atualizada com sucesso.',

                'error' => [
                    'last-item-delete' => 'Pelo menos uma fonte de inventário é necessária.',
                ],
            ],

            'taxes' => [
                'tax-rates' => [
                    'create-success' => 'Taxa de imposto adicionada com sucesso.',
                    'delete-success' => 'Taxa de imposto excluída com sucesso.',
                    'update-success' => 'Taxa de imposto atualizada com sucesso.',
                ],

                'tax-categories' => [
                    'create-success' => 'Categoria de imposto adicionada com sucesso.',
                    'delete-success' => 'Categoria de imposto excluída com sucesso.',
                    'update-success' => 'Categoria de imposto atualizada com sucesso.',
                ],
            ],

            'channels' => [
                'create-success' => 'Canal adicionado com sucesso.',
                'delete-success' => 'Canal excluído com sucesso.',
                'update-success' => 'Canal atualizado com sucesso.',

                'error' => [
                    'last-item-delete' => 'Pelo menos um canal é necessário.',
                ],
            ],

            'users' => [
                'create-success' => 'Usuário adicionado com sucesso.',
                'delete-success' => 'Usuário excluído com sucesso.',
                'update-success' => 'Usuário atualizado com sucesso.',

                'error' => [
                    'cannot-change-column' => 'Não é possível alterar os usuários.',
                    'last-item-delete'     => 'Pelo menos um usuário é necessário.',
                ],
            ],

            'roles' => [
                'create-success' => 'Função adicionada com sucesso.',
                'delete-success' => 'Função excluída com sucesso.',
                'update-success' => 'Função atualizada com sucesso.',

                'error' => [
                    'being-used'       => 'Este recurso de funções está sendo usado no usuário administrativo.',
                    'last-item-delete' => 'Pelo menos uma função é necessária.',
                ],
            ],

            'themes' => [
                'create-success' => 'Tema criado com sucesso',
                'delete-success' => 'Tema excluído com sucesso',
                'update-success' => 'Tema atualizado com sucesso',
            ],
        ],

        'configuration' => [
            'create-success' => 'Configuração adicionada com sucesso.',
            'delete-success' => 'Configuração excluída com sucesso.',
            'update-success' => 'Configuração atualizada com sucesso.',
        ],

        'account' => [
            'create-success'     => 'Conta adicionada com sucesso.',
            'delete-success'     => 'Conta excluída com sucesso.',
            'logged-in-success'  => 'Sessão iniciada com sucesso.',
            'logged-out-success' => 'Sessão encerrada com sucesso.',
            'update-success'     => 'Conta atualizada com sucesso.',

            'error' => [
                'credential-error'  => 'As credenciais fornecidas estão incorretas.',
                'invalid'           => 'Email ou senha inválidos.',
                'password-mismatch' => 'A senha atual não corresponde.',
            ],
        ],
    ],

    'shop' => [
        'customer' => [
            'addresses' => [
                'create-success' => 'Seu endereço foi criado com sucesso.',
                'delete-success' => 'Seu endereço foi excluído com sucesso.',
                'update-success' => 'Seu endereço foi atualizado com sucesso.',
            ],

            'accounts' => [
                'create-success'     => 'Sua conta foi criada com sucesso.',
                'delete-success'     => 'Sua conta foi excluída com sucesso.',
                'update-success'     => 'Sua conta foi atualizada com sucesso.',
                'logged-in-success'  => 'Conectado com sucesso.',
                'logged-out-success' => 'Desconectado com sucesso.',

                'error' => [
                    'invalid'          => 'Email ou senha inválidos',
                    'credential-error' => 'As credenciais fornecidas estão incorretas.',
                ],
            ],
        ],

        'checkout' => [
            'billing-address-saved'   => 'Endereço salvo com sucesso.',
            'check-billing-address'   => 'Por favor, verifique o endereço de cobrança.',
            'check-shipping-address'  => 'Por favor, verifique o endereço de envio.',
            'minimum-order-message'   => 'O valor mínimo do pedido é :amount.',
            'order-saved'             => 'Pedido salvo com sucesso.',
            'payment-method-saved'    => 'Método de pagamento salvo com sucesso.',
            'shipping-method-saved'   => 'Método de envio salvo com sucesso.',
            'specify-payment-method'  => 'Por favor, especifique o método de pagamento.',
            'specify-shipping-method' => 'Por favor, especifique o método de envio.',

            'cart' => [
                'item' => [
                    'success'        => 'Item adicionado ao carrinho com sucesso.',
                    'success-remove' => 'Item removido do carrinho com sucesso.',
                ],

                'quantity' => [
                    'illegal' => 'A quantidade não pode ser menor que um.',
                    'success' => 'Item(s) do carrinho atualizado(s) com sucesso.',
                ],

                'coupon' => [
                    'apply-issue'    => 'Código de cupom não pode ser aplicado.',
                    'invalid'        => 'Código de cupom inválido.',
                    'success'        => 'Código de cupom aplicado com sucesso.',
                    'success-remove' => 'Cupom removido com sucesso.',
                ],

                'move-wishlist' => [
                    'success' => 'Item movido para a lista de desejos com sucesso.',
                ],
            ],
        ],

        'wishlist' => [
            'success'        => 'Item adicionado à lista de desejos com sucesso.',
            'removed'        => 'Item removido da lista de desejos com sucesso.',
            'moved'          => 'Item movido para o carrinho com sucesso.',
            'option-missing' => 'As opções do produto estão faltando, portanto, o item não pode ser movido para a lista de desejos.',

            'error' => [
                'security-warning' => 'Atividade suspeita detectada!',

                'mass-operations' => [
                    'resource-not-found' => 'Produto da lista de desejos selecionada não encontrado.',
                ],
            ],
        ],

        'sales' => [
            'orders' => [
                'cancel' => 'Pedido cancelado com sucesso.',

                'error' => [
                    'cancel-error' => 'Pedido não pode ser cancelado.',
                ],
            ],
        ],

        'catalog' => [
            'products' => [
                'configurable-error' => 'Por favor, selecione pelo menos um atributo configurável.',

                'reviews' => [
                    'create-success' => 'Sua avaliação foi enviada com sucesso.',
                ],
            ],
        ],
    ],
];
