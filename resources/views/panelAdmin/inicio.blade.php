@extends('layouts.adminPanel')

@section('titulo')
    Inicio
@endsection

@section('content-area')
    <div class="admin__inicio">
        <h2>Bienvenido, {{ auth()->user()->username }}</h2>
        <div class="inicio__cards">
            <div class="inicio__cards--card">
                <div class="inicio__cards--datos">
                    <span>{{ $users->count() }}</span>
                    <span>Usuarios</span>
                </div>
                <i class="fa-solid fa-users fa-2xl"></i>
            </div>
            <div class="inicio__cards--card">
                <div class="inicio__cards--datos">
                    <span>{{ $reservas->count() }}</span>
                    <span>Reservas</span>
                </div>
                <i class="fa-solid fa-book-open fa-2xl"></i>
            </div>
            <div class="inicio__cards--card">
                <div class="inicio__cards--datos">
                    <span>{{ $comentarios->count() }}</span>
                    <span>Comentarios</span>
                </div>
                <i class="fa-solid fa-comments fa-2xl"></i>
            </div>
            <div class="inicio__cards--card">
                <div class="inicio__cards--datos">
                    <span>{{ $torneos->count() }}</span>
                    <span>Torneos</span>
                </div>
                <i class="fa-solid fa-sitemap fa-2xl"></i>
            </div>
        </div>
    </div>
@endsection
