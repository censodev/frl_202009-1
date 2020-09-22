@if( !empty( $related_partners ) && count( $related_partners ) > 0 )
{{-- <div class="ereaders-main-section ereaders-partner-sliderfull">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ereaders-fancy-title">
                    <h2 class="bounceIn wow">{{ $home_default->title_partner }}</h2>
                    <div class="clearfix"></div>
                    <div class="fadeInRight wow">
                        {!! $home_default->description_partner !!}
                    </div>
                </div>
                <div class="ereaders-partner-slider fadeInUp wow">
                    @foreach( $related_partners as $partner )
                        @php
                            $images = $partner->images ?? asset('assets/admin/dist/img/no_image.png');
                            $link_title   = !empty( $partner->link_title ) ? $partner->link_title : $partner->name;
                            $title_image  = !empty( $partner->title_image ) ? $partner->title_image : $partner->name;
                            $alt_image    = !empty( $partner->alt_image ) ? $partner->alt_image : $partner->name;
                        @endphp
                        <div class="ereaders-partner-slider-layer"> <a href="{{ $images }}" title="{{ $title_image }}" class="fancybox"><img src="{{ $images }}" title="{{ $title_image }}" alt="{{ $alt_image }}"></a> </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> --}}


{{-- <div class="vc_row wpb_row vc_row-fluid theme-container vc_custom_1576308428167" style="padding-top:3%!important">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div id="brand-products" class="tmpmela_logocontent">
                    <div id="6_brand_carousel" class="brand-carousel tm-logo-content">
                        @foreach( $related_partners as $partner )
                            @php
                                $images = $partner->images ?? asset('assets/admin/dist/img/no_image.png');
                                $link_title   = !empty( $partner->link_title ) ? $partner->link_title : $partner->name;
                                $title_image  = !empty( $partner->title_image ) ? $partner->title_image : $partner->name;
                                $alt_image    = !empty( $partner->alt_image ) ? $partner->alt_image : $partner->name;
                            @endphp
                            <div class="item brand_main">
                                <div class="product-block"><a href="{{ $images }}" target="_self"><img
                                            src="{{ $images }}" alt="{{ $alt_image }}" title="{{ $title_image }}" /></a></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="vc_row wpb_row vc_row-fluid vc_custom_1575458683825 vc_row-has-fill">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div class="vc_row wpb_row vc_inner vc_row-fluid theme-container">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="shortcode-title left">
                                    <h1 class="big-title" style="color:#000;text-transform:uppercase!important">
                                        {{ $home_default->title_partner }}
                                    </h1>
                                </div>
                                <div class="woo_categories_slider woocat product-category grid">
                                    <div id="category_grid" class="category-grid grid cols-4">
                                        @foreach ($related_partners as $partner)
                                            @php
                                                $images = $partner->images ?? asset('assets/admin/dist/img/no_image.png');
                                                $link_title   = !empty( $partner->link_title ) ? $partner->link_title : $partner->name;
                                                $title_image  = !empty( $partner->title_image ) ? $partner->title_image : $partner->name;
                                                $alt_image    = !empty( $partner->alt_image ) ? $partner->alt_image : $partner->name;
                                            @endphp
                                            <div class="cat-outer-block" style="border:none">
                                                <div class="cat-img-block">
                                                    <a class="cat-img" href="{{ $images }}">
                                                        <img src="{{ $images }}"
                                                            title="{{ $title_image }}" 
                                                            alt="{{ $alt_image }}" height="206"
                                                            width="255" />
                                                    </a>
                                                </div>
                                                {{-- <div class="cat_description">
                                                    <a class="cat_name" style="text-align:center" href="{{ $hot->link }}"
                                                        title="{{ $hot->link_title }}">{{ $hot->name }}</a>
                                                    <div style="text-align:center">{!! substr($hot->alt_image ?? '',0,160) !!}</div>
                                                </div> --}}
                                            </div>
                                        @endforeach
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

@endif


