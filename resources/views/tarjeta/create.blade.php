@extends('layouts.main',['activePage'=>'tarjetas','titlePage'=>'Agregar Tarjeta'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('tarjeta.store') }}" method="POST" class="form-horizontal"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card">
                            {{--Header
                            <div class="card-header card-header-rose">
                                <h4 class="card-title">Formulario de Creación</h4>
                            </div>
                            {{--Body--}}
                            <div class="card-body">
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                        class="form-control"
                                        name="nombre"
                                        value="{{ old('nombre') }}" autofocus>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="numero" class="col-sm-2 col-form-label">Numero</label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                        class="form-control"
                                        name="numero"
                                        value="{{ old('numero') }}" autofocus>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="cvv" class="col-sm-2 col-form-label">Cvv</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="cvv" class="form-control"
                                             placeholder="Cvv"
                                               value="{{ old('cvv') }}">
                                        @if ($errors->has('cvv'))
                                            <span class="error text-danger" for="input-precio">
                                                {{ $errors->first('cvv') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Expiacion</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="fecha" class="form-control"
                                        placeholder="12/12"
                                          value="{{ old('fecha') }}">
                                   @if ($errors->has('fecha'))
                                       <span class="error text-danger">
                                           {{ $errors->first('fecha') }}
                                       </span>
                                   @endif
                                    </div>
                                </div>
                                <br>
                            </div>
                            {{--Botones/Footer--}}
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-success"> Guardar Datos</button>
                                <a class="btn btn-success" href="{{ route('tarjeta.index') }}"> Cancelar </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
