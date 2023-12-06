<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Histórico de vendas</title>
  <!-- Adicione os links para as bibliotecas Bootstrap e jQuery -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="{{asset('assets/css/app.css')}}">
  <style>
    .sublinhas {
      display: none;
    }
  </style>
  <script>
    $(document).ready(function(){
      $(".linha-clicavel").click(function(){
        $(this).nextUntil('.linha-clicavel').toggle();
      });
    });
  </script>
</head>
<body >

    <header>
        <nav class="nav-bar">
            <a href="{{route('sales.view')}}">
                <img src="/assets/logotipo.svg" alt="">
            </a>
            <div class="items">
                <a href="{{route('create.product.view')}}">Produtos</a>
                <a href="{{route('create.client.view')}}">Clube especial</a>
                <a href="{{route('show.sales')}}">Histórico de vendas</a>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
    <table class="table">
        <thead>
        <tr class="table-primary">
            <th>Cpf cliente</th>
            <th>Valor total</th>
            <th>Valor com desconto</th>
            <th>Client clube</th>
            <th>Forma de pagamento</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sales as $sale)
        <tr class="linha-clicavel">
            <th>@if($sale->clienteClube == null) 0 @else {{$sale->clienteClube}} @endif</th>
            <th>{{$sale->valorTotal}}</th>
            <th>{{$sale->valorComDesconto}}</th>
            <th>@if($sale->nomeCliente == null) Não é um cliente clube @else {{$sale->nomeCliente}} @endif </th>
            <th>{{$sale->metodoPagamento}}</th>
        </tr>
        <tr class="sublinhas">
            <td style="background-color: rgb(245, 248, 248)" colspan="1">Código</td>
            <td style="background-color: rgb(245, 248, 248)"  colspan="1">Nome</td>
            <td style="background-color: rgb(245, 248, 248)"  colspan="1">Quantidade</td>
            <td style="background-color: rgb(245, 248, 248)"  colspan="2"></td>
        </tr>
        @foreach($sale->produtos as $produto)
            <tr class="sublinhas">
                <td colspan="1">{{$produto['codigo']}}</td>
                <td colspan="1">{{$produto['nome']}}</td>
                <td colspan="1">{{$produto['quantidade']}}{{$produto['unidadeMedida']}}</td>
                <td colspan="2"></td>
                </td>
            </tr>
        @endforeach
        @endforeach
        </tbody>
    </table>
    </div>

</body>
</html>