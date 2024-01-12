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

<body style="margin-top: 8vh;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <form action="/search" method="GET" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="献立検索" aria-label="Search" name="query">
                    </form>
                    <div class="col-12">
                        <div class="row">
                            <!--- レシピ投稿に遷移するボタン --->
                            <div class="col-2">
                                <button class="bg-color-2 circle-btn border">
                                    <a href="{{ route('recipepost') }}" class="no-underline text-color-4 h3">+</a>
                                </button>
                            </div>
                            
                            <!--- ブックマークページに遷移するボタン --->
                            <div class="col-5">
                                <button class="bg-color-2 circle-btn border">
                                    <a href="{{ route('recipebookmark') }}" class="no-underline text-color-4 h3">bookmark</a>
                                </button>
                            </div>
                            <div class="col-5">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#recipemodalProfile" style="color: black; text-decoration: none;">タグ検索</button>
                            </div>
                        </div>
                    </div>
                    <div class="row border my-5">
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
@extends('layouts.recipemodal')