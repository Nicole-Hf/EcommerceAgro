<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura</title>
    <link href="{{ asset('css/custom_pdf.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/custom_page.css') }}">
</head>
<body>
    
    <section class="header" style="top: -287px">
    <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td colspan="2" class="text-center">
                <span style="font-size: 25px; font-weight: bold;">EcommerceAgro</span>
            </td>
        </tr>
        <tr>
            <td width="30%" style="vertical-aling: top; padding-top: 10px; position: relative;">
            <img src="{{ asset('img/logo.png') }}" alt="" class="invoice-logo">
            </td>

            <td width="70%" class="text-left text-company" style="vertical-align: top; padding-top:10px">
            <span style="font-size: 16px"><strong>Factura</strong></span>
            </td>
        </tr>
    </table>
    </section>


</body>
</html>