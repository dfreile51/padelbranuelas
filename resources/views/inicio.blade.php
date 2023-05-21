@extends('layouts.app')

@section('titulo')
    Inicio
@endsection

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
@endpush

@section('content-area')
    <div class="slider">
        <div class="contenedor container-slider">
            <div class="slider__section hidden fade">
                <img src="{{ asset('imgs/slider/IMG_20230501_170808.jpg') }}" alt="imagen1">
            </div>
            <div class="slider__section hidden fade">
                <img src="{{ asset('imgs/slider/IMG_20230501_170834.jpg') }}" alt="imagen2">
            </div>
            <div class="slider__section hidden fade">
                <img src=" {{ asset('imgs/slider/IMG_20230501_170854.jpg') }}" alt="imagen3">
            </div>
            <div class="slider__section hidden fade">
                <img src=" {{ asset('imgs/slider/IMG_20230501_170916.jpg') }}" alt="imagen4">
            </div>
            <div class="slider__btn">
                <i class="fa-solid fa-chevron-left" onclick="plusSlides(-1)"></i>
                <div class="slider__dots">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>
                </div>
                <i class="fa-solid fa-chevron-right" onclick="plusSlides(1)"></i>
            </div>
        </div>
    </div>

    <div class="cards">
        <div class="contenedor container-cards">
            <a href="{{ route('reservas') }}" class="card__item">
                <img src="{{ asset('imgs/cards/time-and-calendar.png') }}" alt="Imagen Calendario">
                <div class="card__item--text">
                    <span>Reserva tu Pista</span>
                </div>
            </a>
            <a href="{{ route('torneos') }}" class="card__item">
                <img src="{{ asset('imgs/cards/pelota-de-padel.png') }}" alt="Imagen Padel">
                <div class="card__item--text">
                    <span>Torneos</span>
                </div>
            </a>
            <a href="#" class="card__item">
                <img src="{{ asset('imgs/cards/ayuntamiento.png') }}" alt="Imagen Ayuntamiento">
                <div class="card__item--text">
                    <span>Web Ayuntamiento</span>
                </div>
            </a>
        </div>
    </div>

    <div class="municipio">
        <div class="contenedor container-municipio">
            <div id="map" class="municipio__map">

            </div>
            <div class="municipio__locations">
                <h2>Pueblos del Municipio</h2>
                <ul>
                    <div>
                        <li>
                            <a href="#">Brañuelas</a>
                        </li>
                        <li>
                            <a href="#">Culebros</a>
                        </li>
                        <li>
                            <a href="#">Manzanal del Puerto</a>
                        </li>
                        <li>
                            <a href="#">Nistoso</a>
                        </li>
                        <li>
                            <a href="#">Tabladas</a>
                        </li>
                        <li>
                            <a href="#">Valbuena de la Encomienda</a>
                        </li>
                        <li>
                            <a href="#">Villar</a>
                        </li>
                    </div>
                    <div>
                        <li>
                            <a href="#">Corús</a>
                        </li>
                        <li>
                            <a href="#">La Silva</a>
                        </li>
                        <li>
                            <a href="#">Montealegre</a>
                        </li>
                        <li>
                            <a href="#">Requejo</a>
                        </li>
                        <li>
                            <a href="#">Ucedo</a>
                        </li>
                        <li>
                            <a href="#">Villagatón</a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="{{ asset('js/mapa-inicio.js') }}"></script>
@endpush
