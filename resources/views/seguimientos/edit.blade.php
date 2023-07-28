@extends('layouts.principal')

@section('titulo', 'Seguimiento')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Modificación de Seguimiento</h5>
                    <span class="text-sm">Realiza la modificacion del seguimiento correspondiente.</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('seguimientos.update', [$seguimiento->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion" class="form-control-label">Descripción</label>
                                    <textarea id="descripcion" name="descripcion" class="form-control" required>{{ $seguimiento->descripcion }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha" class="form-control-label">Fecha</label>
                                    <input id="fecha" name="fecha" class="form-control" type="date" value="{{ $seguimiento->fecha }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="responsable" class="form-control-label">Responsable</label>
                                    <input id="responsable" name="responsable" class="form-control" type="text" value="{{ $seguimiento->responsable }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado" class="form-control-label">Estado</label>
                                    <input id="estado" name="estado" class="form-control" type="text" value="{{ $seguimiento->estado }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="observaciones" class="form-control-label">Observaciones</label>
                                    <input id="observaciones" name="observaciones" class="form-control" type="text" value="{{ $seguimiento->observaciones }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="acciones" class="form-control-label">Acciones</label>
                                    <input id="acciones" name="acciones" class="form-control" type="text" value="{{ $seguimiento->acciones }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_caso" class="form-control-label">Casos</label>
                                    <select class="form-select" aria-label="IDcaso" name="id_caso" required>
                                        <option disabled selected>Abrir...</option>
                                        @foreach ($casos as $caso)
                                            <option value="{{ $caso->id }}" {{ $caso->id == $seguimiento->id_caso ? 'selected' : '' }}>{{ $caso->id }} | {{ $caso->fecha }} | {{ $caso->detalle }}</option>
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
