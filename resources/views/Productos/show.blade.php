@extends('layouts.main', ['activePage'=>'productos', 'titlePage'=>'Listado de Productos'])
@section('content')
<div class="container" style="margin-top: 80px">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-7">
                    <h4>Productos </h4>
                </div>
            </div>
            <hr>
            <div class="row">
                @foreach($productos as $product)                
                    <div class="col-lg-3">
                        <div class="card" style="margin-bottom: 20px; height: auto;">
                            <img src="{{ asset('/storage/' .$product->imagen )}}"
                                 class="card-img-top mx-auto"
                                 style="height: 150px; width: 200px;display: block;"
                                 alt="{{ $product->imagen }}"
                            >
                            <div class="card-body" >
                                <a href=""><h6 class="card-title" >{{ $product->nombre }}</h6></a>
                                <p style="height:2px" >Bs {{ $product->precio }}</p>
                                <p style="height:2px;">Stock: {{$product->stock}}</p>
                                <p style="height:2px;">Empresa: {{$product->empresa()->pluck('nombre')->first()}}</p>                                
                                <p style="height:4px;">Subcategoria: {{$product->subcategoria()->pluck('nombre')->first()}}</p>
                                <br>
                                <a class= "btn btn-warning" href="{{ route('ver', $product->id) }}">
                                    <i class="fa fa-chevron-circle-right"></i>LEER MAS</a>                               
                            </div>
                           
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{$productos->links()}}
@endsection
