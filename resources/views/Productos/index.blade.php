-@extends('layouts.main', ['activePage'=>'productos', 'titlePage'=>'Productos'])
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
                    <a href="{{route('productos.create')}}" class="btn btn-outline-success btn-success"> Agregar
                        Producto </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{--Header--}}
                        <div class="card-header card-header-success">
                            <h4 class="card-title"> Listado de Productos </h4>
                        </div>
                        {{--Body--}}
                        <div class="card-body">
                            {{--tabla--}}
                            <div class="table-responsive">
                                <table class="table">
                                    {{--Cabecera de Tabla--}}
                                    <thead class="text-primary text-success">
                                    <th>Imagen</th>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    {{--<th>Descripcion</th>--}}
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Subcategoria</th>
                                    <th class="text-right">Acciones</th>
                                    </thead>
                                    {{--Llamar a las marcas--}}
                                    <tbody>
                                    @foreach($productos as $producto)
                                        <tr>
                                            <td>
                                                <div class="img-container">
                                                    <img {{--style="width: 20%"--}}
                                                         src="{{ asset($producto->imagen) }}"
                                                         alt="...">
                                                </div>
                                            </td>
                                            <td>{{ $producto->id }}</td>
                                            <td>{{ $producto->nombre }}</td>
                                            {{--<td>{{ $producto->descripcion }}</td>--}}
                                            <td>{{ $producto->precio }}</td>
                                            <td>
                                                <img style="width: 10%" src="{{ asset('/img/' . $producto->imagen) }}"
                                                alt="...">
                                            </td>
                                            <td>{{ $producto->stock }}</td>
                                            <td>{{ $producto->subcategoria_id }}</td>
                                            <td class="td-actions text-right">
                                                {{--Ver--}}
                                                <a href="{{ route('productos.show',$producto->id) }}"
                                                   class="btn btn-info text-center">
                                                    <i class="material-icons">search</i>
                                                </a>
                                                {{--Editar--}}
                                                <a href="{{route('productos.edit',$producto->id)}}"
                                                   class="btn btn-warning">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                {{--Eliminar--}}
                                                <form action="{{route('productos.delete',$producto->id)}}" method="POST"
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
