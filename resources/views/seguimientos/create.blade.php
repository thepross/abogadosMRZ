@extends('layouts.principal')

@section('titulo', 'Seguimiento')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Registro de Seguimiento</h5>
                    <span class="text-sm">Realiza el registro del seguimiento correspondiente.</span>
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
                    <form action="{{ route('seguimientos.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion" class="form-control-label">Descripción</label>
                                    <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
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
                                    <label for="responsable" class="form-control-label">Responsable</label>
                                    <input id="responsable" name="responsable" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado" class="form-control-label">Estado</label>
                                    <input id="estado" name="estado" class="form-control" type="text"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="observaciones" class="form-control-label">Observaciones</label>
                                    <input id="observaciones" name="observaciones" class="form-control" type="text"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="acciones" class="form-control-label">Acciones</label>
                                    <input id="acciones" name="acciones" class="form-control" type="text"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_caso" class="form-control-label">Casos</label>
                                    <select class="form-select" aria-label="IDcaso" name="id_caso" required>
                                        <option disabled selected>Abrir...</option>
                                        @foreach ($casos as $caso)
                                            <option value="{{ $caso->id }}">{{ $caso->id }} | {{ $caso->fecha }} | {{ $caso->detalle }}</option>
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
