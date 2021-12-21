<div class="sidebar" data-color="green" data-background-color="black"
     data-image="{{ asset('img/sidebaragro2.jpg') }}" aria-labelledby="minimizeSidebar">

    <div class="logo">
        @can('productos.index')
            <a href="#" class="simple-text logo-normal">
                {{ __('AgroShop') }}
            </a>
        @endcan
        @can('catalogo')
            <a href="{{ route('catalogo') }}" class="simple-text logo-normal">
                {{ __('AgroShop') }}
            </a>
        @endcan
        {{--<button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
        </button>--}}
    </div>

    <div class="sidebar-wrapper ps-container ps-active-y">
        <ul class="nav">
            {{--INICIO--}}
            <li class="nav-item{{ $activePage == 'home' ? ' active' : '' }}">
                @if (auth()->user()->role_id == '1')
                    <a class="nav-link" href="{{ route('home.admin') }}">
                        <i class="material-icons">home</i>
                        <span>{{ __('Inicio') }}</span>
                    </a>
                @elseif(auth()->user()->role_id == '2')
                    <a class="nav-link" href="{{ route('catalogo') }}">
                        <i class="material-icons">home</i>
                        <span>{{ __('Inicio') }}</span>
                    </a>
                @else
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="material-icons">home</i>
                        <span>{{ __('Inicio') }}</span>
                    </a>
                @endif
            </li>
            {{--PRODUCTOS--}}
            <li class="nav-item{{ $activePage == 'productos' ? ' active' : '' }}">
                @if (auth()->user()->role_id == '1')
                    <a class="nav-link" href="{{route('productos.indexAdmin')}}">
                        <i class="material-icons">style</i>
                        <span class="sidebar-normal">{{ __('Productos') }} </span>
                    </a>
                @elseif(auth()->user()->role_id =='3')
                    @if(auth()->user()->id == auth()->user()->empresa()->pluck('user_id')->first())
                        @can('productos.index')
                            <a class="nav-link" href="{{route('productos.index')}}">
                                <i class="material-icons">style</i>
                                <span class="sidebar-normal">{{ __('Productos') }} </span>
                            </a>
                        @endcan
                    @else
                        <a class="nav-link" href="{{route('empresas.create')}}">
                            <i class="material-icons">style</i>
                            <span class="sidebar-normal">{{ __('Productos') }} </span>
                        </a>
                    @endif
                @endif
            </li>

            {{--CATEGORIAS--}}
            <li class="nav-item{{ ($activePage == 'categoria' || $activePage == 'subcategoria') ? ' active' : '' }}">
                @can('categorias.index')
                    <a class="nav-link nav-collapse-hide-child" data-toggle="collapse" href="#categoria"
                       aria-expanded="true">
                        <i class="material-icons">category</i>
                        <span>{{ __('Categoría') }}
                            <b class="caret"></b>
                        </span>
                    </a>
                @endcan
                <div class="collapse" id="categoria">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'categoria' ? ' active' : '' }}">
                            @can('categorias.index')
                                <a class="nav-link" href="{{ route('categorias.index') }}">
                                    <i class="material-icons">align_horizontal_left</i>
                                    <span class="sidebar-normal">{{ __('Categorías') }} </span>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item{{ $activePage == 'subcategoria' ? ' active' : '' }}">
                            @can('categorias.index')
                                <a class="nav-link" href="{{route('subcategorias.index')}}">
                                    <i class="material-icons">list</i>
                                    <span class="sidebar-normal">{{ __('Subcategorías') }} </span>
                                </a>
                            @endcan
                        </li>
                    </ul>
                </div>
            </li>

            {{--PEDIDOS--}}
            <li class="nav-item{{ $activePage == 'pedidos' ? ' active' : '' }}">
                @can('pedidos.index')
                    <a class="nav-link" href="#">
                        <i class="material-icons">shopping_cart</i>
                        <span>{{ __('Pedidos') }}</span>
                    </a>
                @endcan
            </li>

                {{--Facturas--}}

                <li class="nav-item{{ $activePage == 'facturas' ? ' active' : '' }}">
                   @if (auth()->user()->role_id == 2)
                   <a class="nav-link" href="{{route('facturas.show')}}">
                    <i class="material-icons">description</i>
                    <span>{{ __('Facturas') }}</span>
                </a>
                   @endif
                       
                    
                </li>
            
            {{--REPORTES--}}
            <li class="nav-item{{ $activePage == 'reportes' ? ' active' : '' }}">
                @can('reportes.index')
                    <a class="nav-link" href="#">
                        <i class="material-icons">query_stats</i>
                        <span>{{ __('Reportes') }}</span>
                    </a>
                @endcan
            </li>

            {{--USUARIO--}}
            <li class="nav-item{{ ($activePage == 'usuario' || $activePage == 'clientes'
                                                            || $activePage == 'empresas') ? ' active' : '' }}">
                @can('users.index')
                    <a class="nav-link nav-collapse-hide-child" data-toggle="collapse" href="#usuario"
                       aria-expanded="true">
                        <i class="material-icons">supervised_user_circle</i>
                        <span>{{ __('Usuarios') }}
                            <b class="caret"></b>
                        </span>
                    </a>
                @endcan
                <div class="collapse" id="usuario">
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

            {{--ROLES--}}
            <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
                @can('roles.index')
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <i class="material-icons">admin_panel_settings</i>
                        <span>{{ __('Roles') }}</span>
                    </a>
                @endcan
            </li>

            {{--BITACORA--}}
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
