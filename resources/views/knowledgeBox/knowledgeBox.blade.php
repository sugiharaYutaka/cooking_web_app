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
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button"
                    role="tab" aria-controls="tab1" aria-selected="true">調理器具</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button"
                    role="tab" aria-controls="tab2" aria-selected="false">調味料</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button"
                    role="tab" aria-controls="tab3" aria-selected="false">切り方</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab"
                style="padding-top: 10px;">
                <!-- 調理器具 -->
                <div class="row">
                    <!-- Tab 1のコンテンツを3x3のグリッドで配置 -->
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                包丁
                            </div>
                            <div class="card-body">
                                <a href="{{ route('kitchenknife') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/kitchenknife.jpg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    食物の調理に使う薄くて平たい刃物。<br>　
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                フライパン
                            </div>
                            <div class="card-body">
                                <a href="{{ route('skillet') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/skillet.jpg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    炒めもの・フライ料理などに使う、柄がついて底が浅くて平たいなべ。
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                まな板
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/cuttingboard.jpg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    まな板は、調理で食材を切る際に台として用いる道具。<br>　
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                おたま
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/ladle.jpg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    食物を掬うための調理器具。<br>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                計量カップ
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/measuringcup.jpg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    調理の際に体積の計量に用いられる、目盛りがついたカップ。
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                菜箸
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/chopsticks.jpg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    おかずを各自の皿に取り分け、または料理を作るのに使う箸。
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                トング
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/tongu.jpeg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    角砂糖や調理中のスパゲッティなど、食品をはさむＶ字型の金属製道具。
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                なべ
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/pot.jpg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    食物等を煮るための容器。<br>　
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                ボウル
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/bowl.jpg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    料理の下ごしらえに使う道具。 <br>　
                            </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>


            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                <!-- 調味料 -->
                <div class="row">
                    <!-- Tab 1のコンテンツを3x3のグリッドで配置 -->
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                オリーブオイル
                            </div>
                            <div class="card-body">
                                <a href="{{ route('kitchenknife') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/oil.jpeg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    オリーブ樹の果実のみから採油されたもので、再エステル化等の処理を一切行わずに採油されたオイル<br>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                料理酒
                            </div>
                            <div class="card-body">
                                <a href="{{ route('skillet') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/cooking sake.jpg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    原料の米由来の有機酸やアミノ酸などは料理にうまみ・コクを付ける効果があります
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                醤油
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/soy sauce.jpg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    大豆などの穀物を主原料として、麹(こうじ)と食塩を加えて、発酵、熟成させた液体調味料
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                胡椒
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/pepper.jpeg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    強い辛味とさわやかな香りが特徴的で、人気のある香辛料<br>　<br>　
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                味醂
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/sweetsake.jpeg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    砂糖に比べるとまろやかな甘さが感じられます。 芳醇な香りとエキス分によるうまみもあり、さまざまな調理効果が得られるのが特徴
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                砂糖
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/sugar.jpg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    甘みを持つ調味料（甘味料）である。植物から取り出されたショ糖（スクロース）を主成分とする甘味物質です。<br>　
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                塩
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/salt.jpeg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    海水を煮詰めるとできる白い結晶。「塩」をサラサラになるまで乾燥さ せて、食用としたものを「食塩」と呼びます
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                味噌
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/miso.jpeg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    主原料の大豆(だいず)を蒸すか煮るかして、麹(こうじ)と食塩を加えて、発酵、熟成させた半固体状の調味料<br>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                酢
                            </div>
                            <div class="card-body">
                                <a href="{{ route('ComingSoon') }}" class="no-underline text-dark">
                                    <div class="custom-image-size">
                                        <img src="{{ asset('image/knowledge/vinegar.jpg') }}"
                                            class="card-img-top custom-image-size d-flex justify-content-center">
                                    </div>
                                    糖質を含む食材を原料として、それをアルコール発酵させた後、酢酸発酵させた液体調味料 <br>
                            </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                <!-- 切り方 -->
                <div class="row">
                    <div class="col-4">
                        <p>Tab 3のコンテンツ1</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 3のコンテンツ2</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 3のコンテンツ3</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 3のコンテンツ4</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 3のコンテンツ5</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 3のコンテンツ6</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 3のコンテンツ7</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 3のコンテンツ8</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 3のコンテンツ9</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<style>
    /* カスタムの画像サイズを定義するクラス */
    @media(max-width:750px) {
        .custom-image-size {

            width: 100%;
            height: auto;
        }
    }

    @media(min-width:751px) {
        .custom-image-size {

            width: 100%;
            height: auto;
        }
    }
</style>

</html>


@extends('layouts.footer')