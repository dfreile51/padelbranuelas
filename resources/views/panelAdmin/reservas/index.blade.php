@extends('layouts.adminPanel')

@section('titulo')
    Reservas
@endsection

@push('css')
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
@endpush

@section('content-area')
    <div class="admin__reservas">
        <h2>Próximas Reservas</h2>
        <div class="reservas__table">
            @if ($reservas->count())
                <table id="table__reservas" class="display responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Hora Inicio</th>
                            <th>Hora Fin</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Realizada hace</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->id }}</td>
                                <td>{{ $reserva->fecha }}</td>
                                <td>{{ $reserva->formatHour($reserva->hora) }}</td>
                                <td>{{ $reserva->getEndHour($reserva->hora) }}</td>
                                <td>{{ $reserva->user->name }}</td>
                                <td>{{ $reserva->user->email }}</td>
                                <td>{{ $reserva->created_at->diffForHumans() }}</td>
                                <td class="acciones">
                                    <button class="botones btn-eliminar btn-eliminar-reserva" data-id="{{ $reserva->id }}"
                                        onclick="showModal(event, 'eliminarReserva')"><i class="fa-solid fa-trash"
                                            style="color: #ffffff;" data-id="{{ $reserva->id }}"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <span class='mensaje-warning'><i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #ffd900;"></i>
                    No hay registros</span>
            @endif
        </div>

        <h2>Reservas Anteriores</h2>
        <div class="oldReservas__table">
            @if ($oldReservas->count())
                <table id="table__oldReservas" class="display responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Hora Inicio</th>
                            <th>Hora Fin</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Realizada hace</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($oldReservas as $oldReserva)
                            <tr>
                                <td>{{ $oldReserva->id }}</td>
                                <td>{{ $oldReserva->fecha }}</td>
                                <td>{{ $oldReserva->formatHour($oldReserva->hora) }}</td>
                                <td>{{ $oldReserva->getEndHour($oldReserva->hora) }}</td>
                                <td>{{ $oldReserva->user->name }}</td>
                                <td>{{ $oldReserva->user->email }}</td>
                                <td>{{ $oldReserva->created_at->diffForHumans() }}</td>
                                <td class="acciones">
                                    <button class="botones btn-eliminar btn-eliminar-reserva"
                                        data-id="{{ $oldReserva->id }}" onclick="showModal(event, 'eliminarReserva')"><i
                                            class="fa-solid fa-trash" style="color: #ffffff;"
                                            data-id="{{ $oldReserva->id }}"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <span class='mensaje-warning'><i class="fa-solid fa-triangle-exclamation fa-xl" style="color: #ffd900;"></i>
                    No hay registros</span>
            @endif
        </div>
    </div>
    @include('modals.delete')
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table__reservas').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                },
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"]
                ],
                responsive: true
            });

            $('#table__oldReservas').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                },
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"]
                ],
                responsive: true
            });
        });
    </script>
    <script src="{{ asset('js/modals.js') }}"></script>
@endpush
