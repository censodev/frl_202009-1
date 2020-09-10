@extends($data->layout, [
    'title'             => $data['title'],
    "seo_title"         => $data['seo_title'],
    'og_image'          => $data['og_image'],
    'og_url'            => $data['og_url'],
    'seo_description'   => $data['seo_description'],
    'seo_keywords'      => $data['seo_keywords'],
    'query'             => $data['query']
])

@section('title')
    {{ $data->title }}
@endsection

@php
    $list_product   = $data['products'];
@endphp

@section($data->content)
    {{-- <div class="ereaders-subheader">
        <div class="ereaders-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href="/" title="trang chủ">Trang chủ</a></li>
                            <li class="active">{{ $data->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ereaders-main-content">
        <div class="ereaders-main-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if(!empty($list_product) && count($list_product) > 0)
                        <div class="ereaders-shop ereaders-shop-grid">
                            <ul class="row" id="product-of-category">
                                {!! render_products($list_product) !!}
                            </ul>
                        </div>
                        <div id="pagination-product-of-category">
                            {{ $data['pagiante']->links('frontend.includes.pagination') }}
                        </div>
                        @else
                            <h3>Chưa cập nhật</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="main-content-inner ">
        <div id="main-content" class="main-content  left-sidebar">
            <div class="content-area">
                <div id="primary" class="content-area">
                    <main id="content" class="site-main">
                        <nav class="woocommerce-breadcrumb"><span><a
                            <span>Từ khóa: "{{ request()->query('query') }}"</span>
                        </nav>
                        @if(!empty($list_product) && count($list_product) > 0)
                            <ul class="products columns-5">
                                @foreach ($list_product as $k => $product)
                                    @php
                                        $product_item   = \App\Models\backend\ProductItem::where('product_id', $product->id)->get()[0];
                                        $images             = json_decode( $product->images );
                                        $title_images       = json_decode( $product->title_image );
                                        $alt_images         = json_decode( $product->alt_image );
                                    @endphp
                                    <li class="{{ $k % 5 == 0 ? 'first' : '' }} product type-product status-publish has-post-thumbnail product_cat-awabox-fullerm product_cat-coffee-board product_cat-excelscoffee product_cat-machines product_cat-milk-items product_cat-oxfull-mitron product_cat-varieties instock featured shipping-taxable purchasable product-type-simple">
                                        <div class="container-inner">
                                            <div class="product-block-inner">
                                                <div class="image-block">
                                                    <a href="{{ url($product->alias) }}">
                                                        <img width="194" height="251"
                                                            src="{{ $images[0] }}"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt="{{ $alt_images[0] }}" 
                                                            title="{{ $title_images[0] }}"
                                                            sizes="(max-width: 194px) 100vw, 194px" />
                                                        <img width="194" height="251"
                                                            src="{{ $images[1] }}"
                                                            class="secondary-image attachment-shop-catalog"
                                                            alt="{{ $alt_images[1] }}" 
                                                            title="{{ $title_images[1] }}"
                                                            sizes="(max-width: 194px) 100vw, 194px" />
                                                        @php
                                                            $percent = 100 - round($product_item->price_promotion / $product_item->price_buy * 100);
                                                        @endphp
                                                        @if ($percent > 0)
                                                            <span class="onsale">-{{ $percent }}%</span>
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="product-detail-wrapper">
                                                    <div style="font-size:20px">{!! rating_star($product->rating) !!}</div>
                                                    <div><i class="fa fa-eye" aria-hidden="true"></i> {{ $product->view ?? 0 }} | <i class="fa fa-shopping-cart" aria-hidden="true"></i> {{ $product->bought ?? 0 }}</div>
                                                    <span class="price">
                                                        <del>
                                                            <span class="woocommerce-Price-amount amount">
                                                                {{ number_format($product_item->price_buy, 0, '.', '.') }} đ
                                                            </span>
                                                        </del>
                                                        <ins>
                                                            <span class="woocommerce-Price-amount amount">
                                                                {{ number_format($product_item->price_promotion, 0, '.', '.') }} đ
                                                            </span>
                                                        </ins>
                                                    </span>
                                                    <a href="{{ url($product->alias) }}">
                                                        <h3 class="product-name">
                                                            {{ $product->title }}
                                                        </h3>
                                                    </a>
                                                    {{-- <div>{!! $product->short_description !!}</div> --}}
                                                    <div class="product-action product-add-to-card" style="display:flex">
                                                        <input style="width:25%" class="cart-plus-minus-box" type="number" name="quantity" value="1" min="1" data-id="{{ $product_item->id }}">
                                                        <button style="width:75%" type="submit"><i style="font-size:20px" class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            {{ $list_product->links('frontend.includes.pagination') }}
                        @else
                            <h3 style="text-align:center">Không tìm thấy sản phẩm phù hợp</h3>
                        @endif
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection
