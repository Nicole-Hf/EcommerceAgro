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
                @foreach($productos as $pro)                
                    <div class="col-lg-3">
                        <div class="card" style="margin-bottom: 20px; height: auto;">
                            <img src="/img/{{ $pro->imagen }}"
                                 class="card-img-top mx-auto"
                                 style="height: 150px; width: 200px;display: block;"
                                 alt="{{ $pro->imagen }}"
                            >
                            <div class="card-body" >
                                <a href=""><h6 class="card-title" >{{ $pro->nombre }}</h6></a>
                                <p style="height:2px" >Bs {{ $pro->precio }}</p>
                                <p style="height:2px;">Stock: {{$pro->stock}}</p>
                                <p style="height:2px;">Empresa: {{$pro->empresa()->pluck('nombre')->first()}}</p>                                
                                <p style="height:4px;">Subcategoria: {{$pro->subcategoria()->pluck('nombre')->first()}}</p>                               
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