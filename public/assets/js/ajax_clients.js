function showModalUpdateClient(id) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/get/client/'+id,
        method: 'GET',
        dataType: 'json',
        success: function(data){
            document.querySelector('#id').value = data._id;
            document.querySelector('#cpf_modal').value = data.cpf;
            document.querySelector('#nome_modal').value = data.nome;
            document.querySelector('#sobrenome_modal').value = data.sobrenome;
            document.querySelector('#dataNascimento_modal').value = data.dataNascimento;
        },
        error: function (data) {
            console.log(data, 'erro');
        } 
    });

    $("#editarClienteModal").modal("show");
}

function updateClient(){

    data = {
        id : document.querySelector('#id').value,
        cpf : document.querySelector('#cpf_modal').value,
        nome : document.querySelector('#nome_modal').value,
        sobrenome : document.querySelector('#sobrenome_modal').value,
        dataNascimento : document.querySelector('#dataNascimento_modal').value,
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/update/client/',
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
        url: '/get/client/'+id,
        method: 'GET',
        dataType: 'json',
        success: function(data){
            document.querySelector('#id_modal_excluir').value = data._id;
            document.querySelector('#text_modal').innerText = 'Tem certeza que deseja excluir o cliente '+data.nome+'?';
        },
        error: function (data) {
            console.log(data, 'erro');
        } 
    });

    $("#excluirProdutoModal").modal("show");
}

function deleteItem(){

    let id = document.querySelector('#id_modal_excluir').value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/delete/client/'+id,
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