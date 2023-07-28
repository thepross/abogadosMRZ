@extends('layouts.principal')

@section('titulo', 'Usuario')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Modificación de Usuario</h5>
                    <span class="text-sm">Modifica el usuario correspondiente.</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('usuarios.update', [$user->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rol" class="form-control-label">Rol</label>
                                    <select class="form-select" aria-label="Rol" name="rol" required>
                                        <option disabled>Abrir...</option>
                                        <option value="Administrador" {{ $user->rol == "Administrador" ? "selected" : "" }}>Administrador</option>
                                        <option value="Cliente" {{ $user->rol == "Cliente" ? "selected" : "" }}>Cliente</option>
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
