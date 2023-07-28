@extends('layouts.principal')

@section('titulo', 'Categoria')

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Gestión de Categorías</h5>
                    <div class="d-flex align-items-center">
                        <span class="text-sm">Tabla con datos de las categorias registradas.</span>
                        <a class="btn btn-success ms-auto" type="button" href="{{ route('categorias.create') }}"><i
                                class="fa fa-plus"></i> Registrar Categoría</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-2 pb-2">
                    @if (count($categorias) == 0)
                        <div class="d-flex align-items-center justify-content-center p-2">
                            <span class="text-sm">No existen categorias registradas hasta el momento.</span>
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
                                            ID Inventario</th>
                                        <th class="text-secondary"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $categoria)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $categoria->id }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $categoria->nombre }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $categoria->descripcion }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-info">{{ $categoria->id_inventario }}</span>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                <a href="{{ route('categorias.edit', [$categoria->id]) }}"
                                                    class="btn btn-info btn-xs text-white" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    Editar
                                                </a>

                                                <form action="{{ route('categorias.destroy', [$categoria->id]) }}"
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
