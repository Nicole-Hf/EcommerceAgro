@extends('layouts.main', ['activePage'=>'clientes', 'titlePage'=>'Clientes'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{--tabla--}}
                            <div class="table-responsive">
                                <table class="table">
                                    {{--Cabecera de Tabla--}}
                                    <thead class="text-success">
                                    <th>#</th>
                                    <th>Nombre Completo</th>
                                    <th>Telefono</th>
                                    <th class="text-right">Acciones</th>
                                    </thead>
                                    {{--Llamar a los proveedores--}}
                                    <tbody>
                                    @foreach($clientes as $cliente)
                                        <tr>
                                            <td>{{ $cliente->id }}</td>
                                            <td>{{ $cliente->nombre }}</td>
                                            <td>{{ $cliente->telefono }}</td>
                                            <td class="td-actions text-right">
                                                {{--Ver--}}
                                                <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info">
                                                    <i class="material-icons">person</i>
                                                </a>
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
