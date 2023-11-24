<?php
$titulo = "SISGEP | Login";
require_once "./includes/cabecalho.php";
require_once "./classes/Alerta.php";
session_start();
session_unset();
?>

<div class="mx-auto mt-5 d-flex flex-column align-items-center text-center" style="max-width: 400px;">
    <div class="rounded-circle d-flex bg-dark justify-content-center align-items-center text-white login-icon-container rotate-vert-center shadow" style="width: 90px; height: 90px;">
        <i class="bi bi-cart2 login-icon"></i>
    </div>
    <h2 class="my-2">SISGEP</h2>
    <span class="mb-3">SISTEMA DE GERENCIAMENTO DE PRODUTOS</span>
    <div class="mx-auto d-grid" style="max-width: 400px;">
        <?php
        if (isset($_GET["erro"])) {
            $erro_login = new Alerta($_GET["erro"], "Erro!", "danger", "<i class='bi bi-x-circle-fill'></i>");
            echo $erro_login->geraAlert();
        }
        if (isset($_GET["sucesso"])) {
            $sucesso = new Alerta("Cadastro realizado com sucesso!", "Sucesso");
            echo $sucesso->geraAlert();
        }
        ?>
    </div>
</div>

<!-- CONFIGURAÇÃO DO CARD -->
<div class="card mx-auto mt-3 shadow" style="max-width: 400px;">
    <div class="card-header">
        <h4>Login</h4>
    </div>
    <div class="card-body">
        <form action="./consultaUsuario.php" method="POST">
            <div class="input-group my-3">
                <span class="input-group-text" id="user"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" placeholder="Usuário" aria-label="user" aria-describedby="user" name="usuario">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="senha"><i class="bi bi-lock-fill"></i></span>
                <input type="password" class="form-control" placeholder="Senha" aria-label="senha" aria-describedby="senha" name="senha">
            </div>
            <a href="./cadastroUsuario.php">Cadastre-se</a>
            <div class="d-grid mt-1">
                <button class="btn btn-primary" type="submit" name="entrar">Entrar</button>
            </div>
        </form>
    </div>
</div>

<?php
require_once("./rodape.php");
?>