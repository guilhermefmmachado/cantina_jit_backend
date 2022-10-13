<?php
  require_once "models/escola.php";

  $condicaoExecucao = false;
  $condicaoExecucao = isset($_POST["nome"]) && isset($_POST["emailescola"]) && isset($_POST["senhaescola"]) && isset($_POST["nomegerente"]) && isset($_POST["emailgerente"]) && isset($_POST["senhagerente"]);

  $escola = new Escola($_POST["nome"], $_POST["emailescola"], $_POST["senhaescola"], $_POST["nomegerente"], $_POST["emailgerente"], $_POST["senhagerente"], $condicaoExecucao);
  $escola->cadastrarEscola();
?>