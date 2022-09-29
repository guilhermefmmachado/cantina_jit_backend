<?php

  require_once "classes/produto.php";
  
  $condicaoExecucao = isset($_POST["nome"]) && isset($_POST["tipo"]) && isset($_POST["preco"]) && isset($_POST["estoque"]);

  $novoProduto = new Produto($_POST["nome"], $_POST["desc"], $_POST["tipo"], $_POST["preco"], $_POST["estoque"], $condicaoExecucao);

  echo $novoProduto->inserirProduto();
?>