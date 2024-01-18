<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <script src="https://cook.academic-gihara0655.com/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cook.academic-gihara0655.com/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body-margin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <form action="{{ route('search') }}" method="POST" class="form-contorl my-2">
                        @csrf
                        <div class="input-group">
                            <input class="form-control mr-sm-2" type="search" placeholder="献立検索" aria-label="Search"
                                name="query">
                            <button type="submit" class="form-contorl btn btn-outline-secondary"><i
                                    class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="col-12">
                        <div class="row">
                            <div class="offset-2 col-5">
                                <button class="btn">
                                    <a href="{{ route('recipepost') }}" class="no-underline text-color-5">投稿する</a>
                                </button>
                            </div>
                            <div class="col-5">
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#recipemodalProfile"
                                    style="color: black; text-decoration: none;">タグ検索</button>
                            </div>
                        </div>
                    </div>
                    <div id="recipe-container" class="row border my-5">
                        @foreach ($recipePost as $post)
                        <div class="col-12 my-2 border">
                            <p class="h5">{{ $post->title }}</p>

                            <a href="{{ url('/recipe/onepost', $post->id) }}">
                                <img src="{{ asset('/recipe/image/' . $post->dish_image_filename) }}" class="img-fluid post-image"
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
@extends('layouts.recipemodal')