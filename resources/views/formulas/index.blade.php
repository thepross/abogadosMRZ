@extends('layouts.principal')

@section('titulo', 'Formula')

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Gestión de Formulas de Casos</h5>
                    <div class="d-flex align-items-center">
                        <span class="text-sm">Tabla con datos de las formulas registradas.</span>
                        <a class="btn btn-success ms-auto" type="button" href="{{ route('formulas.create') }}"><i
                                class="fa fa-plus"></i> Registrar Formula</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-2 pb-2">
                    @if (count($formulas) == 0)
                        <div class="d-flex align-items-center justify-content-center p-2">
                            <span class="text-sm">No existen formulas registradas hasta el momento.</span>
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
                                            Nombre</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Descripcion</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Fecha</th>
                                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            ID Usuario</th>
                                        <th class="text-secondary"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($formulas as $formula)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $formula->id }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $formula->nombre }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $formula->descripcion }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-warning">{{ $formula->fecha }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-info">{{ $formula->id_user }}</span>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                <a href="{{ route('formulas.edit', [$formula->id]) }}"
                                                    class="btn btn-info btn-xs text-white" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    Editar
                                                </a>

                                                <form action="{{ route('formulas.destroy', [$formula->id]) }}"
                                                    method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs"
                                                        onClick="return confirm('Está seguro de eliminar?')">
                                                        <i class="fas fa-trash-alt"></i> Eliminar
                                                    </button>
                                                </form>

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
