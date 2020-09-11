@php
$logo_top = $logo->top->images ?? asset('assets/client/dist/images/logo-2.png');
$title_image = $logo->top->title_image ?? 'Logo Header';
$alt_image = $logo->top->alt_image ?? 'Logo Header';

$route_search = route('search_all');
$carts = session('cart');
$cart_total_price = session('cart_total_price');
$session_agency = session('data_agency');
@endphp

{{-- <header id="ereaders-header" class="ereaders-header-one">
    <div class="ereaders-main-header">
        <div class="container">
            <div class="row">
                <aside class="col-md-2">
                    <a href="{{ Request::root() }}" title="{{ $title_image }}">
                        <img src="{{ $logo_top }}" alt="{{ $alt_image }}" title="{{ $title_image }}">
                    </a>
                </aside>

                <aside class="col-md-10 header-right">
                    <a href="#menu" class="menu-link active"><span></span></a>
                    <nav id="menu" class="menu navbar navbar-default">
                        <ul class="level-1 navbar-nav">
                            <li><a href="/" title="Trang chủ">Trang chủ</a></li>
                            @foreach ($categories as $category)
                                @if ($category->parent_id == -1)
                                    @if (@$category['childrens'])
                                        @if ($category->type == 5)
                                            <li class="product">
                                                <a href="{{ asset(change_cat_url_by_article_url($category)) }}"
                                                    title="{{ $category['title'] }}">{{ $category['title'] }}</a>
                                                <span class="has-subnav"><i class="fa fa-angle-down"></i></span>
                                                {!! gen_html_dropdown_submenu($category['childrens']) !!}
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ asset(change_cat_url_by_article_url($category)) }}"
                                                    title="{{ $category['title'] }}">{{ $category['title'] }}</a>
                                                <span class="has-subnav"><i class="fa fa-angle-down"></i></span>
                                                {!! gen_html_dropdown_submenu($category['childrens']) !!}
                                            </li>
                                        @endif
                                    @else
                                        <li>
                                            <a href="{{ asset(change_cat_url_by_article_url($category)) }}"
                                                title="{{ $category['title'] }}">{{ $category['title'] }}</a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                    <div class="header-cart-one header-cart middle-same header-middle-color-13">
                        <button class="icon-cart">
                            <i class="fa fa-cart-arrow-down cart-bag" aria-hidden="true"></i>
                            <span class="count-amount">{{ number_format($cart_total_price, 0, '.', '.') }} đ</span>
                            <i class="fa fa-chevron-down cart-down" aria-hidden="true"></i>
                            <span class="count-style">{{ !empty($carts) ? count($carts) : 0 }}</span>
                        </button>
                        <div class="shopping-cart-content">
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
                                                <a href="#" data-id="{{ $item['id'] }}"><i class="fa fa-times"
                                                        aria-hidden="true"></i></a>
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
                                <a class="btn-style btn-hover" href="{{ route('info-cart') }}" title="Giỏ hàng">Giỏ
                                    hàng</a>
                            </div>
                        </div>
                    </div>

                    <div class="search-header-form">
                        <form action="{{ route('search_all') }}" method="GET">
                            <div class="form-group">
                                <input type="search" class="input-search" name="query" value="" placeholder="Tìm Kiếm"
                                    required>
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</header> --}}

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
                            {{-- <select class="orderby" name="product_cat">
                                <option value="" selected="selected">All Categories</option>
                                @foreach ($category_products as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select> --}}
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
                                                    {{-- <li id="menu-item-8289"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8289">
                                                        <a href="../product-category/index.html">Product Category</a></li>
                                                    <li id="menu-item-9553"
                                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9553">
                                                        <a
                                                            href="../product/ole-baby-musical-activity-play-gym-floor-mat/index.html">External
                                                            Products</a></li>
                                                    <li id="menu-item-9554"
                                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9554">
                                                        <a href="../product/blue-trendy-cap-sleeves-top-and-skirt/index.html">Grouped
                                                            products</a></li>
                                                    <li id="menu-item-9555"
                                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9555">
                                                        <a href="../product/white-printed-smily-pink-color-tshirt-2/index.html">Variable
                                                            Products</a></li>
                                                    <li id="menu-item-8286"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8286">
                                                        <a href="../top-rated-product/index.html">Top rated product</a></li> --}}
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                    {{-- <li id="menu-item-7179"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-7179">
                                        <a href="../index.html">Home</a></li>
                                    <li id="menu-item-8280"
                                        class="sale-label tmpmela-menu-label shop menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8280">
                                        <a href="../shop/index.html">Shop</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-8289"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8289">
                                                <a href="../product-category/index.html">Product Category</a></li>
                                            <li id="menu-item-9553"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9553">
                                                <a
                                                    href="../product/ole-baby-musical-activity-play-gym-floor-mat/index.html">External
                                                    Products</a></li>
                                            <li id="menu-item-9554"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9554">
                                                <a href="../product/blue-trendy-cap-sleeves-top-and-skirt/index.html">Grouped
                                                    products</a></li>
                                            <li id="menu-item-9555"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9555">
                                                <a href="../product/white-printed-smily-pink-color-tshirt-2/index.html">Variable
                                                    Products</a></li>
                                            <li id="menu-item-8286"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8286">
                                                <a href="../top-rated-product/index.html">Top rated product</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-7189"
                                        class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-has-children menu-item-7189">
                                        <a href="../blog/index.html">Blog</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-7200"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7200">
                                                <a href="../left-sidebar/index.html">Left Sidebar</a></li>
                                            <li id="menu-item-7210"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7210">
                                                <a href="../right-sidebar/index.html">Right Sidebar</a></li>
                                            <li id="menu-item-7195"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7195">
                                                <a href="../full-width/index.html">Full Width</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-8276"
                                        class="new-label tmpmela-menu-label menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8276">
                                        <a href="../media/index.html">Media</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-8269"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8269">
                                                <a href="../gallery/index.html">Gallery</a>
                                                <ul class="sub-menu">
                                                    <li id="menu-item-8270"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8270">
                                                        <a href="../gallery/2-columns/index.html">2 Columns</a></li>
                                                    <li id="menu-item-8271"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8271">
                                                        <a href="../gallery/3-columns/index.html">3 Columns</a></li>
                                                    <li id="menu-item-8272"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8272">
                                                        <a href="../gallery/4-columns/index.html">4 Columns</a></li>
                                                </ul>
                                            </li>
                                            <li id="menu-item-8278"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8278">
                                                <a href="../portfolio/index.html">Portfolio</a>
                                                <ul class="sub-menu">
                                                    <li id="menu-item-8257"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8257">
                                                        <a href="../portfolio2_column/index.html">2 Columns</a></li>
                                                    <li id="menu-item-8258"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8258">
                                                        <a href="../portfolio3_column/index.html">3 Columns</a></li>
                                                    <li id="menu-item-8259"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8259">
                                                        <a href="../portfolio4_column/index.html">4 Columns</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-8252"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-8252">
                                        <a href="#">ShortCode</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-9364"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9364">
                                                <a href="#">Shortcode Pages</a>
                                                <ul class="sub-menu">
                                                    <li id="menu-item-8261"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8261">
                                                        <a href="../accordions-toggles/index.html">Accordions &#038;
                                                            Toggles</a></li>
                                                    <li id="menu-item-8263"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8263">
                                                        <a href="../buttons/index.html">Buttons</a></li>
                                                    <li id="menu-item-8265"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8265">
                                                        <a href="../divider/index.html">Divider</a></li>
                                                    <li id="menu-item-8274"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8274">
                                                        <a href="../lists/index.html">Lists</a></li>
                                                    <li id="menu-item-8275"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8275">
                                                        <a href="../map-contact/index.html">Map &#038; Contact</a></li>
                                                </ul>
                                            </li>
                                            <li id="menu-item-9363"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9363">
                                                <a href="#">Shortcode Pages</a>
                                                <ul class="sub-menu">
                                                    <li id="menu-item-8277"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8277">
                                                        <a href="../message-boxes/index.html">Message Boxes</a></li>
                                                    <li id="menu-item-8279"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8279">
                                                        <a href="../price-table/index.html">Pricing table</a></li>
                                                    <li id="menu-item-8281"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8281">
                                                        <a href="../progress-bar-pie-chart/index.html">Progress Bar
                                                            &#038; Pie Chart</a></li>
                                                    <li id="menu-item-8283"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8283">
                                                        <a href="../services/index.html">Services</a></li>
                                                    <li id="menu-item-8285"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8285">
                                                        <a href="../tabs/index.html">Tabs</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-8267"
                                        class="tmpmela-menu-label menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8267">
                                        <a href="../features/index.html">Features</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-8266"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8266">
                                                <a href="../faqs/index.html">FAQs</a></li>
                                            <li id="menu-item-8287"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8287">
                                                <a href="../typography/index.html">Typography</a></li>
                                            <li id="menu-item-8284"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8284">
                                                <a href="../sitemap/index.html">Sitemap</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-8260"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8260">
                                        <a href="../about-us/index.html">About Us</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-8264"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8264">
                                                <a href="../contact-us/index.html">Contact Us</a></li>
                                        </ul>
                                    </li> --}}
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
                            <ul class="product-categories" style="overflow-y:auto;max-height:550px">
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
                                                {{-- <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8289">
                                                    <a href="../product-category/index.html">Product Category</a></li>
                                                <li
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9553">
                                                    <a
                                                        href="../product/ole-baby-musical-activity-play-gym-floor-mat/index.html">External
                                                        Products</a></li>
                                                <li
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9554">
                                                    <a href="../product/blue-trendy-cap-sleeves-top-and-skirt/index.html">Grouped
                                                        products</a></li>
                                                <li
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9555">
                                                    <a href="../product/white-printed-smily-pink-color-tshirt-2/index.html">Variable
                                                        Products</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8286">
                                                    <a href="../top-rated-product/index.html">Top rated product</a></li> --}}
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                                {{-- <li
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-7179">
                                    <a href="../index.html">Home</a></li>
                                <li
                                    class="sale-label tmpmela-menu-label shop menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8280">
                                    <a href="../shop/index.html">Shop</a>
                                    <ul class="sub-menu">
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8289">
                                            <a href="../product-category/index.html">Product Category</a></li>
                                        <li
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9553">
                                            <a
                                                href="../product/ole-baby-musical-activity-play-gym-floor-mat/index.html">External
                                                Products</a></li>
                                        <li
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9554">
                                            <a href="../product/blue-trendy-cap-sleeves-top-and-skirt/index.html">Grouped
                                                products</a></li>
                                        <li
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9555">
                                            <a href="../product/white-printed-smily-pink-color-tshirt-2/index.html">Variable
                                                Products</a></li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8286">
                                            <a href="../top-rated-product/index.html">Top rated product</a></li>
                                    </ul>
                                </li>
                                <li
                                    class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-has-children menu-item-7189">
                                    <a href="../blog/index.html">Blog</a>
                                    <ul class="sub-menu">
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7200">
                                            <a href="../left-sidebar/index.html">Left Sidebar</a></li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7210">
                                            <a href="../right-sidebar/index.html">Right Sidebar</a></li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7195">
                                            <a href="../full-width/index.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li
                                    class="new-label tmpmela-menu-label menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8276">
                                    <a href="../media/index.html">Media</a>
                                    <ul class="sub-menu">
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8269">
                                            <a href="../gallery/index.html">Gallery</a>
                                            <ul class="sub-menu">
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8270">
                                                    <a href="../gallery/2-columns/index.html">2 Columns</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8271">
                                                    <a href="../gallery/3-columns/index.html">3 Columns</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8272">
                                                    <a href="../gallery/4-columns/index.html">4 Columns</a></li>
                                            </ul>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8278">
                                            <a href="../portfolio/index.html">Portfolio</a>
                                            <ul class="sub-menu">
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8257">
                                                    <a href="../portfolio2_column/index.html">2 Columns</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8258">
                                                    <a href="../portfolio3_column/index.html">3 Columns</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8259">
                                                    <a href="../portfolio4_column/index.html">4 Columns</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-8252">
                                    <a href="#">ShortCode</a>
                                    <ul class="sub-menu">
                                        <li
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9364">
                                            <a href="#">Shortcode Pages</a>
                                            <ul class="sub-menu">
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8261">
                                                    <a href="../accordions-toggles/index.html">Accordions &#038;
                                                        Toggles</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8263">
                                                    <a href="../buttons/index.html">Buttons</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8265">
                                                    <a href="../divider/index.html">Divider</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8274">
                                                    <a href="../lists/index.html">Lists</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8275">
                                                    <a href="../map-contact/index.html">Map &#038; Contact</a></li>
                                            </ul>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9363">
                                            <a href="#">Shortcode Pages</a>
                                            <ul class="sub-menu">
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8277">
                                                    <a href="../message-boxes/index.html">Message Boxes</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8279">
                                                    <a href="../price-table/index.html">Pricing table</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8281">
                                                    <a href="../progress-bar-pie-chart/index.html">Progress Bar &#038;
                                                        Pie Chart</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8283">
                                                    <a href="../services/index.html">Services</a></li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8285">
                                                    <a href="../tabs/index.html">Tabs</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="tmpmela-menu-label menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8267">
                                    <a href="../features/index.html">Features</a>
                                    <ul class="sub-menu">
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8266">
                                            <a href="../faqs/index.html">FAQs</a></li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8287">
                                            <a href="../typography/index.html">Typography</a></li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8284">
                                            <a href="../sitemap/index.html">Sitemap</a></li>
                                    </ul>
                                </li>
                                <li
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-8260">
                                    <a href="../about-us/index.html">About Us</a>
                                    <ul class="sub-menu">
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8264">
                                            <a href="../contact-us/index.html">Contact Us</a></li>
                                    </ul>
                                </li> --}}
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
