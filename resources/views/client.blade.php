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

    <title>Clientes</title>
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
                <a>Histórico de vendas</a>
            </div>
        </nav>
    </header>

    <main>
        <header>
            <h1>Clientes Clube</h1>
        </header>
        <section>
            <h1>
                Cadastrar cliente
            </h1>
            <form action="{{route('create.client')}}" method="POST" class="vendasForm" id="produtoForm">
                @csrf
                <div>
                        <label>Cpf do cliente:</label>
                        <input type="text" name="cpf">
                    <div>    
                        <label>Nome do cliente:</label>
                        <input type="text" name="nome">
                    </div>
                    <div>
                        <label>Sobrenome do cliente:</label>
                        <input type="text" name="sobrenome">
                    </div>
                    <div>
                        <label>Data nascimento do cliente</label>
                        <input type="date" name="dataNascimento">
                    </div>
                    <button type="submit">Cadastrar cliente</button>
            </form>
        </section>
        <section>
            <h1>
                Lista de clientes clube
            </h1>
            <table id="produtoTable">
                <thead>
                    <tr>
                        <th>Cpf</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Data nascimento</th>
                        <th>Data Ultima Alteração</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="produtosTbody">
                    @foreach($clients as $client)
                    <tr>
                        <td>{{$client->cpf}}</td>
                        <td>{{$client->nome}}</td>
                        <td>{{$client->sobrenome}}</td>
                        <td>{{$client->dataNascimento}}</td>
                        <td>{{$client->updated_at}}</td>
                        <td>
                            <button type="button" onclick="showModalUpdateClient('{{$client->_id}}')">Editar</button>
                            <button type="button" onclick="showModalDelete('{{$client->_id}}')">Excluir</button>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>

        </section>

    </main>
</body>


<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/ajax_clients.js')}}"></script>

@include('components.modal-clients')
@include('components.modal-excluir')
</html>