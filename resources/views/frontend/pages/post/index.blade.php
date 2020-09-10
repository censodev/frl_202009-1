<?php
use App\Models\backend\ProductItem;
?>
@extends($data->layout, [
    'title'             => $data['title'],
    "seo_title"         => $data['seo_title'],
    'og_image'          => $data['og_image'],
    'og_url'            => $data['og_url'],
    'seo_description'   => $data['seo_description'],
    'seo_keywords'      => $data['seo_keywords'],
    'category'          => $data['category']
])

@section('title')
    {{ $data->title }}
@endsection

@php
    $category           = $data['category'];
    $list_posts         = $data['category']->posts;
    $viewed_post        = $data['viewed_post'];

@endphp

@section($data->content)
    {{-- @include('frontend.includes.breadcrumb')

    <div class="ereaders-main-content">
        <div class="ereaders-main-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ereaders-blog ereaders-blog-grid">
                            <ul class="row">

                                @if(!empty($list_posts) && count($list_posts) > 0)
                                    {!! render_posts($list_posts) !!}
                                @endif

                            </ul>
                        </div>

                        {{ $data['pagiante']->links('frontend.includes.pagination',['alias' => $data['category']['alias'], 'paginator' => $data['category']['pagiante']]) }}

                        @if(!empty($viewed_post) && count($viewed_post) > 0)
                            <h3 class="ereaders-section-heading">Bài Viết Đã Xem</h3>
                            <div class="ereaders-blog ereaders-blog-grid">
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
        article.hentry {
            width: 31% !important;
            margin-left: 1% !important;
            margin-right: 1% !important;
        }
        
    </style>
    <div class="main-content-inner full-width">
        @foreach ($list_posts as $item)
        @php
            if ( !empty( $item->created_at ) ) {
                $created_at = date_create($item->created_at);
                $post_date  = date_format($created_at,"d/m/Y");
            } else {
                $post_date = '';
            }
        @endphp
            <article id="post-1"
                class="post-1 post type-post status-publish format-standard has-post-thumbnail sticky hentry category-uncategorized">
                <div class="entry-main-content">
                    <div class="entry-thumbnail">
                        <div class="entry-content-inner">
                            <img width="1200" height="500"
                                src="{{ $item->images }}"
                                class="attachment-tmpmela-blog-posts-list size-tmpmela-blog-posts-list wp-post-image"
                                alt="{{ $item->alt_image }}" />
                            <div class="block_hover">
                                <div class="links">
                                    <a href="{{ $item->images }}"
                                        title="Click to view Full Image" data-lightbox="example-set"
                                        class="icon mustang-gallery">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <a href="{{ url( $item->alias ) }}"
                                        title="Click to view Read More" class="icon readmore"><i
                                            class="fa fa-link"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-info">
                        <a href="{{ url( $item->alias ) }}"
                            rel="bookmark"></a>
                        <div class="blog-icon-outer">
                            <span class="blog-icon"></span>
                        </div>
                        <div class="post-info-inner">
                            <div class="entry-header">
                                <div class="entry-meta">
                                    <div class="meta-inner">
                                        <span class="entry-date">
                                            <a href="#" title="{{ $post_date }}" rel="bookmark">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                {{ $post_date }} /
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                {{ $item->view ?? 0 }} /
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                {{ $item->rating ?? 0 }}
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <h1 class="entry-title">
                                    <a href="{{ url( $item->alias ) }}" rel="bookmark">{{ $item->title }}</a>
                                </h1>
                            </div>
                            <!-- .entry-header -->
                            <div class="entry-content-other">
                                <div class="entry-summary">
                                    <div class="excerpt">
                                        {!! $item->sapo !!}
                                        <div class="read-more">
                                            <a class="read-more-link"
                                                href="{{ url( $item->alias ) }}">Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- .entry-summary -->
                            </div>
                            <!-- post-info -->
                            {{-- <div class="entry-meta">
                                <div class="meta-inner">
                                    <span class="author vcard"><i
                                            class="fa fa-pencil-square-o"></i><a class="url fn n"
                                            href="../author/admin/index.html"
                                            title="View all posts by admin" rel="author">by
                                            admin</a></span>
                                </div>
                                <div class="meta-inner">
                                    <span class="comments-link"><i class="fa fa-comment-o"></i><a
                                            href="{{ url( $item->alias ) }}#comments">1
                                            Comment</a></span>
                                </div>
                            </div> --}}
                            <!-- .entry-meta -->
                        </div>
                    </div>
                    <!-- entry-content-other -->
                </div>
            </article>
        @endforeach
        {{ $list_posts->links('frontend.includes.pagination') }}
    </div>
@endsection
