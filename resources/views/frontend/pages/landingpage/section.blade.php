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
            <h1 class="big-title" style="color:#000;text-transform:uppercase!important">{{ $section->name }}</h1>
            {!! render_posts_list($listItems) !!}
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
                $listItems              = Slider::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
        @endif

        @if($type == 'newspaper')
            @php
                $listItems              = Newspaper::whereIn('id', $Ids)->where('status',1)->get();
            @endphp


        @endif

        @if($type == 'tv')
            @php
                $listItems              = Tv::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
        @endif

        @if($type == 'endow')
            @php
                $listItems              = Endow::whereIn('id', $Ids)->where('status',1)->get();
            @endphp
            <div class="ereaders-main-section ereaders-service-gridfull">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ereaders-fancy-title">
                                <h2 class="bounceIn wow">{{ $section->name }}</h2>
                                <div class="clearfix"></div>
                                <div class="fadeInRight wow">
                                    {!! $section->description !!}
                                </div>
                            </div>
                            <div class="ereaders-service ereaders-service-grid fadeInUp wow">
                                <ul class="row">
                                    @if(!empty($listItems) && count($listItems) > 0)
                                        @foreach($listItems as $key => $item)
                                            <li class="col-md-4">
                                                <div class="ereaders-service-grid-text">
                                                    {!! $item->icon !!}
                                                    <h5><a href="#">{{ $item->name }}</a></h5>
                                                    {!! substr($item->description,0,160) !!}
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
        @endif

    @endif
@endforeach