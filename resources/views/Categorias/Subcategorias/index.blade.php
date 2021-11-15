@extends('layouts.main', ['activePage'=>'subcategorias', 'titlePage'=>'SubCategorias'])
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
                    <a href="{{ route('subcategorias.create')}}" class="btn btn-outline-success btn-success"> Agregar Subcategoría </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        {{--Header--}}
                        <div class="card-header card-header-success">
                            <h4 class="card-title"> Listado de Subcategorías </h4>
                        </div>
                        {{--Body--}}
                        <div class="card-body">
                            {{--tabla--}}
                            <div class="table-responsive">
                                <table class="table">
                                    {{--Cabecera de Tabla--}}
                                    <thead class="text-primary text-success">
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                    </thead>
                                    {{--Llamar a las marcas--}}
                                    <tbody>
                                    @foreach($subcategorias as $subcategoria)
                                        <tr>
                                            <td>{{ $subcategoria->id }}</td>
                                            <td>{{ $subcategoria->nombre }}</td>
                                            <td>{{$subcategoria->categoria_id}}</td>
                                            <td class="td-actions">
                                                {{--Editar Marca--}}
                                                <a href="{{ route('subcategorias.edit',$subcategoria->id) }}" class="btn btn-warning">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                {{--Eliminar Marca--}}
                                                <form action="{{ route('subcategorias.delete',$subcategoria->id) }}" method="post"
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
                            {{ $categorias->links() }}
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
