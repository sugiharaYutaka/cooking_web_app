@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))

<!DOCTYPE html>
<html lang="ja">
<link type="text/css" rel="stylesheet" href="{{ asset('') . 'chapter-' . (Agent::isMobile() ? 'phone' : 'pc') . '.css'}}" />
<body class="body-margin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3"> <!-- サイドバーの幅を指定 -->
                @include('layouts.sidebar')
            </div>
            <div class="col-9 p-0">
                <div class="container entirety">
                    <div class="row border my-5">
                        <div class="col-12 my-2">
                            <h1>{{ $post['title'] }}</h1>
                        </div>
                        <div class="col-12 my-2 d-flex justify-content-center">
                            <img src="{{ asset('/recipe/image/' . $post->dish_image_filename) }}" class=""
                                style="width:70%;">
                        </div>
                        <div class="col-12 my-2">
                            <span>{{ $post->description }}</span>
                        </div>
                        <div class="col-12 my-2 ">
                            @foreach ($post->tag as $tag)
                                <span style="color:rgb(0, 187, 200)">{{ $tag }}</span>
                            @endforeach
                        </div>
                    
                        <div class="col-12 my-2 p-0">
                            <div class="card-header bg-color-2 border-top border-bottom">
                                <div class="m-3 fw-bold">材料 (一人前)</div>
                            </div>
                            @foreach ($post->ingredients as $text)
                                <p class="mx-5">・{{ $text }}</p>
                            @endforeach
                        </div>

                        <div class="col-12 my-2 p-0">
                            @foreach ($post->step_text as $index => $text)
                            <div class="card-header mt-5 bg-color-2 border-top border-bottom">
                                <div class="m-3 fw-bold">工程{{ $index + 1 }}</div>
                            </div>
                            <p class="mx-5">{{ $text }}</p>

                                @if ($post->step_image_filename[$index] != 'NULL')
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('/recipe/image') . '/' . $post->step_image_filename[$index] }}"
                                        class="" style="width:50%;">
                                </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-12 my-2">
                            <div class="textBox">{{ $post->point }}</div>
                        </div>

                        <!--- ブックマーク追加ボタン --->
                        <div class="row">
                            <button class="bg-color-2 circle-btn border">
                                <a class="no-underline text-color-4 h3">bookmark</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>


@extends('layouts.footer')
