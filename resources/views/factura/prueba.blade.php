<HTML>

<HEAD>

</HEAD>

<BODY>
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <h2 class="mb-0">Factura</h2>
                <h3 class="mb-0">NIT: {{$mont->nit}}</h3>
                <h3 class="mb-0">NroFactura: {{$mont->nroFactura}}</h3>

                <div style="text-align:center">
                    <h3 class="mb-0">{{auth()->user()->name}}</h3>
                    {{ date("F j, Y ",strtotime($mont->fechaPago))}}
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive-sm">
                    <table BORDER CELLPADDING=10 CELLSPACING=0>
                        <thead>
                            <tr>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th width="12%">SubTotal</th>
                                <th width="18%">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resulP as $facturas)
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
                                        <strong class="text-dark">{{$mont->monto}}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0">Agroshop.com, AMAMOS A NUESTROS CLIENTES</p>
            </div>
        </div>
    </div>

</BODY>

</HTML>