<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pádel Brañuelas - Panel Admin - @yield('titulo')</title>

    <link rel="shortcut icon" href="{{ asset('imgs/Ayto-Villagaton-Branuelas-removebg.png') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    @stack('css')
    <script src="https://kit.fontawesome.com/6a5b02212e.js" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="menu">
        <div class="logo">
            <img src="{{ asset('imgs/Ayto-Villagaton-Branuelas-removebg.png') }}" alt="Logo">
        </div>

        <div class="items">
            <a href="{{ route('panel-admin.index') }}"><i class="fa-solid fa-chart-pie"></i>&nbsp;&nbsp;Inicio</a>
            <a href="{{ route('panel-admin.reservas') }}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Reservas</a>
            <a href="{{ route('panel-admin.torneos') }}"><i class="fa-solid fa-sitemap"></i>&nbsp;&nbsp;Torneos</a>
            <a href="{{ route('panel-admin.comentarios') }}"><i
                    class="fa-solid fa-comments"></i>&nbsp;&nbsp;Comentarios</a>
            @hasrole('admin')
                <a href="{{ route('panel-admin.usuarios') }}"><i class="fa-solid fa-users"></i>&nbsp;&nbsp;Usuarios</a>
            @endhasrole
        </div>

        <a href="javascript:void(0)" class="closebtn">&times;</a>

        <div class="footerBtn">
            <a href="/">Volver</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Cerrar Sesión</button>
            </form>
        </div>
    </div>

    <div id="interface">
        <div id="sombra" class="hidden" style="background-color: rgba(0,0,0,0.4);"></div>
        <div class="navigation">
            <div class="toggle-btn">
                <span class="material-symbols-outlined">
                    menu
                </span>
            </div>
            <div class="profile">
                <img src="{{ auth()->user()->imagen ? asset('perfiles') . '/' . auth()->user()->imagen : asset('imgs/usuario.svg') }}"
                    alt="Imagen Perfil">
            </div>
        </div>
        <div class="contenedor">
            @yield('content-area')
        </div>
    </div>

    <script src="{{ asset('js/panelAdmin/sidebar.js') }}"></script>
    <script>
        const btnLogOut = document.querySelector('.footerBtn form button');

        btnLogOut.addEventListener('click', () => {
            localStorage.clear();
        });
    </script>
    @stack('js')
</body>

</html>
