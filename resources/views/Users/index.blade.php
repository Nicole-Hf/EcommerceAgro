@extends('layouts.main', ['activePage'=>'users', 'titlePage'=>'Usuarios'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{--Header--}}
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Listado de Usuarios</h4>
                        </div>
                        {{--<div class="card-header">
                            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o correo de un usuario">
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
                                    <th>Correo electrónico</th>
                                    <th>Role</th>
                                    <th class="text-right">Acciones</th>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role_id }}</td>
                                            <td class="td-actions text-right">
                                                {{--Editar Usuario--}}
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                                                    <span class="material-icons">edit</span>
                                                </a>
                                                {{--Eliminar Usuario--}}
                                                <form action="{{ route('users.delete',$user->id) }}" method="post"
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
                            {{ $users->links() }}
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import Input from "@/Jetstream/Input";
    export default {
        components: {Input}
    }
</script>
