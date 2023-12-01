<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#partialCutModal">
        Parcial
    </button>

    <!-- Modal -->
    <div class="modal fade" id="partialCutModal" tabindex="-1" role="dialog" aria-labelledby="partialCutModalLabel"
        aria-hidden="true" bis_skin_checked="1" wire:ignore>
        <div class="modal-dialog" role="document" bis_skin_checked="1">
            <div class="modal-content" bis_skin_checked="1">
                <div class="modal-header" bis_skin_checked="1">
                    <h5 class="modal-title" id="partialCutModalLabel">Corte parcial de caja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="addEventModal" class="modal-body" bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label for="partial_cut">Cantidad del corte</label>
                        {!! Form::number('partial_cut', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la cantidad de corte', 'wire:model' => 'amount']) !!}
                    </div>
                </div>
                <div class="modal-footer" bis_skin_checked="1">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        wire:click='addMovement'>Agregar</button>
                    <button id="closeButton" type="button" class="btn btn-danger"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

</div>
