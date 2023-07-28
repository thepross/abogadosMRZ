@extends('layouts.principal')

@section('titulo', 'Inventario')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Registro de Inventario</h5>
                    <span class="text-sm">Realiza el registro del inventario correspondiente.</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('inventarios.store') }}" method="post">
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
                                    <label for="ubicacion" class="form-control-label">Ubicación</label>
                                    <input id="ubicacion" name="ubicacion" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="capacidad" class="form-control-label">Capacidad</label>
                                    <input id="capacidad" name="capacidad" class="form-control" type="number" required>
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

