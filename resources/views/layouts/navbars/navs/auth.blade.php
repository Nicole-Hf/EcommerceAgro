<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
    <div class="container-fluid">
        {{--<div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                    <div class="ripple-container"></div>
                </button>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>--}}
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Buscar...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
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
                @can('carrito.add')
                    <li>
                        <ul class="navbar-nav attr-nav align-items-center">
                            <!--  <li><a href=" https://shopwise.botble.com/customer/overview " class="nav-link"><i
                                        class="linearicons-user"></i></a></li> -->
                            <!--   <li><a href="https://shopwise.botble.com/wishlist" class="nav-link btn-wishlist"><i
                                                class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li> -->
                            <li class="dropdown cart_dropdown">
                                <a class="nav-link cart_trigger btn-shopping-cart" href="#" data-toggle="dropdown">
                                    <i class="linearicons-cart"></i>
                                    <span class="cart_count">
                                        {{  \Cart::getTotalQuantity();}}
                                    </span>
                                </a>
                                <div class="cart_box dropdown-menu dropdown-menu-right">
                                    <p class="text-center">Tu carrito está vacío!</p>
                                    <?php $items = \Cart::getContent();?>
                                    <ul class="cart_list">
                                        @foreach ($items as $item)
                                            <li>
                                                <a href="#" class="item_remove remove-cart-button">
                                                    <i class="ion-close"></i>
                                                </a>
                                                <a href="#">
                                                    <img
                                                        src="{{ asset($_ENV['IMAGEN_PROD_AGRO'].$item->attributes->image ) }}">
                                                    {{$item->name}}
                                                </a>
                                                <span class=" cart_quantity"> {{$item->quantity}} x
                                                    <span class="cart_amount">
                                                        {{$item->price}}
                                                    </span>
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="cart_footer">
                                        <p class="cart_total sub_total">
                                            <strong>Sub Total:</strong>
                                            <span class="cart_price">{{\Cart::getSubTotal()}}</span>
                                        </p>
                                        <p class="cart_total">
                                            <strong>Total:</strong>
                                            <span class="cart_price">{{\Cart::getTotal()}}</span>
                                        </p>
                                        <p class="cart_buttons">
                                            <a href="{{ route('carrito.estado') }}" class="btn btn-fill-line view-cart">
                                                Ver Carrito
                                            </a>
                                            <a href="#" class="btn btn-fill-out checkout">Comprar</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
