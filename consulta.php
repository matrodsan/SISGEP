<?php
$titulo = "SISGEP | Consulta";
require_once "./cabecalho.php";
require_once "./navbar.php";
require_once "./classes/Crud.php";
require_once "./classes/Alerta.php";
require_once "./classes/Modal.php";

$crud = new Crud();
$resultado = $crud->select("produto");

if (!isset($_SESSION["usuario"])){
    header("Location: login.php");
    exit;
}

if (isset($_POST["buscar"])) {
    $termo = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);
    $resultado = $crud->select("produto", "descricao LIKE LOWER('%$termo%')");
}
?>

<div class="container-lg mt-5" style="min-height: 100vh;">

    <form action="./consulta.php" method="post">
        <h5>Busca:</h5>
        <div class="row">
            <div class="col-md-4 col-sm-7">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Descrição do produto" aria-label="Descrição" aria-describedby="descricao" name="descricao">
                    <button type="submit" class="btn btn-outline-secondary" name="buscar">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="col">
                <a href="./cadastroProduto.php" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Cadastrar
                </a>
            </div>
        </div>
    </form>

    <h3 class="mt-3 mb-3">Lista de produtos</h3>

    <?php
    if (isset($_GET["sucesso"])) {
        $alert_cadastro = new Alerta("Cadastro realizado com sucesso", "Sucesso!");
        echo $alert_cadastro->geraAlert();
    }
    if (isset($_GET["sucesso_atualiza"])) {
        $alert_update = new Alerta("Registro atualizado com sucesso", "Sucesso!");
        echo $alert_update->geraAlert();
    }
    if (isset($_GET["excluir"])) {
        if ($_GET["excluir"] === "ok") {
            $alert_exclusao = new Alerta("Registro excluído com sucesso", "Sucesso!");
        } else {
            $alert_exclusao = new Alerta("Ocorreu uma falha na exclusão do registro", "Erro!", "danger", "<i class='bi bi-x-circle-fill'></i>");
        }
        echo $alert_exclusao->geraAlert();
    }
    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col">Data</th>
                <th scope="col">Preço</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['idproduto']; ?></th>
                        <td><?php echo $row['descricao']; ?></td>
                        <td><?php echo $row['data']; ?></td>
                        <td>R$ <?php echo $row['preco']; ?></td>
                        <td>
                            <a href="./editaProduto.php?id=<?php echo $row['idproduto']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?php echo $row['idproduto']; ?>"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>

                    <!-- Modal -->
                <?php
                    $id = $row['idproduto'];
                    $titulo = "Excluir?";
                    $mensagem = "Deseja realmente <strong>EXCLUIR</strong> o registo <i>" . $row["descricao"] . "</i>?";
                    $acao = "./exclusao.php?id=$id";
                    $texto_botao = "Excluir";
                    $cores = ['cabecalho' => 'danger', 'botao' => 'danger', 'texto' => 'white'];

                    $modal = new Modal($id, $titulo, $mensagem, $acao, $texto_botao, $cores);
                    $modal->renderModal();
                }
            } else { ?>
                <tr>
                    <th scope="row">-</th>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
require_once("./rodape.php");
?>