<?php
// controles_php/ProdutoController.php

require __DIR__ . '/../config/database.php';
require __DIR__ . '/../classe_dados/ProdutoDado.php';

$produtoDado = new ProdutoDado($pdo);
$action = $_GET['action'] ?? 'list';

switch ($action) {
    case 'list':
        $produtos = $produtoDado->listar();
        include __DIR__ . '/../templates_html/produto_list.php';
        break;

    case 'new':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produtoDado->inserir(
                trim($_POST['nome_produto']),
                trim($_POST['validade_produto']) ?: null
            );
            header('Location: ProdutoController.php?action=list');
            exit;
        }
        $produto = ['id_produto' => 0, 'nome_produto' => '', 'validade_produto' => ''];
        include __DIR__ . '/../templates_html/produto_form.php';
        break;

    case 'edit':
        $id = (int)($_GET['id'] ?? 0);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produtoDado->atualizar(
                $id,
                trim($_POST['nome_produto']),
                trim($_POST['validade_produto']) ?: null
            );
            header('Location: ProdutoController.php?action=list');
            exit;
        }
        $produto = $produtoDado->buscarPorId($id);
        include __DIR__ . '/../templates_html/produto_form.php';
        break;

    case 'delete':
        $id = (int)($_GET['id'] ?? 0);
        $produtoDado->remover($id);
        header('Location: ProdutoController.php?action=list');
        exit;

    default:
        header('Location: ProdutoController.php?action=list');
        exit;
}
