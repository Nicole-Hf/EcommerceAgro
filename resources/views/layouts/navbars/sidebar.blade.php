<div class="sidebar" data-color="orange" data-background-color="white"
     data-image="{{ asset('img/sidebar-1.jpg') }}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="https://creative-tim.com/" class="simple-text logo-normal">
            {{ __('AgroShop') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                @can('home')
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Inicio') }}</p>
                </a>
                @endcan
            </li>
            {{--<li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i><img style="width:25px" src="{{ asset('img/laravel.svg') }}"></i>
                    <p>{{ __('Laravel Examples') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> UP </span>
                                <span class="sidebar-normal">{{ __('User profile') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> UM </span>
                                <span class="sidebar-normal"> {{ __('User Management') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>--}}
            <li class="nav-item{{ $activePage == 'producto' ? ' active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Producto') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'compra' ? ' active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="material-icons">library_books</i>
                    <p>{{ __('Compra') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
                @can('users.index')
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="material-icons">bubble_chart</i>
                    <p>{{ __('Usuarios') }}</p>
                </a>
                @endcan
            </li>
            <li class="nav-item{{ $activePage == 'reportes' ? ' active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="material-icons">location_ons</i>
                    <p>{{ __('Reportes') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
                @can('roles.index')
                <a class="nav-link" href="{{ route('roles.index') }}">
                    <i class="material-icons">notifications</i>
                    <p>{{ __('Roles') }}</p>
                </a>
                @endcan
            </li>
            <li class="nav-item{{ $activePage == 'empresas' ? ' active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="material-icons">language</i>
                    <p>{{ __('Empresas') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
