@extends($data->layout, [
    'title'             => $data['title'],
    "seo_title"         => $data['seo_title'],
    'og_image'          => $data['og_image'],
    'og_url'            => $data['og_url'],
    'seo_description'   => $data['seo_description'],
    'seo_keywords'      => $data['seo_keywords']
])

@section('title')
    {{ $data->title }}
@endsection

@section($data->content)
    @php
        $landingPage = $data['landingPage'];
    @endphp

    @if( $landingPage )
        @php
            $sections = $data['sections'];
        @endphp

        @include('frontend.pages.home.partial.slider')
        <div class="ereaders-main-content ereaders-content-padding">

        @if(!empty($sections) && count($sections) > 0)
            {!! render_sections_landing($sections) !!}
        @endif

        </div>
    @endif
@endsection
