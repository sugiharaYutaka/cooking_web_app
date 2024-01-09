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
    </style>

</head>

<body style="margin-top: 100px; margin-bottom: 150px;">

    <div class="Container">
        <div class="Box-Container">
            <img class="Box" src="https://mpreview.aflo.com/epIejrhhrejN/afloimagemart_228170109.jpg">
            <img class="Box" src="https://mpreview.aflo.com/n8vjjMgg0zIM/afloimagemart_214335497.jpg">
            <img class="Box" src="https://mpreview.aflo.com/mWcJjXEENUWI/afloimagemart_24797895.jpg">
            <img class="Box" src="https://mpreview.aflo.com/Y0zAjcxxF39u/afloimagemart_176749297.jpg">
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

                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button type="button" class="accordion-button collapsed text-center" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne" style="background-color: #676F77;color: #F3EEEA;">
                            <span class="mx-auto d-block">チャプター1</span>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                        <div class="accordion-body" style="text-align: center;">
                            <img src="image/chapter/oyakodon.jpg" alt="チャプター1の画像" style="width: 100%; max-width: 400px; height: auto;">
                            <strong style="font-size: 24px; display: block; margin: 5px auto;">親子丼</strong><br>
                            <strong>鶏肉と卵を使ったシンプルでおいしい料理です。手軽に作れるので初心者におすすめです。</strong><br>
                            <a href="{{ route('chapter1') }}"><button type="button" class="btn btn-outline-secondary btn-sm">作り方説明</button></a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button type="button" class="accordion-button collapsed text-center" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo" style="background-color: #676F77;color: #F3EEEA;">
                            <span class="mx-auto d-block">チャプター2</span>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong style="font-size: 24px; display: block; margin: 5px auto;">NULL</strong><br>
                            <strong>チャプター2の詳細な内容がここに表示されます。</strong><br>
                            <a href="{{ route('chapter1') }}"><button type="button" class="btn btn-outline-secondary btn-sm">作り方説明</button></a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button type="button" class="accordion-button collapsed text-center" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree" style="background-color: #676F77;color: #F3EEEA;">
                            <span class="mx-auto d-block">チャプター3</span>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong style="font-size: 24px; display: block; margin: 5px auto;">NULL</strong><br>
                            <strong>チャプター3の詳細な内容がここに表示されます。</strong><br>
                            <a href="{{ route('chapter1') }}"><button type="button" class="btn btn-outline-secondary btn-sm">作り方説明</button></a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button type="button" class="accordion-button collapsed text-center" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsefour" aria-expanded="false" aria-controls="panelsStayOpen-collapsefour" style="background-color: #676F77;color: #F3EEEA;">
                            <span class="mx-auto d-block">チャプター3</span>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapsefour" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong style="font-size: 24px; display: block; margin: 5px auto;">NULL</strong><br>
                            <strong>チャプター3の詳細な内容がここに表示されます。</strong><br>
                            <a href="{{ route('chapter1') }}"><button type="button" class="btn btn-outline-secondary btn-sm">作り方説明</button></a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button type="button" class="accordion-button collapsed text-center" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsefive" aria-expanded="false" aria-controls="panelsStayOpen-collapsefive" style="background-color: #676F77;color: #F3EEEA;">
                            <span class="mx-auto d-block">チャプター5</span>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapsefive" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong style="font-size: 24px; display: block; margin: 5px auto;">NULL</strong><br>
                            <strong>チャプター5の詳細な内容がここに表示されます。</strong><br>
                            <a href="{{ route('chapter1') }}"><button type="button" class="btn btn-outline-secondary btn-sm">作り方説明</button></a>
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