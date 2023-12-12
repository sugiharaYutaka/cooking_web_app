<div class="modal fade" id="modalProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-color-2">
                @guest
                    <h5 class="modal-title" id="exampleModalLabel">ログイン</h5>
                @else
                    <h5 class="modal-title" id="exampleModalLabel">{{session('name')}}</h5>
                @endguest

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-color-1">

                <div class="container-fluid">
                    <div class="row">
                        @guest
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                                                    <div class="col-md-8">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>

                                                    <div class="col-md-8">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn bg-color-1" style="border: 1px solid #776B5D;">
                                                            {{ __('ログイン') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>                       
                                </div>
                            <!--<a href="{{ route('register') }}" class="btn border-top border-bottom my-2">アカウント登録</a><br>-->
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('register') }}" class="btn my-2">アカウント登録</a>
                            </div>

                        @else
                            <a href="{{ route('account') }}" class="btn border-top border-bottom my-2">アカウント設定</a><br>
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
</div>
