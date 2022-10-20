<?php
require_once "../models/login.php";

class ProfileViewData
{
  public function obterDadosPerfil()
  {
    $condicaoExecucao = false;
    $condicaoExecucao = isset($_POST["ator"]);

    $login = new Login("", "", $_POST["ator"], $condicaoExecucao);
    return $login->autenticarUsuario();
  }
}

$controller = new ProfileViewData();
echo $controller->obterDadosPerfil();
?>