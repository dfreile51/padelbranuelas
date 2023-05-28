<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pádel Brañuelas - @yield('titulo')</title>

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
    @auth
        <span class="hidden">{{ auth()->user()->id }}</span>
    @endauth
    <header class="header">
        <div class="contenedor contenido-header">
            <div class="logo">
                <img src="{{ asset('imgs/Ayto-Villagaton-Branuelas-removebg.png') }}" alt="Logo">
            </div>

            <nav class="navegacion-principal">
                <a href="/">Inicio</a>
                <a href="{{ route('reservas') }}">Reservas</a>
                <a href="{{ route('tarifas') }}">Tarifas</a>
                <a href="{{ route('torneos') }}">Torneos</a>
                <a href="{{ route('conocenos') }}">Conócenos</a>
                <a href="{{ route('contacto') }}">Contacto</a>
            </nav>

            <div class="botones-header">
                @guest
                    <a href="{{ route('login') }}" class="botones">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="botones">Registrarse</a>
                @endguest

                @auth
                    <div class="imagen-perfil">
                        <img src="{{ auth()->user()->imagen ? asset('perfiles') . '/' . auth()->user()->imagen : asset('imgs/usuario.svg') }}"
                            alt="Imagen perfil">
                    </div>
                @endauth
            </div>

            <div class="toggle-btn">
                <span class="material-symbols-outlined">
                    menu
                </span>
            </div>
        </div>

        <div class="contenedor contenido-perfil">
            <div class="dropdown-perfil hidden">
                <nav class="navegacion-principal">
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index') }}">Mi perfil</a>
                            <a href="{{ route('mis-reservas.index') }}">Mis reservas</a>
                            @hasrole('admin|empleado')
                                <a href="{{ route('panel-admin.index') }}">Panel Admin</a>
                            @endhasrole
                        @endif
                        <div class="botones-header">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="botones btnLogOut">Cerrar Sesión</button>
                            </form>
                        </div>
                    @endauth

                </nav>
            </div>
        </div>

        <div class="dropdown-menu hidden">
            <nav class="navegacion-principal">
                <a href="/">Inicio</a>
                <a href="{{ route('reservas') }}">Reservas</a>
                <a href="{{ route('tarifas') }}">Tarifas</a>
                <a href="{{ route('torneos') }}">Torneos</a>
                <a href="{{ route('conocenos') }}">Conócenos</a>
                <a href="{{ route('contacto') }}">Contacto</a>
            </nav>

            <div class="botones-header">
                @guest
                    <a href="{{ route('login') }}" class="botones">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="botones">Registrarse</a>
                @endguest

                @auth
                    <div class="imagen-perfil">
                        <img src="{{ auth()->user()->imagen ? asset('perfiles') . '/' . auth()->user()->imagen : asset('imgs/usuario.svg') }}"
                            alt="Imagen perfil">
                    </div>
                    <div class="perfil-buttons" style="display: none;">
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index') }}">Mi perfil</a>
                            <a href="{{ route('mis-reservas.index') }}">Mis reservas</a>
                            @hasrole('admin|empleado')
                                <a href="{{ route('panel-admin.index') }}">Panel Admin</a>
                            @endhasrole
                        @endif
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="botones btnLogOut">Cerrar Sesión</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    <div id="body" style="margin-top: 98.5px">
        @yield('content-area')
    </div>

    <footer class="footer">
        <div class="contenedor contenido-footer">
            <div class="footer-card">
                <h3>Redes Sociales</h3>
                <i class="fa-brands fa-twitter fa-xl"></i>
                <i class="fa-brands fa-facebook fa-xl"></i>
                <i class="fa-brands fa-instagram fa-xl"></i>
            </div>
            <div class="footer-card">
                <h3>Contacto</h3>
                <span>
                    &#169; {{ now()->year }} PÁDEL BRAÑUELAS - VILLAGATÓN
                </span>
                <br>
                <span>
                    C/ El Fanal s/n, <br>
                    C.P: 24360 Brañuelas (León) España <br>
                    Teléfono: <a href="#">999 333 666</a> <br>
                    <a href="#">info@aytovillagaton.es</a>
                </span>
            </div>
            <div class="footer-card">
                <h3>Legalidad</h3>
                <a href="#">Aviso Legal</a> <br>
                <a href="#">Política de privacidad</a>
            </div>
            <div id="logo" class="logo">
                <img src="{{ asset('imgs/Ayto-Villagaton-Branuelas-removebg.png') }}" alt="Logo">
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/calc_body_height.js') }}"></script>
    <script src="{{ asset('js/dropdown-menu.js') }}"></script>
    @auth
        <script>
            const userId = document.querySelector('span.hidden').textContent;
            const btnsLogOut = document.querySelectorAll('.btnLogOut');

            btnsLogOut.forEach(btnLogOut => {
                btnLogOut.addEventListener('click', () => {
                    localStorage.clear();
                });
            });

            if (!localStorage.getItem('user_id') || localStorage.getItem('user_id') !== userId) {
                localStorage.setItem('user_id', userId);
            }
        </script>
    @endauth
    @stack('js')
</body>

</html>
