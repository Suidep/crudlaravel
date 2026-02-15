<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión líneas de facturas</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <h1>Gestión de las líneas de facturas</h1>
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissable" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span>Cerrar</span>
                </button>
            </div>
        @endif
        <div class="row">
            <form action="{{ url('/facturalineas') }}" method="GET">
                <div class="form-row">
                    <div class="col-sm-8 my-1"><input type="text" class="form-control" name="buscar" value="{{ $buscar }}"></div>
                    <div class="col-auto my-1"><button type="submit" class="btn btn-primary">Buscar</button></div>
                </div>
            </form>
        </div>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Factura Id</th>
                    <th>Codigo</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Base</th>
                    <th>IVA</th>
                    <th>Importe IVA</th>
                    <th>Importe</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturalineas as $facturalinea)
                    <tr>
                        <td>{{ $facturalinea->id }}</td>
                        <td><a href="{{ url('/facturas/' . $facturalinea->id_factura) }}">{{ $facturalinea->id_factura }}</a></td>
                        <td>{{ $facturalinea->codigo }}</td>
                        <td>{{ $facturalinea->cantidad }}</td>
                        <td>{{ $facturalinea->descripcion }}</td>
                        <td>{{ $facturalinea->precio }}</td>
                        <td>{{ $facturalinea->base }}</td>
                        <td>{{ $facturalinea->iva }}</td>
                        <td>{{ $facturalinea->importeiva }}</td>
                        <td>{{ $facturalinea->importe }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ url('/facturalineas/' . $facturalinea->id . '/edit') }}">Editar</a>
                            <form action="{{ url('/facturalineas/' . $facturalinea->id) }}"  method="POST" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar la factura seleccionada?')" value="Borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7"><a class="btn btn-primary" href="{{ url('/facturalineas/create') }}">Nuevo</a></td>
                </tr>
            </tfoot>
        </table>
        {{ $facturalineas->links() }}
    </div>
    @endsection
</body>
</html>