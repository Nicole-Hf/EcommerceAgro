@extends('layouts.main', ['activePage'=>'facturas', 'titlePage'=>'Facturas'])

@section('content')
<div class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{--Header--}}
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
                                <th>#</th>
                                <th>Nro<i class="fas fa-rockrms    "></i></th>
                                <th>Detalle</th>
                                <th>Monto</th>
                                <th>Fecha</th> 
                                <th>Accion</th>                               
                                </thead>
                                <tbody>
                                    
                                @foreach($facturas as $factura)                                
                                    
                                    <tr>
                                        <td>{{ $factura->id }}</td>
                                       <td>{{ $factura->nroFactura}}</td>
                                       <td>{{ $producto->pluck('nombre')->first()}}</td>                                       
                                       <td>{{ $factura->PedidoPago()->pluck('monto')->first()}}</td>
                                       <td>{{ $factura->fecha }}</td>
                                        <td class="td-actions">
                                            <a href="{{ route('facturas.pdf') }}"
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
                    {{--Footer
                    <div class="card-footer mr-auto">
                        {{ $categorias->links() }}
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection