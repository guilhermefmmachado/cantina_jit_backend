<?php
  require_once "models/cardapio.php";
  $visaoCardapio = new Cardapio();
  $visaoCardapio->gerarCardapio();
?>
