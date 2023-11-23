<?php
$titulo = "SISGEP | Cadastro de usuário";
require_once "./cabecalho.php";
require_once "./classes/Alerta.php";
?>

<div class="mx-auto mt-3" style="max-width: 400px;">
    <?php
    if (isset($_GET["erro"])) {
        $alerta = new Alerta($_GET["erro"], "Erro!", "danger", "<i class='bi bi-x-circle-fill'></i>");
        echo $alerta->geraAlert();
    }
    ?>
</div>

<!-- CONFIGURAÇÃO DO CARD -->
<div class="card mx-auto mt-5 shadow" style="max-width: 400px;">
    <div class="card-header">
        <h4>Cadastrar usuário</h3>
    </div>
    <div class="card-body">
        <form action="./incluirUsuario.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text" id="user"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" placeholder="Usuário" aria-label="user" aria-describedby="user" name="user">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="confirmaUser"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" placeholder="Confirme o usuário" aria-label="confirmaUser" aria-describedby="confirmaUser" name="confirmaUser">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="senha"><i class="bi bi-lock-fill"></i></span>
                <input type="password" class="form-control" placeholder="Senha" aria-label="senha" aria-describedby="senha" name="senha">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="confirmaSenha"><i class="bi bi-lock-fill"></i></span>
                <input type="password" class="form-control" placeholder="Confirme a senha" aria-label="confirmaSenha" aria-describedby="confirmaSenha" name="confirmaSenha">
            </div>
            <div class="d-grid mt-1">
                <button class="btn btn-primary mb-2" type="submit" name="cadastrar">Cadastrar</button>
                <a class="btn btn-outline-primary" href="./login.php">Voltar</a>
            </div>
        </form>
    </div>
</div>


<?php
require_once("./rodape.php");
?>