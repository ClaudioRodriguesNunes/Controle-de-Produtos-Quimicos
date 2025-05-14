# Projeto Controle de Produtos Químicos (PGP-1)

Este é um projeto acadêmico desenvolvido em dupla para a disciplina de Banco de Dados e Desenvolvimento Web, com o objetivo de controlar produtos químicos na plataforma Garoupa (PGP-1) da Petrobras.

## 📖 Descrição

O sistema permite o cadastro e gerenciamento de:

- **Produtos Químicos**: nome, validade  
- **Pessoas**: operadores e supervisores  
- **Recipientes**: bombonas, barris e tanques portáteis  
- **Tanques Operacionais**: status, localização, nível de produto  
- **Movimentações de Estoque**: abastecimento e retorno de recipientes  
- **Solicitações GEM**: requisições de entrada e saída de produtos  

O minimundo completo está detalhado no arquivo `estrutura.sql` e no documento de especificação.

## 🚀 Tecnologias

- **Servidor Web:** WampServer (Apache + MySQL)  
- **Linguagem Back-end:** PHP 8+  
- **Banco de Dados:** MySQL (MariaDB compatível)  
- **Front-end:** HTML5, CSS3, Bootstrap 5  
- **Documentação:** phpDocumentor (via `composer require --dev phpdocumentor/phpdocumentor`)

## 🗂️ Estrutura de Pastas

```text
controle_quimicos/
├ config/               Configurações do projeto (conexão PDO)
│  └ database.php
├ controles_php/        Controladores (controllers) em PHP
│  └ ProdutoController.php
├ classe_dados/         Modelos de acesso a dados (classes CRUD)
│  └ ProdutoDado.php
├ templates_html/       Views (templates HTML + Bootstrap)
│  ├ produto_list.php
│  └ produto_form.php
├ scripts_css/          Arquivos estáticos CSS (Bootstrap ou estilos customizados)
└ testar_conexao.php    Script de teste da conexão ao banco
