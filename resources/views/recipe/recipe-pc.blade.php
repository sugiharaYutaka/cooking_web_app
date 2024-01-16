<!DOCTYPE html>
<html lang="ja">

<body class="body-mt-top">
    <div class="container-fluid" style="height:100%;">
        <div class="row" style="height:100%;">
            <div class="sidebar col-3 border"> <!-- サイドバーの幅を指定 -->
                @include('layouts.sidebar')
            </div>
            <div class="col-9 p-0">
                <div class="container">

                    <div class="row border">
                        @foreach ($recipePost as $post)
                        <div class="col-4 my-2 border">
                            <p class="h5">{{ $post->title }}</p>

                            <a href="{{ url('/recipe/onepost', $post->id) }}">
                                <img src="{{ asset('/recipe/image/' . $post->dish_image_filename) }}" class="" style="width:100%;">
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