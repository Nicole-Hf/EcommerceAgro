@extends('layouts.main', ['activePage'=>'facturas', 'titlePage'=>'Facturas'])

@section('content')
<div class="content">
    <div class="card">
        <div class="col-md-6">
            <a class="btn btn-success" href="{{ route('reportes.expUsers') }}">por usuarios usuarios</a>
            <a class="btn btn-success" href="{{ route('reportes.expCompraCliente') }}">por compras de clientes</a>
        </div>
        <br>
        <br>
        <div class="card-header card-header-success">
            <h4 class="card-title"> Reportes usuario </h4>
        </div>
        {{--Body--}}
        <div class="card-body">
            {{--tabla--}}
            <div class="table-responsive">
                <table class="table">

                    <tr>
                        <thead class="text-primary text-success">
                            <th>id<i class="fas fa-rockrms    "></i></th>
                            <th>nombre<i class="fas fa-rockrms    "></i></th>
                            <th>email</th>
                            <th>Fecha Creación</th>
                            <th>Rol</th>
                        </thead>

                        <tbody>
                            @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <th>{{ $usuario->created_at }}</th>
                                <th>{{ $usuario->role_id }}</th>
                            </tr>

                            @endforeach
                        </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

</div>
@endsection
