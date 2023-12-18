<!DOCTYPE html>
<html lang="ja">

<head>
    <script src="https://yu.academic-gihara0655.com/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <link href="https://yu.academic-gihara0655.com/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('index.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<body>
    <div class="header fixed-top">
        <div class="container-fluid">
            <div class="row border">
                <nav class="navbar navbar-expand-lg navbar-light bg-color-2">
                    <div class="col-2 d-flex justify-content-center ps-5">
                        <button type="button" style="border: none; background: transparent;" class="btn"><a href="{{ route('top') }}"><img class="logo" src="{{asset('image/logo.png')}}"></a></button>
                    </div>
                    <div class="col-6">
                    </div>
                    <div class="col-1 d-flex justify-content-center">
                        <button type="button" class="btn"><a href="{{ route('top') }}" class="no-underline text-dark"><img src="{{ asset('image/top.png') }}" class="footericon"><br>トップ</a></button>
                    </div>
                    <div class="col-1 d-flex justify-content-center">
                        <button type="button" class="btn"><a href="{{ route('sns') }}" class="no-underline text-dark"><img src="{{ asset('image/sns.png') }}" class="footericon"><br>タイムライン</a></button>
                    </div>
                    <div class="col-1 d-flex justify-content-center">
                        <button type="button" class="btn"><a href="{{ route('post') }}" class="no-underline text-dark"><img src="{{ asset('image/post.png') }}" class="footericon"><br>投稿</a></button>
                    </div>
                    <div class="col-1 d-flex justify-content-center">
                        @guest
                        <button type="button" class="btn"><a href="#modalProfile" data-bs-toggle="modal" class="no-underline text-dark"><img src=" {{ asset('image/profile.png') }}" class="footericon"><br>未ログイン</a></button>
                        @else
                        <button type="button" class="btn"><a href="{{ route('profile') }}" class="no-underline text-dark"><img src=" {{ asset('image/' . session('icon_filename') )}}" class="footericon"><br>プロフィール</a></button>
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
    </style>
</body>

@extends('layouts.modal')