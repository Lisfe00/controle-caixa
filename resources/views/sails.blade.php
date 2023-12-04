<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <title>Vendas</title>
</head>

<body id="body">
    <header>
        <nav class="nav-bar">
            <a href="{{route('sails.view')}}">
                <img src="/assets/logotipo.svg" alt="">
            </a>
            <div class="items">
                <a href="{{route('create.product.view')}}">Produtos</a>
                <a>Clube especial</a>
                <a>Histórico de vendas</a>
            </div>
        </nav>
    </header>

    <main>
        <header>
            <h1>Olá, caixa 1.</h1>
            <h3>Hoje você já realizou 1 venda!</h3>
        </header>
        <section>
            <h1>
                Venda de produtos
            </h1>
            <form class="vendasForm" id="myForm">
                @csrf
                <div>
                    <label>Cliente clube?</label>
                    <select name="clienteClube" id="cliente-clube">
                        <option value="nao">Não</option>
                        <option value="sim">Sim</option>
                    </select>
                    <input id="input-clube" type="text" class="clube-cpf" placeholder="Informe o CPF">
                    <button type="button" id="button-clube" class="clube-cpf" onclick="checkCPF()">Verificar CPF</button>
                </div>

                <div id="productsContainer">
                    <p>Produtos</p>
                    <button type="button" onclick="addProduct()">Adicionar Produto</button>
                    <div class="product-container" id="product1">
                        <label>Produto 1</label>
                        <input type="text" name="codigo1" placeholder="codigo">
                        <input type="text" name="quantidade1" placeholder="quantidade">
                        <button type="button" onclick="removeProduct('product1')">Remover Produto</button>
                    </div>
                </div>

                <div>
                    <label>Valor Total</label>
                    <input type="text" readonly disabled name="valorTotal">
                </div>

                <div class="clube-cpf" id="valor-desconto">
                    <label>Valor com desconto clube</label>
                    <input type="text" readonly disabled name="valorComDesconto">
                </div>
                <div>
                    <label>Método de pagamento</label>
                    <select name="pagamento">
                        <option value="dinheiro">Dinheiro</option>
                        <option value="cartao">Cartão de crédito</option>
                        <option value="debito">Cartão de débito</option>
                        <option value="vale-alimentacao">Vale Alimentação</option>
                    </select>
                </div>
                <button type="button" onclick="finalizarCompra()">Finalizar compra</button>
            </form>

        </section>

    </main>
</body>

<script src="{{asset('assets/js/app.js')}}"></script>

</html>