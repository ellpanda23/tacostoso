<div>
    <!-- Button trigger modal -->
    <button type="button" class="float-right btn btn-secondary" data-toggle="modal" data-target="#editMovementModal{{$movement->id}}">
        Editar
    </button>

    <!-- Modal -->
    <div class="modal fade" id="editMovementModal{{$movement->id}}" tabindex="-1" role="dialog" aria-labelledby="editMovementModal{{$movement->id}}Label"
        aria-hidden="true" bis_skin_checked="1" wire:ignore>
        <div class="modal-dialog" role="document" bis_skin_checked="1">
            <div class="modal-content" bis_skin_checked="1">
                <div class="modal-header" bis_skin_checked="1">
                    <h5 class="modal-title" id="editMovementModal{{$movement->id}}Label">Editar movimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='loadData'>
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="addEventModal" class="modal-body" bis_skin_checked="1">
                    <form>
                        @include('admin.cashes.partials.form')
                    </form>
                </div>
                <div class="modal-footer" bis_skin_checked="1">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click='updateMovement'>Editar</button>
                    <button id="closeButton" type="button" class="btn btn-danger" data-dismiss="modal" wire:click='loadData'>Cancelar</button>
                </div>
            </div>
        </div>
    </div>

</div>
