@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))

<!DOCTYPE html>
<html lang="ja">

<body class="body-margin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 border"> <!-- サイドバーの幅を指定 -->
                @include('layouts.sidebar')
            </div>
            <div class="col-9 p-0">
                <div class="container">
                    <div class="row">
                        <!--- レシピ投稿に遷移するボタン --->
                        <button class="bg-color-2 circle-btn border">
                            <a href="{{ route('recipepost') }}" class="no-underline text-color-4 h3">+</a>
                        </button>
                        <!--- ブックマークページに遷移するボタン --->
                        <button class="bg-color-2 circle-btn border">
                            <a href="{{ route('recipebookmark') }}" class="no-underline text-color-4 h3">bookmark</a>
                        </button>
                    </div>
                    @foreach ($recipePost as $post)
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
        </div>
    </div>

</body>

</html>

@extends('layouts.footer')