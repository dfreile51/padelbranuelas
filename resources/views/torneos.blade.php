@extends('layouts.app')

@section('titulo')
    Torneos
@endsection

@section('content-area')
    <div class="torneos">
        <div class="hero-image">
            <div class="hero-text">
                <span>Pádel Brañuelas</span>
                <h1>Torneos</h1>
            </div>
        </div>
        <div class="contenedor container-torneos">
            <h2>Próximos Torneos</h2>
            <div class="cards-torneos">
                @if ($torneos->count())
                    @foreach ($torneos as $torneo)
                        <div class="card-torneo">
                            <img src="{{ asset('uploads') . '/' . $torneo->imagen }}"
                                alt="Imagen del torneo {{ $torneo->titulo }}">
                            <div class="card-container">
                                <h4>{{ $torneo->titulo }}</h4>
                                <p>{{ $torneo->descripcion }}</p>
                            </div>
                            <a href="{{ route('torneos.show', $torneo->id) }}" class="botones btn-verTorneo">Ver Más</a>
                        </div>
                    @endforeach
                @else
                    <span class='mensaje-warning'><i class="fa-solid fa-triangle-exclamation fa-xl"
                            style="color: #ffd900;"></i>
                        No hay registros</span>
                @endif
            </div>
        </div>
    </div>
@endsection
