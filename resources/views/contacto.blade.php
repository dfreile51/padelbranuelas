@extends('layouts.app')

@section('titulo')
    Contacto
@endsection

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <style>
        #map {
            height: 40rem;
        }
    </style>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
@endpush

@section('content-area')
    <div id="map">

    </div>
    <div class="contacto">
        <div class="contenedor contenido-contacto">
            <div class="contacto__formulario">
                <p class="contacto__formulario--header">Escríbenos</p>
                @if (session('success'))
                    <p class="success">{{ session('success') }}</p>
                @endif
                <form action="{{ route('contacto') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="labels">Nombre</label>
                        <input type="text" name="name" id="name" placeholder="Nombre Completo"
                            class="inputs @error('name') border-error @enderror" value="{{ old('name') }}">
                        @error('name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="labels">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email"
                            class="inputs @error('email') border-error @enderror" value="{{ old('email') }}">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="asunto" class="labels">Asunto</label>
                        <input type="text" name="asunto" id="asunto" placeholder="Asunto"
                            class="inputs @error('asunto') border-error @enderror" value="{{ old('asunto') }}">
                        @error('asunto')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="mensaje" class="labels">Mensaje</label>
                        <textarea name="mensaje" id="mensaje" placeholder="Mensaje" class="inputs @error('mensaje') border-error @enderror"
                            value="{{ old('mensaje') }}"></textarea>
                        @error('mensaje')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Enviar Mensaje" class="botones">
                </form>
            </div>
            <div class="contacto__imagenes">
                <p class="contacto__imagenes--header">Imagenes</p>
                <div class="contaco__imagenes--contenido">
                    <img src="{{ asset('imgs/imagenes-contacto/Branuelas-1.png') }}" alt="Imagen contacto 1">
                    <img src="{{ asset('imgs/imagenes-contacto/Branuelas-3.jpg') }}" alt="Imagen contacto 2">
                    <img src="{{ asset('imgs/imagenes-contacto/Brañuelas01.jpg') }}" alt="Imagen contacto 3">
                    <img src="{{ asset('imgs/imagenes-contacto/Museo-del-Ferrocarril-Branuelas-e1642510067177.jpg') }}" alt="Imagen contacto 4">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/mapa-contacto.js') }}"></script>
@endpush
