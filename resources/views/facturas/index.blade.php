<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión facturas</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <h1>Gestión de las facturas</h1>
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissable" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span>Cerrar</span>
                </button>
            </div>
        @endif
        <div class="row">
            <form action="{{ url('/facturas') }}" method="GET">
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
                    <th>Cliente Id</th>
                    <th>Numero</th>
                    <th>Fecha</th>
                    <th>Base</th>
                    <th>Importe Iva</th>
                    <th>Importe</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturas as $factura)
                    <tr>
                        <td>{{ $factura->id }}</td>
                        <td>{{ $factura->cliente_id }}</td>
                        <td>{{ $factura->numero }}</td>
                        <td>{{ $factura->fecha }}</td>
                        <td>{{ $factura->base }}</td>
                        <td>{{ $factura->importeiva }}</td>
                        <td>{{ $factura->importe }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ url('/facturas/' . $factura->id . '/edit') }}">Editar</a>
                            <form action="{{ url('/facturas/' . $factura->id) }}"  method="POST" class="d-inline">
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
                    <td colspan="7"><a class="btn btn-primary" href="{{ url('/facturas/create') }}">Nuevo</a></td>
                </tr>
            </tfoot>
        </table>
        {{ $facturas->links() }}
    </div>
    @endsection
</body>
</html>