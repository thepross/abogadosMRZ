@extends('layouts.principal')

@section('titulo', 'Categoria')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Registro de Categoría</h5>
                    <span class="text-sm">Realiza el registro de la categoria correspondiente.</span>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('categorias.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="form-control-label">Nombre</label>
                                    <input id="nombre" name="nombre" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion" class="form-control-label">Descripción</label>
                                    <input id="descripcion" name="descripcion" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha" class="form-control-label">Fecha</label>
                                    <input id="fecha" name="fecha" class="form-control" type="date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_inventario" class="form-control-label">Inventario</label>
                                    <select class="form-select" aria-label="Inventario" name="id_inventario" required>
                                        <option disabled selected>Abrir...</option>
                                        @foreach ($inventarios as $inventario)
                                            <option value="{{ $inventario->id }}">{{ $inventario->nombre }}</option>
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

