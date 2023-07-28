@extends('layouts.principal')

@section('titulo', 'Caso')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Modificación de Caso</h5>
                    <span class="text-sm">Realiza la modificacion del caso correspondiente.</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('casos.update', [$caso->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="detalle" class="form-control-label">Detalle</label>
                                    <textarea id="detalle" name="detalle" class="form-control" required>{{ $caso->detalle }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha" class="form-control-label">Fecha</label>
                                    <input id="fecha" name="fecha" class="form-control" type="date"
                                        value="{{ $caso->fecha }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="autoridad" class="form-control-label">Autoridad</label>
                                    <input id="autoridad" name="autoridad" class="form-control" type="text"
                                        value="{{ $caso->autoridad }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="involucrados" class="form-control-label">Involucrados</label>
                                    <input id="involucrados" name="involucrados" class="form-control" type="text"
                                        value="{{ $caso->involucrados }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="observaciones" class="form-control-label">Observaciones</label>
                                    <input id="observaciones" name="observaciones" class="form-control" type="text"
                                        value="{{ $caso->observaciones }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_categoria" class="form-control-label">Categoria</label>
                                    <select class="form-select" aria-label="IDCategoria" name="id_categoria" required>
                                        <option disabled>Abrir...</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}"
                                                {{ $categoria->id == $caso->id_categoria ? 'selected' : '' }}>
                                                {{ $categoria->nombre }}</option>
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
