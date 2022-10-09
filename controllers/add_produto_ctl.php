<?php
require_once "../models/produto.php";

class AdicionarProdutoController
{
  public function adicionarProduto()
  {
    $condicaoExecucao = false;
    $condicaoExecucao = isset($_POST["nome"]) && isset($_POST["tipo"]) && isset($_POST["preco"]) && isset($_POST["estoque"]) && isset($_POST["limqtdeporselecao"]);
    
    $novoProduto = new Produto($_POST["nome"], $_POST["desc"], $_POST["tipo"], $_POST["preco"], $_POST["limqtdeporselecao"], $_POST["estoque"], $condicaoExecucao);
    // $novoProduto = new Produto($_POST["nome"], $_POST["desc"], $_POST["tipo"], $_POST["preco"], $_POST["limqtdeporselecao"] $_POST["estoque"]);
    return $novoProduto->inserirProduto();
  }
}

$controller = new AdicionarProdutoController();
echo $controller->adicionarProduto();
?>