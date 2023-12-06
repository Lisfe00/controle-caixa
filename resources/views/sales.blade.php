<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <title>Vendas</title>
</head>

<body id="body">
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

    <main>
        <header>
            <h1>Olá, caixa 1.</h1>
            <h3>Hoje você já realizou {{$vendas}} venda!</h3>
        </header>
        <section>
            <h1>
                Venda de produtos
            </h1>
            <form action="{{route('create.sale')}}" class="vendasForm" id="myForm" method="POST" >
                @csrf
                <div>
                    <label class="form-label">Cliente clube?</label>
                    <select name="clienteClube" id="cliente-clube" class="form-control">
                        <option value="nao">Não</option>
                        <option value="sim">Sim</option>
                    </select>
                    <input id="input-clube" type="text" class="clube-cpf form-control" placeholder="Informe o CPF" onblur="verificaCpf(this)">
                </div>

                <div id="productsContainer">
                    <p>Produtos</p>
                    <button type="button" onclick="addProduct()" class="btn btn-primary">Adicionar Produto</button>
                    <br>
                    <div class="product-container" id="product1">
                        <label>Produto 1</label>
                        <input type="text" id="codigo_produto" name="codigo" placeholder="codigo" onblur="getProduct(this)" class="form-control">
                        <input type="text" id="name" name="name" class="form-control" disabled>
                        <input type="text" id="quantidade_produto" name="quantidade" placeholder="quantidade" onblur="makeValue()" class="form-control">
                        <br>
                        <button type="button" onclick="removeProduct('product1')" class="btn btn-primary">Remover Produto</button>
                    </div>
                </div>

                <div>
                    <label>Valor Total</label>
                    <input id="valorTotal" type="text" readonly disabled name="valorTotal" class="form-control">
                </div>
                <div class="clube-cpf" id="valor-desconto">
                    <label>Valor com desconto clube</label>
                    <input id="valorComDesconto" type="text" readonly disabled name="valorComDesconto" class="form-control">
                </div>
                <div>
                    <label>Nome do cliente</label>
                    <input id="nome_pessoa" type="text" disabled name="nome_pessoa" value="Este não é um cliente clube" class="form-control">
                    <input id="cliente_clube" type="text" value="0" hidden>
                </div>
                <div>
                    <label>Método de pagamento</label>
                    <select id="pagamento" name="pagamento"class="form-control">
                        <option value="dinheiro">Dinheiro</option>
                        <option value="cartao">Cartão de crédito</option>
                        <option value="debito">Cartão de débito</option>
                        <option value="vale-alimentacao">Vale Alimentação</option>
                    </select>
                </div>
                <button type="button" onclick="create()" class="btn btn-primary">Finalizar compra</button>
            </form>

        </section>

    </main>
</body>

<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/ajax_sales.js')}}"></script>

</html>