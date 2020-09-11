{{-- <div id="slideshow-menu p-0">
    <div class="row wp-slideshow-menu">
        <div class="col-md-12">
            <div class="ereaders-banner">
                @if (!empty($related_sliders) && count($related_sliders) > 0)
                    @if (!empty($related_sliders[0]))
                        @php
                        $slider_images = !empty( $related_sliders[0]->images ) ? json_decode(
                        $related_sliders[0]->images ) : [];
                        $title_image = !empty( $related_sliders[0]->title_image ) ? json_decode(
                        $related_sliders[0]->title_image ) : [];
                        $alt_image = !empty( $related_sliders[0]->alt_image ) ? json_decode(
                        $related_sliders[0]->alt_image ) : [];
                        $button_title = !empty( $related_sliders[0]->button_title ) ? json_decode(
                        $related_sliders[0]->button_title ) : [];
                        $button_link = !empty( $related_sliders[0]->button_link ) ? json_decode(
                        $related_sliders[0]->button_link ) : [];
                        @endphp

                        @foreach ($slider_images as $key => $images)
                            <div class="ereaders-banner-layer">
                                <img src="{{ $images }}" alt="{{ $alt_image[$key] }}" title="{{ $title_image[$key] }}"
                                    style="width: 100%;">
                            </div>
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</div> --}}

@if (!empty($related_sliders) && count($related_sliders) > 0)
    @if (!empty($related_sliders[0]))
    @php
                        $slider_images = !empty( $related_sliders[0]->images ) ? json_decode(
                        $related_sliders[0]->images ) : [];
                        $title_image = !empty( $related_sliders[0]->title_image ) ? json_decode(
                        $related_sliders[0]->title_image ) : [];
                        $alt_image = !empty( $related_sliders[0]->alt_image ) ? json_decode(
                        $related_sliders[0]->alt_image ) : [];
                        $button_title = !empty( $related_sliders[0]->button_title ) ? json_decode(
                        $related_sliders[0]->button_title ) : [];
                        $button_link = !empty( $related_sliders[0]->button_link ) ? json_decode(
                        $related_sliders[0]->button_link ) : [];
                        @endphp
