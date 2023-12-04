<div class="modal fade" id="excluirProdutoModal" tabindex="-1" role="dialog" aria-labelledby="excluirProdutoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluirProdutoModalLabel">Excluir Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="id_modal_excluir" hidden>
                <span id="text_modal"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="deleteProduct()">Sim, tenho certeza</button>
            </div>
        </div>
    </div>
</div>