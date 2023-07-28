@extends('layouts.principal')

@section('titulo', 'Categoria')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Modificación de Categoría</h5>
                    <span class="text-sm">Realiza la modificación de la categoria correspondiente.</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('categorias.update', [$categoria->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="form-control-label">Nombre</label>
                                    <input id="nombre" name="nombre" class="form-control" type="text" value="{{ $categoria->nombre }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion" class="form-control-label">Descripción</label>
                                    <input id="descripcion" name="descripcion" class="form-control" type="text" value="{{ $categoria->descripcion }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_inventario" class="form-control-label">Inventario</label>
                                    <select class="form-select" aria-label="Inventario" name="id_inventario" required>
                                        <option disabled selected>Abrir...</option>
                                        @foreach ($inventarios as $inventario)
                                            <option value="{{ $inventario->id }}" {{ $inventario->id == $categoria->id_inventario ? 'selected' : '' }}>{{ $inventario->nombre }}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary ms-auto" type="submit">Enviar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

