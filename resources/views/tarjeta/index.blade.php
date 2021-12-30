@extends('layouts.main', ['activePage'=>'tarjetas', 'titlePage'=>'Tarjeta'])
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
            {{--Botón agregar--}}
            <div class="row">
                <div class="col-12 text-left">
                    <a href="{{ route('tarjeta.create')}}"
                       class="btn btn-outline-success btn-success"> Agregar Tarjeta </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        {{--Header--}}
                        <div class="card-header card-header-success">
                            <h4 class="card-title"> Listado de Tarjetas </h4>
                        </div>
                        {{--Body--}}
                        <div class="card-body">
                            {{--tabla--}}
                            <div class="table-responsive">
                                <table class="table">
                                    {{--Cabecera de Tabla--}}
                                    <thead class="text-primary text-success">
                                    <th>Nombre</th>
                                    <th>Numero Tarjeta</th>
                                    <th>Cvv</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                    @foreach($tarjetas as $tarjeta)
                                        <tr>
                                            <td>{{ $tarjeta->nombre }}</td>
                                            <td>{{ $tarjeta->numero }}</td>
                                            <td>{{ $tarjeta->fecha }}</td>
                                            <td>{{ $tarjeta->cvv }}</td>
                                            <td class="td-actions">
                                                {{--Eliminar--}}
                                                <form action="{{route('tarjeta.delete',$tarjeta->id)}}" method="POST"
                                                      style="display: inline-block;"
                                                      onsubmit="return confirm('¿Está seguro?')">
                                                    {{ csrf_field() }}
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
                            {{ $categorias->links() }}
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection