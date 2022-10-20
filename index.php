<?php

require_once "models/cliente.php";

$novoCliente = new Cliente("Guilherme", "gui", "123", "etpc@etpc.com.br", true);
echo $novoCliente->inserirCliente();
?>