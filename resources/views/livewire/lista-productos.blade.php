<div>
    <div class="row box-search">
     <input type="search" style="width:200px;" wire:model="term" class="form-control rounded" placeholder="Search"
            aria-label="Search" aria-describedby="search-addon" />
     <button type="button" style="margin:0;" class="btn btn-outline-primary">search</button> 
     <div class="mx-auto" style="width: 750px;">
        
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                CATEGORIAS
              </button>
             
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                
                <div>
                <a class="dropdown-item" href="{{ route('mostrar', '1') }}">Nutricion Animal</a>
                <a class="dropdown-item" href="{{ route('mostrar', '2') }}">Semillas de Sorgo</a>
                <a class="dropdown-item" href="{{ route('mostrar', '3') }}">Sanidad Animal</a>
                <a class="dropdown-item" href="{{ route('mostrar', '4') }}">Semillas de Pasto</a>
                <a class="dropdown-item" href="{{ route('mostrar', '5') }}">Semillas de Maiz</a>
                </div>
                  
              </div>
            </div>
          </div>
   </div>
    </div>
    <div class="row">
        @foreach ($productos as $productoD)
        <div class="col-md-3">
            <div class="card">
                <div class="image-container">
                    <div class="first">

                        <div class="d-flex justify-content-between align-items-center">
                            <?php
                            $data = array(
                                "id" => $productoD->id,
                                "nombre" =>  $productoD->nombre,
                                "precio" => $productoD->precio,
                                "imagen" =>  $productoD->imagen,
                                "quantity" => "1"
                            );
                            /* añadir a lista de deseo */
                            ?>
                            <button id="inputwish-{{$productoD->id}}" value=""
                                wire:click="$emitTo('lista-deseos', 'addToWishList','{{$productoD->id}}','{{$productoD->nombre}}','{{$productoD->precio}}','{{$productoD->imagen}}','{{1}}')"
                                class=" wishlist {{ empty( $wishlistproductos)? '': ($wishlistproductos->contains('producto_id',$productoD->id)?'wishlist-visite':'')}}">
                                <i class="fa fa-heart-o"></i>
                            </button>
                        </div>

                    </div>
                    <img src='{{ asset($productoD->imagen) }}' class="img-fluid rounded thumbnail-image"
                        style="height: 200px; width: 200px;display: block;" alt="{{ $productoD->imagen }}">
                    <div class="product_action_box">
                        <ul class="list_none pr_action_btn">
                            <li class="add-to-cart">

                                <!-- añadir a carrito -->

                                <button
                                    wire:click="$emitTo('carrito', 'addTocart','{{$productoD->id}}','{{$productoD->nombre}}','{{$productoD->precio}}','{{$productoD->imagen}}','{{1}}')"
                                    class=" add-to-cart-button wishlist">
                                    <i class="icon-basket-loaded"></i>
                                </button>

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
            {{ $productos->links() }}
        </div>

        <script>
        window.addEventListener('input-wishlist', event => {
            const ele = document.querySelector('#inputwish-' + event.detail.id);
            ele.classList.toggle("wishlist-visite");
        });
        </script>
    </div>
