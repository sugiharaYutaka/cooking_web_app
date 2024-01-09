@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))

<!DOCTYPE html>
<html lang="ja">


<body class="body-margin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"> <!-- サイドバーの幅を指定 -->
                @include('layouts.sidebar')
            </div>
            <div class="col-md-9">
                <div class="row">
                    <button class="bg-color-2 circle-btn border">
                        <a href="{{ route('recipepost') }}" class="no-underline text-color-4 h3">+</a>
                    </button>
                </div>

                <div class="row">
                    <button class="bg-color-2 circle-btn border">
                        <a href="{{ route('recipebookmark') }}" class="no-underline text-color-4 h3">bookmark</a>
                    </button>
                </div>

                @foreach ($recipePost as $post)
                <div class="row border my-5 bg-color-3">
                    <div class="col-12 my-2">
                        <span class='h5'>タイトル</span>
                        <span>{{ $post->title}}</span>
                    </div>
                    <div class="col-12 my-2">
                        <span class='h5'>料理の画像</span>
                        <img src="{{ asset('/recipe/image/' . $post->dish_image_filename) }}" class="" style="width:30%;">
                    </div>
                    <div class="col-12 my-2">
                        <span class='h5'>レシピの説明</span>
                        <span>{{$post->description}}</span>
                    </div>
                    <div class="col-12 my-2">
                        <span class='h5'>タグ</span>
                        @foreach($post->tag as $tag)
                        <span style="color:rgb(0, 187, 200)">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <div class="col-12 my-2">
                        <p class='h5'>材料 (一人前)</p>
                        @foreach($post->ingredients as $text)
                        <p>・{{ $text }}</p>
                        @endforeach
                    </div>
                    <div class="col-12 my-2">
                        @foreach($post->step_text as $index => $text)
                        <p class='h5'>工程{{ $index + 1 }}</p>
                        <p>{{ $text }}</p>

                        @if($post->step_image_filename[$index] != "NULL")
                        <img src="{{asset('/recipe/image') . '/' . $post->step_image_filename[$index] }}" class="" style="width:10%;">
                        @endif
                        @endforeach
                    </div>
                    <div class="col-12 my-2">
                        <p class='h5'>ポイント・コツ</p>
                        <p>{{ $post->point }}</p>
                    </div>

                    <!--- ブックマーク追加ボタン --->
                    <div class="row">
                        <button class="bg-color-2 circle-btn border">
                            < class="no-underline text-color-4 h3">bookmark</a>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>


</body>

</html>


@extends('layouts.footer')