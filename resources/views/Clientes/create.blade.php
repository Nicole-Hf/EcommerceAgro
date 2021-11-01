@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('AgroShop')])

@section('content')
    <div class="container" style="height: auto;">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-success text-center">
                            <h4 class="card-title"><strong>{{ __('Registro Comprador') }}</strong></h4>
                        </div>
                        <div class="card-body ">
                            <p class="card-description text-center">{{ __('Completa tus datos') }}</p>
                            <div class="bmd-form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <input type="text" name="nombre" class="form-control"
                                           placeholder="{{ __('Nombre Completo...') }}" value="{{ old('nombre') }}" required>
                                </div>
                                @if ($errors->has('nombre'))
                                    <div id="name-error" class="error text-danger pl-3" for="nombre"
                                         style="display: block;">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('telefono') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">phone</i>
                                        </span>
                                    </div>
                                    <input type="telefono" name="telefono" class="form-control"
                                           placeholder="{{ __('Teléfono...') }}" value="{{ old('telefono') }}" required>
                                </div>
                                @if ($errors->has('telefono'))
                                    <div id="email-error" class="error text-danger pl-3" for="telefono"
                                         style="display: block;">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('razonSocial') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                    </div>
                                    <input type="razonSocial" name="razonSocial" class="form-control"
                                           placeholder="{{ __('Carnet de Identidad...') }}" value="{{ old('razonSocial') }}" required>
                                </div>
                                @if ($errors->has('razonSocial'))
                                    <div id="email-error" class="error text-danger pl-3" for="razonSocial"
                                         style="display: block;">
                                        <strong>{{ $errors->first('razonSocial') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-primary btn-link btn-lg btn-success">
                                {{ __('Crear cuenta') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
