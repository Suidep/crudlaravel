<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creación facturas</title>
</head>
<body>
    <p>Formulario para crear facturas</p>
    <form action="{{ url('/facturas') }}" method="POST">
        @csrf
        @include('facturas.form', ['submit' => 'Crear factura', 'cancel' => 'Cancelar creación'])
    </form>
</body>
</html>