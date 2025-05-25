# Twitter - Timeline de Tweets em PHP

## Visão Geral do Projeto

Este projeto é uma aplicação PHP que simula uma timeline do Twitter. Os usuários podem visualizar uma lista de tweets, ver detalhes de cada tweet, filtrar tweets por tópico e gerenciar tweets através de uma área protegida.

## Funcionalidades

- **Timeline de Tweets**: Exibe uma lista de tweets com imagens, títulos e tópicos.
- **Detalhes do Tweet**: Cada tweet possui uma página dedicada mostrando informações detalhadas.
- **Filtragem**: Os usuários podem filtrar tweets por tópico em `pesquisar.php`.
- **Autenticação de Usuário**: Um sistema de login restringe o acesso à área protegida (`login.php` e `protected.php`).
- **Área Protegida**: Usuários autenticados podem adicionar novos tweets e visualizar a lista de tweets cadastrados em `protected.php`.

## Estrutura de Arquivos

```
php-twitter-clone
├── data
│   └── items.php
├── components
│   ├── footer.php
│   └── header.php
├── functions
│   └── helpers.php
├── index.php
├── detalhes.php
├── pesquisar.php
├── login.php
├── protected.php
├── README.md
└── .gitignore
```

## Instruções de Configuração

1. **Clone o repositório** ou baixe os arquivos do projeto para sua máquina local.
2. **Certifique-se de ter um servidor local** (como XAMPP, WAMP ou MAMP) rodando PHP.
3. **Coloque a pasta do projeto** no diretório raiz do servidor (por exemplo, `htdocs` para XAMPP).
4. **Acesse a aplicação** navegando para `http://localhost/php-microblogging/index.php` no seu navegador.
