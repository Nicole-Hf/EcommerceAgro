@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => '', 'title' => __('AgroShop')])

@section('content')
    <div class="container mt-5 ctl-bg ctl">
        <div class="row">
            @foreach ($productos as $productoD)
                <div class="col-md-3">
                    <div class="card">
                        <div class="image-container">
                            <div class="first">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="wishlist">
                                        <i class="fa fa-heart-o"></i>
                                    </span>
                                </div>
                            </div>
                            <img src='{{ asset($productoD->imagen) }}' class="img-fluid rounded thumbnail-image">
                            <div class="product_action_box">
                                <ul class="list_none pr_action_btn">
                                    <li class="add-to-cart">
                                        <form action="{{ route('carrito.add') }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $productoD->id }}" name="id">
                                            <input type="hidden" value="{{ $productoD->nombre }}" name="nombre">
                                            <input type="hidden" value="{{ $productoD->precio }}" name="precio">
                                            <input type="hidden" value="{{ $productoD->imagen }}" name="imagen">
                                            <input type="hidden" value="1" name="quantity">
                                            <button class="add-to-cart-button wishlist">
                                                <i class="icon-basket-loaded"></i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{--<div class="row shop_container grid">
                            {{--@foreach ($productos as $productoD)--}}
                            {{--<div class="col-md-4 col-6">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="#">
                                            <img
                                                 src="{{ asset( $productoD->imagen) }}"
                                                 alt="...">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart">--}}
                                                    <div class="product-detail-container p-2">
                                                        <div class="justify-content-between align-items-center">
                                                            <h5 class="dress-name">
                                                                <a href="#">
                                                                    {{$productoD->nombre}}
                                                                </a>
                                                            </h5>
                                                            <div class="d-flex flex-column mb-2">
                                                                    <span
                                                                        class="new-price">BS.- {{$productoD->precio}}
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                {{--</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--@endforeach--}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
