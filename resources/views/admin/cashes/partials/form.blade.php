<fieldset>
    <div class="form-group" bis_skin_checked="1">
        <label for="Select">Tipo de transacción</label>
        {!! Form::select('transactios', $transactions, null, ['class' => 'form-control', 'wire:model' => 'transaction', 'placeholder' => 'Seleciona un tipo de transacción']) !!}
    </div>
    <div class="form-group" bis_skin_checked="1">
        <label for="amount">Tipo de transacción</label>
        {!! Form::number('amount', $amount, ['class' => 'form-control', 'wire:model' => 'amount', 'placeholder' => 'Ingresa la cantidad', 'inputmode' => 'numeric']) !!}
    </div>
    <div class="form-group" bis_skin_checked="1">
        <label for="description">Descripción</label>
        {!! Form::textarea('description', $description, ['class' => 'form-control', 'placeholder' => 'Describe el movimiento', 'rows' => 3, 'wire:model' => 'description']) !!}
    </div>
</fieldset>
