@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))

<!DOCTYPE html>
<html lang="ja">

<body class="body-margin">
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar col-3 border"> <!-- サイドバーの幅を指定 -->
                @include('layouts.sidebar')
            </div>
            <div class="offset-3 col-9 p-0">
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

                    <div class="row border my-5">
                        @foreach ($recipePost as $post)
                        <div class="col-4 my-2 border">
                            <p class="h5">{{ $post->title }}</p>

                            <a href="{{ url('/recipe/onepost', $post->id) }}">
                                <img src="{{ asset('/recipe/image/' . $post->dish_image_filename) }}" class=""
                                    style="width:100%;">
                            </a>

                            <p>{{ $post->description }}</p>

                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

@extends('layouts.footer')