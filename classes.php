<?php
  // Por enquanto apenas uma inserção das classes, posteriormente cada um terá seu respectivo arquivo.

  class Visitante
  {
    public function cadastrar($nome, $email, $senha)
    {
      # code...
    }

    public function entrar($email, $senha)
    {
      # code...
    }
  }

  class Cliente extends Visitante
  {
    $nome = "";
    $email = "";
    $numProdutosComprados = 0;
    $escola;
    $pedido;

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

  class Funcionario extends Cliente
  {
    $funcao = "";

    public function editarFuncao()
    {
      # code...
    }
  }

  class Escola
  {
    $nomeEscola = "";
    $emailEscola = "";
    $qtdeClientes = 0;

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
  
  class Cantina
  {
    $cardapioCantina;
    $numFuncionarios = 0;
    $qtdeProdutosVendidosEstimado = 0;
    $qtdeProdutosVendidosReal = 0;
    $lucroDia = 0;
    $lucroMes = 0;
    $lucroAno = 0;
    $escola;

    public function estimarQtdeProdutosAVender()
    {
      # code...
    }
  }
  
  class Pedido
  {
    $itensPedido;
    $precoPedido = 0;
    $qtdeProdutosPedidos = 0;
    $estadoPedido = "";

    public function modificarEstado()
    {
      # code...
    }

    public function notificarEstadoPedidoFinalizado()
    {
      # code...
    }
  }

  class Cardapio
  {
    $itensCardapio;

    public function editarCardapio()
    {
      # code...
    }
  }
  
  class Produto
  {
    $nomeProduto = "";
    $tipoProduto = "";
    $descricao = "";
    $preco = 0;

    public function editarProduto()
    {
      # code...
    }

    public function inserirProduto()
    {
      # code...
    }

    public function excluirProduto()
    {
      # code...
    }
  }
  
  
?>