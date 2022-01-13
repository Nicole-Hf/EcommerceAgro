@extends('layouts.main', ['activePage'=>'facturas', 'titlePage'=>'Facturas'])

@section('content')
<form action="url(reportes/importar)" method="post" enctype="multipart/form-data">
    @csrf
    <div class="clo-md-6">
        <input type="file" name="documento">
        <button class="btn btn-primary" type="submit">
            importar
        </button>
    </div>
</form>
<div class="col-md-4">
    <a class="btn btn-success" href="{{ route('reportes.expUsers') }}">por usuarios usuarios</a>
    <a class="btn btn-success" href="{{ route('reportes.expCompraCliente') }}">por compras de clientes</a>

</div>
<div class="content">
    <div class="card">

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

</div>
@endsection