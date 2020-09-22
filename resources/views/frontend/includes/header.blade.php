@php
$logo_top = $logo->top->images ?? asset('assets/client/dist/images/logo-2.png');
$title_image = $logo->top->title_image ?? 'Logo Header';
$alt_image = $logo->top->alt_image ?? 'Logo Header';

$route_search = route('search_all');
$carts = session('cart');
$cart_total_price = session('cart_total_price');
$session_agency = session('data_agency');
@endphp

<header id="masthead" class="site-header header-fix header left-sidebar">
    <div class="header-main site-header-fix">
        <!-- Start header_left -->
        <div class="header-top">
            <div class="theme-container">
                <div class="header-left">
                    <!-- Header LOGO-->
                    <div class="header-logo">
                        <a href="{{ url('/') }}" title="Trang chủ" rel="home">
                            <img style="max-height:42px" src="{{ $logo_top }}" alt="{{ $alt_image }}" title="{{ $title_image }}">
                        </a>
                    </div>
                    <!-- Header Mob LOGO-->
                    <div class="header-mob-logo">
                        <a href="{{ url('/') }}" title="Trang chủ" rel="home">
                            <img style="max-height:36px" src="{{ $logo_top }}" alt="{{ $alt_image }}" title="{{ $title_image }}">
                        </a>
                    </div>
                </div>
                <!-- Start header_center -->
                <div class="header-center">
                    <!--Search-->
                    <div class="header-search">
                        <div class="header-toggle"></div>
                        <form method="get" class="woocommerce-product-search advance"
                            action="{{ route('search_all') }}">
                            <input type="search" class="search-field" placeholder="Tìm kiếm&hellip;" value=""
                                name="query" title="Search for:" style="border-left:1px solid #ebebeb"/>
                            <input type="submit" value="Search" />
                        </form>

                    </div>
                </div>
                <!-- Start header_right -->
                <div class="header-right">
                    <div class="header-service-cms">
                        <div class="service-text text"><a href="#" title="Hotline"><span
                            class="service-icon"></span><span class="header-service-title"><span
                            class="service-title1">Hotline</span><span class="service-title2">{{ $footer_contact_info[3] }}</span></span></a>
                        </div>
                    </div>
                    <nav class="mobile-navigation">
                        <h3 class="menu-toggle">Menu</h3>
                        <div class="mobile-menu">
                            <span class="close-menu"></span>
                            <div class="menu-main-menu-container">
                                <ul id="menu-main-menu" class="mobile-menu-inner">
                                    @foreach ($categories as $category)
                                        @if (!$category['childrens'])
                                            <li id="menu-item-7179"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-7179">
                                                <a href="{{ asset(change_cat_url_by_article_url($category)) }}">{{ $category['title'] }}</a>
                                            </li>
                                        @else
                                            <li id="menu-item-8280"
                                                class="sale-label tmpmela-menu-label shop menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8280">
                                                <a href="{{ asset(change_cat_url_by_article_url($category)) }}">{{ $category['title'] }}</a>
                                                <ul class="sub-menu">
                                                    @foreach ($category['childrens'] as $child)
                                                        <li id="menu-item-8289"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8289">
                                                            <a href="{{ asset(change_cat_url_by_article_url($child)) }}">{{ $child['title'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!--Cart -->
                    <div class="header-cart headercart-block">
                        <div class="cart togg">
                            <div class="shopping_cart tog" title="View your shopping cart">
                                <div class="cart-icon"></div>
                                <div class="cart-qty">
                                    <span class="cart-label">Giỏ Hàng</span>
                                    <a class="cart-contents" href="#" title="View your shopping cart">
                                        <span class="count-style">{{ !empty($carts) ? count($carts) : 0 }}</span> sản phẩm
                                    </a>
                                </div>
                            </div>
                            <aside id="woocommerce_widget_cart-3"
                                class="widget woocommerce widget_shopping_cart tab_content">
                                <div class="widget_shopping_cart_content shopping-cart-content">
                                    <ul>
                                        @if (!empty($carts) && count($carts) > 0)
                                            @foreach ($carts as $key => $item)
                                                <li class="single-shopping-cart">
                                                    <div class="shopping-cart-img">
                                                        <a href="{{ url($item['alias']) }}" title="{{ $item['title'] }}"><img
                                                                style="width: 80px;" alt="{{ $item['alt'] }}"
                                                                title="{{ $item['title'] }}" src="{{ $item['image'] }}"></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="{{ url($item['alias']) }}"
                                                                title="{{ $item['name'] }}">{{ substr($item['name'], 0, 18) }}
                                                                ...</a></h4>
                                                        <h6>Số lượng : {{ $item['quantity'] }}</h6>
                                                        <span>{{ number_format($item['total'], 0, '.', '.') }} đ</span>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a data-id="{{ $item['id'] }}"><i class="fa fa-times"></i></a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <div class="shopping-cart-total">
                                        <h4>Tổng tiền : <span
                                                class="shop-total">{{ number_format($cart_total_price, 0, '.', '.') }} đ</span>
                                        </h4>
                                    </div>
                                    <div class="shopping-cart-btn">
                                        <a style="background-color: transparent;
                                                margin-top: 10px;
                                                border: 1px solid #df2121;
                                                color: #df2121;
                                                display: block;
                                                font-size: 14px;
                                                font-weight: 500;
                                                padding: 14px 20px 12px;
                                                text-align: center;
                                                text-transform: uppercase;
                                                transition: all 0.3s ease 0s;"
                                        href="{{ route('info-cart') }}" title="Giỏ hàng">Giỏ hàng</a>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="theme-container">
                <div class="category-list">
                    <div class="box-category-heading">
                        <div class="box-category">
                            Danh Mục </div>
                    </div>
                    <div class="category-box">
                        <div class="home-category widget_product_categories">
                            <h3 class="widget-title">All Categories</h3>
                            <ul class="product-categories" style="overflow-y:auto;max-height:415px">
                                @foreach ($category_products as $category)
                                    <li class="cat-item cat-item-103 cat-parent"><a
                                        href="{{ asset(change_cat_url_by_article_url($category)) }}">{{ $category->title }}</a>
                                        @if ($category->childrens)
                                            <ul class='children'>
                                                @foreach ($category->childrens as $child)
                                                    <li class="cat-item cat-item-107"><a
                                                        href="{{ asset(change_cat_url_by_article_url($child)) }}">{{ $child->title }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end category block -->
                <!-- #site-navigation -->
                <nav id="site-navigation" class="navigation-bar main-navigation">
                    <a class="screen-reader-text skip-link" href="#content" title="Skip to content">Skip to content</a>
                    <div class="mega-menu">
                        <div class="menu-main-menu-container">
                            <ul id="menu-main-menu-1" class="mega">
                                @foreach ($categories as $category)
                                    @if (!$category['childrens'])
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-7179">
                                            <a href="{{ asset(change_cat_url_by_article_url($category)) }}">{{ $category['title'] }}</a></li>
                                    @else
                                        <li
                                            class="sale-label tmpmela-menu-label shop menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8280">
                                            <a href="{{ asset(change_cat_url_by_article_url($category)) }}">{{ $category['title'] }}</a>
                                            <ul class="sub-menu">
                                                @foreach ($category['childrens'] as $child)
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8289">
                                                    <a href="{{ asset(change_cat_url_by_article_url($child)) }}">{{ $child['title'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="header-bottom-right">
                </div>
            </div>
        </div>
    </div>
    <!-- End header-main -->
</header>
