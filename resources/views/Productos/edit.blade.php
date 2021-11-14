@extends('layouts.main',['activePage'=>'productos','titlePage'=>'Editar Producto'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('productos.update',$producto->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card">
                            {{--Header
                            <div class="card-header card-header-rose">
                                <h4 class="card-title">Formulario de Creación</h4>
                            </div>
                            {{--Body--}}
                            <div class="card-body">
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> Producto </label>
                                    <div class="col-sm-7">
                                        <input  type="text"
                                                class="form-control"
                                                name="nombre"
                                                value="{{ old('nombre') }}" autofocus>
                                        @if ($errors->has('nombre'))
                                            <span class="error text-danger" for="input-nombre">
                                                {{ $errors->first('nombre') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Descripcion</label>
                                    <div class="col-sm-7">
                                    <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Precio</label>
                                    <input type="text" name="precio" class="form-control"
                                        id="exampleInputEmail" placeholder="Precio">
                                </div>

                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Imagen</label>
                                    <div class="col-sm-7">
                                    <input type="file" name="imagen" class="form-control"
                                        id="exampleInputEmail" placeholder="Seleccione la imagen..."
                                        accept=".jpg, .jpeg, .png">
                                    </div>    
                                </div>

                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Stock</label>
                                    <div class="col-sm-7">
                                        <input type="number" name="stock" class="form-control"
                                            id="exampleInputEmail" placeholder="Stock">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> SubCategoría </label>
                                    <div class="coll-sm-7">
                                        <select class="form-control" name="subcategoria_id" aria-label="Default select example">
                                            {{-- <option selected>Selecciona la apunte del apunte</option> --}}
                                            @foreach ($subcategorias as $subcategoria)
                                                <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                </div>
                            </div>
                            {{--Botones/Footer--}}
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-success"> Guardar Datos </button>
                                <a class="btn btn-success" href="{{ route('productos.index') }}"> Cancelar </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection