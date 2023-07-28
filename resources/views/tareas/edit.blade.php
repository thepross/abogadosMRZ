@extends('layouts.principal')

@section('titulo', 'Tarea')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Moficación de Tarea</h5>
                    <span class="text-sm">Realiza la modificación de la tarea correspondiente.</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('tareas.update', [$tarea->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion" class="form-control-label">Descripción</label>
                                    <textarea id="descripcion" name="descripcion" class="form-control" required>{{ $tarea->descripcion }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_inicio" class="form-control-label">Fecha Inicio</label>
                                    <input id="fecha_inicio" name="fecha_inicio" class="form-control" type="date" value="{{ $tarea->fecha_inicio }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_fin" class="form-control-label">Fecha Fin</label>
                                    <input id="fecha_fin" name="fecha_fin" class="form-control" type="date" value="{{ $tarea->fecha_fin }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prioridad" class="form-control-label">Prioridad</label>
                                    <select class="form-select" aria-label="Prioridad" name="prioridad" required>
                                        <option disabled>Abrir...</option>
                                        <option value="Muy Bajo" {{ $tarea->prioridad == "Muy Bajo" ? "selected" : "" }}>Muy Bajo</option>
                                        <option value="Bajo" {{ $tarea->prioridad == "Bajo" ? "selected" : "" }}>Bajo</option>
                                        <option value="Normal" {{ $tarea->prioridad == "Normal" ? "selected" : "" }}>Normal</option>
                                        <option value="Alto" {{ $tarea->prioridad == "Alto" ? "selected" : "" }}>Alto</option>
                                        <option value="Muy Alto" {{ $tarea->prioridad == "Muy Alto" ? "selected" : "" }}>Muy Alto</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado" class="form-control-label">Estado</label>
                                    <select class="form-select" aria-label="Estado" name="estado" required>
                                        <option disabled>Abrir...</option>
                                        <option value="Preparando" {{ $tarea->estado == "Preparando" ? "selected" : "" }}>Preparando</option>
                                        <option value="En ejecución" {{ $tarea->estado == "En ejecución" ? "selected" : "" }}>En ejecución</option>
                                        <option value="Finalizado" {{ $tarea->estado == "Finalizado" ? "selected" : "" }}>Finalizado</option>
                                      </select>
                                </div>
                                

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="responsable" class="form-control-label">Responsable</label>
                                    <input id="responsable" name="responsable" class="form-control" type="text" value="{{ $tarea->responsable }}" required>
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

@section('js')
    <script>
        $(function(){
            $('#datepicker').datepicker();
            });
    </script>
@endsection

