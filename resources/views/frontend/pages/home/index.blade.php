@extends($data->layout, [
'title' => $data['title'],
"seo_title" => $data['seo_title'],
'og_image' => $data['og_image'],
'og_url' => $data['og_url'],
'seo_description' => $data['seo_description'],
'seo_keywords' => $data['seo_keywords']
])

@section('title')
    {{ $data->title }}
@endsection

@section($data->content)

    @php
    $home_default = $data['home_default'];
    @endphp

    @if ($home_default)

        @php
        $related_sliders = $data['related_sliders'];
        $related_partners = $data['related_partners'];
        $related_banners = $data['related_banners'];
        $related_hots = $data['related_hots'];
        $related_products_hot = $data['related_products_hot'];
        $related_products_sale = $data['related_products_sale'];
        // $related_hot2s = $data['related_hot2s'];
        // $related_posts = $data['related_posts'];
        // $related_endows = $data['related_endows'];
        // $related_certifies = $data['related_certifies'];

        // $related_tvs = $data['related_tvs'];
        // $related_newspapers = $data['related_newspapers'];
        // $feedbacks = $data['feedbacks'];

        $funfact_number = json_decode( $home_default->funfact_number );
        $funfact_icon = json_decode( $home_default->funfact_icon );
        $funfact_description = json_decode( $home_default->funfact_description );

        // $why_title = json_decode( $home_default->why_title );
        // $why_icon = json_decode( $home_default->why_icon );
        // $why_description = json_decode( $home_default->why_description );

        // $services_name = json_decode( $home_default->services_name );
        // $services_url = json_decode( $home_default->services_url );
        // $services_description = json_decode( $home_default->services_description );

        // $video_hot_title = json_decode( $home_default->video_hot_title );
        // $video_hot_embed = json_decode( $home_default->video_hot_embed );

        // $album_hot_title = json_decode( $home_default->album_hot_title );
        // $album_hot_alt_images = json_decode( $home_default->album_hot_alt_images );
        // $album_hot_images = json_decode( $home_default->album_hot_images );

        @endphp

        <div id="main" class="site-main full-width wide-page">
            <div class="main_inner">
                <div class="main-content-inner-full">
                    <div id="main-content" class="main-content home-page full-width wide-page ">
                        <div id="primary" class="content-area">
                            <div id="content" class="site-content" role="main">
                                <article id="post-212" class="post-212 page type-page status-publish hentry">
                                    <div class="entry-content">
                                        <!-- Slider Section -->
                                        @include('frontend.pages.home.partial.slider')
                                        <!-- End Slider Section -->

                                        <!-- counter Section -->
                                        @include('frontend.pages.home.partial.counter')
                                        <!-- End counter Section -->

                                        @php $index_banner_start = 0; @endphp
                                        @include('frontend.pages.home.partial.banner')

                                        {{-- Introduce --}}
                                        {{-- @include('frontend.pages.home.partial.about') --}}

                                        {{-- Why choose --}}
                                        {{-- @include('frontend.pages.home.partial.why') --}}

                                        <!-- dịch vụ Section -->
                                        {{-- @include('frontend.pages.home.partial.service') --}}
                                        <!-- End dịch vụ Section -->

                                        <!-- danh mục nổi bật Section -->
                                        @include('frontend.pages.home.partial.category-hot')
                                        <!-- End danh mục nổi bật Section -->

                                        <!-- danh mục nổi bật Section -->
                                        {{--
                                        @include('frontend.pages.home.partial.category-hot-2')
                                        --}}
                                        <!-- End danh mục nổi bật Section -->

                                        <!-- danh mục nổi bật Section -->
                                        @include('frontend.pages.home.partial.product-hot')
                                        <!-- End danh mục nổi bật Section -->

                                        @php $index_banner_start = 2; @endphp
                                        @include('frontend.pages.home.partial.banner')

                                        <!-- danh mục nổi bật Section -->
                                        @include('frontend.pages.home.partial.product-sale')
                                        <!-- End danh mục nổi bật Section -->

                                        <!-- danh mục nổi bật Section -->
                                        {{-- @include('frontend.pages.home.partial.video-hot') --}}
                                        <!-- End danh mục nổi bật Section -->

                                        <!-- danh mục nổi bật Section -->
                                        {{-- @include('frontend.pages.home.partial.album-hot') --}}
                                        <!-- End danh mục nổi bật Section -->

                                        <!-- Cảm Nhận Section -->
                                        {{-- @include('frontend.pages.home.partial.feedback') --}}
                                        <!-- End cảm nhận Section -->

                                        <!-- endow Section -->
                                        {{-- @include('frontend.pages.home.partial.endow') --}}
                                        <!-- End endow Section -->

                                        {{-- Fb cmt --}}
                                        {{-- @include('frontend.pages.home.partial.fb-comments') --}}
                                    
                                        @include('frontend.pages.home.partial.partner')
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
