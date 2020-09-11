{{-- @if( !empty( $home_default->title_product_sale ) || !empty( $home_default->content_product_sale ) || ( !empty( $related_products_sale ) && count( $related_products_sale ) > 0 ) )
    <div class="ereaders-main-section ereaders-product-gridfull">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ereaders-fancy-title">
                        <h2 class="bounceIn wow">{{ $home_default->title_product_sale }}</h2>
                        <div class="clearfix"></div>
                        <div class="fadeInRight wow">
                            {!! $home_default->content_product_sale !!}
                        </div>
                    </div>
                    <div class="ereaders-shop ereaders-shop-grid fadeInUp wow">
                        <ul class="row" id="product-of-category">
                            {!! render_products($related_products_sale) !!}
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
                                        {{ $home_default->title_product_sale }}
                                    </h1>
                                </div>
                                <div class="woo-products woo-content products_block shop woofeature">
                                    <div class="woo-grid woo_grid cols-5">
                                        <div class="woocommerce columns-5">
                                            <ul class="products">
                                                {!! render_products_list($related_products_sale) !!}
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
