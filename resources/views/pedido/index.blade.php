@extends('layouts.main',['activePage'=>'pedidos','titlePage'=>'Confirmar Pedido'])
@section('content')
    <div class="content">
        <div class="container-fluid">
             {{--Mensaje--}}
             @if (Session::has('mensaje'))
             <div class="alert alert-success alert-dismissible" role="alert">
                 {{ Session::get('mensaje') }}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('pedido.store',$carrito->id)}}" method="POST" class="form-horizontal"
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
                                    <label for="nombre" class="col-sm-2 col-form-label"> Monto Total </label>
                                    <div class="col-sm-7">
                                        <span class="cart_price">{{$carrito->monto}}</span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Fecha de envio</label>
                                    <div class="col-sm-7">
                                    <input type="date" name="fechaEnvio" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Departamento</label>
                                    <div class="col-sm-7">
                                    <input type="text" name="departamento" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Ciudad</label>
                                    <div class="col-sm-7">
                                    <input type="text" name="ciudad" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Direccion de Envio</label>
                                    <div class="col-sm-7">
                                    <input type="text" name="direccionEnvio" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Telefono/Celular</label>
                                    <div class="col-sm-7">
                                    <input type="text" name="telfCliente" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Forma de Pago</label>
                                    <div class="col-sm-7">
                                        <label for="Estado" class="control-label">Tarjeta</label>
                                            <select class="form-select" name="tarjeta_id" aria-label="Default select example">
                                                {{-- <option selected>Selecciona la apunte del apunte</option> --}}
                                                @foreach ($tarjetas as $tarjeta)
                                                    <option value="{{ $tarjeta->id }}">{{ $tarjeta->numero }}</option>
                                                @endforeach
                                            </select>
                                            <a class="btn btn-success" href="{{ route('tarjeta.create') }}"> Registar Tarjeta </a>
                                    </div>
                                </div>
                                <br>
                            </div>
                            {{--Botones/Footer--}}
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-success">Confirmar Pedido</button>
                                <a class="btn btn-success" href="{{ route('productos.index') }}"> Cancelar </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
