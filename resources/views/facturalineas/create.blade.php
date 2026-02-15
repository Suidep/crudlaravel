<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creación línea de factura</title>
</head>
<body>
    <p>Formulario para crear línea de factura</p>
    <form id="formulario" action="{{ url('/facturalineas') }}" method="POST">
        @csrf
        @include('facturalineas.form', ['submit' => 'Crear factura', 'cancel' => 'Cancelar creación'])
    </form>
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