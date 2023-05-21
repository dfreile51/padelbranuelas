@extends('layouts.app')

@section('titulo')
    Tarifas
@endsection

@section('content-area')
    <div class="tarifa">
        <div class="hero-image">
            <div class="hero-text">
                <span>Pádel Brañuelas</span>
                <h1>Tarifas</h1>
            </div>
        </div>

        <div class="contenedor container-tableTarifa">
            <table>
                <thead>
                    <tr>
                        <th>Tiempo <span>(60 minutos)</span></th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Horario (8:30h a 23:30h)</td>
                        <td>4 <span>€ / por hora</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
