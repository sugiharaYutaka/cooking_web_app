@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))
<html>
<head>
    <title>チャプター選択</title>
    <!--- アコーディオンを閉じた マージン消す--->
    <style>.accordion-button.collapsed.text-center::after{ margin:0; }</style>
    <!--- アコーディオンを開いた時 マージン消す--->
    <style>.accordion-button.text-center::after{ margin:0; }</style>

    <style>
        .Container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .Box-Container {
            display: flex;
            width: fit-content;
            transition: transform 0.3s ease;
            transform: translateX(0);
        }

        .Box {
            flex-shrink: 0;
            height: 200px;
            margin-right: 10px;
            border-radius: 10px;
            background-color: #ccc;
        }

        .Arrow {
            position: absolute;
            margin: 20px 30%;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            color: #000;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .Arrow.left {
            left: 0;
        }

        .Arrow.right {
            right: 0;
        }

        .Hide {
            display: none;
        }



        .flex {
            display: flex;
            flex-direction: row;
            flex: 35%;
        }

        .flex-right {
            display: flex;
            flex-direction: column;
        }




        .flex .flex-right .tutorial {
            margin: 5px 5px 5px;
            text-align: center;
            padding: 0.5em 1em;
            background: #f0f7ff;
            border: dashed 2px #5b8bd0;
            /*点線*/
        }

        .flex .flex-right .tutorial p {
            margin: 0;
            padding: 0;
        }

        .flex .flex-right .tutorial img {
            width: 100%;
            border-radius: 10px;
        }





        .flex .flex-right .iine {
            margin: 5px 5px 5px;
            text-align: center;
        }





        .iine {
            display: flex;
            flex-direction: column;
        }

        .iine hr {
            margin: 8px 0px;
        }

        .iine .contents {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .iine .contents .text {
            display: flex;
            flex-direction: column;
        }

        .iine p {
            padding-left: 2px;
            text-align: left;
        }

        .iine .img {
            height: 100%;
            width: 60%;
            border-radius: 10px;
        }





        .circle {
            position: absolute;
            margin: 5px 22%;
            transform: translateY(-50%);
            width: 50px;
            height: 35px;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .rank-img {
            position: absolute;
            margin: 0px 21%;
            transform: translateY(-50%);
            width: 50px;
        }




        .iine .iine-amount {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #f1443e;
            border-radius: 5px;
            background-color: #fff;
            color: #f1443e;
            font-size: 1em;
        }









        .accordion {
            margin: 1em auto;
            max-width: 120vw;
        }
        .toggle {
            display: none;
        }
        .option {
            position: relative;
        }
        .title,
        .content {
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            transform: translateZ(0);
            transition: all 0.3s;
        }
        .title {
            background-color: #676F77;
            border: solid 1px #ccc;
            padding: 1em;
            display: block;
            color: #ffffff;
            font-weight: bold;
            text-align: center;
        }
        .title::after,
        .title::before {
            content: "";
            position: absolute;
            right: 1.25em;
            top: 1.25em;
            width: 2px;
            height: 0.75em;
            background-color: #444;
            transition: all 0.3s;
        }
        .title::after {
            transform: rotate(90deg);
        }
        .content {
            max-height: 0;
            overflow: hidden;
        }
        .content p {
            margin: 0;
            padding: 0.5em 1em 1em;
            font-size: 0.9em;
            line-height: 1.5;
        }
        .toggle:checked + .title + .content {
            max-height: 500px;
            transition: all 0.5s;
        }
        .toggle:checked + .title::before {
            transform: rotate(90deg) !important;
        }
    </style>

</head>

<body style="margin-top: 100px; margin-bottom: 150px;">

    <div class="Container">
        <div class="Box-Container">
            <img class="Box" src="{{ asset('image/chapter/oyakodon.png' )}}">
            <img class="Box" src="{{ asset('image/chapter/comingsoon.png' )}}">
            <img class="Box" src="{{ asset('image/chapter/oyakodon.png' )}}">
            <img class="Box" src="{{ asset('image/chapter/comingsoon.png' )}}">
            <img class="Box" src="{{ asset('image/chapter/oyakodon.png' )}}">
            <img class="Box" src="{{ asset('image/chapter/comingsoon.png' )}}">
            <img class="Box" src="{{ asset('image/chapter/oyakodon.png' )}}">
            <!-- 必要な数の.Box要素を追加 -->
        </div>
    </div>
    <div class="Arrow left">＜</div>
    <div class="Arrow right">＞</div>
    <!-- 写真横スクロール end -->

    <br>
    <hr>


    <div class="container-fluid">
        <div class="row mx-2">
        <div class="accordion" id="accordionPanelsStayOpenExample">

            <div class="accordion">

                <div class="option">
                    <input type="checkbox" id="toggle1" class="toggle">
                    <label class="title" for="toggle1">チャプター1</label>
                    <div class="content">
                        <img src="image/chapter/oyakodon.png" alt="チャプター1の画像" style="width: 100%; max-width: 400px; height: auto;">
                        <strong style="font-size: 24px; display: block; margin: 5px auto;">親子丼</strong><br>
                        <strong>鶏肉と卵を使ったシンプルでおいしい料理です。手軽に作れるので初心者におすすめです。</strong><br>
                        <a href="{{ route('chapter1') }}"><button type="button" class="btn btn-outline-secondary btn-sm">作り方説明</button></a>
                        <p></p>
                    </div>
                </div>
                
                <div class="option">
                    <input type="checkbox" id="toggle2" class="toggle">
                    <label class="title" for="toggle2">チャプター2</label>
                    <div class="content">
                        <strong style="font-size: 24px; display: block; margin: 5px auto;">近日追加予定!!</strong><br>
                        <strong>チャプター2の詳細な内容がここに表示されます。</strong><br>
                        <a href="{{ route('chapter1') }}"><button type="button" class="btn btn-outline-secondary btn-sm">作り方説明</button></a>
                        <p></p>
                    </div>
                </div>
                
                <div class="option">
                    <input type="checkbox" id="toggle3" class="toggle">
                    <label class="title" for="toggle3">チャプター3</label>
                    <div class="content">
                        <strong style="font-size: 24px; display: block; margin: 5px auto;">近日追加予定!!</strong><br>
                        <strong>チャプター3の詳細な内容がここに表示されます。</strong><br>
                        <a href="{{ route('chapter1') }}"><button type="button" class="btn btn-outline-secondary btn-sm">作り方説明</button></a>
                        <p></p>
                    </div>
                </div>
                
                <div class="option">
                    <input type="checkbox" id="toggle4" class="toggle">
                    <label class="title" for="toggle4">チャプター4</label>
                    <div class="content">
                        <strong style="font-size: 24px; display: block; margin: 5px auto;">近日追加予定!!</strong><br>
                        <strong>チャプター4の詳細な内容がここに表示されます。</strong><br>
                        <a href="{{ route('chapter1') }}"><button type="button" class="btn btn-outline-secondary btn-sm">作り方説明</button></a>
                        <p></p>
                    </div>
                </div>
                
                <div class="option">
                    <input type="checkbox" id="toggle5" class="toggle">
                    <label class="title" for="toggle5">チャプター5</label>
                    <div class="content">
                        <strong style="font-size: 24px; display: block; margin: 5px auto;">近日追加予定!!</strong><br>
                        <strong>チャプター5の詳細な内容がここに表示されます。</strong><br>
                        <a href="{{ route('chapter1') }}"><button type="button" class="btn btn-outline-secondary btn-sm">作り方説明</button></a>
                        <p></p>
                    </div>
                </div>
                
                </div>




                
            </div>
        </div>
    </div> 
    <div style="position: fixed; bottom: 10px; right: 10px;">
    </div>
</body>

<script>
    const container = document.querySelector('.Container');
    const boxContainer = document.querySelector('.Box-Container');
    const leftArrow = document.querySelector('.Arrow.left');
    const rightArrow = document.querySelector('.Arrow.right');
    const scrollAmount = 250; // ３回で最大値まで行く程度の数値

    const width = (boxContainer.offsetWidth - container.offsetWidth) / 2;
    const defaultScrollAmount = Math.max(width, 0);
    boxContainer.style.transform = `translateX(-${defaultScrollAmount}px)`;

    leftArrow.addEventListener('click', () => {
        const containerWidth = container.offsetWidth;
        const maxScrollAmount = boxContainer.offsetWidth - containerWidth;
        const currentScrollAmount = Math.abs(parseInt(boxContainer.style.transform.split('(')[1])) || 0;
        const newScrollAmount = Math.max(currentScrollAmount - scrollAmount, 0);
        moveImage(newScrollAmount, maxScrollAmount);
    });

    rightArrow.addEventListener('click', () => {
        const containerWidth = container.offsetWidth;
        const maxScrollAmount = boxContainer.offsetWidth - containerWidth;
        const currentScrollAmount = Math.abs(parseInt(boxContainer.style.transform.split('(')[1])) || 0;
        const newScrollAmount = Math.min(currentScrollAmount + scrollAmount, maxScrollAmount);
        moveImage(newScrollAmount, maxScrollAmount);

    });

    function moveImage(scrollAmount, maxScrollAmount) {
        if (scrollAmount === 0) {
            boxContainer.style.transform = `translateX(-${maxScrollAmount}px)`;
        } else if (scrollAmount === maxScrollAmount) {
            boxContainer.style.transform = `translateX(-0px)`;
        } else {
            boxContainer.style.transform = `translateX(-${scrollAmount}px)`;
        }
    }
</script>


</html>

@extends('layouts.footer')