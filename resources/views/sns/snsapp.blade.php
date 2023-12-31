<style>
    /* ...（前回のスタイル） ... */

    h1 {
        margin-top: 100px;
    }

    .interaction-icons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }


    .like-btn {
        background-color: #e0245e;
        color: #fff;
        border: none;
    }
    .like-btn:hover {
        background-color: #730024;
        color: #fff;
        border: none;
        transition: 0.3s;
    }

    .reply-btn {
        background-color: #1da1f2;
        color: #fff;
        border: none;
    }

    .comment-input {
        margin-top: 10px;
    }
</style>
<div id="app">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <sns-home-component post-data="{{ json_encode($data) }}" reply-url="{{ json_encode( url('/like-post') ) }}" reply-post-url="{{ json_encode( url('/reply') ) }}" reply-show-url="{{ json_encode( url('/replyShow') ) }}" profile-url="{{ json_encode( url('/profile') ) }}" image-path="{{ json_encode( asset('/image') ) }}">
    </sns-home-component>
</div>


</html>
