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
                    <div style="display:flex;justify-content:space-between">
                        <span style="font-size:20px">{!! rating_star($product->rating) !!}</span>
                        <span>
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            {{ $product->view ?? 0 }}
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            {{ $product->bought ?? 0 }}
                        </span>
                    </div>
                    <a href="{{ url($product->alias) }}">
                        <h3 class="product-name">
                            {{ $product->title }}
                        </h3>
                    </a>
                    <span class="price">
                        @if ($percent > 0)
                            <del>
                                <span class="woocommerce-Price-amount amount">
                                    {{ number_format($product_item->price_buy, 0, '.', '.') }} đ
                                </span>
                            </del>
                            <ins>
                                <span class="woocommerce-Price-amount amount" style="color: #df2121">
                                    {{ number_format($product_item->price_promotion, 0, '.', '.') }} đ
                                </span>
                            </ins>
                        @else
                            <ins>
                                <span class="woocommerce-Price-amount amount" style="color: #df2121">
                                    {{ number_format($product_item->price_buy, 0, '.', '.') }} đ
                                </span>
                            </ins>
                        @endif
                    </span>
                    {{-- <div>{!! $product->short_description !!}</div> --}}
                    <div class="product-action product-add-to-card" style="display:flex">
                        <input style="width:25%" class="cart-plus-minus-box" type="number" name="quantity" value="1" min="1" data-id="{{ $product_item->id }}">
                        <button style="width:75%;font-size:smaller" type="submit">THÊM GIỎ HÀNG</button>
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach