<div>
    <div class="row">
        <aside class="col-lg-9">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Precio</th>
                                <th scope="col" width="150">Cantidad</th>
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
                                            <img src="{{ asset($item->imagen ) }}" class="img-sm">
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
                                <td>
                                    <div
                                        class="quantity d-grid gap-2 d-md-flex justify-content-md-center align-items-md-center">
                                        <!-- DECREMENTAR PRODUCTO AL CARRITO -->
                                        <button value="-" class="minus"
                                            wire:click="removeItemProd({{$item->id}},{{-1}},{{$item->precio}})">
                                            <span>-</span> </button>

                                        <input type="text" id="input-{{$item->id}}" value=" {{$item->cantidad}}"
                                            title="Qty" class="form-control" size="4"
                                            name="items[e2aab0e2b7e45be057e0c70f299bace9][values][qty]" readonly>
                                        <!-- INCREMENTAR PRODUCTO AL CARRITO -->
                                        <button value="+" class="plus"
                                            wire:click="addItem({{$item->id}},{{1}},{{$item->precio}})">
                                            <span>+</span> </button>

                                    </div>
                                </td>
                                <td>
                                    <!-- subtotal de cada producto -->
                                    <div class=" total-wrap">
                                        <var class="total">
                                            Bs.- {{$item->subtotal}}
                                        </var>

                                    </div>
                                </td>

                                <td class="text-right d-none d-md-block">


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
        </aside>
        <aside class="col-lg-3">
            <div class="card">
                <div class="card-body">

                    <dl class="dlist-align">
                        <dt>Total:</dt>
                        <dd class="text-right text-dark b ml-3">
                            <strong>
                                Bs.- {{$total}}
                            </strong>
                        </dd>
                    </dl>
                    <hr>
                    <a href="{{route('pedido.index',$item->carrito_id)}}"
                        class="btn btn-out btn-primary btn-square btn-main" data-abc="true">
                        Realizar Compra
                    </a>
                    </hr>
                </div>
            </div>
        </aside>
    </div>
    <script>
    window.addEventListener('input-cantidad', event => {
        const ele = document.querySelector('#input-' + event.detail.id);
        ele.value = event.detail.cantidad;
    });
    window.addEventListener('inputDec-cantidad', event => {
        const ele = document.querySelector('#input-' + event.detail.id);
        ele.value = event.detail.cantidad;
    });
    </script>
</div>