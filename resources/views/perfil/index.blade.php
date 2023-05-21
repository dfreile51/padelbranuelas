@extends('layouts.app')

@section('titulo')
    Editar Perfil
@endsection

@section('content-area')
    <div class="contenedor contenido-editarPerfil">
        <form action="{{ route('perfil.store') }}" method="POST" enctype="multipart/form-data" class="perfil__formulario"
            novalidate>
            @csrf
            <div class="formulario-imagen">
                <div class="divContenendor">
                    <p class="formulario-imagen__header">Imagen del Perfil</p>
                    <div class="formulario-imagen__contenido">
                        <div class="imagen-perfil">
                            <img id="imagenPreview" src="{{ auth()->user()->imagen ? asset('perfiles') . '/' . auth()->user()->imagen : asset('imgs/usuario.svg') }}"
                                alt="Imagen de perfil">
                        </div>
                        <input type="file" class="hidden" name="imagen" id="imagen">
                        <label for="imagen" class="botones">Cargar Imagen</label>
                    </div>
                </div>
            </div>
            <div class="formulario-datos">
                <p class="formulario-datos__header">Tus Datos</p>
                <div>
                    <label for="name" class="labels">Nombre</label>
                    <input id="name" name="name" type="text" placeholder="Nombre Completo"
                        class="inputs @error('name') border-error @enderror" value="{{ auth()->user()->name }}">
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="username" class="labels">Username</label>
                    <input id="username" name="username" type="text" placeholder="Nombre de Usuario"
                        class="inputs @error('username') border-error @enderror" value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="labels">Email</label>
                    <input id="email" name="email" type="email" placeholder="Email"
                        class="inputs @error('email') border-error @enderror" value="{{ auth()->user()->email }}" readonly>
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="oldpassword" class="labels">
                        Contraseña Actual
                    </label>
                    <input id="oldpassword" name="oldpassword" type="password" placeholder="Contraseña Actual"
                        class="inputs">
                    @if (session('error') == 'La contraseña actual no coincide')
                        <p class="error">
                            {{ session('error') }}
                        </p>
                    @endif
                </div>

                <div>
                    <label for="password" class="labels">Nueva Contraseña</label>
                    <input id="password" name="password" type="password" placeholder="Nueva Contraseña"
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

                <input type="submit" value="Guardar Cambios" class="botones">
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/dropdown-menu.js') }}"></script>
    <script src="{{ asset('js/preview-imagen.js') }}"></script>
@endpush
