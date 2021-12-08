<div>
    <div class="row box-search">
        <input type="search" style="width:200px;" wire:model="term" class="form-control rounded" placeholder="Search"
            aria-label="Search" aria-describedby="search-addon" />
        <button type="button" style="margin:0;" class="btn btn-outline-primary">search</button>
    </div>

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
                        {{--<a class="btn btn-warning" href="{{ route('ver', $productoD->id) }}">
                        <i class="fa fa-chevron-circle-right"></i>
                        <b class="bg-gradient-warning"> LEER MAS</b>
                        </a>--}}
                    </div>
                    <img src='{{ asset($productoD->imagen) }}' class="img-fluid rounded thumbnail-image"
                        style="height: 200px; width: 200px;display: block;" alt="{{ $productoD->imagen }}">
                    <div class="product_action_box">
                        <ul class="list_none pr_action_btn">
                            <li class="add-to-cart">
                                <form action="{{ route('carrito.add') }}" method="POST" enctype="multipart/form-data">
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
                                        <a href="{{ route('ver', $productoD->id) }}">
                                            {{$productoD->nombre}}
                                        </a>
                                    </h5>
                                    <div class="d-flex flex-column mb-2">
                                        <span class="new-price text-center">
                                            BS.- {{$productoD->precio}}
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
        <div class="row justify-content-center">
            {{ $productos->links() }} </div>
    </div>