<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
    <link href="{{ asset('css/pdf.css') }}" rel="stylesheet" />
    <link href="{{ public_path('css/pdf.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <h2 class="mb-0">Factura</h2>
                <h3 class="mb-0">NIT: {{$monto->nit}}</h3>
                <h3 class="mb-0">NroFactura: {{$monto->nroFactura}}</h3>

                <div class="float-right">
                    <h3 class=" mb-0">{{auth()->user()->name}}</h3>
                    {{ date("F j, Y ",strtotime($monto->fechaPago))}}
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive-sm">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="22%">Producto</th>
                                <th width="12%">Cantidad</th>
                                <th width="12%">SubTotal</th>
                                <th width="22%">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resulPago as $facturas)
                            <tr>

                                <td>{{$facturas->nombre}}</td>
                                <td>{{$facturas->cantidad}}</td>
                                <td>{{$facturas->subtotal}}</td>
                                <td>{{$facturas->fecha}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong class="text-dark">{{$monto->monto}}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">

                <p class="mb-0">Agroshop.com, AMAMOS A NUESTROS CLIENTES

                </p>
                <a class=" btn btn-dark float-right" href="{{ route('factura.imprimir',$fact_id->id)}}"
                    role="button">descargar</a>
            </div>
        </div>
    </div>
</body>

</html>