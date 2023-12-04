const clube = document.querySelector("#cliente-clube");
// se o clube for selecionado, mostra o campo de input e o input com o valor total com desconto
if (clube) {
    clube.addEventListener("change", function () {
        const clubeCpf = document.querySelector("#input-clube");
        const submitCpf = document.querySelector("#button-clube");
        const valorDesconto = document.querySelector("#valor-desconto");
        if (clube.value == "sim") {
            clubeCpf.style.display = "flex";
            submitCpf.style.display = "flex";
            valorDesconto.style.display = "flex";
        } else {
            clubeCpf.style.display = "none";
            submitCpf.style.display = "none";
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
                <input type="text" name="codigo${productCounter}" placeholder="codigo">
                <input type="text" name="quantidade${productCounter}" placeholder="quantidade">
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

function popularTabelaProdutos() {
    const tbody = document.getElementById("produtosTbody");
    tbody.innerHTML = "";
    jsonData.produtos.forEach((produto) => {
        tbody.innerHTML += `
        <tr>
            <td>${produto.codigo}</td>
            <td>${produto.nome}</td>
            <td>${produto.quantidadeEstoque}</td>
            <td>${produto.valorUnitario}</td>
            <td>${produto.valorUnitarioComDesconto}</td>
            <td>${produto.unidadeMedida}</td>
            <td>${produto.dataHoraUltimaAlteracao}</td>
            <td>
                <button type="button" onclick="editarProduto(${produto.codigo})">Editar</button>
                <button type="button" onclick="excluirProduto(${produto.codigo})">Excluir</button>
            </td>
        </tr>
        `;
    });
}

function editarProduto(codigo) {
    const produto = buscarProdutoPorCodigo(codigo);
    document.getElementById("editarProdutoForm").innerHTML = `
    <label>Código:</label>
        <input type="text" id="editCodigo" value="${
            produto.codigo
        }" class="form-control" readonly>
        <label>Nome do produto:</label>
        <input type="text" id="editNome" value="${
            produto.nome
        }" class="form-control">
        <label>Quantidade em estoque:</label>
        <input type="text" id="editQuantidadeEstoque" value="${
            produto.quantidadeEstoque
        }" class="form-control">
        <label>Valor unitário:</label>
        <input type="text" id="editValorUnitario" value="${
            produto.valorUnitario
        }" class="form-control">
        <label>Valor unitário com desconto:</label>
        <input type="text" id="editValorUnitarioComDesconto" value="${
            produto.valorUnitarioComDesconto
        }" class="form-control">
        <label>Unidade de medida:</label>
        <select id="editUnidadeMedida" class="form-control">
            <option value="kg" ${
                produto.unidadeMedida === "kg" ? "selected" : ""
            }>Kg</option>
            <option value="unid" ${
                produto.unidadeMedida === "unid" ? "selected" : ""
            }>Unidade</option>
        </select>
    `;

    $("#editarProdutoModal").modal("show");
}
