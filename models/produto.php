<?php

class Produto
{
  public $nomeProduto = "";
  public $tipoProduto = "";
  public $descricao = "";
  public $preco = 0;
  public $qtdeProdVendidos = 0;
  public $estoque = 0;
  public $condicaoExecucao = false;

  public $qtdeSelecionadaCliente = 0;
  public $precoTotal = 0;

  function __construct(String $nome, String $descricao, String $tipo, String $preco, String $estoque, bool $condicaoExecucao)
  {
    $this->nomeProduto = $nome;
    $this->descricao = $descricao;
    $this->tipoProduto = $tipo;
    $this->preco = (float) $preco;
    $this->estoque = (int) $estoque;
    $this->condicaoExecucao = $condicaoExecucao;
  }

  public function inserirProduto()
  {
    // Realizar conexão com a base de dados
    $servername = "localhost";
    $dbUser = "root";
    $dbPassword = "root";
    $db = "cantina_jit_01";
    // $dbPord = 3306;
    $conexao = new mysqli($servername, $dbUser, $dbPassword, $db);

    // Checar a conexão
    if ($conexao->connect_error) {
      die("Falha na conexão: " + $conexao->connect_error);
    }

    $valorRetorno["erro"] = false;
    $valorRetorno["msg"] = "";
    $valorRetorno["sucesso"] = false;

    if ($this->condicaoExecucao) {
      $instrucaoSQL = "INSERT INTO produto SET nome_produto = '$this->nomeProduto',
      tipo_produto = '$this->tipoProduto', descricao_produto = '$this->descricao',
      preco = '$this->preco',
      qtde_produtos_vedidos = '$this->qtdeProdVendidos',
      estoque = '$this->estoque'";

      $resultado = $conexao->query($instrucaoSQL);

      if (!$resultado) {
        // echo "Erro na conexão $this->nomeProduto,\n $this->tipoProduto,\n $this->descricao,\n $this->preco,\n $this->estoque,\n $resultado,\n $instrucaoSQL";
        $valorRetorno["erro"] = false;
        $valorRetorno["msg"] = "Erro no banco de dados";
      }
    } else {
      $return["error"] = true;
      $return["message"] = 'Informe o formulário corretamente.';
    }

    $conexao->close();

    // Informando à plataforma que ocorrerá um retorno JSON
    header("Content-Type: application/json");
    // Transformando o array em uma string json;
    echo json_encode($valorRetorno);
  }

  public function editarProduto()
  {
    # code...
  }

  public function excluirProduto()
  {
    # code...
  }
}
