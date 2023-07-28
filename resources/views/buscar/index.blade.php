@extends('layouts.principal')

@section('titulo', 'Buscador')

@section('content')

    <div class="row">

        <div class="row">
            <div class="col-12">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5>CASOS</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if (count($posts) == 0)
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <p>No existen casos que coincidan con la busqueda.</p>
                        </div>
                    </div>
                </div>
            @endif
            @foreach ($posts as $post)
                <?php
                $keyword = $buscar;
                $direccion = preg_replace("/\b([a-z]*${keyword}[a-z]*)\b/i", "<u><b>$1</b></u>", $post->detalle);
                ?>

                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <p><strong>ID:</strong> {{ $post->id }}</p>
                                    <p><strong>Autoridad:</strong>{{ $post->autoridad }}</p>
                                    <p><strong>Involucrados:</strong> {{ $post->involucrados }}</p>
                                    <p><strong>Detalle:</strong> {{ $post->detalle }}</p>
                                    <p><strong>Observaciones:</strong> <span
                                        class="badge bg-gradient-warning rounded-pill text-white">{{ $post->observaciones }}</span></p>
                                </div>
                                <div class="col-1">
                                    <a class="btn btn-primary float-right" href="{{ route('casos.index') }}">
                                        <i class="fas fa-arrow-right fa-1x"></i>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        <legend></legend>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5>SEGUIMIENTOS</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if (count($posts2) == 0)
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <p>No existen seguimientos que coincidan con la busqueda.</p>
                        </div>
                    </div>
                </div>
            @endif
            @foreach ($posts2 as $post)
                <?php
                $keyword = $buscar;
                $detalle = preg_replace("/\b([a-z]*${keyword}[a-z]*)\b/i", "<u><b>$1</b></u>", $post->descripcion);
                ?>
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <p><strong>ID:</strong> {{ $post->id }}</p>
                                    <p><strong>Descripcion:</strong> {!! $detalle !!}</p>
                                    <p><strong>Responsable:</strong> {{ $post->responsable }}</p>
                                    <p><strong>Estado:</strong> <span
                                            class="badge rounded-pill bg-info text-white">{{ $post->estado }}</span></p>
                                </div>
                                <div class="col-1">
                                    <a class="btn btn-primary float-right"
                                        href="{{ route('seguimientos.index', [$post->id]) }}">
                                        <i class="fas fa-arrow-right fa-1x"></i>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

@endsection
