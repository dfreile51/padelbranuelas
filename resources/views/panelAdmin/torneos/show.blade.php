@extends('layouts.adminPanel')

@section('titulo')
    Detalle Torneo
@endsection

@section('content-area')
    <div class="mostrar__torneo">
        <h2>Vista detallada del torneo</h2>
        <div class="torneo__detalle">
            <div class="detalle__general">
                <div class="torneo__imagen">
                    <img src="{{ asset('uploads') . '/' . $torneo->imagen }}" alt="Imagen del torneo {{ $torneo->titulo }}">
                </div>
                <div class="torneo__info">
                    <div class="info__card">
                        <h3>{{ $torneo->titulo }}</h3>
                        <p>{{ $torneo->fecha_inicio }} - {{ $torneo->fecha_fin }}</p>
                        <span class="info__card--email">Email: <span>{{ $torneo->email }}</span></span>
                        <p>{{ $torneo->descripcion }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
