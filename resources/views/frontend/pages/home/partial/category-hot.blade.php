{{-- @if (!empty($home_default->title_hot) || !empty($home_default->description_hot) || !empty($related_hots))
    <div class="ereaders-main-section ereaders-hot-category-gridfull">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ereaders-fancy-title">
                        <h1 class="bounceIn wow">{{ $home_default->title_hot }}</h1>
                        <div class="clearfix"></div>
                        <div class="fadeInRight wow">
                            {!! $home_default->description_hot !!}
                        </div>
                    </div>
                    <div class="ereaders-blog ereaders-blog-grid fadeInUp wow">
                        <ul class="row">

                            @if (!empty($related_hots) && count($related_hots) > 0)
                                @foreach ($related_hots as $hot)
                                    @php
                                    $images = !empty( $hot->images ) ? $hot->images :
                                    asset('assets/admin/dist/img/avatar5.png');
                                    @endphp
                                    <li class="col-md-3">
                                        <div class="ereaders-blog-grid-wrap">
                                            <figure><a href="{{ $hot->link }}" title="{{ $hot->link_title }}"><img
                                                        src="{{ $images }}" title="{{ $hot->title_image }}"
                                                        alt="{{ $hot->alt_image }}"></a></figure>
                                            <div class="ereaders-blog-grid-text">
                                                <h2><a href="{{ $hot->link }}"
                                                        title="{{ $hot->name }}">{{ $hot->name }}</a></h2>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif --}}

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
                                        {{ $home_default->title_hot }}
                                    </h1>
                                </div>
                                <div class="woo_categories_slider woocat product-category grid">
                                    <div id="category_grid" class="category-grid grid cols-4">
                                        @foreach ($related_hots as $hot)
                                            @php
                                                $images = !empty( $hot->images ) ? $hot->images :
                                                asset('assets/admin/dist/img/avatar5.png');
                                            @endphp
                                            <div class="cat-outer-block">
                                                <div class="cat-img-block">
                                                    <a class="cat-img" href="{{ $hot->link }}">
                                                        <img src="{{ $images }}"
                                                            title="{{ $hot->title_image }}" 
                                                            alt="{{ $hot->alt_image }}" height="206"
                                                            width="255" />
                                                    </a>
                                                </div>
                                                <div class="cat_description">
                                                    <a class="cat_name" href="{{ $hot->link }}"
                                                        title="{{ $hot->link_title }}">{{ $hot->name }}</a>
                                                </div>
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
