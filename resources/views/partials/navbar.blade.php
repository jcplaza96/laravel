<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <a class="ml-2 navbar-brand" href="{{url('/')}}">
        <h4>Gesinem Consultoría</h4>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto  mr-5">
            @if(Auth::check())
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{url('/')}}" >Inicio</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="nav-link btn {{ request()->is('catalog') ? 'active' : '' }}" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Empresas</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{url('/empresas')}}" >Lista de Empresas</a>
                        <hr>
                        <a class="dropdown-item" href="{{url('/empresas/create')}}" >Nueva Empresa</a>
                    </div>
                </div>
            </li>
            @endif
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
</nav>
