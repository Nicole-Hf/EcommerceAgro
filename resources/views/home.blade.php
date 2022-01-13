@extends('layouts.main', ['activePage'=>'home', 'titlePage'=>'Dashboard'])
@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }
    </style>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="container">
        <div class="content-header">
            <!-- /.container-fluid -->
        </div>
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$cantproduct}}</h3>
                            <p>Productos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ 'Bs.-'. $totalVentas}}</h3>
                            <p>Total Ventas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{'Bs.-'. $promVentas}}</h3>
                            <p>Ingreso promedio</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $cantCliente }}</h3>
                            <p>Total Clientes</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Productos</h4>
                    </div>
                    <div class="card-body">
                        {{--tabla--}}
                        <div class="table-responsive">
                            <table class="table">
                                {{--Cabecera de Tabla--}}
                                <thead class="text-primary text-success">
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Stock</th>
                                </thead>
                                <tbody>
                                @foreach($productos as $producto)
                                    <tr>
                                        <td>
                                            <div class="img-container">
                                                <img style="height: 80px; width: 80px;display: block;"
                                                     src="{{ asset($producto->imagen) }}"
                                                     alt="...">
                                            </div>
                                        </td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->stock }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fas fa-chart-line"></i>
                            Ventas - Meses
                        </h4>
                        <canvas id="ventas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@section('scripts')

    <script>
        $(function () {
            var varVenta=document.getElementById('ventas').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($ventasmes as $reg)
                    {
                        setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                        $mes_traducido=strftime('%B',strtotime($reg->mes));

                        echo '"'. $mes_traducido.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasmes as $reg)
                        {echo ''. $reg->totalmes.',';} ?>],
                        backgroundColor: 'rgba(20, 204, 20, 1)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
    </script>
@endsection--}}

