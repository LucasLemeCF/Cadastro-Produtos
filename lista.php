<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>CRUD em PHP</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php
  require 'config.php';
  include 'produto.php';
  
  $produto = new Produto($mysql);
  $produtos = $produto->exibirTodos();
?>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">CRUD em PHP</a>
        </div>
    </nav>
    <a type="button" class="btn btn-success m-3"
        href="http://localhost:8081/Cadastro-Produtos/form.php">Adicionar</a>
    <table class="table table-striped align-middle text-center">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">familia</th>
                <th scope="col">Und. Medida</th>
                <th scope="col">Data de Implementação</th>
                <th scope="col">Data de Liberação</th>
                <th scope="col">Situação</th>
                <th scope="col">Estabelecimento</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) : ?>
            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td><?php echo $produto['codigo']; ?></td>
                <td><?php echo $produto['nome']; ?></td>
                <td><?php echo $produto['familia']; ?></td>
                <td><?php echo $produto['unidade_medida']; ?></td>
                <td><?php echo $produto['data_implementacao']; ?></td>
                <td><?php echo $produto['data_liberacao']; ?></td>      
                <td><?php echo $produto['situacao']; ?></td>
                <td><?php echo $produto['estabelecimento']; ?></td>
                <td>
                    <button type="button" class="btn btn-primary">Descrição</button>
                    <button type="button" class="btn btn-warning">Atualizar</button>
                    <button type="button" class="btn btn-danger">Excluir</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>