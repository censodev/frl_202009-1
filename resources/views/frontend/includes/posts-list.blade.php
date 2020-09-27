<style>
    article.hentry {
        width: 31% !important;
        margin-left: 1% !important;
        margin-right: 1% !important;
    }
    @media (max-width:980px) {
        article.hentry {
            width: 46% !important;
        }
    }
    @media (max-width:400px) {
        article.hentry {
            width: 98% !important;
        }
    }
    
</style>
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
                            {{-- <a href="{{ $item->images }}"
                                title="Click to view Full Image" data-lightbox="example-set"
                                class="icon mustang-gallery">
                                <i class="fa fa-plus"></i>
                            </a> --}}
                            <a href="{{ url( $item->alias ) }}"
                                title="Click để xem thêm" class="icon readmore"><i
                                    class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post-info">
                <div class="post-info-inner">
                    <div class="entry-header">
                        <div class="entry-meta">
                            <div class="meta-inner">
                                <span class="entry-date">
                                    <a href="#" title="{{ $post_date }}" rel="bookmark">
                                        {{ $post_date }}
                                    </a>
                                </span>
                            </div>
                        </div>
                        <h1 class="entry-title">
                            <a href="{{ url( $item->alias ) }}" rel="bookmark" style="font-size: 14px">{{ $item->title }}</a>
                        </h1>
                    </div>
                    <div class="entry-content-other">
                        <div class="entry-summary">
                            <div class="excerpt" style="color: #808080">
                                {!! str_limit(strip_tags($item->sapo),125,'...') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endforeach