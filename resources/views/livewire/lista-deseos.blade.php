<div>

    <a href="{{ route('Catalogo.ListaDeDeseos') }}" class="nav-link cart_trigger btn-shopping-cart"><i
            class="linearicons-heart"></i><span class="wishlist_count">
            {{app('wishlist')->getTotalQuantity();}}</span></a>

</div>