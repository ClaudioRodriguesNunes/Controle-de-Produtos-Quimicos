<?php
// classe_dados/ProdutoDado.php

require __DIR__ . '/../config/database.php';

class ProdutoDado {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function listar(): array {
        $stmt = $this->pdo->query("SELECT * FROM ProdutoQuimico ORDER BY id_produto");
        return $stmt->fetchAll();
    }

    public function buscarPorId(int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM ProdutoQuimico WHERE id_produto = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function inserir(string $nome, ?string $validade): void {
        $stmt = $this->pdo->prepare(
            "INSERT INTO ProdutoQuimico (nome_produto, validade_produto) VALUES (?, ?)"
        );
        $stmt->execute([$nome, $validade ?: null]);
    }

    public function atualizar(int $id, string $nome, ?string $validade): void {
        $stmt = $this->pdo->prepare(
            "UPDATE ProdutoQuimico
             SET nome_produto = ?, validade_produto = ?
             WHERE id_produto = ?"
        );
        $stmt->execute([$nome, $validade ?: null, $id]);
    }

    public function remover(int $id): void {
        $stmt = $this->pdo->prepare("DELETE FROM ProdutoQuimico WHERE id_produto = ?");
        $stmt->execute([$id]);
    }
}
