<?php
use App\Models\backend\ProductItem; ?>

@extends($data->layout, [
'title' => $data['title'],
"seo_title" => $data['seo_title'],
'og_image' => $data['og_image'],
'og_url' => $data['og_url'],
'seo_description' => $data['seo_description'],
'seo_keywords' => $data['seo_keywords'],
'post_detail' => $data['post_detail']
])

@section('title')
    {{ $data->title }}
@endsection

@section($data->content)
    @php
    $post_detail = $data['post_detail'];
    $category_detail = $data['category_detail'];
    $images = $post_detail->images ?? '';
    $title_image = $post_detail->title_image ?? $post_detail->title;
    $alt_image = $post_detail->alt_image ?? $post_detail->title;

    if( !empty( $post_detail->created_at ) ) {
    $created_at = date_create($post_detail->created_at);
    $post_date = date_format($created_at,"d/m/Y");
    }else {
    $post_date = '';
    }

    $viewed_post = $data['viewed_post'];
    $related_posts = $data['related_posts'];
    $related_products = $data['related_products'];
    @endphp
{{-- 
    @include('frontend.includes.breadcrumb-detail-blog')

    <div class="ereaders-main-content">

        <div class="ereaders-main-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-meta mb-20">
                            <ul>
                                <li>Ngày đăng: <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $post_date }}</li>
                                <li>Lượt xem: <i class="fa fa-eye" aria-hidden="true"></i> {{ $post_detail->view }}</li>
                                <li>Đánh giá: <i class="fa fa-star" aria-hidden="true"></i> {{ $post_detail->rating }}</li>
                            </ul>
                        </div>
                        <div class="ereaders-rich-editor">
                            {!! $post_detail->description !!}
                        </div>

                        @include('frontend.includes.comment')

                        @if (!empty($related_posts) && count($related_posts) > 0)
                            <h3 class="ereaders-section-heading">Bài Viết Liên Quan</h3>
                            <div class="ereaders-blog ereaders-shop-grid">
                                <ul class="row">
                                    {!! render_posts($related_posts) !!}
                                </ul>
                            </div>
                        @endif

                        @if (!empty($related_products) && count($related_products) > 0)
                            <h3 class="ereaders-section-heading">Sản Phẩm Liên Quan</h3>
                            <div class="ereaders-shop ereaders-shop-grid">
                                <ul class="row">
                                    {!! render_products($related_products) !!}
                                </ul>
                            </div>
                        @endif

                        @if (!empty($viewed_post) && count($viewed_post) > 0)
                            <h3 class="ereaders-section-heading">Bài Viết Đã Xem</h3>
                            <div class="ereaders-blog ereaders-shop-grid">
                                <ul class="row">
                                    {!! render_posts($viewed_post) !!}
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div> --}}


    <style>
        .page-title .entry-title-main { display: none !important; }
    </style>

    <div class="main-content-inner full-width">
        <nav class="woocommerce-breadcrumb">
            <span><a href="{{ url('/') }}">Trang chủ</a></span> /
            <span><a href="{{ url($data['category_detail']->alias) }}" title="{{ $data['category_detail']->title }}">{{ $data['category_detail']->title }}</a></span> /
            <span>{{ $data['title'] }}</span>
        </nav>
        <article id="post-1" class="post-1 post type-post status-publish format-standard has-post-thumbnail category-uncategorized">
            {{-- <img width="1200" height="500"
                src="{{ $post_detail->images }}"
                class="attachment-tmpmela-blog-posts-list size-tmpmela-blog-posts-list wp-post-image"
                alt="{{ $post_detail->images }}" /> --}}
            <div class="entry-main-content">
                <div class="entry-content-other">
                    <header class="entry-header">
                        <h1 class="entry-title" style="padding-bottom: 1rem">
                            {{ $data['title'] }}
                        </h1>
                    </header>
                    <!-- .entry-header -->
                    <div class="entry-content">
                        <p style="color:#86c54c">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            Ngày đăng:
                            {{ $post_date }} /
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            Lượt xem:
                            {{ $post_detail->view ?? 0 }} /
                            <i class="fa fa-star" aria-hidden="true"></i>
                            Đánh giá:
                            {{ $post_detail->rating ?? 0 }}
                        </p>
                        <div>
                            {!! $post_detail->description !!}
                        </div>
                    </div>
                    <!-- .entry-content -->
                    {{-- <div class="entry-meta">
                        <div class="meta-inner">
                            <span class="author vcard"><i class="fa fa-pencil-square-o"></i><a class="url fn n"
                                    href="../author/admin/index.html" title="View all posts by admin" rel="author">by
                                    admin</a></span>
                        </div>
                        <div class="meta-inner">
                            <span class="categories-links"><i class="fa fa-folder-o"></i><a
                                    href="../category/uncategorized/index.html" rel="category tag">Uncategorized</a></span>
                        </div>
                        <div class="meta-inner">
                            <span class="entry-date"><a href="%251%24s.html" title="%2$s" rel="bookmark"><i
                                        class="fa fa-calendar-o"></i>November 29,
                                    2018</a></span>
                        </div>
                    </div> --}}
                    <!-- .entry-meta -->
                </div>
                <!-- entry-content-other -->
            </div>
        </article>
        @if (count($related_posts) > 0)
            <h1 style="padding-left: 25px;padding-bottom: 1rem;">Bài viết liên quan</h1>
            {!! render_posts_list($related_posts) !!}
        @endif
        
        @include('frontend.includes.comment')
    </div>
@endsection
