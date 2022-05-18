<?php 
require 'config.php';
require 'produto.php';

$produtos = new Produto($mysql);
if (isset($_GET['familia']) && !empty($_GET['familia'])) {
    $familiaSelect = $_GET['familia'];
    if ($familiaSelect != 'Selecione a família') {
        $nextCode = $produtos->newCode($familiaSelect);
        echo $nextCode;
    }
}