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
@php
$contact = $data['contact'];
$contact_info = json_decode( $contact->contact_info ) ?? array();
$images_background = $data['contact']->images_background;
$footer_contact_info = !empty( $footers->footer_contact_info ) ? json_decode( $footers->footer_contact_info ) : [];
@endphp

@section($data->content)

    {{-- @if (!empty($images_background))
        <style>
            .background-category>div {
                background: url("{{ $images_background }}");
                background-size: cover;
                background-repeat: no-repeat;
            }

        </style>
    @endif

    <div id="slideshow-menu">
        <div class="container wp-breadcrumb">
            <div class="row wp-slideshow-menu">
                <div class="col-md-3">
                    @include('frontend.pages.home.partial.sidebar-menu')
                </div>
                <div class="col-md-9 background-category">
                </div>
            </div>
        </div>
    </div>
    <div class="ereaders-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="/" title="trang chủ">Trang chủ</a></li>
                        <li class="active">{{ $data->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="ereaders-main-content">

        <div class="ereaders-main-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 google-map" id="google-map">
                        @if (!empty($contact->google_map))
                            {!! $contact->google_map !!}
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h2 class="ereaders-section-heading">Thông Tin</h2>
                        <div class="ereaders-about-education">
                            <ul>
                                <li>
                                    <span></span>
                                    <h6>Địa chỉ</h6>
                                    <p>{{ $contact_info[0] }}</p>
                                </li>
                                <li>
                                    <span></span>
                                    <h6>Số Điện thoại</h6>
                                    <a href="tel:{{ $contact_info[2] }}"
                                        title="{{ $contact_info[2] }}">{{ $contact_info[2] }}</a>
                                </li>
                                <li>
                                    <span></span>
                                    <h6>Hotline</h6>
                                    <a href="tel:{{ $footer_contact_info[3] }}"
                                        title="{{ $footer_contact_info[3] }}">{{ $footer_contact_info[3] }}</a>
                                </li>
                                <li>
                                    <span></span>
                                    <h6>Email</h6>
                                    <a href="mailto:{{ $contact_info[1] }}"
                                        title="{{ $contact_info[1] }}">{{ $contact_info[1] }}</a>
                                </li>
                                <li>
                                    <span></span>
                                    <h6>Mở Cửa</h6>
                                    <a href="#" title="{{ $footer_contact_info[2] }}">{{ $footer_contact_info[2] }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ereaders-contact-form">
                            <h2 class="ereaders-section-heading">Liên Hệ Chúng Tôi</h2>
                            <form id="contact-form" action="{{ route('contact_submit') }}" method="post" class="myform">
                                {{ csrf_field() }}
                                <input type="hidden" name="alias_contact" value="{{ url()->current() }}">
                                <ul>
                                    <li>
                                        <input value="{{ old('fullname') }}" type="text" name="fullname"
                                            placeholder="Họ tên" required>
                                        <i class="fa fa-user"></i>
                                    </li>
                                    <li>
                                        <input value="{{ old('email') }}" type="text" name="email" placeholder="Email"
                                            required>
                                        <i class="fa fa-envelope"></i>
                                    </li>
                                    <li>
                                        <input value="{{ old('phone') }}" type="text" name="phone"
                                            placeholder="Số điện thoại" required>
                                        <i class="fa fa-phone"></i>
                                    </li>
                                    <li>
                                        <input value="{{ old('address') }}" type="text" name="phone" placeholder="Địa Chỉ"
                                            required>
                                        <i class="fa fa-map-marker"></i>
                                    </li>
                                    <li class="full-form">
                                        <textarea placeholder="Lời nhắn" name="message"></textarea>
                                        <i class="fa fa-pencil-square-o"></i>
                                    </li>
                                    <li class="full-width">
                                        <input type="submit" name="submit" value="Send Now">
                                        <span class="output_message"></span>
                                    </li>
                                </ul>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
    <div class="main-content-inner full-width">
        <nav class="woocommerce-breadcrumb">
            <span><a href="{{ url('/') }}">Trang chủ</a></span> /
            <span>{{ $data['title'] }}</span>
        </nav>
        <div id="main-content" class="main-content full-width box-page">
            <div id="primary" class="content-area">
                <div id="content" class="site-content" role="main">
                    <article id="post-476" class="post-476 page type-page status-publish hentry">
                        <div class="entry-content">
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1576304638017">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="vc_row wpb_row vc_inner vc_row-fluid content-main-other">
                                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                                    <div class="vc_column-inner">
                                                        <div class="wpb_wrapper">
                                                            <div class="wpb_gmaps_widget wpb_content_element google-map">
                                                                <div class="wpb_wrapper">
                                                                    <div class="wpb_map_wraper">
                                                                        {!! $contact->google_map !!}
                                                                        {{-- <iframe
                                                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3154.9582524048187!2d-122.42377728432723!3d37.744123621694605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e42e1b683a9%3A0x225f82d9da5726a2!2s60+29th+St+%23343%2C+San+Francisco%2C+CA+94110%2C+USA!5e0!3m2!1sen!2sin!4v1501570738622"
                                                                            width="600" height="450" frameborder="0"
                                                                            style="border: 0" allowfullscreen></iframe> --}}
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
                            <div class="vc_row wpb_row vc_row-fluid custom-content-main vc_custom_1554721592807">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="shortcode-title left">
                                                <h1 class="normal-title" style="margin-top: 2rem">LIÊN HỆ CHÚNG TÔI</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1554788778960">
                                <div class="contact-form-left wpb_column vc_column_container vc_col-sm-8">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div role="form" class="wpcf7" id="wpcf7-f5-p476-o1" lang="en-US" dir="ltr">
                                                <div class="screen-reader-response"></div>
                                                <form action="{{ route('contact_submit') }}" method="post" class="wpcf7-form">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="alias_contact" value="{{ url()->current() }}">
                                                    <div class="contact-left">
                                                        <div class="text-col">
                                                            <label> Họ tên </label>
                                                            <span class="wpcf7-form-control-wrap your-name">
                                                                <input type="text"
                                                                    name="fullname" value="{{ old('fullname') }}"
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                    aria-required="true" aria-invalid="false"
                                                                    required />
                                                            </span>
                                                        </div>
                                                        <div class="text-col">
                                                            <label> Email </label>
                                                            <span class="wpcf7-form-control-wrap your-email">
                                                                <input type="email"
                                                                    name="email" value="{{ old('email') }}"
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                                    aria-required="true" aria-invalid="false"
                                                                    required />
                                                            </span>
                                                        </div>
                                                        <div class="text-col">
                                                            <label> Số điện thoại </label>
                                                            <span class="wpcf7-form-control-wrap your-subject">
                                                                <input
                                                                    type="text" name="phone" value="{{ old('phone') }}"
                                                                    class="wpcf7-form-control wpcf7-text"
                                                                    aria-invalid="false"
                                                                    required />
                                                            </span>
                                                        </div>
                                                        <div class="text-col">
                                                            <label> Địa chỉ </label>
                                                            <span class="wpcf7-form-control-wrap your-subject">
                                                                <input
                                                                    type="text" name="address" value="{{ old('address') }}"
                                                                    class="wpcf7-form-control wpcf7-text"
                                                                    aria-invalid="false"
                                                                    required />
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="text-area-col">
                                                        <label> Lời nhắn </label>
                                                        <span class="wpcf7-form-control-wrap your-message">
                                                            <textarea name="message" cols="40" rows="10"
                                                                class="wpcf7-form-control wpcf7-textarea"
                                                                aria-invalid="false"
                                                                required></textarea></span><br />
                                                        <input type="submit" value="Send"
                                                            class="wpcf7-form-control wpcf7-submit" />
                                                    </div>
                                                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-form-right wpb_column vc_column_container vc_col-sm-4">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="address-container hb-animate-element right-to-left">
                                                <h1 class="address-title simple-title">
                                                    <span>THÔNG TIN LIÊN HỆ</span>
                                                </h1>
                                                <div class="address-text first">
                                                    <div class="address-text-inner">
                                                        <div class="icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </div>
                                                        <div class="content">
                                                            <div class="address-label"></div>
                                                            {{ $contact_info[0] }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="address-text second">
                                                    <div class="address-text-inner">
                                                        <div class="icon">
                                                            <i class="fa fa-phone"></i>
                                                        </div>
                                                        <div class="content">
                                                            <div class="address-label"></div>
                                                            <a href="tel:{{ $contact_info[2] }}"
                                                                title="{{ $contact_info[2] }}">{{ $contact_info[2] }}</a>
                                                            <br>
                                                            <a href="tel:{{ $footer_contact_info[3] }}"
                                                                title="{{ $footer_contact_info[3] }}">{{ $footer_contact_info[3] }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="address-text third">
                                                    <div class="address-text-inner">
                                                        <div class="icon">
                                                            <i class="fa fa-envelope"></i>
                                                        </div>
                                                        <div class="content">
                                                            <div class="address-label"></div>
                                                            <a href="mailto:{{ $contact_info[1] }}"
                                                                title="{{ $contact_info[1] }}">{{ $contact_info[1] }}</a>
                                                            <p>{{ $footer_contact_info[2] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="inner-container"></div>
                            <!-- .inner-container -->
                        </div>
                        <!-- .entry-content -->
                    </article>
                    <!-- #post-## -->
                </div>
                <!-- #content -->
            </div>
            <!-- #primary -->
        </div>
    <div class="main-content-inner full-width">
@endsection
