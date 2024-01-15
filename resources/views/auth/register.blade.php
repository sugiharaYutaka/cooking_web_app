@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))

<div class="container" style="margin-top: 30px";>
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card mt-5">
                <div class="card-header">アカウント登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('process') }}">
                        @csrf

                        <div class="row mb-3" style="margin-top: 30px";>
                            <label for="name" class="col-md-4 col-form-label text-md-end">名前</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-top: 30px";>
                            <label for="email" class="col-md-4 col-form-label text-md-end">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-top: 30px";>
                            <label for="email-confirm" class="col-md-4 col-form-label text-md-end">メールアドレス確認</label>
                            <div class="col-md-6">
                                <input id="email-confirm" type="email" class="form-control @error('email_confirmation') is-invalid @enderror" name="email_confirmation" required autocomplete="new-email">
                                @error('email_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-top: 30px";>
                            <label for="password" class="col-md-4 col-form-label text-md-end">パスワード</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-top: 30px";>
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">パスワード確認</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0" style="margin-top: 30px";>
                            <div class="col-md-6 offset-md-3 text-center">
                                <button type="submit" class="btn" style="background-color: #EBE3D5; border: 1px solid #776B5D; color: black;">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@extends('layouts.footer')