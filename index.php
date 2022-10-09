<?php
  require_once "models/cardapio.php";
  // require_once "models/produto.php";

  // echo "Hello, World!";

  $visaoCardapio = new Cardapio();
  $visaoCardapio->gerarCardapio();
  
  // $novoProduto = new Produto("a", "b", "d", "4.5", "3", 10, true);
?>