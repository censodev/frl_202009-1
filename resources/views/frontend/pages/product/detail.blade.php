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






    <style>
        .page-title .entry-title-main { display: none !important; }
        .quantity input.qty::-webkit-inner-spin-button, 
        .quantity input.qty::-webkit-outer-spin-button {  
            opacity: 1 !important;
        }
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
                            
                            <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                data-columns="4" style="opacity: 0; transition: opacity .25s ease-in-out;">
                                <figure class="woocommerce-product-gallery__wrapper">
                                    <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-100x100.jpg"
                                        data-thumb-alt="" class="woocommerce-product-gallery__image"><a
                                            href="../../wp-content/uploads/2019/12/18.jpg"><img width="528" height="684"
                                                src="../../wp-content/uploads/2019/12/18-528x684.jpg" class="wp-post-image"
                                                alt="" title="18" data-caption=""
                                                data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18.jpg"
                                                data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18.jpg"
                                                data-large_image_width="772" data-large_image_height="1000"
                                                srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18.jpg 772w"
                                                sizes="(max-width: 528px) 100vw, 528px" /></a></div>
                                    <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-100x100.jpg"
                                        data-thumb-alt="" class="woocommerce-product-gallery__image"><a
                                            href="../../wp-content/uploads/2019/12/14.jpg"><img width="528" height="684"
                                                src="../../wp-content/uploads/2019/12/14-528x684.jpg" class="" alt=""
                                                title="14" data-caption=""
                                                data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14.jpg"
                                                data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14.jpg"
                                                data-large_image_width="772" data-large_image_height="1000"
                                                srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-50x65.jpg 50w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14.jpg 772w"
                                                sizes="(max-width: 528px) 100vw, 528px" /></a></div>
                                    <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-100x100.jpg"
                                        data-thumb-alt="" class="woocommerce-product-gallery__image"><a
                                            href="../../wp-content/uploads/2019/12/17.jpg"><img width="528" height="684"
                                                src="../../wp-content/uploads/2019/12/17-528x684.jpg" class="" alt=""
                                                title="17" data-caption=""
                                                data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17.jpg"
                                                data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17.jpg"
                                                data-large_image_width="772" data-large_image_height="1000"
                                                srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17.jpg 772w"
                                                sizes="(max-width: 528px) 100vw, 528px" /></a></div>
                                    <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-100x100.jpg"
                                        data-thumb-alt="" class="woocommerce-product-gallery__image"><a
                                            href="../../wp-content/uploads/2019/12/16.jpg"><img width="528" height="684"
                                                src="../../wp-content/uploads/2019/12/16-528x684.jpg" class="" alt=""
                                                title="16" data-caption=""
                                                data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg"
                                                data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg"
                                                data-large_image_width="772" data-large_image_height="1000"
                                                srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-10x13.jpg 10w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg 772w"
                                                sizes="(max-width: 528px) 100vw, 528px" /></a></div>
                                    <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-100x100.jpg"
                                        data-thumb-alt="" class="woocommerce-product-gallery__image"><a
                                            href="../../wp-content/uploads/2019/12/15.jpg"><img width="528" height="684"
                                                src="../../wp-content/uploads/2019/12/15-528x684.jpg" class="" alt=""
                                                title="15" data-caption=""
                                                data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15.jpg"
                                                data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15.jpg"
                                                data-large_image_width="772" data-large_image_height="1000"
                                                srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15.jpg 772w"
                                                sizes="(max-width: 528px) 100vw, 528px" /></a></div>
                                    <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8-100x100.jpg"
                                        data-thumb-alt="" class="woocommerce-product-gallery__image"><a
                                            href="../../wp-content/uploads/2019/12/8.jpg"><img width="528" height="684"
                                                src="../../wp-content/uploads/2019/12/8-528x684.jpg" class="" alt=""
                                                title="8" data-caption=""
                                                data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8.jpg"
                                                data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8.jpg"
                                                data-large_image_width="772" data-large_image_height="1000"
                                                srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8.jpg 772w"
                                                sizes="(max-width: 528px) 100vw, 528px" /></a></div>
                                    <div data-thumb="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-100x100.jpg"
                                        data-thumb-alt="" class="woocommerce-product-gallery__image"><a
                                            href="../../wp-content/uploads/2019/12/1.jpg"><img width="528" height="684"
                                                src="../../wp-content/uploads/2019/12/1-528x684.jpg" class="" alt=""
                                                title="1" data-caption=""
                                                data-src="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1.jpg"
                                                data-large_image="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1.jpg"
                                                data-large_image_width="772" data-large_image_height="1000"
                                                srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-10x13.jpg 10w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1.jpg 772w"
                                                sizes="(max-width: 528px) 100vw, 528px" /></a></div>
                                </figure>
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
                                            <span class="woocommerce-Price-amount amount">
                                                {{ number_format($item_frist->price_buy, 0, '.', '.') }} đ
                                            </span>
                                        </del>
                                        <ins>
                                            <span class="woocommerce-Price-amount amount" style="color: #df2121">
                                                {{ number_format($item_frist->price_promotion, 0, '.', '.') }} đ
                                            </span>
                                        </ins>
                                    @else
                                        <ins>
                                            <span class="woocommerce-Price-amount amount" style="color: #df2121">
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


                                    <li
                                        class="post-2490 product type-product status-publish has-post-thumbnail product_cat-coffee-board product_cat-cup-and-glass product_cat-machines product_cat-milk-items product_cat-italiat-nitron product_cat-justin-gibelo product_cat-health-safety product_tag-leo first instock featured shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../nautical-mania-stripe-hi-low-dress/index.html">
                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/20-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/20-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/20-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/20-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/20-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/20.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/14-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-50x65.jpg 50w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>110.00</span></span>
                                                    <a href="../nautical-mania-stripe-hi-low-dress/index.html">
                                                        <h3 class="product-name">Nautical Mania Stripe</h3>
                                                    </a>
                                                    <a href="index83e9.html?add-to-cart=2490" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="2490" data-product_sku="AH1025"
                                                        aria-label="Add &ldquo;Nautical Mania Stripe&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2490  wishlist-fragment on-first-load"
                                                        data-fragment-ref="2490"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:true,&quot;show_exists&quot;:false,&quot;product_id&quot;:2490,&quot;parent_product_id&quot;:2490,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:true,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=2490"
                                                            class="compare button" data-product_id="2490"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="2490">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-2491 product type-product status-publish has-post-thumbnail product_cat-coffee-bean product_cat-coffee-board product_cat-varieties product_cat-milk-items product_cat-health-safety product_cat-distracted-tab product_cat-mili-gerto product_cat-git-atracts product_cat-petrome-rolit product_tag-summer product_tag-winter  instock featured shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../kuhu-creation-baby-rattle-toys-garden-bug/index.html">
                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/1-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-10x13.jpg 10w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/9-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/9-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/9-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/9-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/9-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/9.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Rated 4.00 out of 5"><span
                                                            style="width:80%"><strong class="rating">4.00</strong> out of
                                                            5</span></div>
                                                    <span class="price"><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>150.00</span></span>
                                                    <a href="../kuhu-creation-baby-rattle-toys-garden-bug/index.html">
                                                        <h3 class="product-name">Kuhu Creation Rattlely</h3>
                                                    </a>
                                                    <a href="index7225.html?add-to-cart=2491" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="2491" data-product_sku="JMN102"
                                                        aria-label="Add &ldquo;Kuhu Creation Rattlely&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2491  wishlist-fragment on-first-load"
                                                        data-fragment-ref="2491"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:true,&quot;show_exists&quot;:false,&quot;product_id&quot;:2491,&quot;parent_product_id&quot;:2491,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:true,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=2491"
                                                            class="compare button" data-product_id="2491"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="2491">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-2488 product type-product status-publish has-post-thumbnail product_cat-automatic-home product_cat-leather-bags product_cat-net-gear-wifi product_cat-coffee-bean product_cat-sequrity-camera product_cat-smart-watch product_cat-cup-and-glass product_cat-nikon-camera product_cat-shorts-jeans product_cat-offer-zone product_tag-summer product_tag-winter  instock shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../olive-green-half-sleeves-top-and-shorts-set/index.html">
                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/7-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/7-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/7-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/7-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/7-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/7-50x65.jpg 50w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/7.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/16-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-10x13.jpg 10w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>88.00</span></span>
                                                    <a href="../olive-green-half-sleeves-top-and-shorts-set/index.html">
                                                        <h3 class="product-name">Olive Green Half Short</h3>
                                                    </a>
                                                    <a href="indexf7f9.html?add-to-cart=2488" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="2488" data-product_sku="K05Pell"
                                                        aria-label="Add &ldquo;Olive Green Half Short&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2488  wishlist-fragment on-first-load"
                                                        data-fragment-ref="2488"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:true,&quot;show_exists&quot;:false,&quot;product_id&quot;:2488,&quot;parent_product_id&quot;:2484,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:true,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=2488"
                                                            class="compare button" data-product_id="2488"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="2488">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-1364 product type-product status-publish has-post-thumbnail product_cat-awabox-fullerm product_cat-coffee-board product_cat-excelscoffee product_cat-machines product_cat-milk-items product_cat-oxfull-mitron product_cat-varieties last instock featured shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a href="index.html">
                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/18-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/18.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/14-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-50x65.jpg 50w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>98.00</span></span>
                                                    <a href="index.html">
                                                        <h3 class="product-name">Awabox Sleeve Strip</h3>
                                                    </a>
                                                    <a href="index7a94.html?add-to-cart=1364" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="1364" data-product_sku="NHFL5"
                                                        aria-label="Add &ldquo;Awabox Sleeve Strip&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1364  wishlist-fragment on-first-load"
                                                        data-fragment-ref="1364"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:true,&quot;show_exists&quot;:false,&quot;product_id&quot;:1364,&quot;parent_product_id&quot;:1364,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:true,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=1364"
                                                            class="compare button" data-product_id="1364"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="1364">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>

                            </section>


                            <section class="related products">

                                <h2>Related products</h2>

                                <ul class="products columns-4">


                                    <li
                                        class="post-8087 product type-product status-publish has-post-thumbnail product_cat-liberica product_cat-varieties product_cat-excelscoffee product_cat-distracted-tab product_cat-mili-gerto product_cat-git-atracts product_cat-petrome-rolit first instock shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../bulum-sed-ella-vator-bublly-pink-bag-set/index.html">
                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/17-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/17.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/15-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>98.00</span></span>
                                                    <a href="../bulum-sed-ella-vator-bublly-pink-bag-set/index.html">
                                                        <h3 class="product-name">Bulum Sed Ella Vator</h3>
                                                    </a>
                                                    <a href="index033b.html?add-to-cart=8087" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="8087" data-product_sku="NHFL5-1"
                                                        aria-label="Add &ldquo;Bulum Sed Ella Vator&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-8087  wishlist-fragment on-first-load"
                                                        data-fragment-ref="8087"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:8087,&quot;parent_product_id&quot;:8087,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=8087"
                                                            class="compare button" data-product_id="8087"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="8087">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-2484 product type-product status-publish has-post-thumbnail product_cat-coffee-bean product_cat-arabica product_cat-robusta product_cat-liberica product_cat-excelscoffee product_cat-milk-items product_cat-health-safety product_tag-dapibus product_tag-viverra  instock sale featured shipping-taxable product-type-grouped">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../blue-trendy-cap-sleeves-top-and-skirt/index.html">


                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/3-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/3-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/3-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/3-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/3-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/3.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/11-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/11-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/11-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/11-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/11-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/11-50x65.jpg 50w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/11.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><span
                                                            class='onsale'>-44%</span></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>88.00</span>
                                                        &ndash; <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>100.00</span></span>
                                                    <a href="../blue-trendy-cap-sleeves-top-and-skirt/index.html">
                                                        <h3 class="product-name">Blue Trendy Top&#038;Skirt</h3>
                                                    </a>
                                                    <a href="../blue-trendy-cap-sleeves-top-and-skirt/index.html"
                                                        data-quantity="1" class="button product_type_grouped"
                                                        data-product_id="2484" data-product_sku="K9-VivJ"
                                                        aria-label="View products in the &ldquo;Blue Trendy Top&amp;Skirt&rdquo; group"
                                                        rel="nofollow">View products</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2484  wishlist-fragment on-first-load"
                                                        data-fragment-ref="2484"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:2484,&quot;parent_product_id&quot;:2484,&quot;product_type&quot;:&quot;grouped&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=2484"
                                                            class="compare button" data-product_id="2484"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="2484">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-2487 product type-product status-publish has-post-thumbnail product_cat-automatic-home product_cat-leather-bags product_cat-net-gear-wifi product_cat-coffee-bean product_cat-sequrity-camera product_cat-smart-watch product_cat-varieties product_cat-excelscoffee product_cat-nikon-camera product_cat-tech-bottles product_cat-machines product_cat-offer-zone product_tag-summer product_tag-winter  instock featured shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../evening-carnival-barcode-stripe-ruffle-set/index.html">
                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/5-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/5-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/5-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/5-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/5-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/5.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/6-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>70.00</span></span>
                                                    <a href="../evening-carnival-barcode-stripe-ruffle-set/index.html">
                                                        <h3 class="product-name">Evening Carnival Barcode</h3>
                                                    </a>
                                                    <a href="index93a0.html?add-to-cart=2487" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="2487" data-product_sku="870AJP"
                                                        aria-label="Add &ldquo;Evening Carnival Barcode&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2487  wishlist-fragment on-first-load"
                                                        data-fragment-ref="2487"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:2487,&quot;parent_product_id&quot;:2487,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=2487"
                                                            class="compare button" data-product_id="2487"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="2487">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-1307 product type-product status-publish has-post-thumbnail product_cat-sequrity-camera product_cat-smart-watch product_cat-excelscoffee product_cat-nikon-camera product_cat-tech-bottles product_cat-machines product_tag-leo last instock featured shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../awabox-train-print-sweatshirt/index.html">
                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/11-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/11-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/11-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/11-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/11-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/11-50x65.jpg 50w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/11.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/15-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/15.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>98.00</span></span>
                                                    <a href="../awabox-train-print-sweatshirt/index.html">
                                                        <h3 class="product-name">Awbox Train Print Swatshi</h3>
                                                    </a>
                                                    <a href="index9ca5.html?add-to-cart=1307" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="1307" data-product_sku="MH-1512"
                                                        aria-label="Add &ldquo;Awbox Train Print Swatshi&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1307  wishlist-fragment on-first-load"
                                                        data-fragment-ref="1307"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:1307,&quot;parent_product_id&quot;:1307,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=1307"
                                                            class="compare button" data-product_id="1307"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="1307">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-2489 product type-product status-publish has-post-thumbnail product_cat-coffee-board product_cat-cup-and-glass product_cat-milk-items product_cat-health-safety product_cat-distracted-tab product_cat-mili-gerto product_cat-git-atracts product_cat-petrome-rolit first instock sale featured shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../white-graphic-half-sleeves-top-and-shorts-set/index.html">


                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/8-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/8.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/10-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/10-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/10-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/10-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/10-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/10.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><span
                                                            class='onsale'>-14%</span></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><del><span
                                                                class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>115.00</span></del>
                                                        <ins><span class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>99.00</span></ins></span>
                                                    <a href="../white-graphic-half-sleeves-top-and-shorts-set/index.html">
                                                        <h3 class="product-name">White Graphic Half Sleev</h3>
                                                    </a>
                                                    <a href="index8632.html?add-to-cart=2489" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="2489" data-product_sku="Viva0015"
                                                        aria-label="Add &ldquo;White Graphic Half Sleev&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2489  wishlist-fragment on-first-load"
                                                        data-fragment-ref="2489"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:2489,&quot;parent_product_id&quot;:2489,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=2489"
                                                            class="compare button" data-product_id="2489"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="2489">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-9136 product type-product status-publish has-post-thumbnail product_cat-automatic-home product_cat-leather-bags product_cat-net-gear-wifi product_cat-coffee-bean product_cat-excelscoffee product_cat-nikon-camera product_cat-shorts-jeans product_tag-dapibus product_tag-viverra  instock featured shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../coral-double-stripe-high-low-hem-dress-2/index.html">
                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/13-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/13-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/13-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/13-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/13-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/13.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/2-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/2-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/2-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/2-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/2-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/2-281x364.jpg 281w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/2.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Rated 4.00 out of 5"><span
                                                            style="width:80%"><strong class="rating">4.00</strong> out of
                                                            5</span></div>
                                                    <span class="price"><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>35.00</span></span>
                                                    <a href="../coral-double-stripe-high-low-hem-dress-2/index.html">
                                                        <h3 class="product-name">Coral Doub Strip Hig</h3>
                                                    </a>
                                                    <a href="index3b5b.html?add-to-cart=9136" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="9136" data-product_sku="NHFL4"
                                                        aria-label="Add &ldquo;Coral Doub Strip Hig&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-9136  wishlist-fragment on-first-load"
                                                        data-fragment-ref="9136"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:9136,&quot;parent_product_id&quot;:9136,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=9136"
                                                            class="compare button" data-product_id="9136"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="9136">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-9134 product type-product status-publish has-post-thumbnail product_cat-sequrity-camera product_cat-smart-watch product_cat-cup-and-glass product_cat-varieties product_cat-distracted-tab product_cat-mili-gerto product_cat-git-atracts product_cat-petrome-rolit product_tag-summer product_tag-winter  instock sale shipping-taxable purchasable product-type-variable">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../white-printed-smily-pink-color-tshirt-2/index.html">


                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/9-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/9-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/9-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/9-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/9-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/9.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/4-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/4-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/4-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/4-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/4-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/4-50x65.jpg 50w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/4.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><span
                                                            class='onsale'>-6%</span></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><del><span
                                                                class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>80.00</span></del>
                                                        <ins><span class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>75.00</span></ins></span>
                                                    <a href="../white-printed-smily-pink-color-tshirt-2/index.html">
                                                        <h3 class="product-name">White Printed Smily-Tshirt</h3>
                                                    </a>
                                                    <a href="../white-printed-smily-pink-color-tshirt-2/index.html"
                                                        data-quantity="1"
                                                        class="button product_type_variable add_to_cart_button"
                                                        data-product_id="9134" data-product_sku="MOL85"
                                                        aria-label="Select options for &ldquo;White Printed Smily-Tshirt&rdquo;"
                                                        rel="nofollow">Select options</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-9134  wishlist-fragment on-first-load"
                                                        data-fragment-ref="9134"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:9134,&quot;parent_product_id&quot;:9134,&quot;product_type&quot;:&quot;variable&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=9134"
                                                            class="compare button" data-product_id="9134"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="9134">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-9137 product type-product status-publish has-post-thumbnail product_cat-varieties product_cat-excelscoffee product_cat-milk-items product_cat-italiat-nitron product_cat-justin-gibelo product_cat-health-safety product_tag-tshirt last instock sale featured shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../sky-blue-designer-pink-longue-tub-2/index.html">


                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/14-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-50x65.jpg 50w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/4-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/4-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/4-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/4-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/4-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/4-50x65.jpg 50w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/4.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><span
                                                            class='onsale'>-44%</span></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><del><span
                                                                class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>180.00</span></del>
                                                        <ins><span class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>100.00</span></ins></span>
                                                    <a href="../sky-blue-designer-pink-longue-tub-2/index.html">
                                                        <h3 class="product-name">Sky Blue Designer Pi</h3>
                                                    </a>
                                                    <a href="indexdf9d.html?add-to-cart=9137" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="9137" data-product_sku="NHFL3"
                                                        aria-label="Add &ldquo;Sky Blue Designer Pi&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-9137  wishlist-fragment on-first-load"
                                                        data-fragment-ref="9137"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:9137,&quot;parent_product_id&quot;:9137,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=9137"
                                                            class="compare button" data-product_id="9137"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="9137">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-2483 product type-product status-publish has-post-thumbnail product_cat-automatic-home product_cat-leather-bags product_cat-net-gear-wifi product_cat-coffee-bean product_cat-coffee-board product_cat-nikon-camera product_cat-machines product_cat-shorts-jeans product_cat-offer-zone product_tag-lifestyle first instock sale featured shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../mia-heart-onesie-culling-captions-dress/index.html">


                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/2-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/2-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/2-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/2-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/2-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/2-281x364.jpg 281w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/2.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/1-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1-10x13.jpg 10w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/1.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><span
                                                            class='onsale'>-7%</span></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><del><span
                                                                class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>75.00</span></del>
                                                        <ins><span class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>70.00</span></ins></span>
                                                    <a href="../mia-heart-onesie-culling-captions-dress/index.html">
                                                        <h3 class="product-name">Mia Heart Onesie Dress</h3>
                                                    </a>
                                                    <a href="indexa7d0.html?add-to-cart=2483" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="2483" data-product_sku="SO8Jk"
                                                        aria-label="Add &ldquo;Mia Heart Onesie Dress&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2483  wishlist-fragment on-first-load"
                                                        data-fragment-ref="2483"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:2483,&quot;parent_product_id&quot;:2483,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=2483"
                                                            class="compare button" data-product_id="2483"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="2483">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-6480 product type-product status-publish has-post-thumbnail product_cat-automatic-home product_cat-leather-bags product_cat-net-gear-wifi product_cat-coffee-bean product_cat-cup-and-glass product_cat-nikon-camera product_cat-machines product_cat-shorts-jeans product_cat-offer-zone product_tag-shoes  instock sale featured shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../vogue-stack-colorful-shoem-toy/index.html">


                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/16-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-10x13.jpg 10w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/6-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/6.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><span
                                                            class='onsale'>-13%</span></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><del><span
                                                                class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>80.00</span></del>
                                                        <ins><span class="woocommerce-Price-amount amount"><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>70.00</span></ins></span>
                                                    <a href="../vogue-stack-colorful-shoem-toy/index.html">
                                                        <h3 class="product-name">Vogue Stack Colorful Shoe</h3>
                                                    </a>
                                                    <a href="index3d5d.html?add-to-cart=6480" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="6480" data-product_sku="NHFL1"
                                                        aria-label="Add &ldquo;Vogue Stack Colorful Shoe&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-6480  wishlist-fragment on-first-load"
                                                        data-fragment-ref="6480"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:6480,&quot;parent_product_id&quot;:6480,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=6480"
                                                            class="compare button" data-product_id="6480"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="6480">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li
                                        class="post-2492 product type-product status-publish has-post-thumbnail product_cat-coffee-board product_cat-sequrity-camera product_cat-smart-watch product_cat-excelscoffee product_cat-nikon-camera product_cat-tech-bottles product_tag-fashion  instock featured shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block"><a
                                                        href="../gray-text-print-full-sleeves-style-t-shirt/index.html">
                                                        <img width="194" height="251"
                                                            src="../../wp-content/uploads/2019/12/10-194x251.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/10-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/10-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/10-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/10-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/10.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /><img width="194"
                                                            height="251"
                                                            src="../../wp-content/uploads/2019/12/20-194x251.jpg"
                                                            class="secondary-image attachment-shop-catalog" alt=""
                                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/20-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/20-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/20-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/20-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/20.jpg 772w"
                                                            sizes="(max-width: 194px) 100vw, 194px" /></a>
                                                    <div class="product-block-hover"></div>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div class="star-rating" title="Not yet rated"><span
                                                            style="width:0%"><strong class="rating">0</strong> out of
                                                            5</span></div>
                                                    <span class="price"><span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>120.00</span></span>
                                                    <a href="../gray-text-print-full-sleeves-style-t-shirt/index.html">
                                                        <h3 class="product-name">Gray Text Print Shirt</h3>
                                                    </a>
                                                    <a href="indexce91.html?add-to-cart=2492" data-quantity="1"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        data-product_id="2492" data-product_sku="IN068"
                                                        aria-label="Add &ldquo;Gray Text Print Shirt&rdquo; to your cart"
                                                        rel="nofollow">Add to cart</a>
                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2492  wishlist-fragment on-first-load"
                                                        data-fragment-ref="2492"
                                                        data-fragment-options="{&quot;base_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/product\/awabox-full-sleeves-strip-tshirt?page&amp;product=awabox-full-sleeves-strip-tshirt&amp;post_type=product&amp;name=awabox-full-sleeves-strip-tshirt&quot;,&quot;wishlist_url&quot;:&quot;http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wishlist\/&quot;,&quot;in_default_wishlist&quot;:false,&quot;is_single&quot;:false,&quot;show_exists&quot;:false,&quot;product_id&quot;:2492,&quot;parent_product_id&quot;:2492,&quot;product_type&quot;:&quot;simple&quot;,&quot;show_view&quot;:false,&quot;browse_wishlist_text&quot;:&quot;Browse Wishlist&quot;,&quot;already_in_wishslist_text&quot;:&quot;The product is already in the wishlist!&quot;,&quot;product_added_text&quot;:&quot;Product added!&quot;,&quot;heading_icon&quot;:&quot;&quot;,&quot;available_multi_wishlist&quot;:false,&quot;disable_wishlist&quot;:false,&quot;show_count&quot;:false,&quot;ajax_loading&quot;:false,&quot;loop_position&quot;:false,&quot;item&quot;:&quot;add_to_wishlist&quot;}">
                                                    </div>
                                                    <div class="woocommerce product compare-button"><a
                                                            href="http://wordpress.templatemela.com/woo/WCM02/WCM020036?action=yith-woocompare-add-product&amp;id=2492"
                                                            class="compare button" data-product_id="2492"
                                                            rel="nofollow">Compare</a></div><a href="#"
                                                        class="button yith-wcqv-button" data-product_id="2492">Quick
                                                        View</a>
                                                    <!--<div class="product-button-hover"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>

                            </section> --}}

                        </div>

                    </main>
                </div>
                @include('frontend.includes.comment')
            </div>
        </div>
    @endsection
