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

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $produto = new Produto($mysql);
        $produto->adicionar($_POST['nome'], $_POST['codigo'], $_POST['unidade_medida'], $_POST['familia'], $_POST['situacao'], $_POST['data_implementacao'], $_POST['data_liberacao'], $_POST['descricao'], $_POST['estabelecimento'], $_POST['informacoes_complementares']);
        header('Location: lista.php');
        die();
    }
   
?>

<body>
    <div class="card 
        <?php if (isset($_GET['id']) && !empty($_GET['id'])) {
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
            <form action="form.php" method="POST">
            <div class="row mb-3 mt-3">
                    <div class="col">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="col">
                        <label class="form-label">Código</label>
                        <input type="text" class="form-control" name="codigo">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Unidade de Medida</label>
                        <select class="form-select" aria-label="unidade_medida" name="unidade_medida">
                            <option selected>Selecione a Unidade de Medida</option>
                            <option value="UN">UN - Unidade</option>
                            <option value="PC">PC - Peça</option>
                            <option value="KG">KG - Kilograma</option>
                            <option value="G">G - Grama</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Família</label>
                        <select class="form-select" aria-label="familia" name="familia">
                            <option selected>Selecione a família</option>
                            <option value="MTE">MTE - Material de Escritório</option>
                            <option value="MTP">MTP - Materia Prima</option>
                            <option value="PA">PA - Produto Acabado</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Situação</label>
                        <select class="form-select" aria-label="situacao" name="situacao">
                            <option selected>Selecione a situação</option>
                            <option value="ativo">Ativo</option>
                            <option value="obsoleto">Obsoleto</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Data de Implementação</label>
                        <input type="date" class="form-control" name="data_implementacao">
                    </div>
                    <div class="col">
                        <label class="form-label">Data de liberação</label>
                        <input type="date" class="form-control" name="data_liberacao">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Descrição</label>
                        <textarea type="text" class="form-control overflow-auto" name="descricao"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Estabelecimento</label>
                        <input type="text" class="form-control" name="estabelecimento">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Informações complementares</label>
                        <textarea type="text" class="form-control overflow-auto" name="informacoes_complementares"></textarea>
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
            </form>
        </div>
    </div>
</body>

</html>