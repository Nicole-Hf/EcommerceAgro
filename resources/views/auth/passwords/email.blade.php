@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <div class="card">
                    <div class="card-header card-header-success mb-3">
                        <h4 class="card-title text-center">
                            <strong>{{ __('Reset Password') }}</strong>
                        </h4>
                    </div>

                    <div class="card-body">
                        <p class="card-description text-center">
                            {{ __('Ingresa tu email y si tienes una cuenta,
                                                                                           recibirás un link para generar tu contraseña.') }}
                        </p>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group row">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Ingresa tu email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="card-footer justify-content-center">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
