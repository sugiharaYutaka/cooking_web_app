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

                    <div id="recipe-container" class="row border">
                        @foreach ($recipePost as $post)
                        <div class="col-4 my-2 border">
                            <p class="h5">{{ $post->title }}</p>

                            <a href="{{ url('/recipe/onepost', $post->id) }}">
                                <img src="{{ asset('/recipe/image/' . $post->dish_image_filename) }}" class="img-fluid"
                                    style="width:100%; max-height: 200px; object-fit: cover; object-position: center;">
                            </a>

                            <p>{{ $post->description }}</p>

                        </div>

                        @endforeach
                    </div>
                </div>
                <button type="button" id="load-more" class="more-post btn btn-secondary">もっと見る</button>
            </div>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        var page = 2; // 初期ページ

        $('#load-more').on('click', function() {
            $.ajax({
                url: '/recipesMore',
                type: 'GET',
                data: { page: page },
                success: function(response) {
                    $('#recipe-container').append(response);
                    page++;
                }
            });
        });
    });
</script>

</html>