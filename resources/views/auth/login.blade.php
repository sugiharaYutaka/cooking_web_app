@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))
<div class="body-mt-top">
    <div class="">
        <div class="container-fluid">
            <div class="row">
                @guest
                <div class="container">
                    <div class="row">

                        <div class="card-body mt-3 bg-color-1 p-5">
                            @if(session('login_message'))
                            <strong class="d-flex justify-content-center invalid-feedback"> {{
                                session('login_message')}}</strong><br>
                            @endif
                            <p class="h5" style="text-align: center;">ログインしてください</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-4 ">
                                    <div class="offset-2 col-8">
                                        <label for="email" class="col-form-label text-end">{{ __('メールアドレス') }}</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    </div>
                                </div>

                                <div class="row mb-4 ">
                                    <div class="offset-2 col-8">
                                        <label for="password" class="col-form-label text-md-end">{{ __('パスワード') }}</label>
                                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                    </div>
                                </div>


                                <div class="row mb-0">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn bg-color-1" style="border: 1px solid #776B5D;">
                                            {{ __('ログイン') }}
                                        </button>
                                    </div>
                                </div>
                            </form>



                            <!--<a href="{{ route('register') }}" class="btn border-top border-bottom my-2">アカウント登録</a><br>-->
                            <div class="d-flex justify-content-center mt-2">
                                <span class="my-2">新規アカウント登録は</span>
                                <a href="{{ route('register') }}" class="my-2">こちら</a>
                            </div>

                            @else
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn border-top border-bottom my-2">ログアウト</button><br>
                            </form>
                            @endguest
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @if(session('login_message'))
        <script>
            $(document).ready(function () {
                $('#modalProfile').modal('show');
            });
        </script>
        @else
        @endif
    </div>
</div>

@extends('layouts.footer')