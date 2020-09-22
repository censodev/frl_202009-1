<?php
use App\Models\backend\ProductItem; ?>
@extends($data->layout, [
'title' => $data['title'],
"seo_title" => $data['seo_title'],
'og_image' => $data['og_image'],
'og_url' => $data['og_url'],
'seo_description' => $data['seo_description'],
'seo_keywords' => $data['seo_keywords'],
'category' => $data['category']
])

@section('title')
    {{ $data->title }}
@endsection

<?php
$image_category_product = !empty($data['category']->images) ? $data['category']->images :
asset('assets/client/dist/img/banner/banner-default.jpg');
$list_product = $data['list_product'];
$view_product = $data['viewed_product'];
$materials = $data['materials'];

// slider
$relatedSliderIds = $related_sliders = [];
$home_default = \App\Models\backend\HomepageManager::getHomeDefault();
if(isset($home_default->related_slider) && !empty($home_default->related_slider)) {

    $relatedSliderIds = json_decode($home_default->related_slider, true);
    $related_sliders = \App\Models\backend\Slider::whereIn('id', $relatedSliderIds)
        ->where('status', 1)
        ->get();
}
?>

@section($data->content)

    {{-- @include('frontend.includes.breadcrumb')
    <div class="ereaders-main-content">
        <div class="ereaders-main-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ereaders-shop-filter">
                            <input type="hidden" value="{{ $data['category']->id }}" id="category_id">
                            <div class="ereaders-search-select">
                                <select name="sort_name">
                                    <option value="" selected>Tên</option>
                                    <option value="asc">A-Z</option>
                                    <option value="desc">Z-A</option>
                                </select>
                            </div>
                            <div class="ereaders-search-select">
                                <select name="sort_price">
                                    <option value="" selected>Giá</option>
                                    <option value="asc">Tăng dần</option>
                                    <option value="desc">Giảm dần</option>
                                </select>
                            </div>
                            <div class="ereaders-search-select">
                                <select name="sort_type">
                                    <option value="" selected>Loại</option>
                                    <option value="new">Mới</option>
                                    <option value="hot">Nổi Bật</option>
                                    <option value="sale">Khuyến Mại</option>
                                    <option value="selling">Bán Chạy</option>
                                </select>
                            </div>
                            <div class="ereaders-search-select">
                                <select name="sort_number">
                                    <option value="">Hiển thị</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="list-product-filter">
                        <div class="col-md-12">
                            <div class="ereaders-shop ereaders-shop-grid">
                                <ul class="row" id="product-of-category">
                                    {!! render_products($list_product) !!}
                                </ul>
                            </div>
                            <div id="pagination-product-of-category">
                                {{ $list_product->links('frontend.includes.pagination') }}
                            </div>
                        </div>
                    </div>

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

    </div> --}}
    <style>
        .page-title { display: none !important; }
        #productCategories { display: block; }
        .ereaders-shop-filter {
        text-align: center
        }
        .ereaders-shop-filter>span {
            margin: 0 0 10px
        }
        .ereaders-shop-filter>span,
        .ereaders-shop-filter .nav-tabs,
        .ereaders-shop-filter form {
            margin-bottom: 10px
        }
        .ereaders-shop-filter>span,
        .ereaders-shop-filter .nav-tabs,
        .ereaders-shop-filter form {
            float: none;
            display: inline-block
        }

        .ereaders-shop-filter {
            float: left;
            width: 100%;
            margin: 0 0 50px;
            padding: 10px;
            border: 1px solid #e9e9e9
        }

        .ereaders-shop-filter>span {
            font-size: 14px;
            float: left;
            color: #2e2e2e;
            margin: 4px 0 0;
            text-transform: uppercase;
            letter-spacing: .7px
        }

        .ereaders-shop-filter .nav-tabs {
            float: right;
            border: none;
            border-radius: 30px;
            margin: 5px 0 0
        }

        .ereaders-shop-filter .nav-tabs li {
            list-style: none;
            line-height: 1;
            margin: 0 0 0 21px;
            position: relative
        }

        .ereaders-shop-filter .nav-tabs>li.active>a,
        .ereaders-shop-filter .nav-tabs>li.active>a:hover,
        .ereaders-shop-filter .nav-tabs>li.active>a:focus {
            border: none;
            background-color: transparent
        }

        .ereaders-shop-filter .nav-tabs>li.active>a>span {
            color: #7e7e7e
        }

        .ereaders-shop-filter .nav-tabs li a {
            float: left;
            padding: 0;
            font-size: 14px;
            position: relative;
            border: none;
            margin: 0;
            color: #7e7e7e;
            background-color: transparent
        }

        .ereaders-shop-filter .nav-tabs li a i {
            display: inline-block;
            margin: 0 6px 0 0
        }

        .ereaders-search-select {
            position: relative;
            float: left;
            margin: 0 0 0 19px;
        }

        .ereaders-shop-filter .ereaders-search-select:first-child {
            margin-left: 0px !important;
        }
        .ereaders-shop-filter form {
            float: right
        }

        .ereaders-shop-filter form label {
            float: left;
            margin: 0 17px 0 0;
            color: #1b1b1b;
            font-size: 14px
        }
        .ereaders-shop-filter form input[type=text] {
            float: left;
            width: 92px;
            font-size: 14px;
            background-color: transparent;
            color: #262626
        }
        @media (max-width: 530px) {
            .ereaders-shop-filter {
                border: none;
                margin: 0 0 10px;
            }
            .ereaders-shop-filter .ereaders-search-select{
                margin-bottom: 10px;
            }
        }
        .ereaders-search-select:after{pointer-events:none}
        .ereaders-search-select {
            position: relative;
            float: left;
            margin: 0 0 0 19px;
        }

        .ereaders-shop-filter .ereaders-search-select:first-child {
            margin-left: 0px !important;
        }

        .ereaders-search-select select {
            font-size: 12px;
            width: 140px;
            background-color: #fff;
            height: 30px;
            padding: 0 0 0 15px;
            color: #555;
            border: 1px solid #e9e9e9
        }

        .ereaders-search-select:after {
            content: "\f107";
            font-family: FontAwesome;
            font-size: 12px;
            color: #999;
            right: 1px;
            bottom: 1px;
            text-align: center;
            position: absolute;
            background-color: #fff;
            width: 20px;
            padding: 3px 2px 0 0;
            height: 25px
        }
    </style>
    
    @include('frontend.pages.home.partial.slider')
    <div class="main-content-inner ">
        <div id="main-content" class="main-content  left-sidebar">
            <div class="content-area">
                <div id="primary" class="content-area">
                    <main id="content" class="site-main">
                        {{-- <nav class="woocommerce-breadcrumb">
                            <span><a href="{{ url('/') }}">Trang chủ</a></span> /
                            <span>{{ $data['title'] }}</span>
                        </nav> --}}
                        <div class="woocommerce-notices-wrapper"></div>
                        {{-- <p class="woocommerce-result-count">
                            Showing all 4 results</p> --}}
                        {{-- <form class="woocommerce-ordering" method="get">
                            <select name="orderby" class="orderby" aria-label="Shop order">
                                <option value="menu_order" selected='selected'>Default sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by latest</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                            <input type="hidden" name="paged" value="1" />
                        </form> --}}
                        {{-- <nav class="gridlist-toggle"><a href="#" id="grid" title="Grid view"><span
                                    class="dashicons dashicons-grid-view"></span> <em>Grid view</em></a><a href="#"
                                id="list" title="List view"><span class="dashicons dashicons-exerpt-view"></span> <em>List
                                    view</em></a></nav> --}}
                        <div class="ereaders-shop-filter">
                            <input type="hidden" value="{{ $data['category']->id }}" id="category_id">
                            <div class="ereaders-search-select">
                                <select name="sort_name">
                                    <option value="" selected>Tên</option>
                                    <option value="asc">A-Z</option>
                                    <option value="desc">Z-A</option>
                                </select>
                            </div>
                            <div class="ereaders-search-select">
                                <select name="sort_price">
                                    <option value="" selected>Giá</option>
                                    <option value="asc">Tăng dần</option>
                                    <option value="desc">Giảm dần</option>
                                </select>
                            </div>
                            <div class="ereaders-search-select">
                                <select name="sort_type">
                                    <option value="" selected>Loại</option>
                                    <option value="new">Mới</option>
                                    <option value="hot">Nổi Bật</option>
                                    <option value="sale">Khuyến Mại</option>
                                    <option value="selling">Bán Chạy</option>
                                </select>
                            </div>
                            <div class="ereaders-search-select">
                                <select name="sort_number">
                                    <option value="">Hiển thị</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <ul class="products columns-5">
                            {!! render_products_list($list_product) !!}
                        </ul>
                        {{ $list_product->links('frontend.includes.pagination') }}
                    </main>
                </div>
                {{-- <div id="secondary" class="left-col">
                    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                        <aside id="woocommerce_price_filter-3" class="widget woocommerce widget_price_filter">
                            <h3 class="widget-title">Filter by price</h3>
                            <form method="get"
                                action="http://wordpress.templatemela.com/woo/WCM02/WCM020036/product-category/petrome-rolit/">
                                <div class="price_slider_wrapper">
                                    <div class="price_slider" style="display:none;"></div>
                                    <div class="price_slider_amount" data-step="10">
                                        <input type="text" id="min_price" name="min_price" value="70" data-min="70"
                                            placeholder="Min price" />
                                        <input type="text" id="max_price" name="max_price" value="150" data-max="150"
                                            placeholder="Max price" />
                                        <button type="submit" class="button">Filter</button>
                                        <div class="price_label" style="display:none;">
                                            Price: <span class="from"></span> &mdash; <span class="to"></span>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </form>

                        </aside>
                        <aside id="woocommerce_layered_nav-5"
                            class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
                            <h3 class="widget-title">Filter by color</h3>
                            <ul class="woocommerce-widget-layered-nav-list">
                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow"
                                        href="indexf9b2.html?filter_color=black">Black</a> <span class="count">(1)</span>
                                </li>
                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow"
                                        href="indexf641.html?filter_color=blue">Blue</a> <span class="count">(2)</span></li>
                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow"
                                        href="indexf840.html?filter_color=pink">Pink</a> <span class="count">(2)</span></li>
                            </ul>
                        </aside>
                        <aside id="woocommerce_layered_nav-6"
                            class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
                            <h3 class="widget-title">Filter by size</h3>
                            <ul class="woocommerce-widget-layered-nav-list">
                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow"
                                        href="indexd4bc.html?filter_size=large">Large</a> <span class="count">(3)</span>
                                </li>
                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow"
                                        href="index197e.html?filter_size=medium">Medium</a> <span class="count">(3)</span>
                                </li>
                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term "><a rel="nofollow"
                                        href="indexad6d.html?filter_size=small">Small</a> <span class="count">(3)</span>
                                </li>
                            </ul>
                        </aside>
                        <aside id="woocommerce_product_tag_cloud-3" class="widget woocommerce widget_product_tag_cloud">
                            <h3 class="widget-title">Product tags</h3>
                            <div class="tagcloud"><a href="../../product-tag/dapibus/index.html"
                                    class="tag-cloud-link tag-link-35 tag-link-position-1" style="font-size: 14.3pt;"
                                    aria-label="Dapibus (2 products)">Dapibus</a>
                                <a href="../../product-tag/fashion/index.html"
                                    class="tag-cloud-link tag-link-36 tag-link-position-2" style="font-size: 14.3pt;"
                                    aria-label="Fashion (2 products)">Fashion</a>
                                <a href="../../product-tag/leo/index.html"
                                    class="tag-cloud-link tag-link-39 tag-link-position-3" style="font-size: 14.3pt;"
                                    aria-label="Leo (2 products)">Leo</a>
                                <a href="../../product-tag/lifestyle/index.html"
                                    class="tag-cloud-link tag-link-40 tag-link-position-4" style="font-size: 8pt;"
                                    aria-label="LifeStyle (1 product)">LifeStyle</a>
                                <a href="../../product-tag/shoes/index.html"
                                    class="tag-cloud-link tag-link-47 tag-link-position-5" style="font-size: 8pt;"
                                    aria-label="Shoes (1 product)">Shoes</a>
                                <a href="../../product-tag/summer/index.html"
                                    class="tag-cloud-link tag-link-49 tag-link-position-6" style="font-size: 22pt;"
                                    aria-label="Summer (4 products)">Summer</a>
                                <a href="../../product-tag/tshirt/index.html"
                                    class="tag-cloud-link tag-link-50 tag-link-position-7" style="font-size: 8pt;"
                                    aria-label="Tshirt (1 product)">Tshirt</a>
                                <a href="../../product-tag/viverra/index.html"
                                    class="tag-cloud-link tag-link-52 tag-link-position-8" style="font-size: 14.3pt;"
                                    aria-label="viverra (2 products)">viverra</a>
                                <a href="../../product-tag/winter/index.html"
                                    class="tag-cloud-link tag-link-53 tag-link-position-9" style="font-size: 22pt;"
                                    aria-label="Winter (4 products)">Winter</a></div>
                        </aside>
                        <aside id="woocommerce_products-3" class="widget woocommerce widget_products">
                            <h3 class="widget-title">On-sale</h3>
                            <ul class="product_list_widget">
                                <li>

                                    <a href="../../product/vogue-stack-colorful-shoem-toy/index.html">
                                        <img width="194" height="251" src="../../wp-content/uploads/2019/12/16-194x251.jpg"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16-10x13.jpg 10w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/16.jpg 772w"
                                            sizes="(max-width: 194px) 100vw, 194px" /> <span class="product-title">Vogue
                                            Stack Colorful Shoe</span>
                                    </a>

                                    <div class="star-rating" title="Not yet rated"><span style="width:0%"><strong
                                                class="rating">0</strong> out of 5</span></div>
                                    <del><span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">&#36;</span>80.00</span></del>
                                    <ins><span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">&#36;</span>70.00</span></ins>
                                </li>
                                <li>

                                    <a href="../../product/sky-blue-designer-pink-longue-tub-2/index.html">
                                        <img width="194" height="251" src="../../wp-content/uploads/2019/12/14-194x251.jpg"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
                                            srcset="http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-194x251.jpg 194w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-232x300.jpg 232w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-768x995.jpg 768w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-528x684.jpg 528w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14-50x65.jpg 50w, http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/14.jpg 772w"
                                            sizes="(max-width: 194px) 100vw, 194px" /> <span class="product-title">Sky Blue
                                            Designer Pi</span>
                                    </a>

                                    <div class="star-rating" title="Not yet rated"><span style="width:0%"><strong
                                                class="rating">0</strong> out of 5</span></div>
                                    <del><span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">&#36;</span>180.00</span></del>
                                    <ins><span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">&#36;</span>100.00</span></ins>
                                </li>
                            </ul>
                        </aside>
                    </div>
                    <!-- #primary-sidebar -->
                </div><!-- #secondary --> --}}
            </div>
        </div>
    </div>
@endsection
