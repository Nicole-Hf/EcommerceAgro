@extends('layouts.main', ['activePage'=>'facturas', 'titlePage'=>'Facturas'])

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-success">
                        <h4 class="card-title"> Listado de Facturas </h4>
                    </div>

                    {{--Body--}}
                    <div class="card-body">
                        {{--tabla--}}
                        <div class="table-responsive">
                            <table class="table">

                                <tr>
                                    <thead class="text-primary text-success">
                                        <th>Nro Factura<i class="fas fa-rockrms    "></i></th>
                                        <th>Nit<i class="fas fa-rockrms    "></i></th>
                                        <th>Fecha</th>
                                        <th>Accion</th>
                                    </thead>

                                    <tbody>
                                        @foreach($resulPago as $factura)
                                        <tr>
                                            <td>{{ $factura->nroFactura }}</td>
                                            <td>{{ $factura->nit }}</td>
                                            <td>{{ $factura->fecha}}</td>
                                            <td class="td-actions">

                                                <a href="{{ route('factura.pdf',$factura->id)}}"
                                                    class="btn btn-info text-center">

                                                    <i class="material-icons">description</i>
                                                </a>
                                            </td>

                                        </tr>

                                        @endforeach
                                    </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection