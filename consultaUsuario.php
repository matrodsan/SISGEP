<?php

if (isset($_POST["entrar"]) && $_POST["usuario"] && $_POST["senha"]) {
  $email = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_EMAIL);
  $senha = $_POST["senha"];

  require_once "./classes/Crud.php";

  $crud = new Crud();
  $resultado = mysqli_fetch_assoc($crud->select("usuario", "email='$email'"));

  if ($resultado) {
    if ($resultado["senha"] === md5($senha)) {
      session_start();
      $_SESSION["usuario"] = $resultado["email"];
      header("Location: consulta.php");
      exit;
    } else {
      header("Location: login.php?" . http_build_query(["erro" => "Senha ou nome de usuário incorretos!"]));
      exit;
    }
  } else {
    header("Location: login.php?" . http_build_query(["erro" => "Usuário não encontrado!"]));
    exit;
  }
} else {
  header("Location: login.php?" . http_build_query(["erro" => "Ocorreu um erro em sua requisição"]));
  exit;
}

?>
