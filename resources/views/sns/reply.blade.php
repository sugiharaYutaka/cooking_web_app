@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc-sns'))

<div class="container-fluid body-margin">
    <div class="row">
        <div class="post-body">
            <div class="container ps-0 ms-0">
                <div class="row mt-1">
                    <div class="col-2 text-end">
                        <img class="post-icon" src="{{ asset('/storage/img/' . $mainPost[0]->icon_filename) }}">
                    </div>
                    <div class="col align-self-center">
                        <span class="h3 text-color-gray">{{ $mainPost[0]->name }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="h5 col-10 offset-2">
                        <span>{{ $mainPost[0]->text }}</span>
                    </div>
                </div>

                @if($mainPost[0]->image_filename)
                <div class="row">
                    <div class="col-10 offset-2">
                        <img class="post-image" src="{{ asset('/image/' . $mainPost[0]->image_filename) }}">
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col text-end">
                        <div class="like-form">
                            <span class="like-count" style="color:#e0245e;">{{ $mainPost[0]->good }}♡</span>
                        </div>
                    </div>
                </div>
                <reply-form-component  post-id="{{ json_encode($mainPost[0]->id) }}" reply-post-url="{{ json_encode(url('/reply')) }}"></reply-form-component>
            </div>
        </div>
    </div>
    <hr>
    <hr>


    <!-- reply -->
    @foreach ($allReply as $reply)
    <div class="row">
        <div class="post-body">
            <div class="container ps-0 ms-0">
                <div class="row mt-1">
                    <div class="col-2 text-end">
                        <img class="post-icon" src="{{ asset('/storage/img/' . $reply->icon_filename) }}">
                    </div>
                    <div class="col align-self-center">
                        <span class="h5 text-color-gray">{{ $reply->name }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-2">
                        <span>{{ $reply->text }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @endforeach

</div>
@extends('layouts.snsfooter')
