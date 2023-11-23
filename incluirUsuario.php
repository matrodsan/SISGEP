<?php

require_once "./validaEmail.php";
require_once "./classes/Crud.php";

$crud = new Crud();

if (isset($_POST["cadastrar"])) {
  $email = $_POST["user"];
  $confirmaEmail = $_POST["confirmaUser"];
  $senha = $_POST["senha"];
  $confirmaSenha = $_POST["confirmaSenha"];

  if (validaEmail($email)) {
    if ($email === $confirmaEmail && $senha === $confirmaSenha) {
      if (mysqli_num_rows($crud->select("usuario", "email='$email'")) === 0) {
        $senha = md5($senha);

        $dados = ["email" => $email, "senha" => $senha];
        $crud->insert("usuario", $dados);

        header("Location: login.php?sucesso");
        exit;
      } else {
        $erro = http_build_query(["erro" => "Já existe cadastro para este endereço de e-mail"]);

        header("Location: cadastroUsuario.php?$erro");
        exit;
      }
    } else {
      $erro = http_build_query(["erro" => "Os campos de confirmação devem ser iguais aos originais"]);

      header("Location: cadastroUsuario.php?$erro");
      exit;
    }
  } else {
    $erro = http_build_query(["erro" => "E-mail inválido"]);

    header("Location: cadastroUsuario.php?$erro");
    exit;
  }
}

?>