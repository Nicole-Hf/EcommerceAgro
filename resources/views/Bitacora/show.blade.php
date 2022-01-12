@extends('layouts.main', ['activePage'=>'bitacora', 'titlePage'=>'Bitacora'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Visualizar Bitacora</h4>
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
                                    <th>Fecha y hora</th>
                                    </thead>
                                    <tbody>
                                    @foreach($detalles as $detalle)
                                        <tr>
                                            <td>{{ $detalle->id }}</td>
                                            <td>{{ $detalle->nombre }}</td>
                                            <td>{{ $detalle->correo}}</td>
                                            <td>{{ $detalle->event}}</td>
                                            <td>{{ $detalle->fecha_accion}}</td>
                                            
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

