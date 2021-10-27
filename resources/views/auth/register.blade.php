@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('AgroShop')])

@section('content')
    <div class="container" style="height: auto;">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-success text-center">
                            <h4 class="card-title"><strong>{{ __('Registro') }}</strong></h4>
                            {{--
                            <div class="social-line">
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                            --}}
                        </div>
                        <div class="card-body ">
                            <p class="card-description text-center">{{ __('Completa tus datos') }}</p>
                            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <input type="text" name="name" class="form-control"
                                           placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required>
                                </div>
                                @if ($errors->has('name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">email</i>
                                        </span>
                                    </div>
                                    <input type="email" name="email" class="form-control"
                                           placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" id="password"
                                           class="form-control" placeholder="{{ __('Password...') }}" required>
                                </div>
                                @if ($errors->has('password'))
                                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>
                            {{--
                            <div class="form-check mr-auto ml-3 mt-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                    {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
                                </label>
                            </div>--}}
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-primary btn-link btn-lg btn-success">{{ __('Crear cuenta') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{--<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
--}}
