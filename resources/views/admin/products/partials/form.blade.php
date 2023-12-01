<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
        'placeholder' => 'Ingresa nombre del producto',
    ]) !!}

    @error('name')
        <small class="text-sm text-red-600">{{ $message }}</small>
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, [
        'class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''),
        'placeholder' => 'Este campo se genera automaticamente',
        'readonly',
    ]) !!}


    @error('slug')
        <small class="text-sm text-red-600">{{ $message }}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción: ') !!}
    {!! Form::textarea('description', null, [
        'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),
        'placeholder' => 'Descripcion del producto',
    ]) !!}
    @error('description')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <div class="image-wrapper">
            @isset($product->image)
                <img id="picture" src="{{Storage::url($product->image)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2020/07/08/10/17/car-5383371_960_720.jpg" alt="">
            @endisset
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('file', 'Imagen del producto') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat quasi nisi non sunt, nostrum deserunt debitis, iste similique reprehenderit error sit explicabo, repellendus odio repudiandae aperiam. Explicabo saepe maiores culpa?</p>
            @error('file')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('cost', 'Precio: ') !!}
    {!! Form::number('cost', null, [
        'class' => 'form-control' . ($errors->has('cost') ? ' is-invalid' : ''),
        'placeholder' => 'Precio del producto',
        'inputmode' => 'numeric',
    ]) !!}
    @error('cost')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('stock', 'Stock: ') !!}
    {!! Form::number('stock', null, [
        'class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''),
        'placeholder' => 'Cantidad en almacen',
        'inputmode' => 'numeric',
    ]) !!}
    @error('stock')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoria: ') !!}
    {!! Form::select('category_id', $categories, null, [
        'class' => 'form-control',
        'placeholder' => 'Selecciona una categoria',
    ]) !!}
    @error('category_id')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('status', 'Estado: ') !!}
    {!! Form::select('status', [1 => 'Disponible', 2 => 'No Disponible'], null, [
        'class' => 'form-control',
        'placeholder' => 'Estado del producto',
    ]) !!}
    @error('status')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('metric', 'Metrica: ') !!}
    <div class="input-group" bis_skin_checked="1">
        <div class="input-group-prepend" bis_skin_checked="1">
            <div class="input-group-text" bis_skin_checked="1">
                {!! Form::checkbox('countable', 1) !!}
            </div>
        </div>
        {!! Form::select('metric', ['Kg' => 'Kg' , 'Gr' => 'Gr' , 'Lt' => 'Lt' , 'Ml' => 'Ml' ], null, [
            'class' => 'form-control',
            'placeholder' => 'Selecciona la metrica',
        ]) !!}
    </div>
</div>
