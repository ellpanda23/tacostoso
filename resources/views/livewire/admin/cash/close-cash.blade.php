<div>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#closeCashModal">
            Corte
        </button>

        <!-- Modal -->
        <div class="modal fade" id="closeCashModal" tabindex="-1" role="dialog" aria-labelledby="closeCashModalLabel"
            aria-hidden="true" bis_skin_checked="1" wire:ignore>
            <div class="modal-dialog" role="document" bis_skin_checked="1">
                <div class="modal-content" bis_skin_checked="1">
                    <div class="modal-header" bis_skin_checked="1">
                        <h5 class="modal-title" id="closeCashModalLabel">Corte de caja</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div id="addEventModal" class="modal-body" bis_skin_checked="1">
                        <div class="form-group" bis_skin_checked="1">
                            <label for="partial_cut">Cantidad que hay en la caja</label>
                            {!! Form::number('partial_cut', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la cantidad que se encuntra en la caja', 'wire:model' => 'amount']) !!}
                        </div>
                    </div>
                    <div class="modal-footer" bis_skin_checked="1">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            wire:click='closeCash'>Cerrar</button>
                        <button id="closeButton" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
