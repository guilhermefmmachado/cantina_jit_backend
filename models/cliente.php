<?php

class Cliente
  {
    public $nomeCliente = "";
    private $emailCliente = "";
    private $senhaCliente = "";
    public $numProdutosComprados = 0;
    public $escola = "";
    private $idEscola = 0;
    public $emailEscola = "";
    public $pedido = 0;
    public $condicaoExecucao = false;

    function __construct(String $nomeCliente, String $emailCliente, String $senhaCliente, String $emailEscola, bool $condicaoExecucao)
    {
      $this->nomeCliente = $nomeCliente;
      $this->emailCliente = $emailCliente;
      $this->senhaCliente = sha1($senhaCliente);
      $this->emailEscola = $emailEscola;
      $this->condicaoExecucao = $condicaoExecucao;
    }

    public function inserirCliente()
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
    /*
    if ($this->condicaoExecucao) {
      $instrucaoSQLcondicional = "SELECT COUNT(email_cliente) FROM cliente WHERE email_cliente='$this->emailCliente";
      $instrucaoSQLcondicionalRes = $conexao->query($instrucaoSQLcondicional);
      $condicaoCadastro = $instrucaoSQLcondicionalRes > 0;
    }
    */

    if ($this->condicaoExecucao) {
      $instrucaoSQL = "SELECT id_escola FROM escola WHERE email_escola='$this->emailEscola'";

      $resultado = $conexao->query($instrucaoSQL);

      if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
          $this->idEscola = $row["id_escola"];
      }
      }

      $instrucaoSQL = "INSERT INTO cliente (nome_cliente, email_cliente, senha_cliente, escola_cliente) VALUES ('$this->nomeCliente','$this->emailCliente','$this->senhaCliente','$this->idEscola')";

      $resultado = $conexao->query($instrucaoSQL);

      if (!$resultado) {
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

    public function fazerPedido()
    {
      # code...
    }

    public function cancelarPedido()
    {
      # code...
    }

    public function mudarPerfil()
    {
      # code...
    }
  }

?>