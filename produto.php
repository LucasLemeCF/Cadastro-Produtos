<?php

class Produto
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query('SELECT * FROM produtos');
        $produtos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $produtos;
    }

    public function encontrarPorCodigo(string $codigo): array
    {
        $selecionaProduto = $this->mysql->prepare("SELECT * FROM produtos WHERE codigo = ?");
        $selecionaProduto->bind_param('s', $codigo);
        $selecionaProduto->execute();
        $produto = $selecionaProduto->get_result()->fetch_assoc();
        return $produto;
    }
} 