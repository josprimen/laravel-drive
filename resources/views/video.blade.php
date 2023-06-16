
@extends('layouts.app')

@section('css')
    <style>
        .preview-container {
            padding-bottom: 56.25%; /* Relación de aspecto 16:9 para el contenedor de la vista previa */
            position: relative;
            overflow: hidden;
        }

        .preview {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        body {
            min-height: 100vh; /* Hace que el cuerpo ocupe al menos el 100% de la altura de la ventana */
            background-color: #343a40; /* Color de fondo oscuro */
            color: #fff; /* Color del texto en modo oscuro */
        }

        /* Estilos adicionales para elementos específicos */
        .card {
            background-color: #212529; /* Color de fondo oscuro para las tarjetas */
            color: #fff; /* Color del texto en modo oscuro para las tarjetas */
        }

    </style>
@endsection


@section('content')

    <div class="container">
        <h1>Ejemplo de Vista con Bootstrap</h1>
        <p>¡Esta es una vista de ejemplo que utiliza Bootstrap!</p>

        <div class="row">
            @foreach($videos as $video)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="preview-container">
                            <div class="preview embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$video->url ?? ''}}" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$video->name}}</h5>
                            <p class="card-text">Descripción del video.</p>
                        </div>
                    </div>
                </div>
        @endforeach


        <!-- Agrega más elementos de tarjeta aquí -->

        </div>
    </div>


@endsection

@section('scripts')
@endsection
