<?php
session_start();
require_once "./classes/Modal.php";

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    // Se estiver sendo acessado diretamente, emite um erro 403 (acesso proibido)
    header('HTTP/1.0 403 Forbidden');
    exit('Acesso proibido. Você tentou acessar: ' . $_SERVER['REQUEST_URI']);
}

$mensagem = "Você está saindo da plataforma. Deseja mesmo realizar essa ação?";
$cores = ["cabecalho" => "danger", "texto" => "white", "botao" => "danger"];

$modal = new Modal("Sair", "Saída", $mensagem, "./login.php", "Sair", $cores);
$modal->renderModal();
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand mb-0 h1"><i class="bi bi-cart2"></i> | SISGEP</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./consulta.php">Produtos</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2" style="font-size: 10pt;">
                            <?php echo $_SESSION["usuario"]; ?>
                        </span>
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./conta.php">Conta</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalSair">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>