<div class="modal fade" id="compraModal" tabindex="-1" role="dialog" aria-labelledby="compraModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('comprar') }}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="album">
                    <div class="form-group">
                        <label for="nome">Nome: </label>
                        <input type="text" class="form-control" placeholder="Digite o nome" name="nome" required>
                    </div>

                    <div class="form-group">
                        <label for="cpf">CPF: </label>
                        <input type="text" class="form-control" id="cpf" placeholder="XXX.XXX.XXX-XX" name="cpf"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="">Forma de pagamento: </label><br>
                        <div class="form-check form-check-inline radio radio-danger">
                            <input class="form-check-input" type="radio" id="debito" value="1" name="forma_pagamento"
                                checked>
                            <label class="form-check-label" for="debito">Débito</label>
                        </div>
                        <div class="form-check form-check-inline radio radio-danger">
                            <input class="form-check-input" type="radio" id="credito" value="2" name="forma_pagamento">
                            <label class="form-check-label" for="credito">Crédito</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Comprar</button>
                </div>
            </form>
        </div>
    </div>
</div>
