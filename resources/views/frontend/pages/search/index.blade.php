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
                                {!! render_products_list($list_product) !!}
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
