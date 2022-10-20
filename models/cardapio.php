<?php

class Cardapio
{
  public $itensCardapio = [];

  public function gerarCardapio()
  {
    $servername = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $db = "cantina_jit_02";
    // $dbPord = 3306;
    $conexao = new mysqli($servername, $dbUser, $dbPassword, $db);

    // Checar a conexão
    if ($conexao->connect_error) {
      die("Falha na conexão: " + $conexao->connect_error);
    }

    $instrucaoSQL = "SELECT nome_produto, tipo_produto, preco, lim_qtde_por_selecao FROM produto";

    $resultado = $conexao->query($instrucaoSQL);

    if ($resultado->num_rows > 0) {
      // output data of each row
      while ($produtosROWS = $resultado->fetch_assoc()) {
        // echo $this->itensCardapio["nome_produto"] . "<br>";
        array_push($this->itensCardapio, $produtosROWS);
      }
      // Informando à plataforma que ocorrerá um retorno JSON
      header("Content-Type: application/json");
      // Transformando o array em uma string json;
      echo json_encode($this->itensCardapio);
    } else {
      echo "0 results";
    }
    $conexao->close();
  }

  public function editarCardapio()
  {
    # code...
  }
}
