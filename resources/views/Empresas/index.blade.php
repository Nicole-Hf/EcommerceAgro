@extends('layouts.main', ['activePage'=>'empresas', 'titlePage'=>'Listado de Empresas'])
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
                    <div class="card">
                        <div class="card-body">
                            {{--tabla--}}
                            <div class="table-responsive">
                                <table class="table">
                                    {{--Cabecera de Tabla--}}
                                    <thead class="text-primary text-warning">
                                    <th>#</th>
                                    <th>Nombre Comercial</th>
                                    <th>Perfil</th>
                                    <th>CI/NIT</th>
                                    <th>Correo electrónico</th>
                                    <th>Tipo de Negocio</th>
                                    <th class="text-right">Acciones</th>
                                    </thead>
                                    {{--Llamar a los proveedores--}}
                                    <tbody>
                                    @foreach($empresas as $empresa)
                                        <tr>
                                            <td>{{ $empresa->id }}</td>
                                            <td>{{ $empresa->nombre }}</td>
                                            <td>{{ $empresa->perfil }}</td>
                                            <td>{{ $empresa->nit }}</td>
                                            <td>{{ $empresa->users->email }}</td>
                                            <td>{{ $empresa->tipo_negocio }}</td>
                                            <td class="td-actions text-right">
                                                {{--Ver--}}
                                                <a href="{{ route('clientes.show', $empresa->id) }}" class="btn btn-info">
                                                    <i class="material-icons">person</i>
                                                </a>
                                                {{--Editar Usuario--}}
                                                <a href="{{ route('clientes.edit', $empresa->id) }}" class="btn btn-warning">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                {{--Eliminar Usuario--}}
                                                <form action="{{ route('clientes.delete',$empresa->id) }}" method="post"
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
