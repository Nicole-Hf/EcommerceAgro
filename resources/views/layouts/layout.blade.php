<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('AgroShop') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
   
   
    <!-- boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" 
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>
    
    <!-- CSS Files -->
    <!--     <link href="{{ asset('css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" /> -->
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/linearicons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">

    @livewireStyles
</head>

<body class="{{ $class ?? '' }}">
    <header class="header_wrap fixed-top header_with_topbar">
        <div class="bottom_header light_skin main_menu_uppercase bg_dark ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-4">
                        <a class="navbar-brand" href="https://shopwise.botble.com">
                            <img src="https://shopwise.botble.com/storage/general/logo-light.png"
                                alt="Shopwise - Laravel Ecommerce system">
                        </a>

                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-6 col-8">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSidetoggle" aria-expanded="false">
                                <span class="ion-android-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                                <ul class="navbar-nav">
                                    <li>
                                        <a class=" nav-link nav_item " href="{{url('/')}}">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a class=" nav-link nav_item " href="{{url('/')}}">
                                            Products
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <ul class="navbar-nav attr-nav align-items-center">
                                <li><a href=" https://shopwise.botble.com/customer/overview " class="nav-link"><i
                                            class="linearicons-user"></i></a></li>
                                <!--   <li><a href="https://shopwise.botble.com/wishlist" class="nav-link btn-wishlist"><i
                                            class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li> -->
                                <li class="dropdown cart_dropdown">
                                    <a class="nav-link cart_trigger btn-shopping-cart" href="#"
                                        data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">
                                            {{  \Cart::getTotalQuantity();}}
                                        </span></a>
                                    <div class="cart_box dropdown-menu dropdown-menu-right">
                                        <p class="text-center">Your cart is empty!</p>

                                        <?php $items = \Cart::getContent();?>
                                        <ul class="cart_list">
                                            @foreach ($items as $item)
                                            <li>
                                                <a href="https://shopwise.botble.com/cart/remove/f61659b46aaaf0af6c248bb3dec2b63b"
                                                    class="item_remove remove-cart-button"><i class="ion-close"></i></a>
                                                <a href="#"><img
                                                        src="{{asset($_ENV['IMAGEN_PROD_AGRO'].$item->attributes->image ) }}">
                                                    {{$item->name}}
                                                </a>
                                                <span class=" cart_quantity"> {{$item->quantity}} x <span
                                                        class="cart_amount">
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
                                                <a href="{{ route('carrito.estado') }}"
                                                    class="btn btn-fill-line view-cart">Ver Carrito
                                                </a>
                                                <a href="https://shopwise.botble.com/checkout/c04cfceb53d0c7ebf8cb44ed2d256c0e"
                                                    class="btn btn-fill-out checkout">Checkout</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="pr_search_icon">
                                <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i
                                        class="linearicons-magnifier"></i></a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @include('layouts.page_templates.auth')
    @endauth

    @guest()
    @yield('content')
    @endguest
    @livewireScripts

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
     integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>