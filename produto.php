<?php

class Produto
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function adicionar(string $nome, string $codigo, string $unidade_medida, string $familia, string $situacao, string $data_implementacao, string $data_liberacao, string $descricao, string $estabelecimento, string $informacoes_complementares): void
    {
        $insereProduto = $this->mysql->prepare('INSERT INTO produtos (`nome`, `codigo`, `unidade_medida`, `familia`, `situacao`, `data_implementacao`, `data_liberacao`, `descricao`, `estabelecimento`, `informacoes_complementares`) 
        VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');
        $insereProduto->bind_param('ssssssssss', $nome, $codigo, $unidade_medida, $familia, $situacao, $data_implementacao, $data_liberacao, $descricao, $estabelecimento, $informacoes_complementares);
        $insereProduto->execute();
    }

    public function exibirTodos(): array
    {
        $resultado = $this->mysql->query('SELECT * FROM produtos');
        $produtos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $produtos;
    }

    public function encontrarPorId(string $id): array
    {
        $selecionaProduto = $this->mysql->prepare("SELECT * FROM produtos WHERE id = ?");
        $selecionaProduto->bind_param('s', $id);
        $selecionaProduto->execute();
        $produto = $selecionaProduto->get_result()->fetch_assoc();
        return $produto;
    }

    public function atualizar(string $nome, string $codigo, string $unidade_medida, string $familia, string $situacao, string $data_implementacao, string $data_liberacao, string $descricao, string $estabelecimento, string $informacoes_complementares, string $id): void
    {
        include_once('config.php');
        $sqlEditar = "UPDATE produtos SET nome='$nome', codigo='$codigo', unidade_medida='$unidade_medida', familia='$familia', situacao='$situacao', data_implementacao='$data_implementacao', data_liberacao='$data_liberacao', descricao = '$descricao', estabelecimento = '$estabelecimento', informacoes_complementares = '$informacoes_complementares' WHERE id='$id'";
        //$editarProduto = $this->mysql->prepare($sqlEditar); 
        //$editarProduto = $this->mysql->prepare('UPDATE produtos SET nome = ?, codigo = ?, unidade_medida = ?, familia = ?, situacao = ?, data_implementacao = ?, data_liberacao = ?, descricao = ?, estabelecimento = ?, informacoes_complementares = ? WHERE id = ?');
        //$editarProduto->bind_param('sssssssssss', $nome, $codigo, $unidade_medida, $familia, $situacao, $data_implementacao, $data_liberacao, $descricao, $estabelecimento, $informacoes_complementares, $id);
        //$editarProduto->execute();
        $mysql->query($sqlEditar);
    }

    public function newCode(string $codigo)
    {
        $result = $this->mysql->query("SELECT MAX(codigo) FROM produtos WHERE codigo LIKE '$codigo';");
        $code = $result->fetch_all(MYSQLI_ASSOC);
        $code = $code[0]['MAX(codigo)'];
        if ($code == NULL) {
            $code = $codigo . '001';
        } else {
            $code = $codigo . str_pad(substr($code, -3) + 1, 3, '0', STR_PAD_LEFT);
        }
        return $code;
    }
}