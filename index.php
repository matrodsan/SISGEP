<?php

// Incluindo a biblioteca AltoRouter
require 'vendor/autoload.php';

// Criando um objeto AltoRouter
$router = new AltoRouter();

// Mapeando as rotas
$router->map('GET', '/sisgep/', 'LoginController#index');

// Correspondendo a rota atual
$match = $router->match();

// Se houver uma rota correspondente
if ($match) {
  // Obtendo os detalhes da rota correspondente
  list($controller, $action) = explode('#', $match['target']);

  // Incluindo o controlador correspondente
  require_once "controllers/{$controller}.php";

  // Instanciando o controlador
  $controller = new $controller();

  // Chamando a ação correspondente
  call_user_func_array([$controller, $action], $match['params']);
} else {
  // Rota não encontrada
  echo 'Rota não encontrada';
}

?>