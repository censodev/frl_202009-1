<div class="ereaders-main-section ereaders-service-gridfull">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ereaders-fancy-title">
                    <h2 class="bounceIn wow">{{ $home_default->title_why }}</h2>
                    <div class="clearfix"></div>
                    <div class="fadeInRight wow">{!! $home_default->content_why !!}</div>
                </div>
                <div class="ereaders-service ereaders-service-grid fadeInUp wow">
                    <ul class="row">
                        @foreach ($why_title as $k => $w_title)
                            <li class="col-md-4">
                                <div class="ereaders-service-grid-text" style="background:#fff">
                                    {!! $why_icon[$k] !!}
                                    <h5><a href="service.html">{{ $w_title }}</a></h5>
                                    <p>{{ $why_description[$k] }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
