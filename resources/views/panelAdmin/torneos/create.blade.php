@extends('layouts.adminPanel')

@section('titulo')
    Agregar Torneo
@endsection

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content-area')
    <div class="agregar__torneo">
        <h2>Añadir torneo</h2>
        <div class="torneo__form">
            <div class="torneo__form--dropzone">
                <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone"
                    class="dropzone">
                    @csrf
                </form>
            </div>
            <div class="torneo__form--form">
                @if (session('success'))
                    <p class="success">{{ session('success') }}</p>
                @endif
                <form action="{{ route('panel-admin.torneos.store') }}" method="POST">
                    @csrf

                    <div>
                        <label for="titulo" class="labels">
                            Titulo
                        </label>
                        <input id="titulo" name="titulo" type="text" placeholder="Titulo del Torneo"
                            class="inputs @error('titulo') border-error @enderror" value="{{ old('titulo') }}">
                        @error('titulo')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="fecha_inicio" class="labels">
                            Fecha Inicio
                        </label>
                        <input id="fecha_inicio" name="fecha_inicio" type="date"
                            class="inputs @error('fecha_inicio') border-error @enderror" value="{{ old('fecha_inicio') }}">
                        @error('fecha_inicio')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="fecha_fin" class="labels">
                            Fecha Fin
                        </label>
                        <input id="fecha_fin" name="fecha_fin" type="date"
                            class="inputs @error('fecha_fin') border-error @enderror" value="{{ old('fecha_fin') }}">
                        @error('fecha_fin')
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
                        <label for="descripcion" class="labels">
                            Descripción
                        </label>
                        <textarea id="descripcion" name="descripcion" placeholder="Descripción de la Publicación"
                            class="inputs @error('descripcion') border-error @enderror">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <input type="hidden" name="imagen" value="{{ old('imagen') }}">
                        @error('imagen')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="submit" value="Guardar Cambios" class="botones">
                </form>
            </div>
        </div>
    </div>
@endsection
