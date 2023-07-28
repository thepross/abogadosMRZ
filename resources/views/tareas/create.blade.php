@extends('layouts.principal')

@section('titulo', 'Tarea')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Registro de Tarea</h5>
                    <span class="text-sm">Realiza el registro de las tareas necesarias.</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('tareas.store') }}" method="post">
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
                                    <label for="fecha_inicio" class="form-control-label">Fecha Inicio</label>
                                    <input id="fecha_inicio" name="fecha_inicio" class="form-control" type="date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_fin" class="form-control-label">Fecha Fin</label>
                                    <input id="fecha_fin" name="fecha_fin" class="form-control" type="date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prioridad" class="form-control-label">Prioridad</label>
                                    <select class="form-select" aria-label="Prioridad" name="prioridad" required>
                                        <option disabled>Abrir...</option>
                                        <option value="Muy Bajo">Muy Bajo</option>
                                        <option value="Bajo">Bajo</option>
                                        <option value="Normal" selected>Normal</option>
                                        <option value="Alto">Alto</option>
                                        <option value="Muy Alto">Muy Alto</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado" class="form-control-label">Estado</label>
                                    <select class="form-select" aria-label="Estado" name="estado" required>
                                        <option disabled>Abrir...</option>
                                        <option value="Preparando" selected>Preparando</option>
                                        <option value="En ejecución">En ejecución</option>
                                        <option value="Finalizado">Finalizado</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="responsable" class="form-control-label">Responsable</label>
                                    <input id="responsable" name="responsable" class="form-control" type="text" required>
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

