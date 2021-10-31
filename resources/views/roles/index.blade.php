@extends('layouts.main', ['activePage'=>'role', 'titlePage'=>'Roles'])
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
            {{--Boton--}}
            <div class="row">
                <div class="col-12 text-left">
                    <a href="{{ route('roles.create') }}" class="btn btn-success"> Agregar Rol </a>
                </div>
            </div>
            {{--Tabla--}}
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title"> Roles </h4>
                        </div>
                        {{--Body--}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary text-success">
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $rol)
                                        <tr>
                                            <td>{{ $rol->id }}</td>
                                            <td>{{ $rol->name }}</td>
                                            <td class="td-actions">
                                                {{--Ver--}}
                                                <a href="{{ route('roles.show',$rol->id) }}" class="btn btn-info">
                                                    <i class="material-icons">search</i>
                                                </a>
                                                {{--Sectores--}}
                                                <a href="{{ route('roles.create',$rol->id) }}" class="btn btn-success">
                                                    <i class="material-icons">layers</i>
                                                </a>
                                                {{--Editar--}}
                                                <a href="{{ route('roles.edit',$rol->id) }}" class="btn btn-warning">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                {{--Eliminar--}}
                                                <form action="{{ route('roles.delete',$rol->id) }}" method="POST"
                                                      style="display: inline-block;"
                                                      onsubmit="return confirm('¿Está seguro?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
