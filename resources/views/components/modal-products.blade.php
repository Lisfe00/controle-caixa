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
                    <input type="text" id="id" hidden>
                    <label>Código do produto:</label>
                    <input id="codigo_modal" type="text" name="codigo" class="form-control" disabled>
                    <div>
                        <label>Nome do produto:</label>
                        <input id="nome_modal" type="text" name="nome" class="form-control">
                    </div>
                    <div>
                        <label>Quantidade em estoque:</label>
                        <input id="quantidadeEstoque_modal" type="text" name="quantidadeEstoque" class="form-control">
                    </div>
                    <div>
                        <label>Valor unitário</label>
                        <input id="valorUnitario_modal" type="text" name="valorUnitario" class="form-control">
                    </div>
                    <div>
                        <label>Valor unitário com desconto</label>
                        <input id="valorUnitarioComDesconto_modal" type="text" name="valorUnitarioComDesconto" class="form-control">
                    </div>
                    <div>
                        <label>Unidade de medida</label>
                        <select id="unidadeMedida_modal" name="unidadeMedida" class="form-control">
                            <option value="kg">Kg</option>
                            <option value="unidade">Unidade</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="updateProduct()">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>