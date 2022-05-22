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
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">CRUD em PHP</a>
        </div>
    </nav>
    <a type="button" class="btn btn-success m-3" href="form.php">Adicionar</a>
    <table class="table table-striped align-middle text-center">
        <thead>
            <tr>
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
                <td><?php echo $produto['codigo']; ?></td>
                <td><?php echo $produto['nome']; ?></td>
                <td><?php echo $produto['familia']; ?></td>
                <td><?php echo $produto['unidade_medida']; ?></td>
                <td><?php echo strftime('%d/%m/%Y', strtotime($produto['data_implementacao'])); ?></td>
                <td><?php echo strftime('%d/%m/%Y', strtotime($produto['data_liberacao'])); ?></td>
                <td><?php echo $produto['situacao']; ?></td>
                <td><?php echo $produto['estabelecimento']; ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                        Descrição
                    </button>
                    <a type="button" class="btn btn-warning"
                        href="form.php?id=<?php echo $produto['id']; ?>">Atualizar</a>
                    <a type="button" class="btn btn-danger" name="excluir"
                        href="excluir.php?id=<?php echo $produto['id']; ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Descrição do produto</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo $produto['descricao']; ?>
                    </div><hr> 
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Informações complementares</h5>
                    </div>
                        <div class="modal-body">
                            <?php echo $produto['informacoes_complementares']; ?>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>