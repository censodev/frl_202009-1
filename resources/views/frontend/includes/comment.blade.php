@php
    $seeding_status = \App\Models\backend\HomepageManager::getHomeDefault()->seeding_fb_comment_status;
    $fb_comments = \App\Models\backend\SeedingFbComment::listSeeding();
@endphp
<div class="comments-area">
    <div class="section section-service">
        <div class="g-plus" data-action="share" data-href="{{ url()->current() }}"></div>
        <div class="section-content w-100">
            <div class="fb-like" data-href="{{ url()->current() }}"
                data-layout="standard" data-action="like" data-size="large"
                data-show-faces="true" data-share="true"></div>
            @if (!is_null($fb_comments) && count($fb_comments) > 0 && $seeding_status == 1)
                <style>
                    .fb-avt {
                        width: 48px;
                        height: 48px;
                        object-fit: cover;
                    }

                    .fb-title {
                        font-weight: 600;
                        white-space: nowrap;
                        font-size: 15px;
                        color: #385898 !important;
                    }

                    .d-flex {
                        display: flex;
                    }

                    .flex-column {
                        flex-direction: column;
                    }

                    .align-items-start {
                        align-items: flex-start;
                    }

                    .ml-3 {
                        margin-left: 1rem;
                    }

                </style>
                <div style="padding: 8px 0px"><b style="color:#1c1e21">{{ count($fb_comments) }} bình luận</b></div>
                <hr style="margin:0px;margin-bottom:24px">
                @foreach ($fb_comments as $cmt)
                    <div class="d-flex align-items-start">
                        <img class="fb-avt" src="{{ $cmt->image }}" alt="{{ $cmt->alt_image }}">
                        <div class="d-flex flex-column ml-3">
                            <a class="fb-title" href="#">{{ $cmt->name }}</a>
                            <div style="font-size:15px">{{ $cmt->content }}</div>
                            <div style="font-size:12px">
                                <a style="color:#4267b2">Thích</a> ·
                                <a style="color:#4267b2">Phản hồi</a> ·
                                <a style="color:#90949c">{{ $cmt->time }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="fb-comments" data-href="{{  url()->current() }}" data-width="100%" data-numposts="10"></div>
            @endif
        </div>
    </div>
</div>