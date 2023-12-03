<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendas</title>
</head>

<body id="body">
    <form action="{{route('create.product')}}" method="POST">
        @csrf
        <label>Nome</label>
        <input type="text" name="nome">
        <label>Quantidade em Estoque</label>
        <input type="text" name="quantidadeEstoque">
        <label>Valor Unitario</label>
        <input type="text" name="valorUnitario">
        <label>Unidadede Medida</label>
        <select name="unidadeMedida" id="">
            <option value="kg">Kg</option>
            <option value="unid">Unidade</option>
        </select>
        <button type="submit">Enviar</button>
    </form>
</body>

<script src="{{asset('assets/js/app.js')}}"></script>
</html>