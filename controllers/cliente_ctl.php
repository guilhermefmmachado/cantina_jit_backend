<?php
require_once "../models/cliente.php";

class ClienteController
{
  public function cadastrarCliente()
  {
    $condicaoExecucao = false;
    $condicaoExecucao = isset($_POST["nome"]) && isset($_POST["emailcliente"]) && isset($_POST["senhacliente"]) && isset($_POST["emailescola"]);

    $novoCliente = new Cliente($_POST["nome"], $_POST["emailcliente"], $_POST["senhacliente"], $_POST["emailescola"], $condicaoExecucao);
    return $novoCliente->inserirCliente();
  }
}

$controller = new ClienteController();
echo $controller->cadastrarCliente();
?>