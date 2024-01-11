<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ - CookingWeb</title>

    <style>
        body {
            padding-top: 86px;
            padding-bottom: 80px;
        }

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

        .flex-left {
            width: 100%;
        }

        .flex-left .contents .text {
            width: 100%;
        }

        .flex-left .contents .img {
            width: 50%;
        }




        .flex-right {
            display: flex;
            flex-direction: column;
            width: 100%;
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

        .iine .contents .amount {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px;
            max-width: 320px;
            font-family: sans-serif;
            color: #dc143c;
            text-align: center;
            overflow-wrap: anywhere;
            background-color: transparent;
            border: 2px solid #dc143c;
            border-radius: 10px;
        }

        .iine p {
            padding-left: 2px;
            text-align: left;
        }

        .iine .img {
            max-height: 430px;
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
            margin: 0px 18%;
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

<body>
    <!-- 写真横スクロール -->
    <div class="Container">
        <div class="Box-Container">
            @foreach($dish_image_filename as $name)
            <img class="Box" src="{{ asset('/recipe/image/' . $name->dish_image_filename )}}">
            @endforeach
        </div>
    </div>
    <div class="Arrow left">＜</div>
    <div class="Arrow right">＞</div>
    <!-- 写真横スクロール end -->

    <br>
    <hr>

    <div class="flex">

        <div class="flex-left">
            @if (!isset($posts))

            <p class="text-center h6">投稿はありません</p>

            @else

            <!-- いいね数ランキング -->
            <p class="text-center h6">過去30日間のいいね数</p>
            <div class="iine">

                @php
                $index = 0;
                @endphp

                @foreach($posts as $post)

                @php
                $index += 1;
                @endphp

                <hr>

                <div class="first">
                    <div class="contents">
                        <div class="text">
                            <img class="rank-img" src='https://illust-stock.com/wp-content/uploads/ranking-crown-no{{ $index }}.png'>
                            <p class="amount">{{ $post->good }}♡</p>
                            <p>{{ $post->text }}</p>
                        </div>

                        @if ($post->image_filename != "")
                        <img class="img" src="{{ asset('/storage/img/' . $post->image_filename )}}">
                        @endif

                    </div>
                </div>

                @endforeach
            </div>
            <!-- いいね数ランキング end -->

            @endif
        </div>


        <div class="flex-right">
            <!-- 料理チュートリアル -->
            <p class="text-center h6">料理チュートリアル</p>

            @if (!isset($posts))

            <div class="tutorial">
                <a href="{{ route('study')}}">
                    <p>
                        チャプター
                    </p>
                    <img class="tutorial-img" src="{{ asset('image/chapter/' . $chapter_filename) }}">
                </a>
            </div>

            @else

            <div class="tutorial">
                @if ($forward_chapter != 0)
                <a href="{{ route('chapter' . $forward_chapter) }}">
                    <p>
                        次回のチャプターへ
                    </p>
                    <img class="tutorial-img" src="{{ asset('image/chapter/' . $forward_chapter_filename) }}">
                </a>
                @else
                <a href="{{ route('study')}}">
                    <p>
                        次回のチャプター　近日公開
                    </p>
                    <img class="tutorial-img" src="{{ asset('image/chapter/' . $forward_chapter_filename) }}">
                </a>
                @endif
            </div>

            <div class="tutorial">
                <a href="{{ route('chapter' . $now_chapter) }}">
                    <p>
                        現在のチャプターへ
                    </p>
                    <img class="tutorial-img" src="{{ asset('image/chapter/' . $now_chapter_filename) }}">
                </a>
            </div>

            @endif
            <!-- 料理チュートリアル end -->
        </div>

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