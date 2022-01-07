@extends('layouts.main', ['activePage'=>'bitacora', 'titlePage'=>'Bitacora'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Bitacora</h4>
                        </div>
                        {{--<div class="card-header">
                            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o correo de un usuario">
                        </div>
                        {{--Body--}}
                        <div class="card-body">
                            {{--tabla--}}
                            <div class="table-responsive">
                                <table class="table">
                                    {{--Cabecera de Tabla--}}
                                    <thead class="text-primary text-success">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                    <th>Fecha y hora de registro</th>
                                    
                                    </thead>
                                    <tbody>
                                    @foreach($Bitacora as $bitacora)
                                        <tr>
                                            <td>{{ $bitacora->id }}</td>
                                            <td>{{ $bitacora->nombre }}</td>
                                            <td>{{ $bitacora->correo}}</td>
                                            <td>{{ $bitacora->fecha_hora}}</td>
                                            <td class="td-actions text-right">
                                                
                                                <a href="{{ route('detallebitacora.show', $bitacora->correo) }}" class="btn btn-warning">
                                                    Ver Bitacora</a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{--Footer
                        <div class="card-footer mr-auto">
                            {{ $users->links() }}
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

