<div class="modal fade" id="editarClienteModal" tabindex="-1" role="dialog" aria-labelledby="editarClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarClienteModalLabel">Editar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editarClienteForm">
                    <input type="text" id="id" hidden>
                    <label>Cpf do cliente:</label>
                    <input id="cpf_modal" type="text" name="cpf" class="form-control">
                    <div>
                        <label>Nome do cliente:</label>
                        <input id="nome_modal" type="text" name="nome" class="form-control">
                    </div>
                    <div>
                        <label>Sobrenome do cliente:</label>
                        <input id="sobrenome_modal" type="text" name="sobrenome" class="form-control">
                    </div>
                    <div>
                        <label>Data de nascimento do cliente</label>
                        <input id="dataNascimento_modal" type="text" name="dataNascimento" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="updateClient()">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>