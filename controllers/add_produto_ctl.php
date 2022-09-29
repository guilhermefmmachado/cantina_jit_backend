<?php
require_once "../models/produto.php";

class AdicionarProdutoController
{
  public function adicionarProduto()
  {
    $condicaoExecucao = false;
    $condicaoExecucao = isset($_POST["nome"]) && isset($_POST["tipo"]) && isset($_POST["preco"]) && isset($_POST["estoque"]);
    $novoProduto = new Produto($_POST["nome"], $_POST["desc"], $_POST["tipo"], $_POST["preco"], $_POST["estoque"], $condicaoExecucao);
    return $novoProduto->inserirProduto();
  }
}

$controller = new AdicionarProdutoController();
echo $controller->adicionarProduto();
?>