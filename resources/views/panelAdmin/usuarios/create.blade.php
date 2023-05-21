@extends('layouts.adminPanel')

@section('titulo')
    Agregar Usuario
@endsection

@section('content-area')
    <div class="agregar__usuario">
        <h2>Añadir usuario</h2>
        <div class="usuario__form">
            @if (session('success'))
                <p class="success">{{ session('success') }}</p>
            @endif
            <div>
                <form action="{{ route('panel-admin.usuarios.store') }}" method="POST">
                    @csrf
                    <div class="all-inputs">
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
                            <label class="labels">Roles</label>
                            @foreach ($roles as $role)
                                <label class="radio-button">{{ $role->name }}
                                    <input type="radio" name="rol" value="{{ $role->id }}">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <input type="submit" value="Guardar Cambios" class="botones">
                </form>
            </div>
        </div>
    </div>
@endsection
