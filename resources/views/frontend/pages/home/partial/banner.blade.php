@if( !empty( $related_banners ) && count( $related_banners ) > 0 )
{{-- <div class="banner-area">
    <div class="container">
        <div class="banner-area-active owl-carousel ptb-60">
            @foreach( $related_banners as $banner )
                @php
                    $images = $banner->images ?? asset('assets/admin/dist/img/no_image.png');
                    $link_title   = !empty( $banner->link_title ) ? $banner->link_title : $banner->name;
                    $title_image  = !empty( $banner->title_image ) ? $banner->title_image : $banner->name;
                    $alt_image    = !empty( $banner->alt_image ) ? $banner->alt_image : $banner->name;
                @endphp
                <div class="single-banner-area">
                    <img alt="{{ $alt_image }}" title="{{ $title_image }}" src="{{ $images }}">
                </div>
            @endforeach
        </div>
    </div>
</div> --}}


<div class="vc_row wpb_row vc_row-fluid vc_custom_1565953090582">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div class="vc_row wpb_row vc_inner vc_row-fluid theme-container">
                    @for ($i = 0; $i < 2; $i++)
                        @php
                            $images       = $related_banners[$i]->images ?? asset('assets/admin/dist/img/no_image.png');
                            $link_title   = !empty( $related_banners[$i]->link_title ) ? $related_banners[$i]->link_title : $related_banners[$i]->name;
                            $title_image  = !empty( $related_banners[$i]->title_image ) ? $related_banners[$i]->title_image : $related_banners[$i]->name;
                            $alt_image    = !empty( $related_banners[$i]->alt_image ) ? $related_banners[$i]->alt_image : $related_banners[$i]->name;
                        @endphp
                        <div class="wpb_column vc_column_container vc_col-sm-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="cms-banner-item {{ $i == 0 ? 'left' : 'right' }}  left-align style1">
                                        <div class="cms-banner-inner">
                                            <div class="cms-banner-img">
                                                <a href="#" target="_self">
                                                    <img alt="{{ $alt_image }}" title="{{ $title_image }}" src="{{ $images }}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endif
