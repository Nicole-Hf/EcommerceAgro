<div class="sidebar" data-color="green" data-background-color="black"
     data-image="{{ asset('img/sidebaragro2.jpg') }}" aria-labelledby="minimizeSidebar">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
    <a href="{{ route('catalogo') }}" class="simple-text logo-normal">
            {{ __('AgroShop') }}
        </a>
        {{--<button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
        </button>--}}
    </div>
    <div class="sidebar-wrapper ps-container ps-active-y">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'home' ? ' active' : '' }}">
                @can('home')
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="material-icons">home</i>
                        <span>{{ __('Inicio') }}</span>
                    </a>
                @endcan
            </li>
            <li class="nav-item{{ $activePage == 'productos' ? ' active' : '' }}">
                @if (Auth()->id()=='1')
                    <a class="nav-link" href="{{route('productos.indexAdmin')}}">
                        <i class="material-icons">style</i>
                        <span class="sidebar-normal">{{ __('Productos') }} </span>
                    </a>
                @elseif(Auth()->id()=='3') 
                <a class="nav-link" href="{{route('clientes.show')}}">
                    <i class="material-icons">style</i>
                    <span class="sidebar-normal">{{ __('Productos') }} </span>
                </a>  
                    @else
                    @can('productos.index')
                        <a class="nav-link" href="{{route('productos.index')}}">
                            <i class="material-icons">style</i>
                            <span class="sidebar-normal">{{ __('Productos') }} </span>
                        </a>
                    @endcan
                @endif                

            </li>
            <li class="nav-item {{ ($activePage == 'categorias' || $activePage == 'subcategorias') ? ' active' : '' }}">
                @can('categorias.index')
                    <a class="nav-link collapse" data-toggle="collapse" href="#categorias" aria-expanded="true">
                        <i class="material-icons">category</i>
                        <span>{{ __('Gestionar Categorías') }}
                            <b class="caret"></b>
                        </span>
                    </a>
                @endcan
                <div class="collapse" id="categorias">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'categorias' ? ' active' : '' }}">
                            @can('categorias.index')
                                <a class="nav-link" href="{{ route('categorias.index') }}">
                                    <i class="material-icons">align_horizontal_left</i>
                                    <span class="sidebar-normal">{{ __('Categorías') }} </span>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item{{ $activePage == 'subcategorias' ? ' active' : '' }}">
                            @can('subcategorias.index')
                                <a class="nav-link" href="{{route('subcategorias.index')}}">
                                    <i class="material-icons">list</i>
                                    <span class="sidebar-normal">{{ __('Subcategorías') }} </span>
                                </a>
                            @endcan
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item{{ $activePage == 'pedidos' ? ' active' : '' }}">
                @can('pedidos.index')
                <a class="nav-link" href="#">
                    <i class="material-icons">shopping_cart</i>
                    <span>{{ __('Pedidos') }}</span>
                </a>
                @endcan
            </li>
            <li class="nav-item{{ $activePage == 'reportes' ? ' active' : '' }}">
                @can('reportes.index')
                <a class="nav-link" href="#">
                    <i class="material-icons">query_stats</i>
                    <span>{{ __('Reportes') }}</span>
                </a>
                @endcan
            </li>
            <li class="nav-item {{ ($activePage == 'usuarios' || $activePage == 'clientes'
                                    || $activePage == 'empresas') ? ' active' : '' }}">
                @can('users.index')
                    <a class="nav-link collapse" data-toggle="collapse" href="#usuarios" aria-expanded="true">
                        <i class="material-icons">category</i>
                        <span>{{ __('Gestionar Usuarios') }}
                            <b class="caret"></b>
                        </span>
                    </a>
                @endcan
                <div class="collapse" id="usuarios">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
                            @can('users.index')
                                <a class="nav-link" href="{{ route('users.index') }}">
                                    <i class="material-icons">manage_accounts</i>
                                    <span>{{ __('Usuarios') }}</span>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item{{ $activePage == 'clientes' ? ' active' : '' }}">
                            @can('clientes.index')
                                <a class="nav-link" href="{{ route('clientes.index') }}">
                                    <i class="material-icons">groups</i>
                                    <span>{{ __('Clientes') }}</span>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item{{ $activePage == 'empresas' ? ' active' : '' }}">
                            @can('empresas.index')
                                <a class="nav-link" href="{{ route('empresas.index') }}">
                                    <i class="material-icons">store</i>
                                    <span class="sidebar-normal">{{ __('Empresas') }} </span>
                                </a>
                            @endcan
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
                @can('roles.index')
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <i class="material-icons">admin_panel_settings</i>
                        <span>{{ __('Roles') }}</span>
                    </a>
                @endcan
            </li>
            <li class="nav-item{{ $activePage == 'bitacora' ? ' active' : '' }}">
                @can('bitacora.index')
                    <a class="nav-link" href="#">
                        <i class="material-icons">language</i>
                        <span>{{ __('Bitácora') }}</span>
                    </a>
                @endcan
            </li>
        </ul>
    </div>
</div>

{{--<script>
    let btn = document.querySelector("#minimizeSidebar");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function () {
        sidebar.classList.toggle("active");
    }
</script>--}}
