<?php
use App\Models\backend\ProductItem; ?>

@extends($data->layout, [
'title' => $data['title'],
"seo_title" => $data['seo_title'],
'og_image' => $data['og_image'],
'og_url' => $data['og_url'],
'seo_description' => $data['seo_description'],
'seo_keywords' => $data['seo_keywords'],
'product_detail' => $data['product_detail']
])

@section('title')
    {{ $data->title }}
@endsection

@section($data->content)
    @php
    $product_detail = $data['product_detail'];
    $category = $data['category'];

    $related_products = $data['related_products'];
    $related_posts = $data['related_posts'];
    $view_product = $data['viewed_product'];

    $list_product = ProductItem::where('product_id',$product_detail->id)->get();
    $item_frist = $list_product[0];

    $material = $data['materials'];
    $list_endows = $data['list_endows'];

    $images = json_decode( $product_detail->images );
    $title_image = json_decode( $product_detail->title_image );
    $alt_image = json_decode( $product_detail->alt_image );

    $footer_contact_info = !empty( $footers->footer_contact_info ) ? json_decode( $footers->footer_contact_info ) : [];
    @endphp

    {{-- @include('frontend.includes.breadcrumb-detail')

    <div class="ereaders-main-content ereaders-content-padding">

        <div class="ereaders-main-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ereaders-shop-detail">
                            <div class="row">
                                <div class="col-md-6">
                                    @if ($images && count($images) > 0)
                                        <div class="ereaders-shop-thumb">
                                            @foreach ($images as $key => $item)
                                                <div class="ereaders-images-thumb-layer index-{{ $key }}">
                                                    <span><small>Sale</small><img src="{{ $item }}"
                                                            alt="{{ $alt_image[$key] }}"
                                                            title="{{ $title_image[$key] }}"></span></div>
                                            @endforeach
                                        </div>
                                        <div class="ereaders-shop-thumb-list">
                                            @foreach ($images as $key => $item)
                                                <div class="ereaders-images-list-layer"><span><img src="{{ $item }}"
                                                            alt="{{ $alt_image[$key] }}"
                                                            title="{{ $title_image[$key] }}"></span></div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 area-info-product-detail">
                                    <div class="ereaders-detail-thumb-text">
                                        <h3>{{ $product_detail->title }}</h3>
                                        <div class="product-code">
                                            <h4>{{ $product_detail->code }}</h4>
                                        </div>
                                        <div class="star-rating">
                                            {!! rating_star($product_detail->rating) !!}
                                        </div>
                                        <label>
                                            <span><i class="fa fa-eye" aria-hidden="true"></i>
                                                {{ $product_detail->view }}</span>
                                            <span><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                {{ $product_detail->bought }}</span>
                                        </label>
                                        <div class="clearfix"></div>
                                        <span>
                                            <p id="price_buy">
                                                {{ number_format($item_frist->price_promotion, 0, '.', '.') . ' đ' }}</p>
                                            <del>
                                                <p id="price_promotion">
                                                    {{ number_format($item_frist->price_buy, 0, '.', '.') . ' đ' }}</p>
                                            </del>
                                        </span>
                                        {!! $product_detail->short_description !!}

                                        <div class="list-item ereaders-detail-option">
                                            @foreach ($list_product as $key => $item)
                                                <div class="item" data-id-item="{{ $item->id }}">
                                                    <label>
                                                        <span>
                                                            @if ($item->material)
                                                                {{ $material[$item->material] }}
                                                            @endif
                                                        </span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="ereaders-number-select">
                                            <div class="product-action product-add-to-card">
                                                <input class="cart-plus-minus-box" type="number" name="quantity" value="1"
                                                    min="1" data-id="{{ $item_frist->id }}">
                                                <button>Thêm vào giỏ hàng</button>
                                                <button data-type="fast">Mua nhanh</button>
                                            </div>
                                        </div>
                                        <div class="ereaders-map-hotline">
                                            <a href="{{ route('contact') . '/#google-map' }}">
                                                <img src="{{ asset('storage/files/1/Logo/chi-duong.jpg') }}">
                                            </a>
                                            <a href="tel:{{ $footer_contact_info[3] }}" target="_blank" title="Hotline">
                                                <img src="{{ asset('storage/files/1/Logo/hotline.jpg') }}">
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2 area-related-post">
                                    @if ($related_posts && count($related_posts) > 0)
                                        <div class="widget widget_popular_post widget_border">
                                            <ul>
                                                @foreach ($related_posts as $key => $post)
                                                    <li>
                                                        <img src="{{ $post->images }}" title="{{ $post->title_image }}"
                                                            alt="{{ $post->alt_image }}">
                                                        <h6><a href="{{ url($post->alias) }}">{{ $post->title }}</a></h6>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-endow">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @if (!empty($list_endows) && count($list_endows) > 0)
                                <div class="ereaders-service ereaders-service-grid">
                                    <ul class="row">
                                        @foreach ($list_endows as $key => $endow)
                                            <li class="col-md-4">
                                                <div class="ereaders-service-grid-text">
                                                    {!! $endow->icon !!}
                                                    <h5><a href="#">{{ $endow->name }}</a></h5>
                                                    {!! substr($endow->description, 0, 160) !!}
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ereaders-shop-tabs">
                            <h3 class="ereaders-section-heading">Mô Tả Sản Phẩm</h3>
                            <div class="ereaders-shop-description">
                                {!! $product_detail->description !!}
                            </div>
                        </div>
                        @include('frontend.includes.comment')
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if (!empty($related_products) && count($related_products) > 0)
                            <div class="col-md-12">
                                <div class="ereaders-shop ereaders-shop-grid">
                                    <h3 class="ereaders-section-heading">Sản Phẩm Liên Quan</h3>
                                    <ul class="row">
                                        {!! render_products($related_products) !!}
                                    </ul>
                                </div>
                            </div>
                        @endif

                        @if (!empty($related_posts) && count($related_posts) > 0)
                            <h3 class="ereaders-section-heading">Bài Viết Liên Quan</h3>
                            <div class="ereaders-blog ereaders-shop-grid">
                                <ul class="row">
                                    {!! render_posts($related_posts) !!}
                                </ul>
                            </div>
                        @endif

                        @if (!empty($view_product) && count($view_product) > 0)
                            <div class="col-md-12">
                                <div class="ereaders-shop ereaders-shop-grid">
                                    <h3 class="ereaders-section-heading">Sản Phẩm Đã Xem</h3>
                                    <ul class="row">
                                        {!! render_products($view_product) !!}
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
    <div id="show-image-product" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <i class="fa fa-times close" aria-hidden="true"></i>

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @if ($images && count($images) > 0)
                            @foreach ($images as $key => $item)
                                <div class="item <beautify start=" @if " exp=" ^^^$key==0^^^"> active
                            @endif">
                            <img src="{{ $item }}" alt="{{ $alt_image[$key] }}" title="{{ $title_image[$key] }}">
                    </div>
                    @endforeach
                    @endif
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>

            </div>

        </div>
    </div>
    </div> --}}




    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.14/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.14/dist/css/splide.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <style>
        .page-title .entry-title-main { display: none !important; }
    </style>

    <div class="main-content-inner left-sidebar">
        <div class="main-content">
            <div class="main-content-inner-full single-product-full">
                <div id="primary" class="content-area">
                    <main id="content" class="site-main">
                        <nav class="woocommerce-breadcrumb">
                            <span><a href="{{ url('/') }}">Trang chủ</a></span> /
                            <span><a href="{{ url( $data['category']->alias ) }}">{{ $data['category']->title }}</a></span> /
                            <span>{{ $data['title'] }}</span></nav>
                        <div class="woocommerce-notices-wrapper"></div>
                        <div id="product-1364"
                            class="has-post-thumbnail product type-product post-1364 status-publish first instock product_cat-awabox-fullerm product_cat-coffee-board product_cat-excelscoffee product_cat-machines product_cat-milk-items product_cat-oxfull-mitron product_cat-varieties featured shipping-taxable purchasable product-type-simple">
                            
                            {{-- <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                data-columns="4" style="opacity: 1; transition: opacity 0.25s ease-in-out 0s;"><a href="#"
                                    class="woocommerce-product-gallery__trigger">🔍</a>
                                <div class="flex-viewport" style="overflow: hidden; position: relative; height: 684px;">
                                    <figure class="woocommerce-product-gallery__wrapper"
                                        style="width: 1400%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-100x100.jpg"
                                            data-thumb-alt="" class="woocommerce-product-gallery__image flex-active-slide"
                                            style="width: 528px; float: left; display: block; position: relative; overflow: hidden;"><a
                                                href="../../wp-content/uploads/2019/12/16.jpg"><img width="528" height="684"
                                                    src="../../wp-content/uploads/2019/12/16-528x684.jpg" class="wp-post-image" alt="" title="16"
                                                    data-caption=""
                                                    data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg"
                                                    data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg"
                                                    data-large_image_width="772" data-large_image_height="1000"
                                                    srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-10x13.jpg 10w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg 772w"
                                                    sizes="(max-width: 528px) 100vw, 528px" draggable="false"></a><img role="presentation" alt=""
                                                src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg"
                                                class="zoomImg"
                                                style="position: absolute; top: -47.5848px; left: -199.405px; opacity: 0; width: 772px; height: 1000px; border: none; max-width: none; max-height: none;">
                                        </div><span class="onsale">-13%</span>
                                        <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-100x100.jpg"
                                            data-thumb-alt="" class="woocommerce-product-gallery__image"
                                            style="width: 528px; float: left; display: block;"><a href="../../wp-content/uploads/2019/12/6.jpg"><img
                                                    width="528" height="684" src="../../wp-content/uploads/2019/12/6-528x684.jpg" class="" alt=""
                                                    title="6" data-caption=""
                                                    data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6.jpg"
                                                    data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6.jpg"
                                                    data-large_image_width="772" data-large_image_height="1000"
                                                    srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6.jpg 772w"
                                                    sizes="(max-width: 528px) 100vw, 528px" draggable="false"></a></div>
                                        <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-100x100.jpg"
                                            data-thumb-alt="" class="woocommerce-product-gallery__image"
                                            style="width: 528px; float: left; display: block;"><a
                                                href="../../wp-content/uploads/2019/12/15.jpg"><img width="528" height="684"
                                                    src="../../wp-content/uploads/2019/12/15-528x684.jpg" class="" alt="" title="15" data-caption=""
                                                    data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15.jpg"
                                                    data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15.jpg"
                                                    data-large_image_width="772" data-large_image_height="1000"
                                                    srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15.jpg 772w"
                                                    sizes="(max-width: 528px) 100vw, 528px" draggable="false"></a></div>
                                        <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-100x100.jpg"
                                            data-thumb-alt="" class="woocommerce-product-gallery__image"
                                            style="width: 528px; float: left; display: block;"><a
                                                href="../../wp-content/uploads/2019/12/16.jpg"><img width="528" height="684"
                                                    src="../../wp-content/uploads/2019/12/16-528x684.jpg" class="" alt="" title="16" data-caption=""
                                                    data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg"
                                                    data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg"
                                                    data-large_image_width="772" data-large_image_height="1000"
                                                    srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-10x13.jpg 10w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg 772w"
                                                    sizes="(max-width: 528px) 100vw, 528px" draggable="false"></a></div>
                                        <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-100x100.jpg"
                                            data-thumb-alt="" class="woocommerce-product-gallery__image"
                                            style="width: 528px; float: left; display: block;"><a
                                                href="../../wp-content/uploads/2019/12/17.jpg"><img width="528" height="684"
                                                    src="../../wp-content/uploads/2019/12/17-528x684.jpg" class="" alt="" title="17" data-caption=""
                                                    data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17.jpg"
                                                    data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17.jpg"
                                                    data-large_image_width="772" data-large_image_height="1000"
                                                    srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17.jpg 772w"
                                                    sizes="(max-width: 528px) 100vw, 528px" draggable="false"></a></div>
                                        <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-100x100.jpg"
                                            data-thumb-alt="" class="woocommerce-product-gallery__image"
                                            style="width: 528px; float: left; display: block;"><a
                                                href="../../wp-content/uploads/2019/12/18.jpg"><img width="528" height="684"
                                                    src="../../wp-content/uploads/2019/12/18-528x684.jpg" class="" alt="" title="18" data-caption=""
                                                    data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18.jpg"
                                                    data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18.jpg"
                                                    data-large_image_width="772" data-large_image_height="1000"
                                                    srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18.jpg 772w"
                                                    sizes="(max-width: 528px) 100vw, 528px" draggable="false"></a></div>
                                        <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-100x100.jpg"
                                            data-thumb-alt="" class="woocommerce-product-gallery__image"
                                            style="width: 528px; float: left; display: block;"><a href="../../wp-content/uploads/2019/12/1.jpg"><img
                                                    width="528" height="684" src="../../wp-content/uploads/2019/12/1-528x684.jpg" class="" alt=""
                                                    title="1" data-caption=""
                                                    data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1.jpg"
                                                    data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1.jpg"
                                                    data-large_image_width="772" data-large_image_height="1000"
                                                    srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-10x13.jpg 10w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1.jpg 772w"
                                                    sizes="(max-width: 528px) 100vw, 528px" draggable="false"></a></div>
                                    </figure>
                                </div>
                                <ol class="flex-control-nav flex-control-thumbs owl-carousel owl-theme" style="opacity: 1; display: block;">
                                    <div class="owl-wrapper-outer">
                                        <div class="owl-wrapper" style="width: 1316px; left: 0px; display: block;">
                                            <div class="owl-item" style="width: 94px;">
                                                <li><img src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-100x100.jpg"
                                                        class="flex-active" draggable="false"></li>
                                            </div>
                                            <div class="owl-item" style="width: 94px;">
                                                <li><img src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-100x100.jpg"
                                                        draggable="false"></li>
                                            </div>
                                            <div class="owl-item" style="width: 94px;">
                                                <li><img src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-100x100.jpg"
                                                        draggable="false"></li>
                                            </div>
                                            <div class="owl-item" style="width: 94px;">
                                                <li><img src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-100x100.jpg"
                                                        draggable="false"></li>
                                            </div>
                                            <div class="owl-item" style="width: 94px;">
                                                <li><img src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-100x100.jpg"
                                                        draggable="false"></li>
                                            </div>
                                            <div class="owl-item" style="width: 94px;">
                                                <li><img src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-100x100.jpg"
                                                        draggable="false"></li>
                                            </div>
                                            <div class="owl-item" style="width: 94px;">
                                                <li><img src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-100x100.jpg"
                                                        draggable="false"></li>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-controls clickable">
                                        <div class="owl-buttons">
                                            <div class="owl-prev">prev</div>
                                            <div class="owl-next">next</div>
                                        </div>
                                    </div>
                                </ol>
                            </div> --}}
                            <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                data-columns="4" style="opacity: 0; transition: opacity .25s ease-in-out;margin-bottom:1rem">
                                <figure class="">
                                    <div>
                                        <a data-fancybox="images" href="{{ $images[0] }}">
                                            <img id="product-img-0" width="528" height="684"
                                                src="{{ $images[0] }}" class="wp-post-image" alt="{{ $alt_image[0] }}" title="{{ $title_image[0] }}" />
                                        </a>
                                    </div>
                                </figure>
                                <div class="splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            @foreach ($images as $key => $item)
                                                <li class="splide__slide">
                                                    <a data-fancybox="images" href="{{ $item }}">
                                                        <img id="product-img-{{ $key }}" width="528" height="684"
                                                            src="{{ $item }}" class="wp-post-image" alt="{{ $alt_image[$key] }}" title="{{ $title_image[$key] }}" />
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        

                            <div class="summary entry-summary">
                                <h1 class="product_title entry-title">{{ $product_detail->title }}</h1>
                                <div>
                                    <span style="font-size:20px">{!! rating_star($product_detail->rating) !!}</span>
                                    <i class="fa fa-eye" aria-hidden="true" style="margin-right:0px;margin-left:10px"></i> 
                                    {{ $product_detail->view ?? 0 }}
                                    <i class="fa fa-shopping-cart" aria-hidden="true" style="margin-right:0px;margin-left:5px;"></i>
                                    {{ $product_detail->bought ?? 0 }}
                                </div>
                                <p class="price">
                                    @if ($item_frist->price_buy != $item_frist->price_promotion)
                                        <del>
                                            <span class="woocommerce-Price-amount amount base-price">
                                                {{ number_format($item_frist->price_buy, 0, '.', '.') }} đ
                                            </span>
                                        </del>
                                        <ins>
                                            <span class="woocommerce-Price-amount amount sale-price" style="color: #df2121">
                                                {{ number_format($item_frist->price_promotion, 0, '.', '.') }} đ
                                            </span>
                                        </ins>
                                    @else
                                        <ins>
                                            <span class="woocommerce-Price-amount amount base-price" style="color: #df2121">
                                                {{ number_format($product_item->price_buy, 0, '.', '.') }} đ
                                            </span>
                                        </ins>
                                    @endif
                                </p>
                                <div class="woocommerce-product-details__short-description">
                                    {!! $product_detail->short_description !!}
                                </div>
                                {{-- <p class="stock in-stock">99 in stock</p> --}}

                                <div class="product_meta">
                                    {{-- <span class="sku_wrapper">SKU: <span class="sku">NHFL5</span></span> --}}
                                    {{-- <span class="posted_in">Danh mục:
                                        @foreach ($list_product as $key => $item)
                                            @if ($item->material)
                                                <a href="#" rel="tag">{{ $material[$item->material] }}@if ($key != count($list_product) - 1),&nbsp;@endif</a>
                                            @endif
                                        @endforeach
                                    </span> --}}
                                    @if ($product_detail->code)
                                        <span class="posted_in">Mã sản phẩm:
                                            <a href="#" rel="tag">{{ $product_detail->code }}</a>
                                        </span>
                                    @endif
                                </div>

                                <div class="product_meta">
                                    <span class="posted_in">Màu sắc:
                                        @foreach ($list_product as $key => $item)
                                            @if ($item->color)
                                                @php
                                                    $color = $data['colors'][$item->color]->value;
                                                @endphp
                                                <button class="switch-color" 
                                                    data-src="{{ $item->color_image }}" 
                                                    data-base-price="{{ number_format($item->price_buy, 0, '.', '.') }} đ"
                                                    data-sale-price="{{ number_format($item->price_promotion, 0, '.', '.') }} đ"
                                                    data-id="{{ $item->id }}"
                                                    style="width:1rem;height:1rem;border:none;padding:0!important;border-radius:50%;background: {{ $color }}"></button>
                                            @endif
                                        @endforeach
                                    </span>
                                </div>


                                <form class="cart product-action product-add-to-card" onsubmit="return false;">

                                    <div class="quantity">
                                        {{-- <span class="tmpmela-quantity">Slg: </span> --}}
                                        <input type="number" min="1" name="quantity" value="1"
                                            class="input-text qty text cart-plus-minus-box"
                                            data-id="{{ $item_frist->id }}" />
                                    </div>
                                    <button name="add-to-cart" style="margin-right:10px;margin-bottom:10px"
                                        class="single_add_to_cart_button button alt">Thêm vào giỏ hàng</button>
                                    <button style="background-color: #f57224" data-type="fast" class="single_add_to_cart_button button alt">Mua ngay</button>
                                </form>



                                {{-- <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1364  wishlist-fragment on-first-load"
                                    data-fragment-ref="1364"
                                    data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:true,&quot;show_exists&quot;:false,&quot;product_id&quot;:1364,&quot;parent_product_id&quot;:1364,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:true,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                </div>
                                <a
                                    href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=1364"
                                    class="compare button" data-product_id="1364" rel="nofollow">Compare</a> --}}
                                
                            </div>


                            <div class="woocommerce-tabs wc-tabs-wrapper">
                                <ul class="tabs wc-tabs" role="tablist">
                                    <li class="description_tab" id="tab-title-description" role="tab"
                                        aria-controls="tab-description">
                                        <a href="#tab-description">
                                            CHI TIẾT SẢN PHẨM </a>
                                    </li>
                                    {{-- <li class="additional_information_tab" id="tab-title-additional_information" role="tab"
                                        aria-controls="tab-additional_information">
                                        <a href="#tab-additional_information">
                                            Additional information </a>
                                    </li>
                                    <li class="reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
                                        <a href="#tab-reviews">
                                            Reviews (0) </a>
                                    </li> --}}
                                </ul>
                                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab"
                                    id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">

                                    <h2>Description</h2>

                                    {!! $product_detail->description !!}
                                </div>
                                {{-- <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab"
                                    id="tab-additional_information" role="tabpanel"
                                    aria-labelledby="tab-title-additional_information">

                                    <h2>Additional information</h2>

                                    <table class="woocommerce-product-attributes shop_attributes">
                                        <tr
                                            class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight">
                                            <th class="woocommerce-product-attributes-item__label">Weight</th>
                                            <td class="woocommerce-product-attributes-item__value">2.1 kg</td>
                                        </tr>
                                        <tr
                                            class="woocommerce-product-attributes-item woocommerce-product-attributes-item--dimensions">
                                            <th class="woocommerce-product-attributes-item__label">Dimensions</th>
                                            <td class="woocommerce-product-attributes-item__value">122 &times; 145 &times;
                                                321 cm</td>
                                        </tr>
                                    </table>
                                </div> --}}
                                {{-- <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab"
                                    id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
                                    <div id="reviews" class="woocommerce-Reviews">
                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title">
                                                Reviews </h2>

                                            <p class="woocommerce-noreviews">There are no reviews yet.</p>
                                        </div>

                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">
                                                    <span id="reply-title" class="comment-reply-title">Be the first to
                                                        review &ldquo;Awabox Sleeve Strip&rdquo; <small><a rel="nofollow"
                                                                id="cancel-comment-reply-link" href="index.html#respond"
                                                                style="display:none;">Cancel reply</a></small></span>
                                                    <form
                                                        action="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-comments-post.php"
                                                        method="post" id="commentform" class="comment-form" novalidate>
                                                        <p class="comment-notes"><span id="email-notes">Your email address
                                                                will not be published.</span> Required fields are marked
                                                            <span class="required">*</span></p>
                                                        <p class="comment-form-author"><label for="author">Name&nbsp;<span
                                                                    class="required">*</span></label><input id="author"
                                                                name="author" type="text" value="" size="30" required /></p>
                                                        <p class="comment-form-email"><label for="email">Email&nbsp;<span
                                                                    class="required">*</span></label><input id="email"
                                                                name="email" type="email" value="" size="30" required /></p>
                                                        <div class="comment-form-rating"><label for="rating">Your
                                                                rating</label><select name="rating" id="rating" required>
                                                                <option value="">Rate&hellip;</option>
                                                                <option value="5">Perfect</option>
                                                                <option value="4">Good</option>
                                                                <option value="3">Average</option>
                                                                <option value="2">Not that bad</option>
                                                                <option value="1">Very poor</option>
                                                            </select></div>
                                                        <p class="comment-form-comment"><label for="comment">Your
                                                                review&nbsp;<span class="required">*</span></label><textarea
                                                                id="comment" name="comment" cols="45" rows="8"
                                                                required></textarea></p>
                                                        <p class="form-submit"><input name="submit" type="submit"
                                                                id="submit" class="submit" value="Submit" /> <input
                                                                type='hidden' name='comment_post_ID' value='1364'
                                                                id='comment_post_ID' />
                                                            <input type='hidden' name='comment_parent' id='comment_parent'
                                                                value='0' />
                                                        </p>
                                                    </form>
                                                </div><!-- #respond -->
                                            </div>
                                        </div>

                                        <div class="clear"></div>
                                    </div>
                                </div> --}}

                            </div>


                            {{-- <section class="up-sells upsells products">

                                <h2>You may also like&hellip;</h2>

                                <ul class="products columns-4">


                                    

                                </ul>

                            </section> --}}

                            {{-- @if (count($related_products) > 0)
                                <section class="related products">
                                    <h2>Sản phẩm liên quan</h2>
                                    <ul class="products columns-5">
                                        {!! render_products($related_products) !!}
                                    </ul>
                                </section>
                            @endif --}}
                        </div>
                        {{-- @if (count($related_products) > 0)
                            <h2>Sản phẩm liên quan</h2>
                            <ul class="products columns-5">
                                {!! render_products($related_products) !!}
                            </ul>
                        @endif --}}
                    </main>
                </div>
                @if ($product_detail->landingpage_id)
                    @php
                        $sections = \App\Models\backend\LandingPage::find($product_detail->landingpage_id)
                            ->items()->orderBy("ordering", 'ASC')->get();
                    @endphp
                    {!! render_sections_landing($sections) !!}
                @endif
                
                @include('frontend.includes.comment')
            </div>
        </div>

        <script>
            document.querySelectorAll('.switch-color').forEach(i => {
                i.addEventListener('click', e => {
                    let src = e.target.dataset.src
                    let basePrice = e.target.dataset.basePrice
                    let salePrice = e.target.dataset.salePrice
                    let id = e.target.dataset.id
                    console.log(src)
                    console.log(basePrice)
                    console.log(salePrice)
                    document.querySelector('#product-img-0').src = src
                    document.querySelector('#product-img-0').parentElement.href = src
                    document.querySelector('.base-price').innerHTML = basePrice
                    document.querySelector('.sale-price').innerHTML = salePrice
                    document.querySelector('.cart-plus-minus-box').dataset.id = id
                })
            })

            


            new Splide( '.splide', {
                type   : 'loop',
                perPage: 3,
                perMove: 1,
            } ).mount();
        </script>
    @endsection
