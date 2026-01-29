<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar cliente</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <p>Formulario para editar cliente</p>
        <form action="{{ url('/clientes/' . $cliente->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('clientes.form', ['submit' => 'Modificar cliente', 'cancel' => 'Cancelar la modificación'])
        </form>
    </div>
    @endsection
    <script>
        document.addEventListener('DOMContentLoaded', ()=>{
            const fileInput = document.getElementById('logo');
            const imgPreview = document.getElementById('image-preview');

            fileInput.addEventListener('change', (event)=>{
                const file = event.target.files[0];
                const fileReader = new FileReader();

                fileReader.addEventListener('load', (e)=>{
                    imgPreview.src = e.target.result;
                });

                fileReader.readAsDataURL(file);
            });
        });
    </script>
</body>
</html>