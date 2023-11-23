<?php
$titulo = "SISGEP | Conta";
require_once("./cabecalho.php");
require_once("./navbar.php");

if (!isset($_SESSION["usuario"])){
    header("Location: login.php");
    exit;
}

?>

<div style="min-height: 80vh;">
    <div class="card mx-auto mt-5" style="max-width: 350px;">
        <div class="card-header">
            <h4>Conta</h4>
        </div>
        <div class="card-body">
            <div class="text-center">
                <i class="bi bi-person-circle" style="font-size: 8rem;"></i>
                <h4><?php echo $_SESSION["usuario"]; ?></h4>
            </div>
            <div class="d-grid">
                <a href="./consulta.php" class="btn btn-outline-primary mb-2 mt-3">Voltar</a>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalSair">Sair</a>
            </div>
        </div>
    </div>
</div>

<?php

require_once("./rodape.php");
?>