@extends('layouts.adminPanel')

@section('titulo')
    Torneos
@endsection

@push('css')
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
@endpush

@section('content-area')
    <div class="admin__torneos">
        <h2>Torneos</h2>
        <div class="torneos__table">
            <a href="{{ route('panel-admin.torneos.create') }}" class="botones btn-primary">Añadir Torneo</a>
            @if ($torneos->count())
                <table id="table__torneos" class="display responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($torneos as $torneo)
                            <tr>
                                <td>{{ $torneo->id }}</td>
                                <td>{{ $torneo->titulo }}</td>
                                <td>{{ $torneo->fecha_inicio }}</td>
                                <td>{{ $torneo->fecha_fin }}</td>
                                <td>{{ $torneo->email }}</td>
                                <td class="acciones">
                                    <a href="{{ route('panel-admin.torneos.show', $torneo->id) }}"
                                        class="botones btn-show"><i class="fa-regular fa-eye"
                                            style="color: #ffffff;"></i></a>
                                    <button class="botones btn-eliminar btn-eliminar-torneo" data-id="{{ $torneo->id }}"
                                        onclick="showModal(event, 'eliminarTorneo')"><i class="fa-solid fa-trash"
                                            style="color: #ffffff;" data-id="{{ $torneo->id }}"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <br><span class='mensaje-warning'><i class="fa-solid fa-triangle-exclamation fa-xl"
                        style="color: #ffd900;"></i>
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
            $('#table__torneos').DataTable({
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
