{{-- @if (!empty($home_default->title_product_hot) || !empty($home_default->content_product_hot) || (!empty($related_products_hot) && count($related_products_hot) > 0))
    <div class="ereaders-main-section ereaders-product-gridfull" style="background:#fff">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ereaders-fancy-title">
                        <h2 class="bounceIn wow">{{ $home_default->title_product_hot }}</h2>
                        <div class="clearfix"></div>
                        <div class="fadeInRight wow">
                            {!! $home_default->content_product_hot !!}
                        </div>
                    </div>
                    <div class="ereaders-shop ereaders-shop-grid fadeInUp wow">
                        <ul class="row" id="product-of-category">
                            {!! render_products($related_products_hot) !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif --}}


<div class="vc_row wpb_row vc_row-fluid vc_custom_1565957026585">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div class="vc_row wpb_row vc_inner vc_row-fluid theme-container">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="shortcode-title left">
                                    <h1 class="big-title" style="color:#000;text-transform:uppercase!important">
                                        {{ $home_default->title_product_hot }}
                                    </h1>
                                </div>
                                <div class="woo-products woo-content products_block shop woofeature">
                                    <div class="woo-grid woo_grid cols-5">
                                        <div class="woocommerce columns-5">
                                            <ul class="products">
                                                @foreach ($related_products_hot as $k => $product)
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
                                                                            $percent = round($product_item->price_promotion / $product_item->price_buy * 100);
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
