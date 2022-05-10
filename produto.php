<?php

class Produto
{
    private $mysql;

    public function __construct(mysqli $mysql) {
        $this->mysql = $mysql;
    }

    public function adicionar(string $nome, string $codigo, string $unidade_medida, string $familia, string $situacao, string $data_implementacao, string $data_liberacao, string $descricao, string $estabelecimento, string $informacoes_complementares): void{
        $insereProduto = $this->mysql->prepare('INSERT INTO produtos (`nome`, `codigo`, `unidade_medida`, `familia`, `situacao`, `data_implementacao`, `data_liberacao`, `descricao`, `estabelecimento`, `informacoes_complementares`) 
        VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');
        $insereProduto->bind_param('ssssssssss', $nome, $codigo, $unidade_medida, $familia, $situacao, $data_implementacao, $data_liberacao, $descricao, $estabelecimento, $informacoes_complementares);
        $insereProduto->execute();
    }

    public function exibirTodos(): array {
        $resultado = $this->mysql->query('SELECT * FROM produtos');
        $produtos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $produtos;
    }

    public function encontrarPorId(string $id): array {
        $selecionaProduto = $this->mysql->prepare("SELECT id FROM produtos WHERE id = ?");
        $selecionaProduto->bind_param('s', $id);
        $selecionaProduto->execute();
        $produto = $selecionaProduto->get_result()->fetch_assoc();
        return $produto;
    }

} 