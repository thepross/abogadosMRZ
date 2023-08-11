@extends('layouts.principal')

@section('titulo', 'Caso')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Gestión de Casos</h5>
                    <div class="d-flex align-items-center">
                        <span class="text-sm">Tabla con datos de los casos registradas.</span>
                    </div>
                </div>
                <div class="card-body px-0 pt-2 pb-2">
                    @if (count($casos) == 0)
                        <div class="d-flex align-items-center justify-content-center p-2">
                            <span class="text-sm">No existen casos registradas hasta el momento.</span>
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
                                            Detalle</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Fecha</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Autoridad</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Involucrados</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Observaciones</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            ID Categoria</th>
                                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                                Documento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($casos as $caso)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $caso->id }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $caso->detalle }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $caso->fecha }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{ $caso->autoridad }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{ $caso->involucrados }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{ $caso->observaciones }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{ $caso->id_categoria }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <a class="text-xs font-weight-bold mb-0 badge badge-sm bg-gradient-primary" href="documentos/{{ $caso->documento }}" target="_blank">{{ $caso->documento }}</a>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <a href="{{ route('casosc.edit', [$caso->id]) }}"
                                                    class="btn btn-info btn-xs text-white" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    Editar
                                                </a>

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
