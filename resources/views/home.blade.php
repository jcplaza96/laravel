@extends('layouts.master')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4 text-center"><b>Gesinem Análisis Financieros</b></h1>
        <hr class="mb-4">
        <h4>Las Pymes son el motor económico de España</h4>
        <p>En España el 99,8 % del tejido empresarial son Pymes,  crean  el 66,4 % del empleo del País y contribuyen a su crecimiento  económico con el 63 % del valor   Añadido Bruto. </p>
        <p>Para mejorar la productividad de las Pymes hay que dotarlas con los mecanismos necesarios que establezcan un control  efectivo sobre la producción y su economía. </p>
        <p>Para ello la formación del empresario juega un papel relevante  en el impulso de su crecimiento.</p>
        <p>No son suficientes las capacidades innatas (visión de negocio, Capacidad de trabajo y superación), que caracterizan el perfil del emprendedor, virtudes que sin duda son fundamentales para la evolución del tejido empresarial, pero hay que potenciar dichas capacidades, con una formación adecuada y eficiente.</p>
        <p>Para ello en <b>Gesinem Analistas Financieros</b>, le garantizamos cubrir esas necesidades poniendo a su disposición una aplicación informática que le ayudará a resolver a aquellas dudas e incertidumbres que le surgirán en el desempeño de sus funciones directivas.</p>

    </div>
    <div class="container marketing">

        <!-- Three columns of text below the carousel -->

        <div class="row">
            <div class="col-lg-4 text-center mb-3">
                <img class="rounded-circle" style="border: 2px solid #343a40" src="{{asset('assets/img/herramienta.jpg')}}" alt="Generic placeholder image" width="140" height="140">
                <h2>Una Herramienta</h2>
                <h2>Eficaz</h2>
                <p>El Analisis Financiero de la empresa es la herramienta más eficaz para tener una visión más objetiva de la Empresa, facilitandole la toma de decisiones.</p>
                {{-- <p><a class="btn btn-secondary" href="{{url('/patinetes')}}" role="button">View details »</a></p> --}}
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 text-center mb-3">
                <img class="rounded-circle" style="border: 2px solid #343a40" src="{{asset('assets/img/formacion.jpeg')}}" alt="Generic placeholder image" width="140" height="140">
                <h2>Una Formación</h2>
                <h2>adecuada</h2>
                <p>Le ayudamos a interpretar los datos obtenidos en el analisis fianciero efectuado sobre su empresa. Como obtenerlos, su finalidad y su aplicación. Le dotamos con los conocimientos básicos, para obtener los mejores resultados.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 text-center mb-3">
                <img class="rounded-circle" style="border: 2px solid #343a40" src="{{asset('assets/img/vision.jpg')}}" alt="Generic placeholder image" width="140" height="140">
                <h2>Le facilita una visión</h2>
                <h2>de futuro</h2>
                <p>Las motos eléctricas son una gran alternativa para movernos por la ciudad o para realizar actividades de ocio. Los motores eléctricos están empezando a sustituir a los de combustión, y cada vez es más común ver ciclomotores y scooters eléctricos en nuestras ciudades.</p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

    </div>
@endsection
