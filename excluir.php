<?php

    if(!empty($_GET['id'])) {
        include_once('config.php');

        $id = $_GET['id'];

        $result = $mysql->query("SELECT *  FROM produtos WHERE id = $id");

        if($result->num_rows > 0)
        {
            $resultDelete = $mysql->query("DELETE FROM produtos WHERE id = $id");
        }
    }
    header('Location: lista.php');
   
?>