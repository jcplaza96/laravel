<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <a class="ml-5 navbar-brand" href="#">
        <h1 class="display-5">Gesinem Análisis Financiero</h1>
    </a>
    <div class="container">    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{url('/')}}" >Home</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                    <a class="nav-link btn {{ request()->is('catalog') ? 'active' : '' }}" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catálogo</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{url('/patinetes')}}" >Patinetes</a>
                        <a class="dropdown-item" href="{{url('/bicicletas')}}" >Bicicletas</a>
                        <a class="dropdown-item" href="{{url('/motocicletas')}}">Motocicletas</a>
                        @if(Auth::check() && strcmp ( "admin" , Auth::user()->rol)==0)
                            <hr>
                            <a class="dropdown-item" href="{{url('/create')}}">Añadir producto</a>
                        @endif
                    </div>
                    </div>
                </li>
                <li class="nav-item">
                    @if(Auth::check())
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Cerrar sesión
                            </button>
                        </form>
                    @else
                        <a class="nav-link" href="{{url('/login')}}">Login</a>
                    @endif

                </li>
            </ul>
        </div>
    </div>
</nav>
