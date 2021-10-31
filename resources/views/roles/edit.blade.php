@extends('layouts.main', ['activePage'=>'roles', 'titlePage'=>'Editar Rol'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            @if(session('info'))
                <div class="alert alert-success">
                    {{ session('info') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('roles.update', $role->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        @include('roles.partials.form')
                        <button type="submit" class="btn btn-outline-primary"> Actualizar Rol</button>
                        <a class="btn btn-outline-primary" href="{{ route('roles.index') }}"> Cancelar </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
