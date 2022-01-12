<div>
    <div class="container mt-5 ctl-bg dtl">
        <div class="row">

            <div class="card">
                <div class="table-responsive">

                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col" width="200">Product</th>
                                <th scope="col" width="120">precio</th>
                                <th scope="col" width="120">
                                </th>
                                <th scope="col" width="120">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>
                                    <figure class="itemside align-items-center">
                                        <div class="aside">
                                            <img src="{{ asset($_ENV['IMAGEN_PROD_AGRO'].$item->imagen ) }}"
                                                class="img-sm">
                                        </div>
                                        <figcaption class="info">
                                            <a href="#" class="title text-dark" data-abc="true">
                                                {{$item->nombre}}
                                            </a>
                                        </figcaption>
                                    </figure>
                                </td>

                                <td>
                                    <div class="price-wrap">
                                        <var class="price">
                                            Bs.- {{$item->precio}}
                                        </var>
                                    </div>
                                </td>
                                <!-- añadir a carrito -->
                                <td>
                                    <button
                                        wire:click=" addToCartWish({{ $item->id }},{{$item->producto_id}},'{{$item->nombre}}',{{$item->precio}},'{{$item->imagen}}',{{1}})"
                                        class=" btn btn-light " style="background-color:green">
                                        <i class="icon-basket-loaded"></i>

                                    </button>
                                </td>
                                <!-- ELIMINAR -->
                                <td>
                                    <button class="btn btn-light" wire:click="removeItem({{ $item->id }})">
                                        x
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>