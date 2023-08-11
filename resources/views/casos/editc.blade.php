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
                    <form action="{{ route('casosc.update', [$caso->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="detalle" class="form-control-label">Detalle</label>
                                    <textarea id="detalle" name="detalle" class="form-control" required disabled>{{ $caso->detalle }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha" class="form-control-label">Fecha</label>
                                    <input id="fecha" name="fecha" class="form-control" type="date"
                                        value="{{ $caso->fecha }}" required disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="autoridad" class="form-control-label">Autoridad</label>
                                    <input id="autoridad" name="autoridad" class="form-control" type="text"
                                        value="{{ $caso->autoridad }}" required disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="involucrados" class="form-control-label">Involucrados</label>
                                    <input id="involucrados" name="involucrados" class="form-control" type="text"
                                        value="{{ $caso->involucrados }}" required disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="observaciones" class="form-control-label">Observaciones</label>
                                    <input id="observaciones" name="observaciones" class="form-control" type="text"
                                        value="{{ $caso->observaciones }}" required disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_categoria" class="form-control-label">Categoria</label>
                                    <select class="form-select" aria-label="IDCategoria" name="id_categoria" required disabled>
                                        <option disabled>Abrir...</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}"
                                                {{ $categoria->id == $caso->id_categoria ? 'selected' : '' }}>
                                                {{ $categoria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_cliente" class="form-control-label">Cliente</label>
                                    <select class="form-select" aria-label="IDcliente" name="id_cliente" required disabled>
                                        <option disabled>Abrir...</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}"
                                                {{ $caso->id_cliente == $cliente->id ? 'selected' : '' }}>
                                            {{ $cliente->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="documento" class="form-control-label">Documento</label>
                                    <input id="documento" name="documento" class="form-control" type="file" value="{{ $caso->documento }}">
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
