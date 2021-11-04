@extends('layouts.main', ['activePage'=>'roles', 'titlePage'=>'Roles'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('roles.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name"> Rol </label>
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           placeholder="Ingrese el nombre del rol"
                                           value="{{ old('name') }}" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="error text-danger" for="input-name">
                                        {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>

                                <h2 class="h3"> Lista de Permisos </h2>
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class ="form-check-input" type="checkbox"
                                                   name = "permissions[]" id = "permissions"
                                                   value ="{{ $permission->id }}">
                                            {{ $permission->name }}
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary"> Crear Rol</button>
                        <a class="btn btn-outline-primary" href="{{ route('roles.index') }}"> Cancelar </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import Label from "../../js/Jetstream/Label";

    export default {
        components: {Label}
    }
</script>
