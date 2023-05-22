@extends('layouts.app')

@section('titulo')
    Inicio Sesión
@endsection

@push('css')
    <style>
        #body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endpush

@section('content-area')
    <div class="login">
        <img src="{{ asset('imgs/Ayto-Villagaton-Branuelas-removebg.png') }}" alt="Imagen Ayto Brañuelas">
        <h3>INICIAR SESIÓN - Pádel Brañuelas</h3>

        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <form>
            @csrf
            <div>
                <label for="email" class="labels">Email</label>
                <input id="email" name="email" type="email" placeholder="Email"
                    class="inputs @error('username') border-error @enderror" value="{{ old('email') }}">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="labels">Contraseña</label>
                <input id="password" name="password" type="password" placeholder="Contraseña"
                    class="inputs @error('username') border-error @enderror">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input id="remember" type="checkbox" name="remember"> <label for="remember">Recuerdame</label>
            </div>

            <input type="submit" value="Iniciar sesión" class="botones">
        </form>
    </div>
    <form class="hidden" action="{{ route('login') }}" method="POST" novalidate>
        @csrf
        <input id="email2" name="email" type="email">
        <input id="password2" name="password" type="password">
        <input id="remember2" type="checkbox" name="remember">
        <input id="boton2" type="submit" class="botones">
    </form>
@endsection

@push('js')
    <script src="{{ asset('js/generate-jwt-token.js') }}"></script>
@endpush
