function showModalUpdate(id) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/get/product/'+id,
        method: 'GET',
        dataType: 'json',
        success: function(data){
            document.querySelector('#id').value = data._id;
            document.querySelector('#codigo_modal').value = data.codigo;
            document.querySelector('#nome_modal').value = data.nome;
            document.querySelector('#quantidadeEstoque_modal').value = data.quantidadeEstoque;
            document.querySelector('#valorUnitario_modal').value = data.valorUnitario;
            document.querySelector('#valorUnitarioComDesconto_modal').value = data.valorUnitarioComDesconto;
            document.querySelector('#unidadeMedida_modal').value = data.unidadeMedida;
        },
        error: function (data) {
            console.log(data, 'erro');
        } 
    });

    $("#editarProdutoModal").modal("show");
}

function updateProduct(){

    data = {
        id : document.querySelector('#id').value,
        codigo : document.querySelector('#codigo_modal').value,
        nome : document.querySelector('#nome_modal').value,
        quantidadeEstoque : document.querySelector('#quantidadeEstoque_modal').value,
        valorUnitario : document.querySelector('#valorUnitario_modal').value,
        valorUnitarioComDesconto : document.querySelector('#valorUnitarioComDesconto_modal').value,
        unidadeMedida : document.querySelector('#unidadeMedida_modal').value,
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/update/product/',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function(data){
            console.log(data);
        },
        error: function (data) {
            console.log(data, 'erro');
        } 
    });

    window.location.reload(true);
}

function showModalDelete(id) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/get/product/'+id,
        method: 'GET',
        dataType: 'json',
        success: function(data){
            document.querySelector('#id_modal_excluir').value = data._id;
            document.querySelector('#text_modal').innerText = 'Tem certeza que deseja excluir o produto '+data.nome;
        },
        error: function (data) {
            console.log(data, 'erro');
        } 
    });

    $("#excluirProdutoModal").modal("show");
}

function deleteProduct(){

    let id = document.querySelector('#id_modal_excluir').value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/delete/product/'+id,
        method: 'GET',
        dataType: 'json',
        success: function(data){
        },
        error: function (data) {
            console.log(data, 'erro');
        } 
    });

    window.location.reload(true);
}