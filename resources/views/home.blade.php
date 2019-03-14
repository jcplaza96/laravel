@extends('layouts.master')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Entra en el mundo de la movilidad eléctrica</h1>
        <hr class="mb-4">
        <p class="lead">En esta página encontrarás una larga lista de vehículos eléctricos que te harán adentrarte en el mundo de una movilidad limpia y divertida.</p>
    </div>
    <div class="container marketing">

        <!-- Three columns of text below the carousel -->

        <div class="row">
            <div class="col-lg-4 text-center mb-3">
                <img class="rounded-circle" style="border: 2px solid #000" src="{{asset('assets/img/MiScooterM365Inicio.jpg')}}" alt="Generic placeholder image" width="140" height="140">
                <h2>Patinetes</h2>
                <p>Si eres de los que llevan al niño a rastras al colegio, o simplemente estás aburrido de perder el tiempo buscando aparcamiento en ciudad, la solución a tus problemas se resume en dos palabras: patinete eléctrico.</p>
                <p><a class="btn btn-secondary" href="{{url('/patinetes')}}" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 text-center mb-3">
                <img class="rounded-circle" style="border: 2px solid #000" src="{{asset('assets/img/PragueInicio.jpg')}}" alt="Generic placeholder image" width="140" height="140">
                <h2>Bicicletas</h2>
                <p>Entra ahora en el catálogo y descubre la más amplia colección de Bicicletas Electricas con los mayores descuentos.</p>
                <p><a class="btn btn-secondary" href="{{url('/bicicletas')}}" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 text-center mb-3">
                <img class="rounded-circle " style="border: 2px solid #000" src="{{asset('assets/img/S01Inicio.jpg')}}" alt="Generic placeholder image" width="140" height="140">
                <h2>Motocicletas</h2>
                <p>Las motos eléctricas son una gran alternativa para movernos por la ciudad o para realizar actividades de ocio. Los motores eléctricos están empezando a sustituir a los de combustión, y cada vez es más común ver ciclomotores y scooters eléctricos en nuestras ciudades.</p>
                <p><a class="btn btn-secondary" href="{{url('/motocicletas')}}" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

    </div>
@endsection
