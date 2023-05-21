@extends('layouts.adminPanel')

@section('titulo')
    Usuarios
@endsection

@push('css')
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
@endpush

@section('content-area')
    <div class="admin__usuarios">
        <h2>Usuarios registrados</h2>
        <div class="usuarios__table">
            <a href="{{ route('panel-admin.usuarios.create') }}" class="botones btn-primary">Añadir Usuario</a>
            @if ($users->count())
                <table id="table__usuarios" class="display responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    @forelse ($user->roles as $role)
                                        <span>{{ $role->name }}</span>
                                    @empty
                                        <span>No roles</span>
                                    @endforelse
                                </td>
                                <td class="acciones">
                                    <a href="{{ route('panel-admin.usuarios.show', $user->id) }}"
                                        class="botones btn-show"><i class="fa-regular fa-eye"
                                            style="color: #ffffff;"></i></a>
                                    <a href="{{ route('panel-admin.usuarios.edit', $user->id) }}"
                                        class="botones btn-editar"><i class="fa-solid fa-pen"
                                            style="color: #ffffff;"></i></a>
                                    <button class="botones btn-eliminar btn-eliminar-usuario" style="z-index: 1000"
                                        onclick="showModal(event, 'user')" data-id="{{ $user->id }}"
                                        data-user-name="{{ $user->name }}"><i class="fa-solid fa-trash"
                                            style="color: #ffffff;" data-id="{{ $user->id }}"
                                            data-user-name="{{ $user->name }}"></i></button>
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
    <script src="{{ asset('js/modals.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table__usuarios').DataTable({
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
@endpush
