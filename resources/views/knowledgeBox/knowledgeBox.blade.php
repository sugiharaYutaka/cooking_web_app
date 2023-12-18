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
                <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">調理器具</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">調味料</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">切り方</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <!-- 調理器具 -->
                <div class="row">
                    <!-- Tab 1のコンテンツを3x3のグリッドで配置 -->
                    <div class="col-4 mb-3">
                        <div class="card">
                            <a href="{{ route('kitchenknife') }}" class="no-underline text-dark">
                                <img src="https://ja.wikipedia.org/wiki/%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB:Frying_pan.jpeg" class="card-img-top custom-image-size d-flex justify-content-center">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-center">包丁</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">フライパン</h5>
                                <p class="card-text">Tab 1のコンテンツ1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">まな板</h5>
                                <p class="card-text">Tab 1のコンテンツ1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">おたま</h5>
                                <p class="card-text">Tab 1のコンテンツ1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">計量カップ</h5>
                                <p class="card-text">Tab 1のコンテンツ1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">菜箸</h5>
                                <p class="card-text">Tab 1のコンテンツ1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">トング</h5>
                                <p class="card-text">Tab 1のコンテンツ1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">鍋</h5>
                                <p class="card-text">Tab 1のコンテンツ1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ボール・ざる</h5>
                                <p class="card-text">Tab 1のコンテンツ1</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                <!-- 調味料 -->
                <div class="row">
                    <div class="col-4">
                        <p>Tab 2のコンテンツ1</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 2のコンテンツ2</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 2のコンテンツ3</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 2のコンテンツ4</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 2のコンテンツ5</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 2のコンテンツ6</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 2のコンテンツ7</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 2のコンテンツ8</p>
                    </div>
                    <div class="col-4">
                        <p>Tab 2のコンテンツ9</p>
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

            width: 100px;
            height: 100px;
        }
    }

    @media(min-width:751px) {
        .custom-image-size {

            width: 200px;
            height: 200px;
        }
    }
</style>

</html>


@extends('layouts.footer')