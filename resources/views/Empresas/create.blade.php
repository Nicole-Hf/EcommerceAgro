@extends('layouts.main', ['activePage'=>'empresas', 'titlePage'=>'Registrar Empresa'])
@section('content')
    <div class="content">
        @can("empresas.create")
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('empresas.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="card">
                                {{--Header--}}
                                <div class="card-header card-header-success">
                                    <h4 class="card-title">Crear Perfil de Empresa</h4>
                                </div>
                                {{--Body--}}
                                <div class="card-body">
                                    {{--Nombre de Persona--}}
                                    <div class="row">
                                        <label for="nombre" class="col-sm-2 col-form-label">Nombre
                                            Comercial</label>
                                        <div class="col-sm-7">
                                            <input type="text"
                                                   class="form-control"
                                                   name="nombre"
                                                   value="{{ auth()->user()->name }}" autofocus>
                                            @if ($errors->has('nombre'))
                                                <span class="error text-danger" for="input-name">
                                                {{ $errors->first('nombre') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label for="nombre" class="col-sm-2 col-form-label">Perfil</label>
                                        <div class="col-sm-7">
                                            <div class="form-check form-check-radio form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="perfil"
                                                           id="inlineRadio1" value="Empresa"> Soy Empresa
                                                    <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-radio form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="perfil"
                                                           id="inlineRadio2" value="Particular"> Soy
                                                    Particular
                                                    <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                                </label>
                                            </div>
                                            @if ($errors->has('perfil'))
                                                <span class="error text-danger" for="input-perfil">
                                                {{ $errors->first('perfil') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label for="nit" class="col-sm-2 col-form-label">CI/NIT</label>
                                        <div class="col-sm-7">
                                            <input type="text"
                                                   class="form-control"
                                                   name="nit"
                                                   value="{{ old('nit') }}" autofocus>
                                            @if ($errors->has('nit'))
                                                <span class="error text-danger" for="input-nit">
                                                {{ $errors->first('nit') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Tipo de Negocio</label>
                                        <div class="col-sm-7">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"
                                                           value="cooperativa" name="tipo_negocio">
                                                    Cooperativa
                                                    <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"
                                                           value="fabricante" name="tipo_negocio">
                                                    Fabricante
                                                    <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"
                                                           value="oficina" name="tipo_negocio">
                                                    Oficina Comercial
                                                    <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"
                                                           value="distribuidor" name="tipo_negocio">
                                                    Distribuidor
                                                    <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"
                                                           value="servicios" name="tipo_negocio">
                                                    Servicios
                                                    <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"
                                                           value="otros" name="tipo_negocio">
                                                    Otros
                                                    <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                </label>
                                            </div>
                                            @if ($errors->has('tipo_negocio'))
                                                <span class="error text-danger" for="input-tipo_negocio">
                                                {{ $errors->first('tipo_negocio') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{--Botones/Footer--}}
                                <div class="card-footer ml-auto mr-auto">
                                    <button type="submit" class="btn btn-success">Guardar Datos</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
