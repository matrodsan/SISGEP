<?php
$titulo = "SISGEP | Edição";
require_once "./cabecalho.php";
require_once "./navbar.php";
require_once "./classes/Crud.php";
require_once "./classes/Alerta.php";

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $crud = new Crud();
    $resultado = mysqli_fetch_assoc($crud->select("produto", "idproduto=$id"));
}

if (isset($_GET['erro'])) { ?>
    <div class="mx-auto mt-5" style="max-width: 700px;">
        <?php
        if (isset($_GET["erro1"])) {
            $erro = $_GET["erro1"];
            $alerta = new Alerta($erro, "Erro!", "danger", "<i class='bi bi-x-circle-fill'></i>");
            echo $alerta->geraAlert();
        }
        if (isset($_GET["erro2"])) {
            $erro = $_GET["erro2"];
            $alerta = new Alerta($erro, "Erro!", "danger", "<i class='bi bi-x-circle-fill'></i>");
            echo $alerta->geraAlert();
        }
        ?>
    </div>
<?php } ?>

<div style="min-height: 100vh;">
    <div class="card mx-auto mt-5" style="max-width: 700px;">
        <div class="card-header">
            <h4>Edição de produto</h4>
        </div>
        <div class="card-body">
            <form action="./atualizar.php" method="post">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <input type="hidden" class="form-control disabled" value="<?php echo $resultado['idproduto']; ?>" name="id">
                            
                            <div class="input-group">
                                <span class="input-group-text" id="id"><i class="bi bi-upc-scan"></i></span>
                                <input type="text" class="form-control disabled" aria-describedby="id" value="<?php echo $resultado['idproduto']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="descricao"><i class="bi bi-list-columns-reverse"></i></span>
                                <input type="text" class="form-control" value="<?php echo $resultado['descricao']; ?>" placeholder="Descrição do produto" aria-label="Descrição" aria-describedby="descricao" name="descricao">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="data"><i class="bi bi-calendar-week"></i></span>
                                <input type="text" class="form-control" value="<?php echo $resultado['data']; ?>" placeholder="Data de inclusão" aria-label="Data" aria-describedby="data help-data" name="data_inclusao">
                            </div>
                            <div class="form-text" id="help-data">Siga o formato dd/mm/aaaa.</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="preco"><i class="bi bi-currency-dollar"></i></span>
                                <input type="text" class="form-control" value="<?php echo $resultado['preco']; ?>" placeholder="Preço" aria-label="Preço" aria-describedby="preco" name="preco">
                            </div>
                            <div class="form-text" id="help-preco">Insira somente números válidos.</div>

                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-sm-6 d-grid">
                        <button type="submit" class="btn btn-success" name="atualizar">Atualizar</button>
                    </div>
                    <div class="col-sm-6 d-grid">
                        <button type="reset" class="btn btn-outline-success">Resetar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
require_once "./rodape.php";
?>