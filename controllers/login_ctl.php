<?php
require_once "../models/login.php";

class LoginController
{
  public function autenticacao()
  {
    $condicaoExecucao = false;
    $condicaoExecucao = isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["ator"]);

    $login = new Login($_POST["email"], $_POST["senha"], $_POST["ator"], $condicaoExecucao);
    return $login->autenticarUsuario();
  }
}

$controller = new LoginController();
echo $controller->autenticacao();
