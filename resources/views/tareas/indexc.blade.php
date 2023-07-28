@extends('layouts.principal')

@section('titulo', 'Tarea')

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Gestión de Tareas</h5>
                    <div class="d-flex align-items-center">
                        <span class="text-sm">Tabla con datos de tareas.</span>
                    </div>
                </div>
                <div class="card-body px-0 pt-2 pb-2">
                    @if (count($tareas) == 0)
                        <div class="d-flex align-items-center justify-content-center p-2">
                            <span class="text-sm">No existen tareas hasta el momento.</span>
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
                                        Fecha Inicio</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                        Fecha Fin</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                        Prioridad</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                        Estado</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                        Responsable</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tareas as $tarea)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $tarea->id }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $tarea->descripcion }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="badge badge-sm bg-gradient-success">{{ $tarea->fecha_inicio }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">{{ $tarea->fecha_fin }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $tarea->prioridad }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $tarea->estado }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $tarea->responsable }}</span>
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
