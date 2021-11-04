@can("clientes.create")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('clientes.store') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card">
                        {{--Header--}}
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Crear Perfil de Cliente</h4>
                        </div>
                        {{--Body--}}
                        <div class="card-body">
                            {{--Nombre de Persona--}}
                            <div class="row">
                                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text"
                                           class="form-control"
                                           name="nombre"
                                           value="{{ auth()->user()->name }}" autofocus>
                                    @if ($errors->has('nombre'))
                                        <span class="error text-danger" for="input-name">
                                                {{ $errors->first('nombre') }}
                                            </span>
                                    @endif
                                </div>
                            </div>
                            {{--Telefono--}}
                            <div class="row">
                                <label for="telefono" class="col-sm-2 col-form-label">Teléfono/Celular</label>
                                <div class="col-sm-7">
                                    <input type="text"
                                           class="form-control"
                                           name="telefono"
                                           value="{{ old('telefono') }}" autofocus>
                                    @if ($errors->has('telefono'))
                                        <span class="error text-danger" for="input-name">
                                                {{ $errors->first('telefono') }}
                                            </span>
                                    @endif
                                </div>
                            </div>
                            {{--Direccion--}}
                            <div class="row">
                                <label for="razonSocial" class="col-sm-2 col-form-label">Carnet de
                                    Identidad</label>
                                <div class="col-sm-7">
                                    <input type="text"
                                           class="form-control"
                                           name="razonSocial"
                                           value="{{ old('razonSocial') }}" autofocus>
                                    @if ($errors->has('razonSocial'))
                                        <span class="error text-danger" for="input-name">
                                                {{ $errors->first('razonSocial') }}
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{--Botones/Footer--}}
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-success">Guardar Datos</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcan
