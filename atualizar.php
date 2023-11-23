<?php
if (isset($_POST["atualizar"])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = str_replace(",", ".", $_POST['preco']);
    $data_inclusao = $_POST['data_inclusao'];

    $regex_data = "/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/";
    $regex_preco = "/^\d+(\.\d+)?$/";

    require_once "./classes/Crud.php";

    $crud = new Crud();

    if (preg_match($regex_data, $data_inclusao) && preg_match($regex_preco, $preco)) {
        $dados = ["descricao" => $descricao, "preco" => $preco, "data" => $data_inclusao];
        $crud->update("produto", $dados, "idproduto=$id");
        header('Location: consulta.php?sucesso_atualiza');
        exit;
    } else {
        $erros = [];
        if (!preg_match($regex_data, $data_inclusao)) {
            $erros['erro1'] = 'A data inserida é inválida';
        }
        if (!preg_match($regex_preco, $preco)) {
            $erros['erro2'] = 'O preço inserido é inválido';
        }

        $location = http_build_query($erros);
        header("Location: editaProduto.php?id=" . $id . "&erro&" . $location);
    }
}
?>
