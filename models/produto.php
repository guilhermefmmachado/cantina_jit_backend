<?php

class Produto
{
  public $nomeProduto = "";
  public $tipoProduto = "";
  public $descricao = "";
  public $preco = 0;
  public $qtdeProdVendidos = 0;
  public $limQtdePorSelecao = 0;
  public $estoque = 0;
  public $condicaoExecucao = false;

  public $qtdeSelecionadaCliente = 0;
  public $precoTotal = 0;

  function __construct(String $nome = "", String $descricao = "", String $tipo = "", String $preco = "0", String $limQtdePorSelecao = "0", String $estoque = "0", bool $condicaoExecucao)
  {
    $this->nomeProduto = $nome;
    $this->descricao = $descricao;
    $this->tipoProduto = $tipo;
    $this->preco = (float) $preco;
    $this->limQtdePorSelecao = (int) $limQtdePorSelecao;
    $this->estoque = (int) $estoque;
    $this->condicaoExecucao = $condicaoExecucao;
  }

  public function inserirProduto()
  {
    // Realizar conexão com a base de dados
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

    $valorRetorno["erro"] = false;
    $valorRetorno["msg"] = "";
    $valorRetorno["sucesso"] = false;

    if ($this->condicaoExecucao) {
      $instrucaoSQL = "INSERT INTO produto (nome_produto, tipo_produto, descricao_produto, preco, qtde_produtos_vedidos, estoque, lim_qtde_por_selecao) VALUES ('$this->nomeProduto','$this->tipoProduto','$this->descricao','$this->preco','$this->qtdeProdVendidos','$this->estoque','$this->limQtdePorSelecao')";

      $resultado = $conexao->query($instrucaoSQL);

      if (!$resultado) {
        // echo "Erro na conexão $this->nomeProduto,\n $this->tipoProduto,\n $this->descricao,\n $this->preco,\n $this->estoque,\n $resultado,\n $instrucaoSQL";
        $valorRetorno["erro"] = false;
        $valorRetorno["msg"] = "Erro no banco de dados";
      }
    } else {
      $valorRetorno["erro"] = true;
      $valorRetorno["msg"] = 'Informe o formulário corretamente.';
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
    // Realizar conexão com a base de dados
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

    $valorRetorno["erro"] = false;
    $valorRetorno["msg"] = "";
    $valorRetorno["sucesso"] = false;

    if ($this->condicaoExecucao) {
      $instrucaoSQL = "DELETE FROM produto WHERE nome_produto='$this->nomeProduto'";

      $resultado = $conexao->query($instrucaoSQL);

      if (!$resultado) {
        // echo "Erro na conexão $this->nomeProduto,\n $this->tipoProduto,\n $this->descricao,\n $this->preco,\n $this->estoque,\n $resultado,\n $instrucaoSQL";
        $valorRetorno["erro"] = false;
        $valorRetorno["msg"] = "Erro no banco de dados";
      }
    } else {
      $valorRetorno["erro"] = true;
      $valorRetorno["msg"] = 'Informe o formulário corretamente.';
    }

    $conexao->close();

    // Informando à plataforma que ocorrerá um retorno JSON
    header("Content-Type: application/json");
    // Transformando o array em uma string json;
    echo json_encode($valorRetorno);
  }
}
