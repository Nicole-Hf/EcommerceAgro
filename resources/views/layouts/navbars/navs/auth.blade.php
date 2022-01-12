<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            {{ __('Account') }}
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-white" aria-labelledby="navbarDropdownProfile">
                        @can('users.edit')
                        <a class="dropdown-item"
                            href="{{ route('users.edit', auth()->user()->id) }}">{{ __('Editar Perfil') }}</a>
                        @endcan
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                    </div>
                </li>
                <!-- Lista de deseo -->
                @can('carrito.add')
                <li>
                    <livewire:lista-deseos />
                </li>
                @endcan

                @can('carrito.add')
                <li>
                    <livewire:carrito />
                </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