<div class="vc_row wpb_row vc_row-fluid vc_custom_1575269231855 vc_row-has-fill">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div class="vc_row wpb_row vc_inner vc_row-fluid theme-container">
                    <div class="woo_categories_list home-category wpb_column vc_column_container vc_col-sm-3">
                        {{-- <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="wpb_widgetised_column wpb_content_element">
                                    <div class="wpb_wrapper">

                                        <h3 class="widget-title">All Categories</h3>
                                        <ul class="product-categories">
                                            <li class="cat-item cat-item-103 cat-parent"><a
                                                    href="product-category/automatic-home/index.html">Automatic Home</a>
                                                <ul class='children'>
                                                    <li class="cat-item cat-item-107"><a
                                                            href="product-category/automatic-home/leather-bags/index.html">Leather
                                                            Bags</a></li>
                                                    <li class="cat-item cat-item-105"><a
                                                            href="product-category/automatic-home/net-gear-wifi/index.html">Net
                                                            Gear Wifi</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item cat-item-54 cat-parent"><a
                                                    href="product-category/coffee-bean/index.html">Coffee Bean</a>
                                                <ul class='children'>
                                                    <li class="cat-item cat-item-55"><a
                                                            href="product-category/coffee-bean/arabica/index.html">Arabica
                                                            Loremits</a></li>
                                                    <li class="cat-item cat-item-60"><a
                                                            href="product-category/coffee-bean/robusta/index.html">Robusta
                                                            Kabirits</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item cat-item-58 cat-parent"><a
                                                    href="product-category/coffee-board/index.html">Coffee Board</a>
                                                <ul class='children'>
                                                    <li class="cat-item cat-item-101"><a
                                                            href="product-category/coffee-board/sequrity-camera/index.html">Sequrity
                                                            Camera</a></li>
                                                    <li class="cat-item cat-item-102"><a
                                                            href="product-category/coffee-board/smart-watch/index.html">Smart
                                                            Watch</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item cat-item-63 cat-parent"><a
                                                    href="product-category/cup-and-glass/index.html">Cup and Glass</a>
                                                <ul class='children'>
                                                    <li class="cat-item cat-item-64"><a
                                                            href="product-category/cup-and-glass/liberica/index.html">Liberica
                                                            Niroman</a></li>
                                                    <li class="cat-item cat-item-61"><a
                                                            href="product-category/cup-and-glass/varieties/index.html">Varieties
                                                            Berica</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item cat-item-113"><a
                                                    href="product-category/distracted-tab/index.html">Distracted TAB</a>
                                            </li>
                                            <li class="cat-item cat-item-62 cat-parent"><a
                                                    href="product-category/excelscoffee/index.html">Excels Coffee</a>
                                                <ul class='children'>
                                                    <li class="cat-item cat-item-106"><a
                                                            href="product-category/excelscoffee/nikon-camera/index.html">Nikon
                                                            Camera</a></li>
                                                    <li class="cat-item cat-item-104"><a
                                                            href="product-category/excelscoffee/tech-bottles/index.html">Tech
                                                            Bottles</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item cat-item-114"><a
                                                    href="product-category/git-atracts/index.html">GIT Atracts</a></li>
                                            <li class="cat-item cat-item-66 cat-parent"><a
                                                    href="product-category/health-safety/index.html">Health &amp;
                                                    Safety</a>
                                                <ul class='children'>
                                                    <li class="cat-item cat-item-108"><a
                                                            href="product-category/health-safety/shorts-jeans/index.html">Shorts
                                                            Jeans</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item cat-item-56 cat-parent"><a
                                                    href="product-category/machines/index.html">Machines</a>
                                                <ul class='children'>
                                                    <li class="cat-item cat-item-109"><a
                                                            href="product-category/machines/awabox-fullerm/index.html">Awabox
                                                            Fullerm</a></li>
                                                    <li class="cat-item cat-item-110"><a
                                                            href="product-category/machines/oxfull-mitron/index.html">Oxfull
                                                            Mitron</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item cat-item-115"><a
                                                    href="product-category/mili-gerto/index.html">Mili Gerto</a></li>
                                            <li class="cat-item cat-item-51 cat-parent"><a
                                                    href="product-category/milk-items/index.html">Milk items</a>
                                                <ul class='children'>
                                                    <li class="cat-item cat-item-112"><a
                                                            href="product-category/milk-items/italiat-nitron/index.html">Italiat
                                                            Nitron</a></li>
                                                    <li class="cat-item cat-item-111"><a
                                                            href="product-category/milk-items/justin-gibelo/index.html">Justin
                                                            Gibelo</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item cat-item-15"><a
                                                    href="product-category/offer-zone/index.html">Offer Zone</a></li>
                                            <li class="cat-item cat-item-116"><a
                                                    href="product-category/petrome-rolit/index.html">Petrome Rolit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="rev-slider wpb_column vc_column_container vc_col-sm-9">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="wpb_revslider_element wpb_content_element">
                                    <!-- START tmpmela_homeslider REVOLUTION SLIDER 6.1.0 -->
                                    <p class="rs-p-wp-fix"></p>
                                    <rs-module-wrap id="rev_slider_3_1_wrapper" data-source="gallery"
                                        style="background:#f7f7f7;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;max-width:">
                                        <rs-module id="rev_slider_3_1" style="display:none;" data-version="6.1.0">
                                            <rs-slides>
                                                @foreach ($slider_images as $key => $images)
                                                <rs-slide data-key="rs-10" data-title="Mainbanner1"
                                                    data-thumb="{{ $images }}"
                                                    data-anim="ei:d;eo:d;s:d,d;r:0;t:slideright,slideleft;sl:d,d;">
                                                    <img src="{{ $images }}"
                                                        alt="{{ $alt_image[$key] }}" title="{{ $title_image[$key] }}" width="920"
                                                        height="530" class="rev-slidebg" data-no-retina>
                                                    <!--
                        -->
                                                    {{-- <rs-layer id="slider-3-slide-10-layer-5" data-type="text"
                                                        data-rsp_ch="on"
                                                        data-xy="x:l,l,c,c;xo:64px,127px,-176px,0;y:m;yo:-114px,-113px,-103px,-105px;"
                                                        data-text="s:60,60,50,50;l:60,60,60,50;fw:100,200,200,200;a:inherit,inherit,inherit,center;"
                                                        data-frame_0="y:-50px;tp:600;"
                                                        data-frame_1="tp:600;st:510;sp:1000;sR:510;"
                                                        data-frame_999="st:w;auto:true;" data-frame_999_mask="u:t;"
                                                        style="z-index:12;font-family:Poppins;">Discount 20%
                                                    </rs-layer> --}}
                                                    <!--

                        -->
                                                    {{-- <rs-layer id="slider-3-slide-10-layer-8" data-type="text"
                                                        data-rsp_ch="on"
                                                        data-xy="x:l,l,c,c;xo:66px,128px,-279px,0;y:m;yo:107px,109px,96px,64px;"
                                                        data-text="s:13,12,12,12;l:22,22,22,20;ls:1px;fw:400,500,500,500;a:inherit;"
                                                        data-actions='o:click;a:simplelink;target:_blank;url:#;'
                                                        data-padding="t:9,10,8,10;r:20,24,15,24;b:9,10,8,10;l:20,24,15,24;"
                                                        data-frame_0="y:50px;tp:600;"
                                                        data-frame_1="tp:600;st:1310;sp:1000;sR:1310;"
                                                        data-frame_999="st:w;auto:true;" data-frame_999_mask="u:t;"
                                                        data-frame_hover="c:#000;bgc:#fff;boc:#fff;bor:0px,0px,0px,0px;bow:0px,0px,0px,0px;oX:50;oY:50;sp:0;"
                                                        style="z-index:8;background-color:#86c54c;font-family:Poppins;text-transform:uppercase;cursor:pointer;">
                                                        Shop Now
                                                    </rs-layer> --}}
                                                    <!--

                        -->
                                                    {{-- <rs-layer id="slider-3-slide-10-layer-10" data-type="text"
                                                        data-rsp_ch="on"
                                                        data-xy="x:l,l,c,c;xo:64px,129px,-167px,0;y:m;yo:-50px,-56px,-48px,-50px;"
                                                        data-text="s:60,60,50,40;l:70,60,50,40;fw:500,500,500,600;a:inherit;"
                                                        data-frame_0="y:-50px;tp:600;"
                                                        data-frame_1="tp:600;st:1200;sp:1000;sR:1200;"
                                                        data-frame_999="st:w;auto:true;" data-frame_999_mask="u:t;"
                                                        style="z-index:11;font-family:Poppins;">Fashion Style
                                                    </rs-layer> --}}
                                                    <!--

                        -->
                                                    {{-- <rs-layer id="slider-3-slide-10-layer-12" data-type="text"
                                                        data-rsp_ch="on"
                                                        data-xy="x:l,l,l,c;xo:66px,127px,53px,0;y:t,t,t,m;yo:275px,273px,239px,13px;"
                                                        data-text="w:normal;s:16,16,14,15;l:25,25,21,17;fw:300;"
                                                        data-frame_1="st:510;sp:1000;sR:510;"
                                                        data-frame_999="o:0;st:w;sR:7490;"
                                                        style="z-index:9;font-family:Poppins;">From here you can start
                                                        your new style in trends.
                                                    </rs-layer> --}}
                                                    <!--
-->
                                                </rs-slide>
                                                @endforeach
                                                {{-- <rs-slide data-key="rs-11" data-title="Mainbanner2"
                                                    data-thumb="//wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/uploads/2019/12/main-banner-02-100x50.jpg"
                                                    data-anim="ei:d;eo:d;s:d,d;r:0;t:slideright,slideleft;sl:d,d;">
                                                    <img src="wp-content/uploads/2019/12/main-banner-02.jpg"
                                                        title="main-banner 02" width="920" height="530"
                                                        class="rev-slidebg" data-no-retina>
                                                    <rs-layer id="slider-3-slide-11-layer-5" data-type="text"
                                                        data-rsp_ch="on"
                                                        data-xy="x:l,l,c,c;xo:64px,127px,-165px,0;y:m;yo:-114px,-113px,-106px,-100px;"
                                                        data-text="s:60,60,50,50;l:60,60,60,50;fw:200;a:inherit,inherit,inherit,center;"
                                                        data-frame_0="y:-50px;tp:600;"
                                                        data-frame_1="tp:600;st:510;sp:1000;sR:510;"
                                                        data-frame_999="st:w;auto:true;" data-frame_999_mask="u:t;"
                                                        style="z-index:12;font-family:Poppins;">Discount 25%
                                                    </rs-layer>

                                                    <rs-layer id="slider-3-slide-11-layer-8" data-type="text"
                                                        data-rsp_ch="on"
                                                        data-xy="x:l,l,c,c;xo:66px,128px,-267px,0;y:m;yo:107px,120px,96px,64px;"
                                                        data-text="s:13,12,12,12;l:22,22,22,20;ls:1px;fw:400,500,500,500;a:inherit;"
                                                        data-actions='o:click;a:simplelink;target:_blank;url:#;'
                                                        data-padding="t:9,10,8,10;r:20,24,15,24;b:9,10,8,10;l:20,24,15,24;"
                                                        data-frame_0="y:50px;tp:600;"
                                                        data-frame_1="tp:600;st:1390;sp:1000;sR:1390;"
                                                        data-frame_999="st:w;auto:true;" data-frame_999_mask="u:t;"
                                                        data-frame_hover="c:#000;bgc:#fff;boc:#fff;bor:0px,0px,0px,0px;bow:0px,0px,0px,0px;oX:50;oY:50;sp:0;"
                                                        style="z-index:8;background-color:#86c54c;font-family:Poppins;text-transform:uppercase;cursor:pointer;">
                                                        Shop Now
                                                    </rs-layer>

                                                    <rs-layer id="slider-3-slide-11-layer-10" data-type="text"
                                                        data-rsp_ch="on"
                                                        data-xy="x:l,l,c,c;xo:64px,129px,-167px,0;y:m;yo:-48px,-53px,-48px,-36px;"
                                                        data-text="s:60,60,50,40;l:60,60,50,46;fw:500,500,500,600;a:inherit;"
                                                        data-frame_0="y:-50px;tp:600;"
                                                        data-frame_1="tp:600;st:1200;sp:1000;sR:1200;"
                                                        data-frame_999="st:w;auto:true;" data-frame_999_mask="u:t;"
                                                        style="z-index:11;font-family:Poppins;">Trendy Style
                                                    </rs-layer>

                                                    <rs-layer id="slider-3-slide-11-layer-12" data-type="text"
                                                        data-rsp_ch="on"
                                                        data-xy="x:l,l,l,c;xo:64px,127px,65px,0;y:t,t,t,m;yo:287px,278px,239px,10px;"
                                                        data-text="w:normal;s:16,16,14,15;l:25,25,21,17;fw:300;"
                                                        data-frame_1="st:510;sp:1000;sR:510;"
                                                        data-frame_999="o:0;st:w;sR:7490;"
                                                        style="z-index:9;font-family:Poppins;">Lorem Ipsum is simply
                                                        dummy text of the print
                                                    </rs-layer>
                                                </rs-slide> --}}
                                            </rs-slides>
                                            <rs-progress class="rs-bottom" style="visibility: hidden !important;">
                                            </rs-progress>
                                        </rs-module>
                                        <script>
                                            setREVStartSize({
                                                c: 'rev_slider_3_1',
                                                rl: [1240, 1024, 768, 480],
                                                el: [531, 531, 460, 460],
                                                gw: [900, 900, 767, 480],
                                                gh: [531, 531, 460, 460],
                                                layout: 'fullwidth',
                                                mh: "0"
                                            });
                                            var revapi3,
                                                tpj;
                                            jQuery(function() {
                                                tpj = jQuery;
                                                if (tpj("#rev_slider_3_1").revolution == undefined) {
                                                    revslider_showDoubleJqueryError("#rev_slider_3_1");
                                                } else {
                                                    revapi3 = tpj("#rev_slider_3_1").show().revolution({
                                                        jsFileLocation: "//wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/plugins/revslider/public/assets/js/",
                                                        visibilityLevels: "1240,1024,768,480",
                                                        gridwidth: "900,900,767,480",
                                                        gridheight: "531,531,460,460",
                                                        minHeight: "",
                                                        spinner: "spinner3",
                                                        editorheight: "531,531,460,460",
                                                        responsiveLevels: "1240,1024,768,480",
                                                        disableProgressBar: "on",
                                                        navigation: {
                                                            mouseScrollNavigation: false,
                                                            onHoverStop: false,
                                                            arrows: {
                                                                enable: true,
                                                                style: "custom",
                                                                hide_onmobile: false,
                                                                hide_under: 767,
                                                                hide_onleave: true,
                                                                hide_delay: 20,
                                                                rtl: true,
                                                                left: {
                                                                    container: "layergrid",
                                                                    h_offset: 10
                                                                },
                                                                right: {
                                                                    container: "layergrid",
                                                                    h_offset: 10
                                                                }
                                                            },
                                                            bullets: {
                                                                enable: false,
                                                                tmp: "",
                                                                style: "custom",
                                                                hide_over: 767,
                                                                hide_onleave: true,
                                                                container: "layergrid"
                                                            }
                                                        },
                                                        viewPort: {
                                                            enable: true,
                                                            visible_area: "20%"
                                                        },
                                                        fallbacks: {
                                                            disableFocusListener: true,
                                                            allowHTML5AutoPlayOnAndroid: true
                                                        },
                                                    });
                                                }

                                            });

                                        </script>
                                        <script>
                                            var htmlDivCss =
                                                '	#rev_slider_3_1_wrapper rs-loader.spinner3 div { background-color: #333333 !important; } ';
                                            var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
                                            if (htmlDiv) {
                                                htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                            } else {
                                                var htmlDiv = document.createElement('div');
                                                htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
                                                document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[
                                                    0]);
                                            }

                                        </script>
                                        <script>
                                            var htmlDivCss = unescape(
                                                "%23rev_slider_3_1_wrapper%20.custom.tparrows%20%7B%0A%09cursor%3Apointer%3B%0A%09background%3A%23000%3B%0A%09background%3Argba%280%2C0%2C0%2C0.5%29%3B%0A%09width%3A40px%3B%0A%09height%3A40px%3B%0A%09position%3Aabsolute%3B%0A%09display%3Ablock%3B%0A%09z-index%3A1000%3B%0A%7D%0A%23rev_slider_3_1_wrapper%20.custom.tparrows%3Ahover%20%7B%0A%09background%3A%23000%3B%0A%7D%0A%23rev_slider_3_1_wrapper%20.custom.tparrows%3Abefore%20%7B%0A%09font-family%3A%20%27revicons%27%3B%0A%09font-size%3A15px%3B%0A%09color%3A%23fff%3B%0A%09display%3Ablock%3B%0A%09line-height%3A%2040px%3B%0A%09text-align%3A%20center%3B%0A%7D%0A%23rev_slider_3_1_wrapper%20.custom.tparrows.tp-leftarrow%3Abefore%20%7B%0A%09content%3A%20%27%5Ce824%27%3B%0A%7D%0A%23rev_slider_3_1_wrapper%20.custom.tparrows.tp-rightarrow%3Abefore%20%7B%0A%09content%3A%20%27%5Ce825%27%3B%0A%7D%0A%0A%0A.custom.tp-bullets%20%7B%0A%7D%0A.custom.tp-bullets%3Abefore%20%7B%0A%09content%3A%27%20%27%3B%0A%09position%3Aabsolute%3B%0A%09width%3A100%25%3B%0A%09height%3A100%25%3B%0A%09background%3Atransparent%3B%0A%09padding%3A10px%3B%0A%09margin-left%3A-10px%3Bmargin-top%3A-10px%3B%0A%09box-sizing%3Acontent-box%3B%0A%7D%0A.custom%20.tp-bullet%20%7B%0A%09width%3A12px%3B%0A%09height%3A12px%3B%0A%09position%3Aabsolute%3B%0A%09background%3A%23aaa%3B%0A%20%20%20%20background%3Argba%28125%2C125%2C125%2C0.5%29%3B%0A%09cursor%3A%20pointer%3B%0A%09box-sizing%3Acontent-box%3B%0A%7D%0A.custom%20.tp-bullet%3Ahover%2C%0A.custom%20.tp-bullet.selected%20%7B%0A%09background%3Argb%28125%2C125%2C125%29%3B%0A%7D%0A.custom%20.tp-bullet-image%20%7B%0A%7D%0A.custom%20.tp-bullet-title%20%7B%0A%7D%0A%0A"
                                            );
                                            var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
                                            if (htmlDiv) {
                                                htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                            } else {
                                                var htmlDiv = document.createElement('div');
                                                htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
                                                document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[
                                                    0]);
                                            }

                                        </script>
                                    </rs-module-wrap>
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