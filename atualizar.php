<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST["nome"];
        $codigo = $_POST['codigo'];
        $unidadeMedida = $_POST["unidade_medida"];
        $familia = $_POST['familia'];
        $situacao = $_POST['situacao'];
        $dataImplementacao = $_POST['data_implementacao'];
        $dataLiberacao = $_POST['data_liberacao'];
        $descricao = $_POST['descricao'];
        $estabelecimento = $_POST['estabelecimento'];
        $informacoesComplementares = $_POST['informacoes_complementares'];
        
        $sqlEditar = "UPDATE produtos SET nome='$nome', codigo='$codigo', unidade_medida='$unidade_medida', familia='$familia', 
        situacao='$situacao', data_implementacao='$data_implementacao', data_liberacao='$data_liberacao', descricao = '$descricao', 
        estabelecimento = '$estabelecimento', informacoes_complementares = '$informacoes_complementares' WHERE id='$id'";

        $result = $mysql->query($sqlEditar);
    }
    header('Location: lista.php');

?>                                                                                                          