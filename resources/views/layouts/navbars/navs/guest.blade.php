<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark fixed-top text-white">
{{--<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">--}}
    <div class="container">
        <div class="navbar-wrapper">
            {{--<a class="navbar-brand" href="{{ route('welcome') }}">{{ $title }}</a>--}}
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('catalogo') }}" class="nav-link">
                        <i class="material-icons">dashboard</i> {{ __('Nuestros Productos') }}
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
                    <a href="{{ route('register') }}" class="nav-link">
                        <i class="material-icons">person_add</i> {{ __('Registro') }}
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
                    <a href="{{ route('login') }}" class="nav-link">
                        <i class="material-icons">fingerprint</i> {{ __('Inicia Sesión') }}
                    </a>
                </li>
                <li>
                    <ul class="navbar-nav attr-nav align-items-center">
                        <!--  <li><a href=" https://shopwise.botble.com/customer/overview " class="nav-link"><i
                                    class="linearicons-user"></i></a></li> -->
                        <!--   <li><a href="https://shopwise.botble.com/wishlist" class="nav-link btn-wishlist"><i
                                            class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li> -->
                        <li class="dropdown cart_dropdown">
                            <a class="nav-link cart_trigger btn-shopping-cart" href="#" data-toggle="dropdown">
                                <i class="linearicons-cart"></i><span class="cart_count">
                                    {{  \Cart::getTotalQuantity();}}
                                </span></a>
                            <div class="cart_box dropdown-menu dropdown-menu-right">
                                <p class="text-center">Tu carrito está vacío!</p>

                                <?php $items = \Cart::getContent();?>
                                <ul class="cart_list">
                                    @foreach ($items as $item)
                                    <li>
                                        <a href="#" class="item_remove remove-cart-button"><i class="ion-close"></i></a>
                                        <a href="#"><img
                                                src="{{asset($_ENV['IMAGEN_PROD_AGRO'].$item->attributes->image ) }}">
                                            {{$item->name}}
                                        </a>
                                        <span class=" cart_quantity"> {{$item->quantity}} x <span class="cart_amount">
                                                {{$item->price}} </span>
                                        </span>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="cart_footer">
                                    <p class="cart_total sub_total"><strong>Sub Total:</strong> <span
                                            class="cart_price">{{\Cart::getSubTotal()}}</span></p>
                                    <p class="cart_total"><strong>Total:</strong> <span
                                            class="cart_price">{{\Cart::getTotal()}}</span></p>
                                    <p class="cart_buttons">
                                        <a href="{{ route('carrito.estado') }}" class="btn btn-fill-line view-cart">Ver
                                            Carrito
                                        </a>
                                        <a href="#" class="btn btn-fill-out checkout">Comprar</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
