<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('frontend.includes.head')
  <body class="archive tax-product_cat term-petrome-rolit term-116 wp-embed-responsive theme-silvershop woocommerce woocommerce-page woocommerce-js list-view shop-left-sidebar wpb-js-composer js-comp-ver-6.1 vc_responsive">

  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=192981648374769&autoLogAppEvents=1" nonce="DmliMxmJ"></script>

  @if( !empty( $scripts->script_body ) )
      {!! $scripts->script_body !!}
    @endif

    <!-- Main Body Area Start Here -->
    <div id="page" class="hfeed site">
      <!-- Main Header-->
      @include('frontend.includes.header')
      <!--End Main Header -->
      <div id="main" class="site-main full-width box-page">
        <div class="main_inner">
          <div class="page-title header" style="display:block">
            <div class="page-title-inner">
              <h3 class="entry-title-main">{{ $data['title'] ?? '' }}</h3>
            </div>
          </div>
          <!-- Contains page content -->
            @yield('content')
          <!-- End Contains page content -->
        </div>
      </div>
      <!-- Main Footer -->
      @include('frontend.includes.footer')
      <!-- End Main Footer -->

      <!-- Cart -->
      {{-- @include('frontend.includes.cart') --}}
      <!-- End Cart -->
      <div class="backtotop">
        <a id="to_top" href="#" style="display: inline;"></a>
      </div>
    </div>
    <!--end wrapper -->

    <!-- Script -->
    @include('frontend.includes.jquery')
    <!-- End Script -->

    <!-- Social -->
{{--    @include('frontend.includes.social')--}}
    <!-- End Social -->

    <!-- Search Form -->
    {{-- @include('frontend.includes.search-form') --}}
    <!-- End Search Form -->

  </body>
</html>
