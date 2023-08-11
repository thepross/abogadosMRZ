@extends('layouts.principal')

@section('titulo', 'Evento')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Modificación de Evento</h5>
                    <span class="text-sm">Realiza la modificacion del evento correspondiente.</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('eventos.update', [$evento->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre" class="form-control-label">Nombre</label>
                                    <input id="nombre" name="nombre" class="form-control" type="text" value="{{ $evento->nombre }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="responsable" class="form-control-label">Responsable</label>
                                    <input id="responsable" name="responsable" class="form-control" type="text" value="{{ $evento->responsable }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion" class="form-control-label">Descripcion</label>
                                    <textarea id="descripcion" name="descripcion" class="form-control" required>{{ $evento->descripcion }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha" class="form-control-label">Fecha</label>
                                    <input id="fecha" name="fecha" class="form-control" type="date" value="{{ $evento->fecha }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hora" class="form-control-label">Hora</label>
                                    <input id="hora" name="hora" class="form-control" type="text" value="{{ $evento->hora }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_seguimiento" class="form-control-label">Seguimiento</label>
                                    <select class="form-select" aria-label="IDseguimiento" name="id_seguimiento">
                                        <option value="">Ninguno</option>
                                        @foreach ($seguimientos as $seguimiento)
                                            <option value="{{ $seguimiento->id }}" {{ $seguimiento->id == $evento->id_seguimiento ? 'selected' : '' }}>{{ $seguimiento->id }} | {{ $seguimiento->descripcion }}</option>
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
