<?php
require_once "../models/produto.php";

class RemoverProdutoController
{
  public function removerProduto()
  {
    $condicaoExecucao = false;
    $condicaoExecucao = isset($_POST["nome"]);
    
    $novoProduto = new Produto($_POST["nome"], "", "", "0", "0", "0", $condicaoExecucao);
    // $novoProduto = new Produto($_POST["nome"], $_POST["desc"], $_POST["tipo"], $_POST["preco"], $_POST["limqtdeporselecao"] $_POST["estoque"]);
    return $novoProduto->excluirProduto();
  }
}

$controller = new RemoverProdutoController();
echo $controller->removerProduto();
?>