@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => '', 'title' => __('AgroShop')])

@section('content')
    <div class="section">
        <div class="container">
            <div class="row catalogo">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm submit-form-on-change"
                                                name="sort-by"
                                                id="sort-by">
                                            <option value="default_sorting">Default</option>
                                            <option value="date_asc">Oldest</option>
                                            <option value="date_desc">Newest</option>
                                            <option value="price_asc">Price: low to high</option>
                                            <option value="price_desc">Price: high to low</option>
                                            <option value="name_asc">Name: A-Z</option>
                                            <option value="name_desc">Name : Z-A</option>
                                            <option value="rating_asc">Rating: low to high</option>
                                            <option value="rating_desc">Rating: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <a href="javascript:void(0);" class="shorting_icon grid active"><i
                                                class="ti-view-grid"></i></a>
                                        <a href="javascript:void(0);" class="shorting_icon list"><i
                                                class="ti-layout-list-thumb"></i></a>
                                    </div>
                                    <div class="custom_select">
                                        <select
                                            class="form-control form-control-sm submit-form-on-change first_null not_chosen"
                                            name="num">
                                            <option value="">Showing</option>
                                            <option value="9">9</option>
                                            <option value="12">12</option>
                                            <option value="18">18</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row shop_container grid">
                        @foreach ($productos as $productoD)
                            <div class="col-md-4 col-6">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="#">
                                            <img src="{{ asset($_ENV['IMAGEN_PROD_AGRO'].$productoD->imagen ) }} "
                                                 alt="">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart">
                                                    <form action="{{ route('carrito.add') }}" method="POST"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{ $productoD->id }}" name="id">
                                                        <input type="hidden" value="{{ $productoD->nombre }}"
                                                               name="nombre">
                                                        <input type="hidden" value="{{ $productoD->precio }}"
                                                               name="precio">
                                                        <input type="hidden" value="{{ $productoD->imagen }}"
                                                               name="imagen">
                                                        <input type="hidden" value="1" name="quantity">
                                                        <button class="add-to-cart-button">
                                                            <i class="icon-basket-loaded"></i> Add To Cart
                                                        </button>
                                                    </form>

                                                </li>
                                                <!--  <li><a href="#" class="js-add-to-compare-button"
                                                        data-url="https://shopwise.botble.com/compare/1"><i
                                                            class="icon-shuffle"></i></a></li>
                                                <li><a href="https://shopwise.botble.com/ajax/quick-view/1" class="popup-ajax"
                                                        rel="nofollow"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a class="js-add-to-wishlist-button" href="#"
                                                        data-url="https://shopwise.botble.com/wishlist/1"><i
                                                            class="icon-heart"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="#">
                                                {{$productoD->nombre}}
                                            </a></h6>
                                        <div class="product_price">
                                            <span class="price">{{$productoD->precio}}</span>
                                        </div>
                                        <!-- <div class="rating_wrap">
                     <div class="rating">
                         <div class="product_rate" style="width: 65.71428%"></div>
                       </div>
                        <span class="rating_num">(7)</span>
                   </div> -->
                                        <!--   <div class="pr_desc">
                       <p></p><p>Short Hooded Coat features a straight body, large pockets with button flaps, ventilation air holes, and a string detail along the hemline.</p><p></p>
                    </div>  -->
                                        <!--   <div class="pr_switch_wrap">
                        <div class="product_color_switch">
                         <span data-color="#87554B" style="background-color: rgb(135, 85, 75);"></span>
                        <span data-color="#5FB7D4" style="background-color: rgb(95, 183, 212);"></span>
                      </div>
                </div> -->
                                        <div class="list_product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a class="add-to-cart-button" data-id="1"
                                                                           href="#"
                                                                           data-url="#"><i
                                                            class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="#" class="js-add-to-compare-button" data-url="#"><i
                                                            class="icon-shuffle"></i></a></li>
                                                <li><a href="#" class="popup-ajax" rel="nofollow"><i
                                                            class="icon-magnifier-add"></i></a></li>
                                                <li><a class="js-add-to-wishlist-button" href="#" data-url="#"><i
                                                            class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-3 justify-content-center pagination_style1">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                        <span class="page-link" aria-hidden="true">‹</span>
                                    </li>
                                    <li class="page-item active" aria-current="page"><span class="page-link">1</span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" rel="next" aria-label="Next »">›</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--    <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <h5 class="widget_title">Product Categories</h5>
                            <ul class="ps-list--categories">
                                <li class="  menu-item-has-children ">
                                    <a href="https://shopwise.botble.com/product-categories/television">Television</a>
                                    <span class="sub-toggle"><i class="icon-angle"></i></span>
                                    <ul class="sub-menu">
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/home-audio-theaters">Home
                                                Audio &amp; Theaters</a>
                                        </li>
                                        <li class=" "><a href="https://shopwise.botble.com/product-categories/tv-videos">TV
                                                &amp;
                                                Videos</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/camera-photos-videos">Camera,
                                                Photos &amp; Videos</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/cellphones-accessories">Cellphones
                                                &amp; Accessories</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/headphones">Headphones</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/videos-games">Videos
                                                games</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/wireless-speakers">Wireless
                                                Speakers</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/office-electronic">Office
                                                Electronic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="  menu-item-has-children ">
                                    <a href="https://shopwise.botble.com/product-categories/mobile">Mobile</a>
                                    <span class="sub-toggle"><i class="icon-angle"></i></span>
                                    <ul class="sub-menu">
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/digital-cables">Digital
                                                Cables</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/audio-video-cables">Audio
                                                &amp; Video Cables</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/batteries">Batteries</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="  menu-item-has-children ">
                                    <a href="https://shopwise.botble.com/product-categories/headphone">Headphone</a>
                                    <span class="sub-toggle"><i class="icon-angle"></i></span>
                                    <ul class="sub-menu">
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/computer-tablets">Computer
                                                &amp; Tablets</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/laptop">Laptop</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/monitors">Monitors</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/computer-components">Computer
                                                Components</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="  menu-item-has-children ">
                                    <a href="https://shopwise.botble.com/product-categories/watches">Watches</a>
                                    <span class="sub-toggle"><i class="icon-angle"></i></span>
                                    <ul class="sub-menu">
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/drive-storages">Drive
                                                &amp; Storages</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/gaming-laptop">Gaming
                                                Laptop</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/security-protection">Security
                                                &amp; Protection</a>
                                        </li>
                                        <li class=" "><a
                                                href="https://shopwise.botble.com/product-categories/accessories">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class=" ">
                                    <a href="https://shopwise.botble.com/product-categories/game">Game</a>
                                </li>
                                <li class=" ">
                                    <a href="https://shopwise.botble.com/product-categories/camera">Camera</a>
                                </li>
                                <li class=" ">
                                    <a href="https://shopwise.botble.com/product-categories/audio">Audio</a>
                                </li>
                                <li class=" ">
                                    <a href="https://shopwise.botble.com/product-categories/mobile-tablet">Mobile &amp;
                                        Tablet</a>
                                </li>
                                <li class=" ">
                                    <a href="https://shopwise.botble.com/product-categories/accessories">Accessories</a>
                                </li>
                                <li class=" ">
                                    <a href="https://shopwise.botble.com/product-categories/home-audio-theater">Home
                                        Audio &amp; Theater</a>
                                </li>
                                <li class=" ">
                                    <a href="https://shopwise.botble.com/product-categories/tv-smart-box">Tv &amp; Smart
                                        Box</a>
                                </li>
                                <li class=" ">
                                    <a href="https://shopwise.botble.com/product-categories/printer">Printer</a>
                                </li>
                                <li class=" ">
                                    <a href="https://shopwise.botble.com/product-categories/computer">Computer</a>
                                </li>
                                <li class=" ">
                                    <a href="https://shopwise.botble.com/product-categories/fax-machine">Fax Machine</a>
                                </li>
                                <li class=" ">
                                    <a href="https://shopwise.botble.com/product-categories/mouse">Mouse</a>
                                </li>
                            </ul>
                        </div>
                        <aside class="widget">
                            <h5 class="widget_title">Brands</h5>
                            <ul class="list_brand">
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox"
                                            name="brands[]" id="brand-1" value="1">
                                        <label class="form-check-label" for="brand-1"><span>Fashion live <span
                                                    class="d-inline-block">(4)</span> </span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox"
                                            name="brands[]" id="brand-2" value="2">
                                        <label class="form-check-label" for="brand-2"><span>Hand crafted <span
                                                    class="d-inline-block">(7)</span> </span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox"
                                            name="brands[]" id="brand-3" value="3">
                                        <label class="form-check-label" for="brand-3"><span>Mestonix <span
                                                    class="d-inline-block">(5)</span> </span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox"
                                            name="brands[]" id="brand-4" value="4">
                                        <label class="form-check-label" for="brand-4"><span>Sunshine <span
                                                    class="d-inline-block">(6)</span> </span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox"
                                            name="brands[]" id="brand-5" value="5">
                                        <label class="form-check-label" for="brand-5"><span>Pure <span
                                                    class="d-inline-block">(2)</span> </span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox"
                                            name="brands[]" id="brand-6" value="6">
                                        <label class="form-check-label" for="brand-6"><span>Anfold <span
                                                    class="d-inline-block">(2)</span> </span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox"
                                            name="brands[]" id="brand-7" value="7">
                                        <label class="form-check-label" for="brand-7"><span>Automotive <span
                                                    class="d-inline-block">(5)</span> </span></label>
                                    </div>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget widget--tags">
                            <h5 class="widget_title">Product Tags</h5>
                            <ul class="list_brand">
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox" name="tags[]"
                                            id="tag-3" value="3">
                                        <label class="form-check-label" for="tag-3"><span>Iphone <span
                                                    class="d-inline-block">(16)</span> </span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox" name="tags[]"
                                            id="tag-1" value="1">
                                        <label class="form-check-label" for="tag-1"><span>Electronic <span
                                                    class="d-inline-block">(14)</span> </span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox" name="tags[]"
                                            id="tag-2" value="2">
                                        <label class="form-check-label" for="tag-2"><span>Mobile <span
                                                    class="d-inline-block">(12)</span> </span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox" name="tags[]"
                                            id="tag-5" value="5">
                                        <label class="form-check-label" for="tag-5"><span>Office <span
                                                    class="d-inline-block">(12)</span> </span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox" name="tags[]"
                                            id="tag-6" value="6">
                                        <label class="form-check-label" for="tag-6"><span>IT <span
                                                    class="d-inline-block">(12)</span> </span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input submit-form-on-change" type="checkbox" name="tags[]"
                                            id="tag-4" value="4">
                                        <label class="form-check-label" for="tag-4"><span>Printer <span
                                                    class="d-inline-block">(10)</span> </span></label>
                                    </div>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget">
                            <h5 class="widget_title">By Price</h5>
                            <div class="filter_price">
                                <div id="price_filter" data-min="0" data-max="1000" data-min-value="0" data-max-value="1000"
                                    data-price-sign="€"
                                    class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"
                                        style="left: 0%; width: 100%;"></div><span tabindex="0"
                                        class="ui-slider-handle ui-corner-all ui-state-default"
                                        style="left: 0%;"></span><span tabindex="0"
                                        class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                                </div>
                                <div data-current-exchange-rate="0.84"></div>
                                <div data-is-prefix-symbol="0"></div>
                                <div class="price_range">
                                    <span>Price: <span id="flt_price">0€ - 840€</span></span>
                                    <input class="product-filter-item product-filter-item-price-0" id="price_first"
                                        name="min_price" value="0" type="hidden">
                                    <input class="product-filter-item product-filter-item-price-1" id="price_second"
                                        name="max_price" value="1000" type="hidden">
                                </div>
                            </div>
                        </aside>
                        <aside class="widget" style="border: none">
                            <div class="visual-swatches-wrapper widget--colors widget-filter-item" data-type="visual">
                                <h4 class="widget__title">By Color</h4>
                                <div class="widget__content">
                                    <div class="attribute-values">
                                        <ul class="visual-swatch color-swatch">
                                            <li data-slug="green" data-toggle="tooltip" data-placement="top" title="Green">
                                                <div class="custom-checkbox">
                                                    <label>
                                                        <input class="form-control product-filter-item" type="checkbox"
                                                            name="attributes[]" value="1">
                                                        <span style="background-color: #5FB7D4;"></span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li data-slug="blue" data-toggle="tooltip" data-placement="top" title="Blue">
                                                <div class="custom-checkbox">
                                                    <label>
                                                        <input class="form-control product-filter-item" type="checkbox"
                                                            name="attributes[]" value="2">
                                                        <span style="background-color: #333333;"></span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li data-slug="red" data-toggle="tooltip" data-placement="top" title="Red">
                                                <div class="custom-checkbox">
                                                    <label>
                                                        <input class="form-control product-filter-item" type="checkbox"
                                                            name="attributes[]" value="3">
                                                        <span style="background-color: #DA323F;"></span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li data-slug="back" data-toggle="tooltip" data-placement="top" title="Black">
                                                <div class="custom-checkbox">
                                                    <label>
                                                        <input class="form-control product-filter-item" type="checkbox"
                                                            name="attributes[]" value="4">
                                                        <span style="background-color: #2F366C;"></span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li data-slug="brown" data-toggle="tooltip" data-placement="top" title="Brown">
                                                <div class="custom-checkbox">
                                                    <label>
                                                        <input class="form-control product-filter-item" type="checkbox"
                                                            name="attributes[]" value="5">
                                                        <span style="background-color: #87554B;"></span>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="text-swatches-wrapper widget-filter-item" data-type="text">
                                <h4 class="widget__title">By Size</h4>
                                <div class="widget-content">
                                    <div class="attribute-values">
                                        <ul class="text-swatch">
                                            <li data-slug="s">
                                                <div>
                                                    <label>
                                                        <input class="product-filter-item" type="checkbox"
                                                            name="attributes[]" value="6">
                                                        <span>S</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li data-slug="m">
                                                <div>
                                                    <label>
                                                        <input class="product-filter-item" type="checkbox"
                                                            name="attributes[]" value="7">
                                                        <span>M</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li data-slug="l">
                                                <div>
                                                    <label>
                                                        <input class="product-filter-item" type="checkbox"
                                                            name="attributes[]" value="8">
                                                        <span>L</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li data-slug="xl">
                                                <div>
                                                    <label>
                                                        <input class="product-filter-item" type="checkbox"
                                                            name="attributes[]" value="9">
                                                        <span>XL</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li data-slug="xxl">
                                                <div>
                                                    <label>
                                                        <input class="product-filter-item" type="checkbox"
                                                            name="attributes[]" value="10">
                                                        <span>XXL</span>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
@endsection
