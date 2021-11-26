@extends('layouts.main',['activePage'=>'productos','titlePage'=>'Producto'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-6">
                <div class="card card-profile" {{--style="max-width: 100px"--}}>
                    <div class="card-header card-header-image">
                        <a href="#pablo">
                            <img class="img" style="max-width: 100px"
                                 src="{{ asset($producto->imagen) }}">
                        </a>
                    </div>
                    <div class="card-body col-md-12">
                        <h3 class="card-title text-center">{{ $producto->nombre }}</h3>
                        <h5 class="card-category text-gray text-center"> Bs.- {{ $producto->precio }}</h5>
                        <p class="card-description text-center">{{ $producto->descripcion }}</p>
                        <label for="stock" class="col-form-label">Cantidad Disponible: </label>
                        {{ $producto->stock }} <br>
                        <label for="subcategoria_id" class="col-form-label">Categoría: </label>
                        {{ $producto->subcategoria->nombre }} <br>
                    </div>
                    <div class="card-footer justify-content-center">
                        <a href="{{ route('productos.index') }}" class="btn btn-success btn-round">Volver</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
