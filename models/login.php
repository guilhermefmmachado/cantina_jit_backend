<?php
class Login
{
  private $email = "";
  private $senha = "";
  private $ator = "";
  private $condicaoExecucao = false;
  private $listaAtores = ["Cliente", "Funcionário", "Gerente"];

  function __construct(String $email, String $senha, String $ator, bool $condicaoExecucao)
  {
    $this->email = $email;
    $this->senha = sha1($senha);
    $this->ator = $ator;
    $this->condicaoExecucao = $condicaoExecucao;
  }

  public function autenticarUsuario()
  {
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

    if ($this->ator == $this->listaAtores[0] && $this->condicaoExecucao) {
      $instrucaoSQL = "SELECT email_cliente, senha_cliente FROM cliente WHERE email_cliente='$this->email' AND senha_cliente='$this->senha'";
      $resultado = $conexao->query($instrucaoSQL);
      if ($resultado) {
        $valorRetorno["sucesso"] = true;
        $valorRetorno["msg"] = "Login realizado com sucesso!";
      } else {
        $valorRetorno["erro"] = true;
        $valorRetorno["msg"] = "E-mail e/ou senha inválidos.";
      }
    }

    if ($this->ator == $this->listaAtores[1] && $this->condicaoExecucao) {
      $instrucaoSQL = "SELECT email_funcionario, senha_funcionario FROM funcionario WHERE email_funcionario='$this->email' AND senha_funcionario='$this->senha'";
      $resultado = $conexao->query($instrucaoSQL);
      if ($resultado) {
        $valorRetorno["sucesso"] = true;
        $valorRetorno["msg"] = "Login realizado com sucesso!";
      } else {
        $valorRetorno["erro"] = true;
        $valorRetorno["msg"] = "E-mail e/ou senha inválidos.";
      }
    }

    if ($this->ator == $this->listaAtores[2] && $this->condicaoExecucao) {
      $instrucaoSQL = "SELECT email_gerente, senha_gerente FROM escola WHERE email_gerente='$this->email' AND senha_gerente='$this->senha'";
      $resultado = $conexao->query($instrucaoSQL);
      if ($resultado) {
        $valorRetorno["sucesso"] = true;
        $valorRetorno["msg"] = "Login realizado com sucesso!";
      } else {
        $valorRetorno["erro"] = true;
        $valorRetorno["msg"] = "E-mail e/ou senha inválidos.";
      }
    }

    $conexao->close();

    // Informando à plataforma que ocorrerá um retorno JSON
    header("Content-Type: application/json");
    // Transformando o array em uma string json;
    echo json_encode($valorRetorno);
  }
}
