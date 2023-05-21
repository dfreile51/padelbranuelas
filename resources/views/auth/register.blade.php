@extends('layouts.app')

@section('titulo')
    Registrarse
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
    <div class="register">
        <img src="{{ asset('imgs/Ayto-Villagaton-Branuelas-removebg.png') }}" alt="Imagen Ayto Brañuelas">
        <h3>REGISTRO - Pádel Brañuelas</h3>
        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        <form action="{{ route('register') }}" method="POST" novalidate>
            @csrf
            <div>
                <label for="name" class="labels">Nombre</label>
                <input id="name" name="name" type="text" placeholder="Nombre Completo"
                    class="inputs @error('name') border-error @enderror" value="{{ old('name') }}">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="username" class="labels">Username</label>
                <input id="username" name="username" type="text" placeholder="Nombre de Usuario"
                    class="inputs @error('username') border-error @enderror" value="{{ old('username') }}">
                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="labels">Email</label>
                <input id="email" name="email" type="email" placeholder="Email"
                    class="inputs @error('email') border-error @enderror" value="{{ old('email') }}">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="labels">Contraseña</label>
                <input id="password" name="password" type="password" placeholder="Contraseña"
                    class="inputs @error('password') border-error @enderror">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password_confirmation" class="labels">Repetir Contraseña</label>
                <input id="password_confirmation" name="password_confirmation" type="password" type="text"
                    placeholder="Repetir Contraseña" class="inputs">
            </div>
            <input type="submit" value="Registrarse" class="botones">
        </form>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/dropdown-menu.js') }}"></script>
@endpush
