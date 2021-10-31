<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="name"> Rol </label>
            <input type="text"
                   class="form-control"
                   name="name"
                   placeholder="Ingrese el nombre del rol"
                   value="{{ old('name', $role->name) }}" autofocus>
            @if ($errors->has('name'))
                <span class="error text-danger" for="input-name">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>

        {{ $role->role_has_permissions->role_id }}

        <h2 class="h3"> Lista de Permisos </h2>
        @foreach ($permissions as $permission)
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="{{ $permission->id }}">
                    {{ $permission->name }}
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                </label>
            </div>
        @endforeach
    </div>
</div>
