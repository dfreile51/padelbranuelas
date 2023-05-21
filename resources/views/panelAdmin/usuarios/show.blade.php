@extends('layouts.adminPanel')

@section('titulo')
    Detalle Usuario
@endsection

@section('content-area')
    <div class="mostrar__usuario">
        <h2>Vista detallada del usuario {{ $user->name }}</h2>
        <div class="usuario__detalle">
            <div class="detalle__card">
                <div class="detalle__card--header">
                    <div class="imagen">
                        <img src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('imgs/usuario.svg') }}" alt="Imagen de Perfil">
                    </div>
                </div>
                <div class="detalle__card--body">
                    <h5>{{ $user->username }}</h5>
                    <ul>
                        <li>ID: {{ $user->id }}</li>
                        <li>Nombre: {{ $user->name }}</li>
                        <li>Email: {{ $user->email }}</li>
                        <li>Creado en: {{ $user->created_at }}</li>
                    </ul>
                </div>
                <div class="detalle__card--footer">
                    <a class="botones btn-primary" href="{{ route('panel-admin.usuarios') }}">Volver</a>
                    <a class="botones btn-editar" href="{{ route('panel-admin.usuarios.edit', $user->id) }}">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
