@extends('layouts.adminPanel')

@section('titulo')
    Comentarios
@endsection

@push('css')
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
@endpush

@section('content-area')
    <div class="admin__comentarios">
        <h2>Comentarios</h2>
        <div class="comentarios__table">
            @if ($comentarios->count())
                <table id="table__comentarios" class="display responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Asunto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comentarios as $comentario)
                            <tr>
                                <td>{{ $comentario->id }}</td>
                                <td>{{ $comentario->name }}</td>
                                <td>{{ $comentario->email }}</td>
                                <td>{{ $comentario->asunto }}</td>
                                <td class="acciones">
                                    <a href="{{ route('panel-admin.comentarios.show', $comentario->id) }}"
                                        class="botones btn-show"><i class="fa-regular fa-eye"
                                            style="color: #ffffff;"></i></a>
                                    <button class="botones btn-eliminar btn-eliminar-comentario"
                                        onclick="showModal(event, 'eliminarComentario')" data-id="{{ $comentario->id }}"><i
                                            class="fa-solid fa-trash" style="color: #ffffff;"
                                            data-id="{{ $comentario->id }}"></i></button>
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
            $('#table__comentarios').DataTable({
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
