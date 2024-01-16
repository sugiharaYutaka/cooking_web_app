<!DOCTYPE html>
<html lang="ja">

<head>
  <script src="https://yu.academic-gihara0655.com/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
  <link href="https://yu.academic-gihara0655.com/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container-fluid p0">
      <div class="row border">
        <nav class="navbar navbar-expand-lg navbar-light bg-color-2">
          <div class="col-9">
            <button type="button" style="border: none; background: transparent;" class="btn mx-2"><a href="{{ route('top') }}"><img class="logo" src="{{asset('image/logo.png')}}"></a></button>
          </div>
          <div class="col-3 d-flex justify-content-center">
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

  @extends('layouts.modal')
