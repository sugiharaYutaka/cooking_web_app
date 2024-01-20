@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc-sns'))

<div id="app">
    <reply-form-component
        main-post="{{ json_encode($mainPost) }}"
        reply-post-url="{{ json_encode(url('/reply')) }}"
        all-reply="{{ json_encode($allReply) }}"
        image-path="{{ json_encode( asset('/image')) }}"
        session-email="{{ json_encode( session('email')) }}">
    </reply-form-component>
</div>

@extends('layouts.snsfooter')
