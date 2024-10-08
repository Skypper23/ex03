<?php 
    $localhost = "localhost";
    $usuario_db = "root";
    $senha_db = "";
    $nome_do_db = "login";
    $conn = new mysqli($localhost, $usuario_db, $senha_db, $nome_do_db);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    
?>