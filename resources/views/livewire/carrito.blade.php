<div>
    <ul class="navbar-nav attr-nav align-items-center">
        <!--  <li><a href=" https://shopwise.botble.com/customer/overview " class="nav-link"><i
                                        class="linearicons-user"></i></a></li> -->
        <!--   <li><a href="https://shopwise.botble.com/wishlist" class="nav-link btn-wishlist"><i
                                                class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li> -->
        <li class="dropdown cart_dropdown">
            <a class="nav-link cart_trigger btn-shopping-cart" href="#" data-toggle="dropdown">
                <i class="linearicons-cart"></i>
                <span class="cart_count">
                    {{ \Cart::getTotalQuantity();}}
                </span>
            </a>
            <div class="cart_box dropdown-menu dropdown-menu-right">
                <p class="text-center">Tu carrito está vacío!</p>
                <?php $items = \Cart::getContent(); ?>
                <ul class="cart_list">
                    @foreach ($items as $item)
                    <li>
                        <a href="#" class="item_remove remove-cart-button">
                            <i class="ion-close"></i>
                        </a>
                        <a href="#">
                            <img src="{{ asset($_ENV['IMAGEN_PROD_AGRO'].$item->attributes->image ) }}">
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
</div>