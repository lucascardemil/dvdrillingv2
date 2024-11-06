<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <header class="navbar navbar-dv sticky-top d-flex py-0 shadow">

        <a class="navbar-brand col-md-3 col-lg-2 me-0 text-center" href="#">
            <img src="images/logo.png" alt="" class="img-dashboard">
        </a>
        <button class="navbar-toggler d-md-none mx-3 collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <div class="d-flex justify-content-center align-items-center px-3">
                    <div class="text-white fw-bold">
                        {{ session('user')->name }}
                    </div>
                    <div class="text-white px-3">
                        |
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                 document.getElementById('logout-form-desktop').submit();">
                            <i class="bi bi-box-arrow-right"></i> Cerrar Sesion
                        </a>
                        <form id="logout-form-desktop" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="">
                <div class="position-sticky pt-3">
                    {{-- <ul class="nav flex-column">
                        @can('proyecto')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('proyecto.index') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('proyecto.index') }}">
                                    <i class="bi bi-kanban"></i>
                                    Crear Proyecto
                                </a>
                            </li>
                        @endcan
                        @can('personal')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('personal.index') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('personal.index') }}">
                                    <i class="bi bi-people"></i>
                                    Crear Personal
                                </a>
                            </li>
                        @endcan
                        @can('activos')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('activos.index') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('activos.index') }}">
                                    <i class="bi bi-car-front"></i>
                                    Crear Activos
                                </a>
                            </li>
                        @endcan
                        @can('recursos')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('recursos.index') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('recursos.index') }}">
                                    <i class="bi bi-boxes"></i>
                                    Asignar Recursos
                                </a>
                            </li>
                        @endcan
                        @can('actividades')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('actividades.index') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('actividades.index') }}">
                                    <i class="bi bi-card-text"></i>
                                    Glosario Actividades
                                </a>
                            </li>
                        @endcan
                        @can('reportes')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('reportes.index') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('reportes.index') }}">
                                    <i class="bi bi-file-bar-graph"></i>
                                    Reportes
                                </a>
                            </li>
                        @endcan
                        @can('matriz')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('matriz.index') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('matriz.index') }}">
                                    <i class="bi bi-list-check"></i>
                                    Matriz Checklist
                                </a>
                            </li>
                        @endcan
                        @can('checklist')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('checklist.index') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('checklist.index') }}">
                                    <i class="bi bi-list-check"></i>
                                    Checklist
                                </a>
                            </li>
                        @endcan
                        @can('roles')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('roles.index') }}">
                                    <i class="bi bi-person-fill-gear"></i>
                                    Roles
                                </a>
                            </li>
                        @endcan
                        @can('usuarios')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('usuarios.index') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('usuarios.index') }}">
                                    <i class="bi bi-person-add"></i>
                                    Usuarios
                                </a>
                            </li>
                        @endcan
                        <div class="perfil-mobile">
                            <hr class="my-3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page">
                                    <i class="bi bi-person-badge-fill"></i>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                     document.getElementById('logout-form-mobile').submit();">
                                    <i class="bi bi-door-open"></i> Cerrar Sesion
                                </a>
                                <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </div>
                    </ul> --}}
                </div>
            </nav>

            <div class="col-md-9 ms-sm-auto col-lg-10 p-4" id="app">
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>
