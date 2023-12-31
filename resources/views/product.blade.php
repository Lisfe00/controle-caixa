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

    <title>Produtos</title>
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
            <h1>Produtos</h1>
        </header>
        <section>
            <h1>
                Criar produtos
            </h1>
            <form action="{{route('create.product')}}" method="POST" class="vendasForm" id="produtoForm">
                @csrf
                <div>
                    <label>Código do produto:</label>
                    <input class="form-control" type="text" name="codigo">
                    <div>
                        <label>Nome do produto:</label>
                        <input class="form-control" type="text" name="nome">
                    </div>
                    <div>
                        <label>Quantidade em estoque:</label>
                        <input class="form-control" type="text" name="quantidadeEstoque">
                    </div>
                    <div>
                        <label>Valor unitário:</label>
                        <input class="form-control" type="text" name="valorUnitario">
                    </div>
                    <div>
                        <label>Valor unitário com desconto:</label>
                        <input class="form-control" type="text" name="valorUnitarioComDesconto">
                    </div>
                    <div>
                        <label>Unidade de medida:</label>
                        <select class="form-control" name="unidadeMedida" id="">
                            <option value="kg">Kg</option>
                            <option value="unid">Unidade</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Cadastrar produto</button>
            </form>
        </section>
        <section>
            <br>
            <h1>
                Lista de produtos
            </h1>
            <table id="produtoTable" class="table table-striped">
                <thead>
                    <tr class="table-primary">
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Quantidade em Estoque</th>
                        <th>Valor Unitário</th>
                        <th>Valor Unitário com Desconto</th>
                        <th>Unidade de Medida</th>
                        <th>Data e Hora de Alteração</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="produtosTbody">
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->codigo}}</td>
                        <td>{{$product->nome}}</td>
                        <td>{{$product->quantidadeEstoque}}</td>
                        <td>{{$product->ValorUnitarioFormat}}</td>
                        <td>{{$product->valorUnitarioComDescontoFormat}}</td>
                        <td>{{$product->unidadeMedida}}</td>
                        <td>{{Carbon\Carbon::parse($product->updated_at)->format('d/m/Y H:i')}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="showModalUpdate('{{$product->_id}}')">Editar</button>
                            <button type="button" class="btn btn-danger" onclick="showModalDelete('{{$product->_id}}')">Excluir</button>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>

        </section>

    </main>
</body>


<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/ajax_products.js')}}"></script>

@include('components.modal-products')
@include('components.modal-excluir')
</html>