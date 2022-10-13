<?php

class Escola
{
  public $nomeEscola = "";
  public $emailEscola = "";
  public $senhaEscola = "";
  public $qtdeClientes = 0;
  public $condicaoExecucao = false;

  // Atualizar na monografia diagrama de classes e modelo lógico
  public $nomeGerente = "";
  public $emailGerente = "";
  public $senhaGerente = "";

  public function __construct(String $nomeEscola, String $emailEscola, String $senhaEscola, String $nomeGerente, String $emailGerente, String $senhaGerente, bool $condicaoExecucao)
  {
    $this->nomeEscola = $nomeEscola;
    $this->emailEscola = $emailEscola;
    $this->senhaEscola = sha1($senhaEscola);
    $this->nomeGerente = $nomeGerente;
    $this->emailGerente = $emailGerente;
    $this->senhaGerente = sha1($senhaGerente);
    $this->condicaoExecucao = $condicaoExecucao;
  }

  public function cadastrarEscola()
  {
    // Realizar conexão com a base de dados
    $servername = "localhost";
    $dbUser = "root";
    $dbPassword = "root";
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

    // Se existir emails repetidos
    if ($this->condicaoExecucao) {
      $instrucaoSQLcondicional = "SELECT email_escola, email_gerente FROM escola WHERE email_escola='$this->emailEscola' OR email_gerente='$this->emailGerente'";
      $instrucaoSQLcondicionalRes = $conexao->query($instrucaoSQLcondicional);
      $condicaoCadastro = $instrucaoSQLcondicionalRes->num_rows > 0;
    }

    if ($this->condicaoExecucao && !$condicaoCadastro) {
      $instrucaoSQL = "INSERT INTO escola (nome_escola, email_escola, senha_escola, qtde_clientes, nome_gerente, email_gerente, senha_gerente) VALUES ('$this->nomeEscola','$this->emailEscola','$this->senhaEscola','$this->qtdeClientes','$this->nomeGerente','$this->emailGerente','$this->senhaGerente')";

      $resultado = $conexao->query($instrucaoSQL);

      if (!$resultado) {
        echo "Erro na conexão\n $this->nomeEscola,\n $this->emailEscola,\n $this->senhaEscola,\n $this->qtdeClientes,\n $this->nomeGerente,\n $this->emailGerente,\n $this->senhaGerente,\n\n\n $resultado";
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

  public function cadastrarCantina()
  {
    # code...
  }

  public function editarCantina()
  {
    # code...
  }

  public function excluirCantina()
  {
    # code...
  }
}
