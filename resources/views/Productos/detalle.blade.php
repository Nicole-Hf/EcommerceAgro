@extends('layouts.main', ['activePage'=>'productos', 'titlePage'=>'Listado de Productos'])

@section('content')
    <div class="container text-center">
        <h1><i class="fa fa-shopping-cart"></i>Detalle del Producto</h1>

        <div class="row">
            <div class="cold-md-6">
                <div class="product-block">
                    <br>
                    <img style="height: 500px; width: 350px;" src="{{ asset( $product->imagen) }} ">
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-block">
                    <h3>{{$product->nombre}}</h3>
                    <hr>
                    <div style='text-align:left' class="product-info panel">
                        <p>{{$product->descripcion}}</p>
                        <p>Stock: {{$product->stock}}</p>
                        <p>Empresa: {{$product->empresa()->pluck('nombre')->first()}}</p>
                        <p>Subcategoria: {{$product->subcategoria()->pluck('nombre')->first()}}</p>
                        <p class="btn btn-success">Bs {{ $product->precio }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
