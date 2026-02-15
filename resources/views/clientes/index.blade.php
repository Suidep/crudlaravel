<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión clientes</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <h1>Gestión de los clientes</h1>
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissable" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span>Cerrar</span>
                </button>
            </div>            
        @endif
        <div class="row">
            <form action="{{ url('/clientes') }}" method="GET">
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
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Logo src</th>
                    <th>Logo preview</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (isset($cliente))
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->logo }}</td>
                        <td><img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $cliente->logo }}" id="image-preview" height="70" alt=""></td>
                        <td>
                            <a class="btn btn-success" href="{{ url('/clientes/' . $cliente->id . '/edit') }}">Editar</a>
                            <form action="{{ url('/clientes/' . $cliente->id) }}"  method="POST" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el cliente seleccionado?')" value="Borrar">
                            </form>
                        </td>
                    </tr>
                @else
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->logo }}</td>
                            <td><img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $cliente->logo }}" id="image-preview" height="70" alt=""></td>
                            <td>
                                <a class="btn btn-success" href="{{ url('/clientes/' . $cliente->id . '/edit') }}">Editar</a>
                                <form action="{{ url('/clientes/' . $cliente->id) }}"  method="POST" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el cliente seleccionado?')" value="Borrar">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7"><a class="btn btn-primary" href="{{ url('clientes/create') }}">Nuevo</a></td>
                </tr>
            </tfoot>
        </table>
        @if (empty($cliente) && isset($clientes))
            {{ $clientes->links() }} 
        @endif      
    </div>
    @endsection
</body>
</html>