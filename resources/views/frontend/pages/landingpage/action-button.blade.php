@if ($title && $action && $icon)
<style>
    .btn-action {
        display: flex;
        justify-content: center;
        clear: both;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }
    .btn-action a {
        color: #fff !important;
        border: none;
        background: #df2121;
        font-size: 1.5rem!important;
        padding-right: 3rem;
        padding-left: 3rem;
        padding-bottom: 0.25rem;
        padding-top: 0.25rem;
        display: flex!important;
        justify-content: center;
        align-items: center;
        font-weight: 400;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        line-height: 1.5;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    .btn-action a i {
        font-size: 1.5rem!important;
    }
</style>
    <div class="btn-action">
        <a href="tel:{{ $action }}" >
            {!! $icon !!}
            <span style="padding-left: 0.5rem">{{ $title }}</span>
        </a>
    </div>
@endif