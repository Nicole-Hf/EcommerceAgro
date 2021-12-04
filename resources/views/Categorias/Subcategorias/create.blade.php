@extends('layouts.main',['activePage'=>'subcategorias','titlePage'=>'Agregar Subcategoría'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('subcategorias.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> Nombre </label>
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
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> Categoría: </label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="categoria_id"
                                                aria-label="Default select example">
                                            <option disabled selected>
                                                Seleccione una categoría
                                            </option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">
                                                    {{ $categoria->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <i></i>
                                     </div>
                                </div>
                            </div>
                            {{--Botones/Footer--}}
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-success"> Guardar Datos </button>
                                <a class="btn btn-success" href="{{ route('subcategorias.index') }}"> Cancelar </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
