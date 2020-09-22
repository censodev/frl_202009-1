@php
    use App\Models\backend\Slider;
    use App\Models\backend\Product;
    use App\Models\backend\Post;
    use App\Models\backend\Newspaper;
    use App\Models\backend\Tv;
    use App\Models\backend\Endow;
@endphp
@foreach($sections as $key => $section)
    @php
        $type = $section->type;
        $Ids = $listItems = [];
        $Ids = json_decode($section->items,true);
    @endphp
    @if(isset($section->items) && !empty($section->items))

        @if($type == 'article')
            @php
                $listItems              = Post::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
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
                                                    {{ $section->name }}
                                                </h1>
                                            </div>
                                            <div class="woo-products woo-content products_block shop woofeature">
                                                {!! render_posts_list($listItems) !!}
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

        @if($type == 'product')
            @php
                $listItems              = Product::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
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
                                                    {{ $section->name }}
                                                </h1>
                                            </div>
                                            <div class="woo-products woo-content products_block shop woofeature">
                                                <div class="woo-grid woo_grid cols-5">
                                                    <div class="woocommerce columns-5">
                                                        <ul class="products">
                                                            {!! render_products_list($listItems) !!}
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
        @endif

        @if($type == 'slider')
            @php
                $related_sliders              = Slider::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
            @include('frontend.pages.home.partial.slider')
            <script>
                const dom = document.querySelector('.rev-slider')
                dom.classList.remove('vc_col-sm-9')
                dom.classList.add('vc_col-sm-12')
            </script>
        @endif

        @if($type == 'newspaper')
            @php
                $listItems              = Newspaper::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
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
                                                    {{ $section->name }}
                                                </h1>
                                            </div>
                                            <div class="woo_categories_slider woocat product-category grid">
                                                <div id="category_grid" class="category-grid grid cols-4">
                                                    @foreach ($listItems as $item)
                                                        @php
                                                            $images = !empty( $item->images ) ? $item->images :
                                                            asset('assets/admin/dist/img/avatar5.png');
                                                        @endphp
                                                        <div style="display:inline-block" class="cat-outer-block">
                                                            <div class="cat-img-block">
                                                                <img src="{{ $images }}"
                                                                    title="{{ $item->title_image }}" 
                                                                    alt="{{ $item->alt_image }}" height="206"
                                                                    width="255" />
                                                            </div>
                                                            <div class="cat_description">
                                                                <a class="cat_name" style="text-align:center" href="{{ $item->link }}">{{ $item->name }}</a>
                                                                <div style="text-align:center">{!! substr($item->description,0,160) !!}</div>
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
        @endif

        @if($type == 'tv')
            @php
                $listItems              = Tv::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
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
                                                    {{ $section->name }}
                                                </h1>
                                            </div>
                                            <div class="woo_categories_slider woocat product-category grid">
                                                <div id="category_grid" class="category-grid grid cols-4">
                                                    @foreach ($listItems as $item)
                                                        @php
                                                            $images = !empty( $item->images ) ? $item->images :
                                                            asset('assets/admin/dist/img/avatar5.png');
                                                        @endphp
                                                        <div style="display:inline-block" class="cat-outer-block">
                                                            <div class="cat-img-block">
                                                                <img src="{{ $images }}"
                                                                    title="{{ $item->title_image }}" 
                                                                    alt="{{ $item->alt_image }}" height="206"
                                                                    width="255" />
                                                            </div>
                                                            <div class="cat_description">
                                                                <a class="cat_name" style="text-align:center" href="{{ $item->link }}">{{ $item->name }}</a>
                                                                <div style="text-align:center">{!! substr($item->description,0,160) !!}</div>
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
        @endif

        @if($type == 'endow')
            @php
                $listItems              = Endow::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
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
                                                    {{ $section->name }}
                                                </h1>
                                            </div>
                                            <div class="woo_categories_slider woocat product-category grid">
                                                <div id="category_grid" class="category-grid grid cols-3">
                                                    @foreach ($listItems as $item)
                                                        <div style="display:inline-block" class="cat-outer-block">
                                                            <div class="cat-img-block">
                                                                <style>.icon-endow i { color:#86c54c;font-size: 3rem }</style>
                                                                <span class="icon-endow">{!! $item->icon !!}</span>
                                                            </div>
                                                            <div class="cat_description">
                                                                <a class="cat_name" style="text-align:center" href="#">{{ $item->name }}</a>
                                                                <div style="text-align:center">{!! $item->description !!}</div>
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
        @endif

        @if($type == 'album')
            @php
                $listItems = \App\Models\backend\Image::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
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
                                                    {{ $section->name }}
                                                </h1>
                                            </div>
                                            <div class="woo_categories_slider woocat product-category grid">
                                                <div id="category_grid" class="category-grid grid cols-4">
                                                    @foreach ($listItems as $item)
                                                        @php
                                                            $images = !empty( $item->image ) ? $item->image :
                                                            asset('assets/admin/dist/img/avatar5.png');
                                                        @endphp
                                                        <div style="display:inline-block" class="cat-outer-block">
                                                            <div class="cat-img-block">
                                                                <img src="{{ $images }}"
                                                                    title="{{ $item->title }}" 
                                                                    alt="{{ $item->alt_image }}" height="206"
                                                                    width="255" />
                                                            </div>
                                                            <div class="cat_description">
                                                                <a class="cat_name" style="text-align:center" href="">{{ $item->title }}</a>
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
        @endif

        @if($type == 'video')
            @php
                $listItems = \App\Models\backend\Video::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
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
                                                    {{ $section->name }}
                                                </h1>
                                            </div>
                                            <div class="woo_categories_slider woocat product-category grid">
                                                <div id="category_grid" class="category-grid grid cols-4">
                                                    @foreach ($listItems as $item)
                                                        @php
                                                            $images = !empty( $item->image ) ? $item->image :
                                                            asset('assets/admin/dist/img/avatar5.png');
                                                        @endphp
                                                        <div style="display:inline-block" class="cat-outer-block">
                                                            <div class="cat-img-block">
                                                                <a target="_blank" style="position:relative;display:block;width:255px;height:206px;background:#000;margin:0px auto;max-width:100%" href="{{ $item->video_url }}">
                                                                    <img style="opacity: 70%" src="{{ $images }}"
                                                                    title="{{ $item->title }}" 
                                                                    alt="{{ $item->alt_image }}" height="206"
                                                                    width="255" />
                                                                    <span style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:white">
                                                                        <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-play" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                                
                                                            </div>
                                                            <div class="cat_description">
                                                                <a class="cat_name" style="text-align:center" href="{{ $item->video_url }}">{{ $item->title }}</a>
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
        @endif

        @if($type == 'about')
            @php
                $listItems = \App\Models\backend\About::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
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
                                                    {{ $section->name }}
                                                </h1>
                                            </div>
                                            <div class="woo_categories_slider woocat product-category grid">
                                                <div id="category_grid" class="category-grid grid cols-2">
                                                    @foreach ($listItems as $item)
                                                        @if ($item->position == 0)
                                                            <div style="display: inline-block;width: 49%;padding-left: 1rem;padding-right: 1rem;box-sizing: border-box;vertical-align: text-top">
                                                                {!! $item->content !!}
                                                            </div>
                                                        @endif    
                                                        <div style="display: inline-block;width: 49%;padding-right: 1rem;padding-left: 1rem;box-sizing: border-box;vertical-align: text-top">
                                                            @if ($item->image)
                                                                <img src="{{ $item->image }}" alt="{{ $item->alt_image }}">
                                                            @else
                                                                {!! $item->video_embed !!}
                                                            @endif
                                                        </div>
                                                        @if ($item->position == 1)
                                                            <div style="display: inline-block;width: 49%;padding-left: 1rem;box-sizing: border-box;vertical-align: text-top">
                                                                {!! $item->content !!}
                                                            </div>
                                                        @endif
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
        
        @if($type == 'hot')
            @php
                $related_hots = \App\Models\backend\Hot::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
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
                                                    {{ $section->name }}
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
                                                                <a class="cat_name" style="text-align:center" href="{{ $hot->link }}"
                                                                    title="{{ $hot->link_title }}">{{ $hot->name }}</a>
                                                                <div style="text-align:center">{!! substr($hot->alt_image ?? '',0,160) !!}</div>
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
        @endif
    @endif
@endforeach