@extends('layouts.app')

@section('titulo')
    Torneo - {{ $torneo->titulo }}
@endsection

@section('content-area')
    <div class="contenedor container-torneo">
        <div class="mostrar__torneo">
            <div class="torneo__detalle">
                <div class="detalle__general">
                    <div class="torneo__imagen">
                        <img src="{{ asset('uploads') . '/' . $torneo->imagen }}"
                            alt="Imagen del torneo {{ $torneo->titulo }}">
                    </div>
                    <div class="torneo__info">
                        <div class="info__card">
                            <h3>{{ $torneo->titulo }}</h3>
                            <p>{{ $torneo->fecha_inicio }} - {{ $torneo->fecha_fin }}</p>
                            <span class="info__card--email">Email contacto: <span>{{ $torneo->email }}</span></span>
                            <p>
                                @php
                                    echo nl2br($torneo->descripcion);
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
