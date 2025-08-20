<?php 

    $host = "localhost";
    $user = "root" ;
    $senha = "";
    $db = "loja_ead";

    $mysqli = new mysqli($host, $user, $senha, $db);

    if($mysqli->connect_error){
        echo "Falha de conexão" . $mysqli->connect_error;
        exit();
    }

?>