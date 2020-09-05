<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<base href="{{ asset('') }}">
<title> {{ $data['title'] ?? "Vinachali" }}</title>

@php
$favicon_img = asset('assets/client/dist/img/favicon.ico');
if( !empty( $favicon ) && !empty( $favicon->images ) ) {
  $favicon_img = $favicon->images;
}
@endphp

<link rel="shortcut icon" href="{{ $favicon_img }}" type="image/x-icon">
<link rel="icon" href="{{ $favicon_img }}" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="{{ $seo_description ?? '' }}">
<meta name="keywords" content="{{ $seo_keywords ?? '' }}">
<meta property="og:type" content="{{ $data['page_type'] ?? 'article'}}">
<meta property="og:description" content="{{ $seo_description ?? '' }}">
<meta property="og:url" content="@if(!empty($og_url)){{ asset($og_url) }}@else{{ asset('/') }}@endif">
<meta property="og:site_name" content="@if(!empty($seo_title)){{ $seo_title }}@else{{ $title ?? '' }}@endif">
<meta property="og:title" content="@if(!empty($seo_title)){{ $seo_title }}@else{{ $title ?? '' }}@endif" />
<meta property="og:image" content="{{ $og_image ?? '' }}" />
<meta property="fb:app_id" content="">

{{-- <link href="{{ asset('assets/client/dist/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/client/dist/css/font-awesome.css ') }}" rel="stylesheet">
<link href="{{ asset('assets/client/dist/css/flaticon.css') }}" rel="stylesheet">
<link href="{{ asset('assets/client/dist/css/slick-slider.css')}}" rel="stylesheet">
<link href="{{ asset('assets/client/dist/css/fancybox.css') }}" rel="stylesheet">
<link href="{{ asset('assets/client/dist/css/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/client/dist/css/owl.theme.default.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/client/dist/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/client/dist/css/color.css') }}" rel="stylesheet">
<link href="{{ asset('assets/client/dist/css/responsive.css') }}" rel="stylesheet"> --}}




