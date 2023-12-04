
function getProduct(e){

    let div = e.parentNode;
    let nomeElement = div.querySelector('#name');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        url: '/get/sale/product/'+e.value,
        method: 'GET',
        dataType: 'json',
        success: function(data){
            if(data == 0){
                nomeElement.value = "Este produto não existe";
            }else{
                nomeElement.value = data.nome;
            }
        },
        error: function (data) {
            console.log(data, 'erro');
        } 
    });
}

function verificaCpf(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        url: '/get/sale/client/'+e.value,
        method: 'GET',
        dataType: 'json',
        success: function(data){
            if(data == 0){
                document.querySelector('#nome_pessoa').value = "Este não é um cliente clube";
                document.querySelector('#cliente_clube').value = 0;
            }else{
                document.querySelector('#nome_pessoa').value = data.nome+' '+data.sobrenome;
                document.querySelector('#cliente_clube').value = 1;
            }
        },
        error: function (data) {
            console.log(data, 'erro');
        } 
    });
}

function makeValue(){
    let products = document.querySelectorAll('.product-container');

    
    let data = [];

    products.forEach(product => {
        let codigo = product.querySelector('#codigo_produto').value;
        let quantidade = product.querySelector('#quantidade_produto').value;

        data.push({
            codigo: codigo,
            quantidade: quantidade
        });
    });
    
    console.log(data);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        url: '/get/sale/value/',
        method: 'POST',
        data: JSON.stringify(data),
        success: function(data){
            document.querySelector('#valorTotal').value = data.valor;
            document.querySelector('#valorComDesconto').value = data.valorCDesc;
        },
        error: function (data) {
            console.log(data, 'erro');
        } 
    });
}

function create(){
    let products = document.querySelectorAll('.product-container');
    let dataProducts = [];
    products.forEach(product => {
        let codigo = product.querySelector('#codigo_produto').value;
        let quantidade = product.querySelector('#quantidade_produto').value;

        dataProducts.push({
            codigo: codigo,
            quantidade: quantidade
        });
    });
    let valorComDeconto;
    let clienteClube = document.querySelector('#input-clube').value;
    let valorTotal = document.querySelector('#valorTotal').value;
    if(document.querySelector('#cliente_clube').value == 1){
        valorComDeconto = document.querySelector('#valorComDesconto').value;
    }else{
        valorComDeconto = document.querySelector('#valorTotal').value;
    }
    let pagamento = document.querySelector('#pagamento').value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        url: '/create/sale/',
        method: 'POST',
        data: { 
            clienteClube : clienteClube, 
            products : JSON.stringify(dataProducts), 
            valorTotal : valorTotal,
            valorComDeconto : valorComDeconto,
            pagamento : pagamento
        },
        success: function(data){
            console.log(data);
        },
        error: function (data) {
            console.log(data, 'erro');
        } 
    });

    window.location.reload(true);
}