@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => '', 'title' => __('AgroShop')])

@section('content')
<div class="container mt-5 ctl-bg dtl">
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


                                <td  style="color:green">
                                   
                                 <button
                                    onclick="window.livewire.emitTo('carrito', 'addTocart','{{$item->id}}','{{$item->name}}','{{$item->price}}','{{$item->attributes->image}}','{{$item->quantity}}')"
                                    class=" btn btn-light" >
                                    add to cart
                                </button>
                                </td>

                                <td >
                                 <form action="{{ route('ListaDeDeseos.eliminar') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="btn btn-light" data-abc="true">
                                            eliminar
                                        </button>
                                    </form>
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
@endsection