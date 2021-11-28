@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => '', 'title' => __('AgroShop')])

@section('content')


<!-- <div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>AgroShop</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope=""
                        itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="1">
                        <a href="https://shopwise.botble.com" itemprop="item" title="Home">
                            Home
                            <meta itemprop="name" content="Home">
                        </a>
                    </li>
                    <li class="breadcrumb-item active">AgroShop</li>
                </ol>
            </div>
        </div>
    </div>
</div> -->

<div class="section">
    <div class="container">
        <!--       <form class="form--shopping-cart" method="post" action="javascript:void(0);"> -->
        <input type="hidden" name="_token" value="J6koTs6uk1YiqqprBhcilmFsjelUTZClSF1NieIZ">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Imagen</th>
                                <th class="product-name">Producto</th>
                                <th class="product-price">Precio</th>
                                <th class="product-quantity">Cantidad</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="#">
                                        {{--<img src="{{ asset($_ENV['IMAGEN_PROD_AGRO'].$item->attributes->image ) }}">--}}
                                        <img src="{{ asset($item->attributes->image ) }}">
                                    </a>
                                </td>
                                <td class="product-name" data-title="Product">
                                    <a href="#" title="Headphone Ultra Bass"> {{$item->name}}</a>
                                </td>
                                <td class="product-price" data-title="Price">
                                    <div class="product__price ">
                                        <span> {{$item->price}} </span>
                                    </div>
                                    <input type="hidden" name="items[e2aab0e2b7e45be057e0c70f299bace9][rowId]"
                                        value="e2aab0e2b7e45be057e0c70f299bace9">
                                </td>

                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">

                                        <form action="{{ route('carrito.updateItem') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <input type="hidden" value="{{ $item->name }}" name="nombre">
                                            <input type="hidden" value="{{ $item->price }}" name="precio">
                                            <!--    <input type="hidden" value="{{ $item->image }}" name="imagen"> -->
                                            <input type="hidden" value="-1" name="quantity">
                                            <button value="-" class="minus"> - </button>
                                        </form>
                                        <input type="text" value=" {{$item->quantity}}" title="Qty" class="qty" size="4"
                                            name="items[e2aab0e2b7e45be057e0c70f299bace9][values][qty]">

                                        <form action="{{ route('carrito.updateItem') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <input type="hidden" value="{{ $item->name }}" name="nombre">
                                            <input type="hidden" value="{{ $item->price }}" name="precio">
                                            <!--    <input type="hidden" value="{{ $item->image }}" name="imagen"> -->
                                            <input type="hidden" value="1" name="quantity">
                                            <button value="+" class="plus"> + </button>
                                        </form>

                                    </div>
                                </td>
                                <td class="product-subtotal" data-title="Total"> {{$item->getPriceSum()}} </td>
                                <td class="product-remove" data-title="Remove">

                                    <form action="{{ route('carrito.eliminar') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="remove-cart-button"><i class="ti-close"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <!--  <td colspan="6" class="px-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                                <div class="coupon field_form input-group form-coupon-wrapper">
                                                    <input type="text" name="coupon_code" value=""
                                                        class="form-control form-control-sm coupon-code"
                                                        placeholder="Enter Coupon Code...">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-fill-out btn-sm btn-apply-coupon-code"
                                                            type="button"
                                                            data-url="https://shopwise.botble.com/coupon/apply">Apply
                                                            Coupon</button>
                                                    </div>
                                                </div>
                                                <div class="coupon-error-msg text-left">
                                                    <small><span class="text-danger"></span></small>
                                                </div>
                                            </div>
                                        </div>
                                    </td> -->
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="medium_divider"></div>
                <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>Cart Totals</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>


                                <tr>
                                    <td class="cart_total_label">Total (no incluye envios)</td>
                                    <td class="cart_total_amount"><strong>{{\Cart::getTotal()}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-fill-out" name="checkout">Proceder compra</button>
                </div>
            </div>
        </div>
        <!--       </form> -->

    </div>
</div>

@endsection
