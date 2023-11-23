<?php

session_start();

if (!isset($_SESSION["usuario"])){
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    require_once "./classes/Crud.php";

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $crud = new Crud();
    $crud->delete("produto", "idproduto=$id");
    
    header('Location: consulta.php?excluir=ok');
}

?>