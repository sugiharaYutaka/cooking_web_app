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
    <div class="row">
        @foreach ($result as $post)
        <div class="row border my-5 bg-color-3">
            <div class="col-12 my-2">
                <span class='h5'>タイトル</span>
                <span>{{ $post->title }}</span>
            </div>
            <div class="col-12 my-2">
                <span class='h5'>料理の画像</span>
                <a href="{{ url('/recipe/onepost', $post->id) }}">
                    <img src="{{ asset('/recipe/image/' . $post->dish_image_filename) }}" class="" style="width:30%;">
                </a>
            </div>
            <div class="col-12 my-2">
                <span class='h5'>レシピの説明</span>
                <span>{{ $post->description }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>



@extends('layouts.footer')