@extends('layouts.principal')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Estadisticas y Reportes</h5>
                </div>
                <div class="card-body px-0 pt-2 pb-2">

                    <div class="m-4">
                        <h6>Estadisticas de Ingreso</h6>
                    </div>
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Reportes</h5>
                </div>
                <div class="card-body px-0 pt-2 pb-2">

                    <form action="{{ route('report') }}" method="post" target="_blank">
                        @csrf
                        <div class="row m-4">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="table">Tabla</label>
                                    <select name="table" id="table" class="form-select">
                                        <option selected disabled>Abrir...</option>
                                        <option value="casos">casos</option>
                                        <option value="seguimientos">seguimientos</option>
                                        <option value="categorias">categorias</option>
                                        <option value="inventarios">inventarios</option>
                                        <option value="tareas">tareas</option>
                                        <option value="formulas">formulas</option>
                                        <option value="users">usuarios</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success" >Generar Reporte</button>
                            </div>
                        </div>
        
                    </form>
                </div>
            </div>
        </div>

    </div>

    <?php
    $var = [];
    $var2 = [];
    foreach ($contadores as $c) {
        $var[] = $c->nombre;
        $var2[] = $c->cant;
    }
    ?>

    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

        var modo = <?= json_encode($var, JSON_HEX_TAG) ?>;
        var modo2 = <?= json_encode($var2, JSON_HEX_TAG) ?>;
        console.log(modo2);
        etiqueta = []

        new Chart(ctx1, {
            type: "line",
            data: {
                labels: modo,
                datasets: [{
                    label: "Casos de uso",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: modo2,
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endsection
