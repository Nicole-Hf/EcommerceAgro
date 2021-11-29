@extends('layouts.main', ['activePage'=>'clientes', 'titlePage'=>'Clientes'])
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
            {{--Botón agregar
            <div class="row">
                <div class="col-12 text-left">
                    <a href="{{ route('clientes.create')  }}" class="btn btn-rose">Registrar Cliente</a>
                </div>
            </div>
            {{--Empieza la tabla--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{--Header
                        <div class="card-header card-header-rose">
                            <h4 class="card-title">Clientes</h4>
                        </div>
                        {{--Body--}}
                        <div class="card-body">
                            {{--tabla--}}
                            <div class="table-responsive">
                                <table class="table">
                                    {{--Cabecera de Tabla--}}
                                    <thead class="text-success">
                                    <th>#</th>
                                    <th>Nombre Completo</th>
                                    <th>Teléfono</th>
                                    <th>CI</th>
                                    <th>Correo electrónico</th>
                                    <th class="text-right">Acciones</th>
                                    </thead>
                                    {{--Llamar a los proveedores--}}
                                    <tbody>
                                    @foreach($clientes as $cliente)
                                        <tr>
                                            <td>{{ $cliente->id }}</td>
                                            <td>{{ $cliente->nombre }}</td>
                                            <td>{{ $cliente->telefono }}</td>
                                            <td>{{ $cliente->razonSocial }}</td>
                                            <td>{{ $cliente->users->email }}</td>
                                            <td class="td-actions text-right">
                                                {{--Ver--}}
                                                <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info">
                                                    <i class="material-icons">person</i>
                                                </a>
                                                {{--Editar Usuario--}}
                                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                {{--Eliminar Usuario--}}
                                                <form action="{{ route('clientes.delete',$cliente->id) }}" method="post"
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
                        {{--Footer
                        <div class="card-footer mr-auto">
                            {{ $personas->links() }}
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
