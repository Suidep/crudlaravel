<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar factura</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">      
        <p>Formulario para modificar factura</p>
        <form action="{{ url('/facturas' . $factura->id) }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            @include('facturas.form', ['submit' => 'Modificar factura', 'cancel' => 'Cancelar la modificación'])
        </form>
    </div>
    @endsection
</body>
</html>