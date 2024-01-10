<!DOCTYPE html>
<html lang="ja">

<head>
    <script src="https://cook.academic-gihara0655.com/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <link href="https://cook.academic-gihara0655.com/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('index.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="{{ asset('js/sidebar.js') }}"></script>

</head>

<body>
    <div class="header fixed-top">
        <div class="container-fluid">
            <div class="row border">
                <nav class="navbar navbar-expand-lg navbar-light bg-color-2">
                    <div class="col-2 d-flex justify-content-center ps-5">
                        <button type="button" style="border: none; background: transparent;" class="btn"><a href="{{ route('top') }}"><img class="logo" src="{{asset('image/logo.png')}}"></a></button>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-3" style="margin-left: 10px;">
                        <form action="/search" method="GET" class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="タグ検索" aria-label="Search" name="query">
                        </form>
                    </div>
                    <div class="col-1"></div>

                    <div class="col-1 d-flex justify-content-center">
                        <a href="{{ route('study') }}" class="no-underline text-dark"><button type="button" class="btn"><img src="{{ asset('image/study.png') }}" class="footericon"><br>勉強</button></a>
                    </div>
                    <div class="col-1 d-flex justify-content-center">
                        <a href="{{ route('recipes') }}" class="no-underline text-dark"><button type="button" class="btn"><img src="{{ asset('image/recipe.png') }}" class="footericon"><br>献立</button></a>
                    </div>
                    <div class="col-1 d-flex justify-content-center">
                        <a href="{{ route('sns') }}" class="no-underline text-dark"><button type="button" class="btn"><img src="{{ asset('image/sns.png') }}" class="footericon"><br>SNS</button></a>
                    </div>
                    <div class="col-1 d-flex justify-content-center">
                        <a href="{{ route('knowledge') }}" class="no-underline text-dark"><button type="button" class="btn"><img src="{{ asset('image/knowledge.png') }}" class="footericon"><br>知識箱</button></a>
                    </div>
                    <div class="col-1 d-flex justify-content-center">
                        @guest
                        <a href="#modalProfile" data-bs-toggle="modal" class="no-underline text-dark"><button type="button" class="btn"><img src=" {{ asset('image/profile.png') }}" class="footericon"><br>未ログイン</button></a>
                        @else
                        @if (session('icon_filename') == "user_icon.png")
                        <a href="{{ route('profile') }}" class="no-underline text-dark"><button type="button" class="btn"><img src="{{ asset('/image/icon/user_icon.png') }}" class="footericon"><br>プロフィール</button></a>
                        @else
                        <a href="{{ route('profile') }}" class="no-underline text-dark"><button type="button" class="btn"><img src=" {{ asset('/image/icon/' . session('icon_filename') )}}" class="footericon"><br>プロフィール</button></a>
                        @endif
                        @endguest
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <style>
        @media(max-width:750px) {
            .footericon {

                width: 32px;
                height: 32px;
            }
        }

        @media(min-width:751px) {
            .footericon {

                width: 32px;
                height: 32px;
            }
        }

        .custom-search-input {
            width: 250px;
        }
    </style>

</body>

@extends('layouts.modal')
