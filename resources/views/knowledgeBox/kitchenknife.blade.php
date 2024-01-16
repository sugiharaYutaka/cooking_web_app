@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>知識箱</title>

</head>

<body>
    <div class="container" style="padding-top: 100px;">
        <h1>包丁の種類と用途</h1>
            <div class="col-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        牛刀包丁
                    </div>
                    <div class="card-body">
                        <a href="{{ route('kitchenknife') }}" class="no-underline text-dark">
                            <div class="custom-image-size">
                                <img src="{{ asset('image/knowledge/gyuto.jpeg') }}"
                                    class="card-img-top custom-image-size d-flex justify-content-center">
                            </div>
                            世界中で広く使われている、基本的な包丁です。肉を切ったり野菜を細かく刻んだり、魚をさばくことにもお使いいただけます。<br>
                    </div>
                    </a>
                </div>
            </div>
    </div>
</body>

<style>
  .card {
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
  }

  .card-header {
    background-color: #f0f0f0;
    padding: 10px;
    text-align: center; /* 中央寄せを追加 */
    font-weight: bold;
  }

  .card-body {
    padding: 20px;
  }
</style>



</html>


@extends('layouts.footer')