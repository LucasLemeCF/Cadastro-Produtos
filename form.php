<!DOCTYPE html>
<html lang="pt-br">

<?php
    require 'config.php';
    require 'produto.php';

    $produto = new Produto($mysql);

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $title = '<title>Atualizar</title>';
        $action = "atualizar.php";
        $cardColor = 'border-warning';
        $cardHeader = '<h5 class="card-header text-warning">Atualizar</h5>';
        $button = '<a type="submit" name="atualizar"  class="btn btn-warning" >Atualizar</a>
        <a type="button" class="btn btn-outline-warning" href="lista.php">Voltar</a>';

        $produto = $produto->encontrarPorId($_GET['id']);
        $nome = $produto["nome"];
        $codigo = $produto['codigo'];
        $unidadeMedida = $produto["unidade_medida"];
        $familia = $produto['familia'];
        $situacao = $produto['situacao'];
        $dataImplementacao = $produto['data_implementacao'];
        $dataLiberacao = $produto['data_liberacao'];
        $descricao = $produto['descricao'];
        $estabelecimento = $produto['estabelecimento'];
        $informacoesComplementares = $produto['informacoes_complementares'];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //$novoProduto = new Produto($mysql);
            //$novoProduto->atualizar($_POST['nome'], $_POST['codigo'], $_POST['unidade_medida'], $_POST['familia'], $_POST['situacao'], $_POST['data_implementacao'], $_POST['data_liberacao'], $_POST['descricao'], $_POST['estabelecimento'], $_POST['informacoes_complementares'], $_POST['id']);
            header('Location: atualizar.php');
        }
        
    } else {
        $title = '<title>Adicionar</title>';
        $action = "form.php";
        $cardColor = 'border-success';
        $cardHeader = '<h5 class="card-header text-success">Adicionar</h5>';
        $button = '<a type="submit" class="btn btn-success">Adicionar</a>
        <a type="button" class="btn btn-outline-success" href="lista.php">Voltar</a>';

        $nome = '';
        $codigo = '';
        $unidadeMedida = 'Selecione a Unidade de Medida';
        $familia = 'Selecione a família';
        $situacao = 'Selecione a situação';
        $dataImplementacao = '';
        $dataLiberacao = '';
        $descricao = '';
        $estabelecimento = '';
        $informacoesComplementares = '';

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $novoProduto = new Produto($mysql);
            $novoProduto->adicionar($_POST['nome'], $_POST['codigo'], $_POST['unidade_medida'], $_POST['familia'], $_POST['situacao'], $_POST['data_implementacao'], $_POST['data_liberacao'], $_POST['descricao'], $_POST['estabelecimento'], $_POST['informacoes_complementares']);     
            header('Location: lista.php');
        }
    }
    
?>

<head>
    <?php echo $title ?>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <script src="ajust.js"></script>
</head>

<body>
    <div class="card m-3 <?php echo $cardColor ?>">
        <?php echo $cardHeader?>
        <div class="card-body">
            <form action=<?php echo $action ?> method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <div class="row mb-3 mt-3">
                    <div class="col">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Código</label>
                        <input type="text" class="form-control" name="codigo" value="<?php echo $codigo ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Unidade de Medida</label>
                        <select class="form-select" aria-label="unidade_medida" name="unidade_medida" >
                            <option selected value="<?php echo $unidadeMedida ?>"> <?php echo $unidadeMedida ?> </option>
                            <option value="UN">UN - Unidade</option>
                            <option value="PC">PC - Peça</option>
                            <option value="KG">KG - Kilograma</option>
                            <option value="G">G - Grama</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Família</label>
                        <select class="form-select" aria-label="familia" name="familia">
                            <option selected value="<?php echo $familia ?>"> <?php echo $familia ?> </option>
                            <option value="MTE">MTE - Material de Escritório</option>
                            <option value="MTP">MTP - Materia Prima</option>
                            <option value="PA">PA - Produto Acabado</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Situação</label>
                        <select class="form-select" aria-label="situacao" name="situacao">
                            <option selected value="<?php echo $situacao ?>"> <?php echo $situacao ?> </option>
                            <option value="ativo">Ativo</option>
                            <option value="obsoleto">Obsoleto</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Data de Implementação</label>
                        <input type="date" class="form-control" name="data_implementacao" value="<?php echo $dataImplementacao ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Data de liberação</label>
                        <input type="date" class="form-control" name="data_liberacao" value="<?php echo $dataLiberacao ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Descrição</label>
                        <textarea type="text" class="form-control overflow-auto" name="descricao"><?php echo $descricao ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Estabelecimento</label>
                        <input type="text" class="form-control" name="estabelecimento" value="<?php echo $estabelecimento ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Informações complementares</label>
                        <textarea type="text" class="form-control overflow-auto" name="informacoes_complementares"><?php echo $informacoesComplementares ?></textarea>
                    </div>
                </div>
                <?php echo $button ?>
            </form>
        </div>
    </div>
</body>

</html>