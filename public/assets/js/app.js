const clube = document.querySelector("#cliente-clube");
// se o clube for selecionado, mostra o campo de input e o input com o valor total com desconto
if (clube) {
    clube.addEventListener("change", function () {
        const clubeCpf = document.querySelector("#input-clube");
        const nomeCliente = document.querySelector("#nome_pessoa");
        const valorDesconto = document.querySelector("#valor-desconto");
        if (clube.value == "sim") {
            clubeCpf.style.display = "flex";
            valorDesconto.style.display = "flex";
        } else {
            clubeCpf.style.display = "none";
            nomeCliente.value = "Este não é um cliente clube";
            valorDesconto.style.display = "none";
        }
    });
}

// Lógica para a criação de novos produtos
let productCounter = 1;

function addProduct() {
    productCounter++;

    const container = document.getElementById("productsContainer");
    const productContainer = document.createElement("div");
    productContainer.classList.add("product-container");
    const productId = `product${productCounter}`;
    productContainer.id = productId;

    productContainer.innerHTML = `
                <label>Produto ${productCounter}</label>
                <input type="text" id="codigo_produto" name="codigo" placeholder="codigo" onblur="getProduct(this)">
                <input type="text" id="name" name="name" disabled>
                <input type="text" id="quantidade_produto" name="quantidade" placeholder="quantidade" onblur="makeValue()">
                <button type="button" onclick="removeProduct('${productId}')">Remover Produto</button>
            `;

    container.appendChild(productContainer);
}

function removeProduct(productId) {
    const productContainer = document.getElementById(productId);
    productContainer.parentNode.removeChild(productContainer);
}

// Função de finalização de compra que monta o objeto da compra
function finalizarCompra() {
    const compras = [];
    const compra = {
        codigo: 1,
        clienteClube: document.getElementById("input-clube").value,
        produtos: [],
        valorTotal: parseFloat(
            document.querySelector('input[name="valorTotal"]').value
        ),
        valorComDesconto: parseFloat(
            document.querySelector('input[name="valorComDesconto"]').value
        ),
        metodoPagamento: document.querySelector('select[name="pagamento"]')
            .value,
    };

    const productContainers = document.querySelectorAll(".product-container");
    productContainers.forEach((container, index) => {
        const codigo = container.querySelector(
            `input[name="codigo${index + 1}"]`
        ).value;
        const quantidade = container.querySelector(
            `input[name="quantidade${index + 1}"]`
        ).value;
        compra.produtos.push({ codigo, quantidade });
    });

    compras.push(compra);
    // console.log(compras);
}

// Função de cadastro do produto
function finalizarCadastroProduto() {
    const form = document.getElementById("produtoForm");
    const formData = new FormData(form);
    const product = {
        nome: formData.get("nome"),
        quantidadeEstoque: parseInt(formData.get("quantidadeEstoque")),
        valorUnitario: parseFloat(formData.get("valorUnitario")),
        valorUnitarioComDesconto: parseFloat(
            formData.get("valorUnitarioComDesconto")
        ),
        unidadeMedida: formData.get("unidadeMedida"),
    };
    const productList = [product];
    // console.log(productList);
}

function buscarProdutoPorCodigo(codigo) {
    return jsonData.produtos.find((p) => p.codigo === codigo);
}

const jsonData = {
    produtos: [
        {
            codigo: 1,
            nome: "Banana",
            quantidadeEstoque: 10,
            valorUnitario: 10.0,
            valorUnitarioComDesconto: 8.0,
            unidadeMedida: "kg",
            dataHoraUltimaAlteracao: "2012-05-01T12:30:00",
        },
    ],
};

