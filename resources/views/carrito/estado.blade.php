@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => '', 'title' => __('AgroShop')])

@section('content')
<div class="container mt-5 ctl-bg dtl">
    <div class="row">
        <aside class="col-lg-9">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Precio</th>
                                <th scope="col" width="120">Cantidad</th>
                                <th scope="col" width="120">Total</th>
                                <th scope="col" width="120">Eliminar</th>
                                <th scope="col" class="text-right d-none d-md-block" width="30"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>
                                    <figure class="itemside align-items-center">
                                        <div class="aside">
                                            <img src="{{ asset($_ENV['IMAGEN_PROD_AGRO'].$item->attributes->image ) }}"
                                                class="img-sm">
                                        </div>
                                        <figcaption class="info">
                                            <a href="#" class="title text-dark" data-abc="true">
                                                {{$item->name}}
                                            </a>
                                        </figcaption>
                                    </figure>
                                </td>

                                <td>
                                    <div class="price-wrap">
                                        <var class="price">
                                            Bs.- {{$item->price}}
                                        </var>
                                        <!--  <small class="text-muted"> $9.20 each </small> -->
                                    </div>
                                </td>
                                <td>
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
                                        <input type="text" value=" {{$item->quantity}}" title="Qty" class="form-control"
                                            size="4" name="items[e2aab0e2b7e45be057e0c70f299bace9][values][qty]">

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
                                <td>
                                    <div class="total-wrap">
                                        <var class="total">
                                            Bs.- {{$item->getPriceSum()}}
                                        </var>
                                        <!--  <small class="text-muted"> $9.20 each </small> -->
                                    </div>
                                </td>

                                <td class="text-right d-none d-md-block">
                                    <!-- <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light"
                                        data-toggle="tooltip" data-abc="true">
                                        <i class="fa fa-heart"></i>
                                    </a> -->

                                    <form action="{{ route('carrito.eliminar') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn btn-light" data-abc="true">
                                            Remove
                                        </button>
                                    </form>

                                    <!--  <a href="" class="btn btn-light" data-abc="true">
                                        Remove
                                    </a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </aside>
        <aside class="col-lg-3">
            <!-- <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group"> <label>Have coupon?</label>
                                <div class="input-group"> <input type="text" class="form-control coupon" name="" placeholder="Coupon code"> <span class="input-group-append"> <button class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
                            </div>
                        </form>
                    </div>
                </div> -->
            <div class="card">
                <div class="card-body">
                    <!-- <dl class="dlist-align">
                        <dt>Total precio:</dt>
                        <dd class="text-right ml-3">Bs.- 69.97</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>descuento:</dt>
                        <dd class="text-right text-danger ml-3">- Bs.- 10.00</dd>
                    </dl> -->
                    <dl class="dlist-align">
                        <dt>Total:</dt>
                        <dd class="text-right text-dark b ml-3">
                            <strong>
                                Bs.- {{\Cart::getTotal()}}
                            </strong>
                        </dd>
                    </dl>
                    <hr>
                    <a href="#" class="btn btn-out btn-primary btn-square btn-main" data-abc="true">
                        Realizar Compra
                    </a>
                    <!--    <a href="#" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">
                        Continue Shopping
                    </a> -->
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection