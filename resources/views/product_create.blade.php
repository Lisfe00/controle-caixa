<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/app.css')}}">

    <title>Produtos</title>
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
                    <input type="text" name="codigo">
                    <div>
                        <label>Nome do produto:</label>
                        <input type="text" name="nome">
                    </div>
                    <div>
                        <label>Quantidade em estoque:</label>
                        <input type="text" name="quantidadeEstoque">
                    </div>
                    <div>
                        <label>Valor unitário</label>
                        <input type="text" name="valorUnitario">
                    </div>
                    <div>
                        <label>Valor unitário com desconto</label>
                        <input type="text" name="valorUnitarioComDesconto">
                    </div>
                    <div>
                        <label>Unidade de medida</label>
                        <select name="unidadeMedida" id="">
                            <option value="kg">Kg</option>
                            <option value="unid">Unidade</option>
                        </select>
                    </div>
                    <button type="button" onclick="finalizarCadastroProduto()">Cadastrar produto</button>
            </form>
        </section>
        <section>
            <h1>
                Lista de produtos
            </h1>
            <table id="produtoTable">
                <thead>
                    <tr>
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
                    <tr>
                        <td>1</td>
                        <td>Arroz</td>
                        <td>10</td>
                        <td>10</td>
                        <td>9</td>
                        <td>kg</td>
                        <td>2021-10-10 10:10:10</td>
                        <td>
                            <button type="button" onclick="editarProduto(1)">Editar</button>
                            <button type="button" onclick="excluirProduto(1)">Excluir</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </section>

    </main>
    <div class="modal fade" id="editarProdutoModal" tabindex="-1" role="dialog" aria-labelledby="editarProdutoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarProdutoModalLabel">Editar Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editarProdutoForm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="salvarAlteracoesProduto()">Salvar Alterações</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{asset('assets/js/app.js')}}"></script>

</html>