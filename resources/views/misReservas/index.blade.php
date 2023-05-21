@extends('layouts.app')

@section('titulo')
    Mis Reservas
@endsection

@section('content-area')
    <div class="misreservas">
        <div class="contenedor container-misreservas">
            <div class="misreservas__proximas">
                <h3>Próximas Reservas</h3>
                @if ($reservas->count())
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Realizada hace</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservas as $reserva)
                                <tr>
                                    <td>{{ $reserva->id }}</td>
                                    <td>{{ $reserva->fecha }}</td>
                                    <td>{{ $reserva->formatHour($reserva->hora) }}</td>
                                    <td>{{ $reserva->getEndHour($reserva->hora) }}</td>
                                    <td>{{ $reserva->created_at->diffForHumans() }}</td>
                                    <td>
                                        @auth
                                            @if ($reserva->user_id === auth()->user()->id)
                                                <button class="botones btn-eliminar btn-cancelar-reserva" onclick="showModal(event, 'cancelarReserva')"
                                                    data-id="{{ $reserva->id }}">Cancelar</button>
                                            @endif
                                        @endauth
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($reservas->count() > 5)
                        <nav class="pagination-container">
                            <button class="pagination-button" id="prev-button" aria-label="Previous page" title="Previous page">
                                <i class="fa-solid fa-less-than"></i>
                            </button>

                            <div id="pagination-numbers">

                            </div>

                            <button class="pagination-button" id="next-button" aria-label="Next page" title="Next page">
                                <i class="fa-solid fa-greater-than"></i>
                            </button>
                        </nav>
                    @endif
                @else
                    <span class='mensaje-warning'><i class="fa-solid fa-triangle-exclamation fa-xl"
                            style="color: #ffd900;"></i> No hay registros</span>
                @endif
            </div>

            <div class="misreservas__anteriores">
                <h3>Reservas Anteriores</h3>
                @if ($oldReservas->count())
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Realizada hace</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($oldReservas as $oldReserva)
                                <tr>
                                    <td>{{ $oldReserva->id }}</td>
                                    <td>{{ $oldReserva->fecha }}</td>
                                    <td>{{ $oldReserva->formatHour($oldReserva->hora) }}</td>
                                    <td>{{ $oldReserva->getEndHour($oldReserva->hora) }}</td>
                                    <td>{{ $oldReserva->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($oldReservas->count() > 5)
                        <nav class="pagination-container">
                            <button class="pagination-button" id="prev-button" aria-label="Previous page"
                                title="Previous page">
                                <i class="fa-solid fa-less-than"></i>
                            </button>

                            <div id="pagination-numbers">

                            </div>

                            <button class="pagination-button" id="next-button" aria-label="Next page" title="Next page">
                                <i class="fa-solid fa-greater-than"></i>
                            </button>
                        </nav>
                    @endif
                @else
                    <span class='mensaje-warning'><i class="fa-solid fa-triangle-exclamation fa-xl"
                            style="color: #ffd900;"></i> No hay registros</span>
                @endif
            </div>
        </div>
    </div>
    @include('modals.delete')
@endsection

@push('js')
    <script src="{{ asset('js/pagination.js') }}"></script>
    <script src="{{ asset('js/mis-reservas-anteriores.js') }}"></script>
    <script src="{{ asset('js/mis-proximas-reservas.js') }}"></script>
    <script src="{{ asset('js/modals.js') }}"></script>
@endpush
