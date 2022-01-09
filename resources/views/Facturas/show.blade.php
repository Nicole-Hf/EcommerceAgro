@extends('layouts.main', ['activePage'=>'facturas', 'titlePage'=>'Facturas'])

@section('content')
<div class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{--Header--}}
                    <td class="td-actions">
                        <a href="{{ route('facturas.pdf') }}"
                            class="btn btn-info text-center">
                             <i class="material-icons">description</i>
                         </a>
                    </td> 
                    <div class="card-header card-header-success">
                        <h4 class="card-title"> Listado de Facturas </h4>
                    </div>
                    {{--Body--}}
                    <div class="card-body">
                        {{--tabla--}}
                        <div class="table-responsive">
                            <table class="table">
                                {{--Cabecera de Tabla--}}
                                <thead class="text-primary text-success">                                
                              
                                <th>Nro<i class="fas fa-rockrms    "></i></th>
                                <th>Detalle</th>
                                <th>Monto</th>
                                <th>Fecha</th> 
                                                               
                                </thead>
                                <tbody>
                                    
                                    @foreach($resulPago as $factura)
                                    <!-- si quieres sacar algo solo llama a os atributos ya no necesitas hacer consultas aqui-->
                                    <tr>
                                        
                                        
                                        <td>{{ $factura->nombre}}</td>
                                        <td>{{ $factura->descripcion}}</td>
                                        <td>{{ $factura->cantidad}}</td>
                                        <td>{{ $factura->subtotal}}</td>
                                        <!--  <td>{{ $factura->monto}}</td> -->
                                        <td>{{ $factura->fecha }}</td>
                                                                     
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