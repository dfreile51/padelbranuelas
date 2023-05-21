@extends('layouts.app')

@section('titulo')
    Reservas
@endsection

@section('content-area')
    <div class="reservas">
        <div class="contenedor container-reservas">
            <div class="reservas__formulario">
                <div class="reservas__imagen">
                    <img src="{{ asset('imgs/slider/paleta-pelota-tenis-angulo-alto.jpg') }}" alt="Imagen Reserva de pista">
                </div>
                <div class="reservas__form">
                    <div class="error" style="display: none;">
                        <span class="closebtn">&times;</span>
                        <span class="mensaje"></span>
                    </div>
                    <div class="success" style="display: none;">
                        <span class="closebtn">&times;</span>
                        <span class="mensaje"></span>
                    </div>

                    <form>
                        @csrf
                        <div class="reservas__form--fecha">
                            <label for="date" class="labels">Elige el día</label>
                            <input type="date" class="inputs" name="date" id="date"
                                value="{{ now()->toDateString() }}" min="{{ now()->toDateString() }}">
                        </div>
                        <div class="reservas__form--hora">
                            <span>08:30</span>
                            <span>09:30</span>
                            <span>10:30</span>
                            <span>11:30</span>
                            <span>12:30</span>

                            <span>13:30</span>
                            <span>14:30</span>
                            <span>15:30</span>
                            <span>16:30</span>
                            <span>17:30</span>

                            <span>18:30</span>
                            <span>19:30</span>
                            <span>20:30</span>
                            <span>21:30</span>
                            <span>22:30</span>
                        </div>
                        <input type="submit" class="botones" value="Reservar">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/reservas.js') }}" type="module"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
@endpush
