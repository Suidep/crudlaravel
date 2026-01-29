@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" maxlength="64" value="{{ isset($cliente->nombre) ? $cliente->nombre : old('nombre') }}">
</div>
<div class="form-group">
    <label for="direccion">Dirección</label>
    <input class="form-control" type="text" name="direccion" id="direccion" maxlength="64" value="{{ isset($cliente->direccion) ? $cliente->direccion : old('direccion') }}">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" type="text" name="email" id="email" maxlength="100" value="{{ isset($cliente->email) ? $cliente->email : old('email') }}">
</div>
<div class="form-group">
    <label for="telefono">Teléfono</label>
    <input class="form-control" type="text" name="telefono" id="telefono" maxlength="11" value="{{ isset($cliente->telefono) ? $cliente->telefono : old('telefono') }}">
</div>
<div class="form-group">
    <label for="logo">Logo</label>
    @if (isset($cliente->logo))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $cliente->logo }}" style="height: 70px" alt="">
    @endif
    <input class="form-control" type="file" name="logo" id="logo" accept="image/*">
    <img class="img-thumbnail img-fluid" style="height: 70px" id="image-preview" src="" alt="">
</div>
<button class="btn btn-primary" type="submit">{{ $submit }}</button>
<a class="btn btn-success" href="{{ url('clientes') }}">{{ $cancel }}</a>