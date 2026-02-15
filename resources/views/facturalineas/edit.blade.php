<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar línea de factura</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">      
        <p>Formulario para modificar línea de factura</p>
        <form id="formulario" action="{{ url('/facturalineas/' . $facturalinea->id) }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            @include('facturalineas.form', ['submit' => 'Modificar factura', 'cancel' => 'Cancelar la modificación'])
        </form>
    </div>
    @endsection
    <script>
        document.addEventListener("DOMContentLoaded", ()=>{
            let cantidad = document.getElementById("cantidad");
            let precio = document.getElementById("precio");
            let base = document.getElementById("base");
            let iva = document.getElementById("iva");
            let importeIva = document.getElementById("importeiva");
            let importe = document.getElementById("importe");
            let form = document.getElementById("formulario");

            form.addEventListener("input", ()=>{
                if (cantidad.value && precio.value){
                    base.value = parseFloat(cantidad.value) * parseFloat(precio.value);
                }

                if (base.value && iva.value){
                    importeIva.value = parseFloat(base.value) * parseFloat(iva.value) / 100;
                }

                if (base.value && importeIva.value){
                    importe.value = parseFloat(base.value) + parseFloat(importeIva.value);
                }
            });
        });
    </script>
</body>
</html>