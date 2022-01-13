@extends('layouts.main', ['activePage'=>'facturas', 'titlePage'=>'Facturas'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-3">
                <a class="btn btn-success" href="{{ route('reportes.expUsers') }}">Obtener reporte de usuarios</a>
            </div>
            <div class="col-md-3">
                <a class="btn btn-success" href="{{ route('reportes.expCompraCliente') }}">Obtener reportes por compras</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title"> Reportes usuario </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <thead class="text-primary text-success">
                            <th>id<i class="fas fa-rockrms"></i></th>
                            <th>nombre<i class="fas fa-rockrms"></i></th>
                            <th>email</th>
                            <th>contraseña</th>
                            <th>rol</th>
                            </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <th>{{ $usuario->password }}</th>
                                <th>{{ $usuario->role_id }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
