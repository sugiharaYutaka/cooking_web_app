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
            <div class="modal-body bg-color-1 ps-0">

                <div class="container-fluid p-0">
                    <div class="row">
                        @guest
                        <div class="container">
                            <div class="row">

                                <div class="card-body mt-3">
                                    @if(session('login_message'))
                                    <strong class="d-flex justify-content-center invalid-feedback"> {{ session('login_message')}}</strong><br>
                                    @endif
                                    <form class="form-inline" method="POST" action="{{ route('login') }}">
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
                                    <a href="{{ route('profile') }}" class="no-underline text-dark"><button type="button" class="btn">プロフィール</button></a>
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
                    $(document).ready(function() {
                        $('#modalProfile').modal('show');
                    });
                </script>
                @else
                @endif
            </div>
        </div>
    </div>
</div>