<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura</title>
    <link href="{{ asset('css/custom_pdf.css') }}" rel="stylesheet" />
    <link href="{{asset('css/custom_page.css') }}" rel="stylesheet">
</head>
<body>
    
    <section class="header" style="top: 50px;">
    <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td colspan="2" class="text-center">
                <span style="font-size: 25px; font-weight: bold;"><h1>EcommerceAgro</h1></span>
            </td>
        </tr>
        <tr>
            <td width="30%" style="vertical-aling: top; padding-top: 5px; position: relative;">
            <img src="{{ asset('img/logo.png') }}" alt="" class="invoice-logo">
            </td>

            <td width="70%" class="text-left text-company" style="vertical-align: top; padding-top:10px">
            <span style="font-size: 25px; font-weight: bold;"><strong>Factura</strong></span>
            <br>
            <span style="font-size: 14px">Nombre: {{auth()->user()->name}}</span>
            <br>
            </td>
        </tr>
    </table>
    </section>
    <section style="margin-top: 200px">
        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <thead>
                <tr>
                    <th width="10%">Nro</th>
                    
                    <th >Producto</th>
                    <th width="12%">SubTotal</th>
                    <th width="12%">Total</th>
                    <th width="18%">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($factura as $facturas)
                    <tr>
                        <td>{{$facturas->id}}</td>
                        <td>{{$carriP}}</td>
                        <td>{{$carrito}}</td>
                        <td>{{$facturas->PedidoPago()->pluck('monto')->first()}}</td>
                        <td>{{$facturas->fecha}}</td>
                       
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-center">
                        <span><b>TOTAL</b></span>
                    </td>
                    <td colspan="1" class="text-center">
                       
                    </td>
                </tr>
            </tfoot>
        </table>
    </section>



</body>
</html>