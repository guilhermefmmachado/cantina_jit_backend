<?php
  require_once "models/cardapio.php";

  // echo "Hello, World!";

  $visaoCardapio = new Cardapio();
  $visaoCardapio->gerarCardapio();
  
  
?>