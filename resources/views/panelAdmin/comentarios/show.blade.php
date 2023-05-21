@extends('layouts.adminPanel')

@section('titulo')
    Detalle Comentario
@endsection

@section('content-area')
    <div class="mostrar__comentario">
        <h2>Vista detallada del comentario</h2>
        <div class="comentario__detalle">
            <h3>{{ $comentario->asunto }}</h3>
            <span class="comentario__detalle--nombre">Nombre: <span>{{ $comentario->name }}</span></span>
            <span class="comentario__detalle--email">Email: <span>{{ $comentario->email }}</span></span>
            <p class="comentario__detalle--mensaje">Mensaje: <br><span>{{ $comentario->mensaje }}</span></p>
            <span class="comentario__detalle--hora">{{ $comentario->created_at->diffForHumans() }}</span>
        </div>
    </div>
@endsection
