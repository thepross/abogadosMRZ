@extends('layouts.principal')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>Pagina Principal</h4>
                </div>
                <div class="card-body pb-0">
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Sistema de Control de Archivos para la firma "MRZ"</h6>

                </div>
                <div class="card-body p-4">
                    @auth
                    <p class="text-sm mb-0">
                      Bienvenido, <span class="font-weight-bold">{{ Auth::user()->name }}</span>, al sistema web.
                  </p>
                  @else
                  <p class="text-sm mb-0">
                    Registrate para poder empezar a gestión el sistema.
                </p>
                    @endauth
                    
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-5">
            <div class="card card-carousel h-100 p-0">
                <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner border-radius-lg h-100">
                        <div class="carousel-item h-100 active"
                            style="background-image: url('../public/assets/img/carousel1.jpg');
      background-size: cover;">
                            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                <h5 class="text-white mb-1">Bienvenido</h5>
                            </div>
                        </div>
                        <div class="carousel-item h-100"
                            style="background-image: url('../public/assets/img/carousel2.jpg');
      background-size: cover;">
                            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                <h5 class="text-white mb-1">Bienvenido</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
