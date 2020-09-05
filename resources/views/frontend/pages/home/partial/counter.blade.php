{{-- @if (!empty($funfact_number) || !empty($funfact_icon) || !empty($funfact_description))
    <div class="ereaders-main-section ereaders-counterfull">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ereaders-counter bounceInDown wow">
                        <ul>
                            @if (!empty($funfact_number))
                                @foreach ($funfact_number as $key => $ff_number)
                                    <li>
                                        <div class="ereaders-counter-text">
                                            {!! $funfact_icon[$key] !!}
                                            <div class="ereaders-scroller">
                                                <h2 class="numscroller" data-slno="1" data-min="0"
                                                    data-max="{{ $ff_number ?? 0 }}" data-delay="10" data-increment="9">
                                                    {{ $ff_number ?? 0 }}</h2>
                                                <span>{!! $funfact_description[$key] ?? '' !!}</span>
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
<style>
    .service-list.service-1 .icon-image::before {
        content: "{{$funfact_icon[0]}}";
    }
    .service-list.service-2 .icon-image::before {
        content: "{{$funfact_icon[1]}}";
    }
    .service-list.service-3 .icon-image::before {
        content: "{{$funfact_icon[2]}}";
    }
    .service-list.service-4 .icon-image::before {
        content: "{{$funfact_icon[3]}}";
    }

</style>
<div class="vc_row wpb_row vc_row-fluid theme-container home-service-align vc_custom_1565162299107">
    @foreach ($funfact_number as $key => $ff_number)
        <div class="wpb_column vc_column_container vc_col-sm-3">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="service-list service-{{$key+1}} style-1">
                        <div class="service-content">
                            <span class="icon-image"></span>
                            <div class="service-icon-content">
                                <a href="#" target="_self">
                                    <div class="dark-service-title">
                                        {{ $ff_number ?? 0 }}
                                    </div>
                                    <span class="service-title">{!! $funfact_description[$key] ?? '' !!}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
