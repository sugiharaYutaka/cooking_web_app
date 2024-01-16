@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>包丁の種類と用途</title>

  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      padding-top: 100px;
      background-color: #f0f0f0;
    }

    .section {
      max-width: 800px;
      margin: 0 auto;
      padding: 40px; /* 上下左右にパディングを追加 */
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .section_title {
      text-align: center;
      margin-bottom: 40px;
    }

    .section_lead p {
      text-align: justify;
    }

    .item_list {
      list-style: none;
      padding: 0;
    }

    .item_list li {
      margin-bottom: 40px; /* アイテム間のマージンを調整 */
    }

    .img img {
      max-width: 100%;
      padding-top: 40px;
      height: auto;
      display: block;
    }

    .title {
      font-size: 24px; /* タイトルのフォントサイズを大きく */
      font-weight: bold;
      margin: 20px 0; /* タイトルの上下のマージンを調整 */
      text-align: center;
    }

    .content p {
      text-align: justify;
    }
  </style>
</head>
<body>

  <div class="section">
    <h2 class="section_title">包丁の種類と用途</h2>
    <div class="section_lead">
      <p>多くのご家庭では、どの食材でも使える三徳包丁や牛刀包丁、細かい作業に適したペティナイフをお持ちかと思います。<br>包丁には、野菜専用の包丁や魚専用の包丁などの食材に合わせた料理人向けの包丁があり、多岐に渡ります。<br>ここでは、包丁の種類と用途をご紹介いたします。</p>
    </div>

    <ul class="item_list">
      <li>
        <figure class="img">
          <a href="/products/gyuto.html">
            <img src="{{ asset('image/knowledge/gyuto.jpeg') }}" alt="牛刀包丁">
          </a>
        </figure>
        <div class="title">
          <a>牛刀包丁</a>
        </div>
        <div class="content">
          <p>世界中で広く使われている、西洋の万能包丁です。元々は大きい肉を小さく切ることを設計されましたが、肉以外にも野菜を細かく刻んだり、魚をさばくことにもお使いいただけます。</p>
        </div>
      </li>

      <!-- 他のアイテムも同様に追加 -->

    </ul>
  </div>

</body>
</html>


@extends('layouts.footer')