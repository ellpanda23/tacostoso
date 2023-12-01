<div class="form-group">
    {!! Form::label('product', 'Producto: ') !!}
    {!! Form::select('product', $products, null, ['class' => 'form-control', 'placeholder' => 'Seleciona un producto']) !!}
</div>
<div class="form-group">
    {!! Form::label('quantity', 'Cantidad: ') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad en inventario', 'inputmode' => 'numeric']) !!}
    @error('quantity')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>

