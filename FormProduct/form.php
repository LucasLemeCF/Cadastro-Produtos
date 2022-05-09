<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php if (isset($_GET['id']) && !empty($_GET['id'])) {
        echo '<title>Atualizar</title>';
    } else {
        echo '<title>Adicionar</title>';
    } ?>
    <!-- <title class="titlePag"></title> -->
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <script src="ajust.js"></script>
</head>

<?php
require 'config.php';
require 'produto.php';

$obj_produto = new Produto($mysql);
$produto = $obj_produto->encontrarPorCodigo($_GET['codigo']);
?>

<body>
    <div class="card <?php if (isset($_GET['id']) && !empty($_GET['id'])) {
                            echo 'border-warning';
                        } else {
                            echo 'border-success';
                        } ?> m-3">
        <?php if (isset($_GET['id']) && !empty($_GET['id'])) {
            echo '<h5 class="card-header text-warning">Atualizar</h5>';
        } else {
            echo '<h5 class="card-header text-success">Adicionar</h5>';
        } ?>
        <div class="card-body">
            <form>
                <div class="row mb-3 mt-3">
                    <div class="col">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control ">
                    </div>
                    <div class="col">
                        <label class="form-label">Código</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Unidade de Medida</label>
                        <select class="form-select">
                            <option selected>Selecione a undiade de medida</option>
                            <option value="1">UN - Unidade</option>
                            <option value="2">KG - Quilograma</option>
                            <option value="3">SC - Saco</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Família</label>
                        <select class="form-select" aria-label="familia">
                            <option selected>Selecione a família</option>
                            <option value="MTE">MTE - Material de Escritório</option>
                            <option value="MTP">MTP - Materia Prima</option>
                            <option value="PA">PA - Produto Acabado</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Situação</label>
                        <select class="form-select">
                            <option selected>Selecione a situação</option>
                            <option value="1">Ativo</option>
                            <option value="2">Obsoleto</option>
                            <option value="3">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Data de Implementação</label>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">Data de liberação</label>
                        <input type="datetime-local" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Descrição</label>
                        <textarea type="text" class="form-control overflow-auto"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nome do Estabelecimento</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <?php if (isset($_GET['id']) && !empty($_GET['id'])) {
                    echo '<button type="submit" class="btn btn-warning">Atualizar</button>
                    <a type="button" class="btn btn-outline-warning"
                    href="http://localhost:8081/Cadastro-Produtos/lista.php">Voltar</a>';
                } else {
                    echo '<button type="submit" class="btn btn-success">Adicionar</button>
                    <a type="button" class="btn btn-outline-success"
                    href="http://localhost:8081/Cadastro-Produtos/lista.php">Voltar</a>';
                } ?>
                <!--  <button type="submit" class="btn btn-warning">Atualizar</button> -->

            </form>
        </div>
    </div>
</body>

</html>