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
                <a href="{{route('show.sales')}}">Histórico de vendas</a>
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
                        <input type="text" class="form-control" name="cpf" maxlength="11">
                    <div>    
                        <label>Nome do cliente:</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div>
                        <label>Sobrenome do cliente:</label>
                        <input type="text" class="form-control" name="sobrenome">
                    </div>
                    <div>
                        <label>Data nascimento do cliente:</label>
                        <input type="date" class="form-control" name="dataNascimento">
                    </div>
                    <div>
                        <label>Telefone do cliente:</label>
                        <input type="text" class="form-control" name="telefone">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Cadastrar cliente</button>
            </form>
        </section>
        <section>
            <br>
            <h1>
                Lista de clientes clube
            </h1>
            <table id="produtoTable"  class="table table-striped">
                <thead>
                    <tr class="table-primary">
                        <th>Cpf</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Data nascimento</th>
                        <th>Telefone</th>
                        <th>Data Ultima Alteração</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="produtosTbody">
                    @foreach($clients as $client)
                    <tr>
                        <td>{{$client->formatedCpf}}</td>
                        <td>{{$client->nome}}</td>
                        <td>{{$client->sobrenome}}</td>
                        <td>{{Carbon\Carbon::parse($client->dataNascimento)->format('d/m/Y')}}</td>
                        <td>{{$client->telefone}}</td>
                        <td>{{Carbon\Carbon::parse($client->updated_at)->format('d/m/Y H:i')}}</td>
                        <td>
                            <button type="button"  class="btn btn-primary" onclick="showModalUpdateClient('{{$client->_id}}')">Editar</button>
                            <button type="button"  class="btn btn-danger" onclick="showModalDelete('{{$client->_id}}')">Excluir</button>
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