<script>document.documentElement.className = document.documentElement.className + ' yes-js js_active js'</script>
<script type='application/ld+json' class='yoast-schema-graph yoast-schema-graph--main'>{"@context":"https://schema.org","@graph":[{"@type":"WebSite","@id":"http://wordpress.templatemela.com/woo/WCM02/WCM020036/#website","url":"http://wordpress.templatemela.com/woo/WCM02/WCM020036/","name":"Silvershop","description":"Just another WordPress site","potentialAction":{"@type":"SearchAction","target":"http://wordpress.templatemela.com/woo/WCM02/WCM020036/?s={search_term_string}","query-input":"required name=search_term_string"}},{"@type":"WebPage","@id":"http://wordpress.templatemela.com/woo/WCM02/WCM020036/1/#webpage","url":"http://wordpress.templatemela.com/woo/WCM02/WCM020036/1/","inLanguage":"en-US","name":"1 - Silvershop","isPartOf":{"@id":"http://wordpress.templatemela.com/woo/WCM02/WCM020036/#website"},"datePublished":"2019-12-10T14:52:05+00:00","dateModified":"2019-12-10T14:52:05+00:00","breadcrumb":{"@id":"http://wordpress.templatemela.com/woo/WCM02/WCM020036/1/#breadcrumb"}},{"@type":"BreadcrumbList","@id":"http://wordpress.templatemela.com/woo/WCM02/WCM020036/1/#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"item":{"@type":"WebPage","@id":"http://wordpress.templatemela.com/woo/WCM02/WCM020036/","url":"http://wordpress.templatemela.com/woo/WCM02/WCM020036/","name":"Home"}},{"@type":"ListItem","position":2,"item":{"@type":"WebPage","@id":"http://wordpress.templatemela.com/woo/WCM02/WCM020036/1/","url":"http://wordpress.templatemela.com/woo/WCM02/WCM020036/1/","name":"1"}}]}]}</script>
<script>
    window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.2.7"}};
    !function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55357,56424,55356,57342,8205,55358,56605,8205,55357,56424,55356,57340],[55357,56424,55356,57342,8203,55358,56605,8203,55357,56424,55356,57340]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
</script>
<style>
    img.wp-smiley,
    img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 .07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }
</style>
<link rel='stylesheet' id='google-fonts-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C300%2C400%2C500%2C700%2C900&amp;ver=1.0.0#038;subset=latin%2Clatin-ext' media='all' />
<link rel='stylesheet' id='tmpmela-block-style-css'  href="{{ asset('wp-content/themes/silvershop/css/megnor/blocks6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='tmpmela-isotope-css'  href="{{ asset('wp-content/themes/silvershop/css/isotop-port6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='tmpmela-custom-css'  href="{{ asset('wp-content/themes/silvershop/css/megnor/custom6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='owl-carousel-css'  href="{{ asset('wp-content/themes/silvershop/css/megnor/owl.carousel6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='owl-transitions-css'  href="{{ asset('wp-content/themes/silvershop/css/megnor/owl.transitions6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='shadowbox-css'  href="{{ asset('wp-content/themes/silvershop/css/megnor/shadowbox6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='tmpmela-shortcode-style-css'  href="{{ asset('wp-content/themes/silvershop/css/megnor/shortcode_style6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='animate-min-css'  href="{{ asset('wp-content/themes/silvershop/css/megnor/animate.min6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='tmpmela-woocommerce-css-css'  href="{{ asset('wp-content/themes/silvershop/css/megnor/woocommerce6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='wp-block-library-css'  href="{{ asset('wp-includes/css/dist/block-library/style.min6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='wp-block-library-theme-css'  href="{{ asset('wp-includes/css/dist/block-library/theme.min6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='wc-block-style-css'  href="{{ asset('wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/style747d.css?ver=2.4.5') }}" media='all' />
<link rel='stylesheet' id='jquery-selectBox-css'  href="{{ asset('wp-content/plugins/yith-woocommerce-wishlist/assets/css/jquery.selectBox7359.css?ver=1.2.0') }}" media='all' />
<link rel='stylesheet' id='yith-wcwl-font-awesome-css'  href="{{ asset('wp-content/plugins/yith-woocommerce-wishlist/assets/css/font-awesome.min1849.css?ver=4.7.0') }}" media='all' />
<link rel='stylesheet' id='yith-wcwl-main-css'  href="{{ asset('wp-content/plugins/yith-woocommerce-wishlist/assets/css/style19ce.css?ver=3.0.3') }}" media='all' />
<link rel='stylesheet' id='contact-form-7-css'  href="{{ asset('wp-content/plugins/contact-form-7/includes/css/stylesb62d.css?ver=5.1.6') }}" media='all' />
<link rel='stylesheet' id='rs-plugin-settings-css'  href="{{ asset('wp-content/plugins/revslider/public/assets/css/rs642c6.css?ver=6.1.0') }}" media='all' />
<style id='rs-plugin-settings-inline-css'>
    #rs-demo-id {}
</style>
<link rel='stylesheet' id='apm-styles-css'  href="{{ asset('wp-content/plugins/woocommerce-accepted-payment-methods/assets/css/style6e7a.css?ver=5.2.7') }}" media='all' />
<style id='woocommerce-inline-inline-css'>
    .woocommerce form .form-row .required { visibility: visible; }
</style>
<link rel='stylesheet' id='jquery-colorbox-css'  href="{{ asset('wp-content/plugins/yith-woocommerce-compare/assets/css/colorbox6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='yith-quick-view-css'  href="{{ asset('wp-content/plugins/yith-woocommerce-quick-view/assets/css/yith-quick-view6e7a.css?ver=5.2.7') }}" media='all' />
<style id='yith-quick-view-inline-css'>
    #yith-quick-view-modal .yith-wcqv-main{background:#ffffff;}
    #yith-quick-view-close{color:#000000;}
    #yith-quick-view-close:hover{color:#ff0000;}
</style>
<link rel='stylesheet' id='woocommerce_prettyPhoto_css-css'  href="{{ asset('wp-content/plugins/woocommerce/assets/css/prettyPhoto6e7a.css?ver=5.2.7') }}" media='all' />
<link rel='stylesheet' id='tmpmela-fonts-css'  href='http://fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C400%2C600%2C300italic%2C400italic%2C600italic%7CBitter%3A400%2C600&amp;subset=latin%2Clatin-ext' media='all' />
<link rel='stylesheet' id='FontAwesome-css'  href="{{ asset('wp-content/themes/silvershop/fonts/css/font-awesome1849.css?ver=4.7.0') }}" media='all' />
<link rel='stylesheet' id='tmpmela-style-css'  href="{{ asset('wp-content/themes/silvershop/style5152.css?ver=1.0') }}" media='all' />
<link rel='stylesheet' id='js_composer_front-css'  href="{{ asset('wp-content/plugins/js_composer/assets/css/js_composer.min9b2d.css?ver=6.1') }}" media='all' />
<script src="{{ asset('wp-includes/js/jquery/jquery4a5f.js?ver=1.12.4-wp') }}"></script>
<script src="{{ asset('wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1') }}"></script>
<script src="{{ asset('wp-content/plugins/revslider/public/assets/js/revolution.tools.minf049.js?ver=6.0') }}"></script>
<script src="{{ asset('wp-content/plugins/revslider/public/assets/js/rs6.min42c6.js?ver=6.1.0') }}"></script>
<script src="{{ asset('wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70') }}"></script>
<script>
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/woo\/WCM02\/WCM020036\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/woo\/WCM02\/WCM020036\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"http:\/\/wordpress.templatemela.com\/woo\/WCM02\/WCM020036\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>
<script src="{{ asset('wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min7e2e.js?ver=3.8.1') }}"></script>
<script src="{{ asset('wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cart9b2d.js?ver=6.1') }}"></script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/jquery.custom.min6e7a.js?ver=5.2.7') }}"></script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/megnor.min6e7a.js?ver=5.2.7') }}"></script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/custom6e7a.js?ver=5.2.7') }}"></script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/owl.carousel.min6e7a.js?ver=5.2.7') }}"></script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/jquery.validate6e7a.js?ver=5.2.7') }}"></script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/shadowbox6e7a.js?ver=5.2.7') }}"></script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/jquery.megamenu6e7a.js?ver=5.2.7') }}"></script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/easyResponsiveTabs6e7a.js?ver=5.2.7') }}"></script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/jquery.treeview6e7a.js?ver=5.2.7') }}"></script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/countUp6e7a.js?ver=5.2.7') }}"></script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/jquery.countdown.min6e7a.js?ver=5.2.7') }}"></script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/jquery.bxslider6e7a.js?ver=5.2.7') }}"></script>
<!--[if lt IE 9]>
<script src='http://wordpress.templatemela.com/woo/WCM02/WCM020036/wp-content/themes/silvershop/js/html5.js?ver=5.2.7'></script>
<![endif]-->
<script>
/* <![CDATA[ */
var php_var = {"tmpmela_loadmore":"","tmpmela_pagination":"","tmpmela_nomore":""};
/* ]]> */
</script>
<script src="{{ asset('wp-content/themes/silvershop/js/megnor/megnorloadmore6e7a.js?ver=5.2.7') }}"></script>
<link rel='https://api.w.org/' href='../wp-json/index.html' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="../xmlrpc0db0.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{{ asset('wp-includes/wlwmanifest.xml') }}" /> 
<meta name="generator" content="WordPress 5.2.7" />
<meta name="generator" content="WooCommerce 3.8.1" />
<link rel='shortlink' href='../indexa476.html?p=9543' />
<link rel="alternate" type="application/json+oembed" href="../wp-json/oembed/1.0/embedd37d.json?url=http%3A%2F%2Fwordpress.templatemela.com%2Fwoo%2FWCM02%2FWCM020036%2F1%2F" />
<link rel="alternate" type="text/xml+oembed" href="../wp-json/oembed/1.0/embed5c59?url=http%3A%2F%2Fwordpress.templatemela.com%2Fwoo%2FWCM02%2FWCM020036%2F1%2F&amp;format=xml" />
<meta name="generator" content="/var/www/html/woo/WCM02/WCM020036/wp-content/themes/silvershop/style.css - " />
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'/>
<style>
h1 {
font-family: 'Roboto', Arial, Helvetica, sans-serif;
}
h1 {
color: #000000;
}
h2 {
font-family: 'Roboto', Arial, Helvetica, sans-serif;
}
h2 {
color: #000000;
}
h3 {
font-family: 'Roboto', Arial, Helvetica, sans-serif;
}
h3 {
color: #000000;
}
h4 {
font-family: 'Roboto', Arial, Helvetica, sans-serif;
}
h4 {
color: #000000;
}
h5 {
font-family: 'Roboto', Arial, Helvetica, sans-serif;
}
h5 {
color: #000000;
}
h6 {
font-family: 'Roboto', Arial, Helvetica, sans-serif;
}
h6 {
color: #000000;
}
.home-service h3.widget-title {
font-family: 'Roboto', Arial, Helvetica, sans-serif;
}
a {
color: #000000;
}
a:hover, li.product a:hover .product-name, .entry-meta a:hover, .tabs a.current, a.active, .entry-thumbnail .comments-link a:hover, .cat-outer-block .cat_description a:hover, .post-detail a:hover, .current-cat > a, .cart-label:hover {
color: #E5534C;
}
.site-footer .widget-title {
color: #FFFFFF;
}
.footer a, .site-footer a, .site-footer {
color: #9E9E9E;
}
.footer a:hover, .footer .footer-links li a:hover, .site-footer a:hover {
color: #E5534C;
}
.footer-outer {
background-color: rgba(27,27,25,1);
}
.site-footer .footer-outer .widget-title, .footer-outer {
color: #FFFFFF;
}
.site-footer {
background-color: #1B1B19;
}
h3 {
font-family: 'Roboto', Arial, Helvetica, sans-serif;
}
.site-footer {
font-family: 'Roboto', Arial, Helvetica, sans-serif;
}
body {
background-color: #FFFFFF;
color: #000000;
}
.mega-menu ul li a {
color: #000000;
}
.mega-menu ul li a:hover, .mega-menu .current_page_item > a {
color: #E5534C;
}
.mega-menu ul li .sub a {
color: #000000;
}
.mega-menu ul li .sub a:hover {
color: #E5534C;
}
.mega-menu ul li .sub {
background-color: #FFFFFF;
}
.topbar-outer {
background-color: rgba(27,27,25,1);
font-family: 'Roboto', Arial, Helvetica, sans-serif;
}
.topbar-link-toggle, .topbar-link-toggle:before,
.topbar-outer, .topbar-outer a {
color: #9E9E9E;
}
.topbar-link-toggle:hover, .topbar-link-toggle:hover::before,
.topbar-outer a:hover {
color: #E5534C;
}
.site-header, .sticky-menu .header-style {
background-color: rgba(255,255,255,1);
}
.header-top {
background-color: rgba(255,255,255,1);
}
.header-offer-link{
color: #E5534C;
}
body {
font-family: 'Roboto', Arial, Helvetica, sans-serif;
}
.widget button, .widget input[type="button"], .widget input[type="reset"], .widget input[type="submit"], a.button, button, .contributor-posts-link, input[type="button"], input[type="reset"], input[type="submit"], .button_content_inner a, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce .wishlist_table td.product-add-to-cart a, .woocommerce .wc-proceed-to-checkout .checkout-button:hover,
.woocommerce-page input.button:hover, .woocommerce #content input.button.disabled, .woocommerce #content input.button:disabled, .woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce-page #content input.button.disabled, .woocommerce-page #content input.button:disabled, .woocommerce-page #respond input#submit.disabled, .woocommerce-page #respond input#submit:disabled, .woocommerce-page a.button.disabled, .woocommerce-page a.button:disabled, .woocommerce-page button.button.disabled, .woocommerce-page button.button:disabled, .woocommerce-page input.button.disabled, .woocommerce-page input.button:disabled, .loadgridlist-wrapper .woocount,
.woocommerce .yith-wcwl-add-to-wishlist a.add_to_wishlist, .woocommerce ul.products li.product .yith-wcwl-wishlistaddedbrowse a, .woocommerce ul.products li.product .yith-wcwl-wishlistaddedbrowse a,
.woocommerce ul.products li.product .yith-wcwl-wishlistexistsbrowse a, .woocommerce-page ul.products li.product .yith-wcwl-wishlistexistsbrowse a {
background-color: rgba(229,83,76,1);
color: #FFFFFF;
font-family: 'Roboto', Arial, Helvetica, sans-serif;
}
.widget input[type="button"]:hover, .widget input[type="button"]:focus, .widget input[type="reset"]:hover, .widget input[type="reset"]:focus, .widget input[type="submit"]:hover, .widget input[type="submit"]:focus, a.button:hover, a.button:focus, button:hover, button:focus, .contributor-posts-link:hover, input[type="button"]:hover, input[type="button"]:focus, input[type="reset"]:hover, input[type="reset"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, .calloutarea_button a.button:hover, .calloutarea_button a.button:focus, .button_content_inner a:hover, .button_content_inner a:focus, .woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page button.button:hover, .woocommerce #content table.cart .checkout-button:hover, #primary .entry-summary .single_add_to_cart_button:hover, .loadgridlist-wrapper .woocount:hover, .woocommerce .wc-proceed-to-checkout .checkout-button:hover,
.woocommerce .yith-wcwl-add-to-wishlist a.add_to_wishlist:hover, .woocommerce ul.products li.product .yith-wcwl-wishlistaddedbrowse a:hover, .woocommerce ul.products li.product .yith-wcwl-wishlistaddedbrowse a:hover,
.woocommerce ul.products li.product .yith-wcwl-wishlistexistsbrowse a:hover, .woocommerce-page ul.products li.product .yith-wcwl-wishlistexistsbrowse a:hover,        
.widget input[type="button"]:active, .widget input[type="reset"]:active, .widget input[type="submit"]:active, button:active, .contributor-posts-link:active, input[type="button"]:active, input[type="reset"]:active, input[type="submit"]:active, .calloutarea_button a.button:active, .button_content_inner a:active, .woocommerce #content input.button:active, .woocommerce #respond input#submit:active, .woocommerce a.button:active, .woocommerce button.button:active, .woocommerce input.button:active, .woocommerce-page #content input.button:active, .woocommerce-page #respond input#submit:active, .woocommerce-page a.button:active, .woocommerce-page button.button:active, .woocommerce-page input.button:active,.woocommerce .wishlist_table td.product-add-to-cart a:hover{
background-color: rgba(0,0,0,1);
color: #FFFFFF;
}
.woocommerce ul.products li.product .product_type_simple.button, .woocommerce-page ul.products li.product .product_type_simple.button, .woocommerce ul.products li.product .product_type_grouped.button, 
.woocommerce-page ul.products li.product .product_type_grouped.button, .woocommerce ul.products li.product .product_type_external.button, .woocommerce-page ul.products li.product .product_type_external.button, 
.woocommerce ul.products li.product .product_type_variable.button, .woocommerce-page ul.products li.product .product_type_variable.button, .woocommerce a.compare.button,.woocommerce .button.yith-wcqv-button, 
.woocommerce ul.products li.product .yith-wcwl-wishlistexistsbrowse a, .woocommerce .yith-wcwl-add-to-wishlist a.add_to_wishlist, .home-featured-carousel .product-detail .product_type_simple, 
.home-featured-carousel .product-detail .add_to_cart_button, .home-featured-carousel .product-detail .product_type_grouped, .home-featured-carousel .product-detail .product_type_external, 
.home-featured-carousel .product-detail .product_type_variable,
.feature-image-wrapper .product-block-hover .yith-wcwl-wishlistexistsbrowse a:before,
.feature-image-wrapper .product-block-hover .yith-wcwl-add-to-wishlist{
background-color: rgba(229,83,76,1);
color: #FFFFFF;
}
.woocommerce ul.products li.product .product_type_simple.button:hover, .woocommerce-page ul.products li.product .product_type_simple.button:hover, .woocommerce ul.products li.product .product_type_grouped.button:hover, 
.woocommerce-page ul.products li.product .product_type_grouped.button:hover, .woocommerce ul.products li.product .product_type_external.button:hover, .woocommerce-page ul.products li.product .product_type_external.button:hover, 
.woocommerce ul.products li.product .product_type_variable.button:hover, .woocommerce-page ul.products li.product .product_type_variable.button:hover,.woocommerce a.compare.button:hover,.woocommerce .button.yith-wcqv-button:hover, 
.woocommerce ul.products li.product .yith-wcwl-wishlistexistsbrowse a:hover, .woocommerce .yith-wcwl-add-to-wishlist a.add_to_wishlist:hover, .home-featured-carousel .product-detail .product_type_simple:hover, 
.home-featured-carousel .product-detail .add_to_cart_button:hover,
.home-featured-carousel .product-detail .product_type_grouped:hover,
.home-featured-carousel .product-detail .product_type_external:hover, 
.home-featured-carousel .product-detail .product_type_variable:hover,
.feature-image-wrapper .product-block-hover .yith-wcwl-wishlistexistsbrowse a:hover:before,
.feature-image-wrapper .product-block-hover .yith-wcwl-add-to-wishlist:hover {
background-color: rgba(0,0,0,1);
color: #FFFFFF;
}
</style>
<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
<meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress."/>
<meta name="generator" content="Powered by Slider Revolution 6.1.0 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
<script>function setREVStartSize(a){try{var b,c=document.getElementById(a.c).parentNode.offsetWidth;if(c=0===c||isNaN(c)?window.innerWidth:c,a.tabw=void 0===a.tabw?0:parseInt(a.tabw),a.thumbw=void 0===a.thumbw?0:parseInt(a.thumbw),a.tabh=void 0===a.tabh?0:parseInt(a.tabh),a.thumbh=void 0===a.thumbh?0:parseInt(a.thumbh),a.tabhide=void 0===a.tabhide?0:parseInt(a.tabhide),a.thumbhide=void 0===a.thumbhide?0:parseInt(a.thumbhide),a.mh=void 0===a.mh||""==a.mh?0:a.mh,"fullscreen"===a.layout||"fullscreen"===a.l)b=Math.max(a.mh,window.innerHeight);else{for(var d in a.gw=Array.isArray(a.gw)?a.gw:[a.gw],a.rl)(void 0===a.gw[d]||0===a.gw[d])&&(a.gw[d]=a.gw[d-1]);for(var d in a.gh=void 0===a.el||""===a.el||Array.isArray(a.el)&&0==a.el.length?a.gh:a.el,a.gh=Array.isArray(a.gh)?a.gh:[a.gh],a.rl)(void 0===a.gh[d]||0===a.gh[d])&&(a.gh[d]=a.gh[d-1]);var e,f=Array(a.rl.length),g=0;for(var d in a.tabw=a.tabhide>=c?0:a.tabw,a.thumbw=a.thumbhide>=c?0:a.thumbw,a.tabh=a.tabhide>=c?0:a.tabh,a.thumbh=a.thumbhide>=c?0:a.thumbh,a.rl)f[d]=a.rl[d]<window.innerWidth?0:a.rl[d];for(var d in e=f[0],f)e>f[d]&&0<f[d]&&(e=f[d],g=d);var h=c>a.gw[g]+a.tabw+a.thumbw?1:(c-(a.tabw+a.thumbw))/a.gw[g];b=a.gh[g]*h+(a.tabh+a.thumbh)}void 0===window.rs_init_css&&(window.rs_init_css=document.head.appendChild(document.createElement("style"))),document.getElementById(a.c).height=b,window.rs_init_css.innerHTML+="#"+a.c+"_wrapper { height: "+b+"px }"}catch(a){console.log("Failure at Presize of Slider:"+a)}};</script>
<noscript><style> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
<style data-type="vc_shortcodes-custom-css">
    .vc_custom_1575269231855 {
      padding-bottom: 20px !important;
      background-position: 0 0 !important;
      background-repeat: no-repeat !important;
    }
    .vc_custom_1565162299107 {
      padding-top: 3% !important;
      padding-bottom: 3% !important;
    }
    .vc_custom_1565953090582 {
      padding-top: 15px !important;
      padding-bottom: 2.7% !important;
    }
    .vc_custom_1565957026585 {
      padding-top: 3% !important;
      padding-bottom: 20px !important;
    }
    .vc_custom_1565954330118 {
      padding-top: 15px !important;
      padding-bottom: 25px !important;
    }
    .vc_custom_1575458683825 {
      padding-top: 15px !important;
      padding-bottom: 15px !important;
      background-position: 0 0 !important;
      background-repeat: no-repeat !important;
    }
    .vc_custom_1576308428167 {
      padding-top: 10px !important;
      padding-bottom: 20px !important;
    }
    .vc_custom_1575098662200 {
      padding-top: 30px !important;
      padding-bottom: 30px !important;
    }
</style>


@if( !empty( $data['seo_google'] ) )
    {!! $data['seo_google'] !!}
@endif

@if( !empty( $data['seo_facebook'] ) )
    {!! $data['seo_facebook'] !!}
@endif

@if( !empty( $scripts->script_head ) )
    {!! $scripts->script_head !!}
@endif

{{--    schema sản phẩm--}}
@if( !empty( $data['schema_product'] ) )
    <script type="application/ld+json">
        {!! $data['schema_product'] !!}
    </script>
@endif

{{--    schema bài viết--}}
@if( !empty( $data['schema_post'] ) )
    <script type="application/ld+json">
        {!! $data['schema_post'] !!}
    </script>
@endif

{{--    schema doanh nghiệp--}}
@if( !empty( $data['schema_business'] ) )
    <script type="application/ld+json">
        {!! $data['schema_business'] !!}
    </script>
@endif

{{--    schema logo--}}
@if( !empty( $data['schema_logo'] ) )
    <script type="application/ld+json">
        {!! $data['schema_logo'] !!}
    </script>
@endif

{{--    schema ô tìm kiếm--}}
@if( !empty( $data['schema_search'] ) )
    <script type="application/ld+json">
        {!! $data['schema_search'] !!}
    </script>
@endif

{{--    schema breadcrumb--}}
@if( !empty( $data['schema_breadcrumb'] ) )
    <script type="application/ld+json">
        {!! $data['schema_breadcrumb'] !!}
    </script>
@endif

</head>
