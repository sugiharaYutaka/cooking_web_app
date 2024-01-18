@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))


<style>
    h1 {
        padding-top: 100px;
    }

    .card {
        margin-top: 50px;
    }
</style>

<h1>ブックマーク</h1>

<div class="container">
    <div id="bookmark-container" class="row justify-content-between">
        @foreach ($result as $post)
        <div class="row border col-md-6 my-2 bg-color-1">
            <div class="my-2">
                <span class='h5'>タイトル</span>
                <span>{{ $post->title }}</span>
            </div>
            <div class="my-2">
                <a href="{{ url('/recipe/onepost', $post->id) }}">
                    <img src="{{ asset('/recipe/image/' . $post->dish_image_filename) }}" class="" style="width:30%;">
                </a>
            </div>
            <div class="my-2">
                <span class='h5'>レシピの説明</span>
                <span>{{ $post->description }}</span>
            </div>
        </div>
        @endforeach
    </div>
    <button type="button" id="load-more" class="more-post btn btn-secondary">もっと見る</button>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        var page = 2; // 初期ページ

        $('#load-more').on('click', function() {
            $.ajax({
                url: '/recipe/bookmarkMore',
                type: 'GET',
                data: { page: page },
                success: function(response) {
                    $('#bookmark-container').append(response);
                    page++;
                }
            });
        });
    });
</script>

@extends('layouts.footer')