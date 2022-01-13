@extends('layouts.main',['activePage'=>'productos','titlePage'=>'Agregar Producto'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('productos.store') }}" method="POST" class="form-horizontal"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card">
                            {{--Header
                            <div class="card-header card-header-rose">
                                <h4 class="card-title">Formulario de Creación</h4>
                            </div>
                            {{--Body--}}
                            <div class="card-body">
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> Producto </label>
                                    <div class="col-sm-7">
                                        <input type="text"
                                               class="form-control"
                                               name="nombre"
                                               value="{{ old('nombre') }}" autofocus>
                                        @if ($errors->has('nombre'))
                                            <span class="error text-danger" for="input-nombre">
                                                {{ $errors->first('nombre') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Descripcion</label>
                                    <div class="col-sm-7">
                                    <textarea class="form-control"
                                              name="descripcion"
                                              id="exampleFormControlTextarea1"
                                              rows="5">{{ old('descripcion') }}</textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Precio</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="precio" class="form-control"
                                               id="exampleInputEmail" placeholder="Precio"
                                               value="{{ old('precio') }}">
                                        @if ($errors->has('precio'))
                                            <span class="error text-danger" for="input-precio">
                                                {{ $errors->first('precio') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Imagen</label>
                                    <div class="col-sm-7">
                                        <input type="file" name="imagen" class="form-control"
                                               id="exampleInputEmail" placeholder="Seleccione una imagen..."
                                               accept=".jpg, .jpeg, .png" value="{{ old('imagen') }}">
                                    </div>
                                    @if ($errors->has('imagen'))
                                        <span class="error text-danger" for="input-imagen">
                                            {{ $errors->first('imagen') }}
                                        </span>
                                    @endif
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Stock</label>
                                    <div class="col-sm-7">
                                        <input type="number" name="stock" class="form-control"
                                               id="exampleInputEmail" placeholder="Stock"
                                               value="{{ old('stock') }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label"> Categoría: </label>
                                    <div class="col-sm-7">
                                       {{--  <select class="form-control" name="subcategoria_id"
                                                aria-label="Default select example">
                                            <option selected>Seleccione una categoria</option>
                                            @foreach ($subcategorias as $subcategoria)
                                                <option
                                                    value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                                            @endforeach
                                        </select>--}}
                                        <select class="form-control" name="texto" id="_categoria">
                                            <option disabled selected>Seleccione una categoria</option>
                                            @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                            @endforeach--}}
                                        </select>
                                        <br>
                                        <select class="form-control" name="subcategoria" id="_subcategoria"></select>
                                    </div>
                                    @if ($errors->has('subcategoria_id'))
                                        <span class="error text-danger" for="input-subcategoria_id">
                                            {{ $errors->first('subcategoria_id') }}
                                        </span>
                                    @endif
                                    <script>
                                        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
                                        document.getElementById('_categoria').addEventListener('change',(e)=>{
                                            fetch('subcategorias',{
                                                method : 'POST',
                                                body: JSON.stringify({texto : e.target.value}),
                                                headers:{
                                                    'Content-Type': 'application/json',
                                                    "X-CSRF-Token": csrfToken
                                                }
                                            }).then(response =>{
                                                return response.json()
                                            }).then( data =>{
                                                var opciones ="<option disabled selected value=''>Elegir Subcategoría</option>";
                                                for (let i in data.lista) {
                                                    opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].nombre+'</option>';
                                                }
                                                document.getElementById("_subcategoria").innerHTML = opciones;
                                            }).catch(error =>console.error(error));
                                        })
                                    </script>
                                </div>
                            </div>
                            {{--Botones/Footer--}}
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-success"> Guardar Datos</button>
                                <a class="btn btn-success" href="{{ route('productos.index') }}"> Cancelar </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
