@extends('layouts.principal')

@section('titulo', 'Seguimiento')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Gestión de Seguimientos</h5>
                    <div class="d-flex align-items-center">
                        <span class="text-sm">Tabla con datos de los seguimientos registradas.</span>
                    </div>
                </div>
                <div class="card-body px-0 pt-2 pb-2">
                    @if (count($seguimientos) == 0)
                        <div class="d-flex align-items-center justify-content-center p-2">
                            <span class="text-sm">No existen seguimientos registradas hasta el momento.</span>
                            <br>
                        </div>
                    @else
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                            ID</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">
                                            Descripcion</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Fecha</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Responsable</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Estado</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Observaciones</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Acciones</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            ID Caso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($seguimientos as $seguimiento)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $seguimiento->id }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $seguimiento->descripcion }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $seguimiento->fecha }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{ $seguimiento->responsable }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{ $seguimiento->estado }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{ $seguimiento->observaciones }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{ $seguimiento->acciones }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{ $seguimiento->id_caso }}</span>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
