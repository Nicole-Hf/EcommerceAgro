@extends('layouts.main', ['activePage'=>'roles', 'titlePage'=>'Roles'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('roles.store') }}" method="post" class="form-horizontal">
                        @csrf
                        @include('roles.partials.form')
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
