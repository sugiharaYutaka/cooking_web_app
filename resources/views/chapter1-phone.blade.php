<script src="https://www.academic-gihara0655.com/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
<link href="https://www.academic-gihara0655.com/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="{{ asset('chapter-phone.css')}}" />

<div class="entirety body-margin">
    <div class="container-fluid p-0">

        <!--- タイトルと画像の設置 --->
        <h1>chapter1 親子丼</h1>

        <div class="centerimg">
            <img src="{{ asset('image/chapter/oyakodon.png') }}" class="sizeimg"><br>
        </div>

        <!--- 料理の説明文 --->
        <div class="Description">
            <p class="tatehaba"><strong>調理時間：20分以下</strong></p>

            <p>卵と鶏肉だけで作れる手軽さもあって、親子丼は家庭料理の代表格ですが、実は作り方が意外と難しいものでもあります。</p>

            <p>作り方のコツは「鶏肉をあらかじめ煮汁でまとめて煮ておくこと」や「卵の火の通し方」など。片手鍋で２人前を一度に作るレシピにしています。ぜひお試しください。</p>
        </div>

        <!--- 材料 --->
        <br>
        <div class="card-chapter">
            <div class="card-header bg-color-2 border-top border-bottom">
                <div class="m-3 fw-bold">親子丼の材料（１人前）</div>
            </div>
            <div class="card-body">
                <ul class="m-0">
                    <li class="inlist1"><u>具材</u></li>
                    <li>ごはん ··· 200g</li>
                    <li>鶏もも肉 ··· 100g</li>
                    <li>玉ねぎ ··· 1/4個</li>
                    <li>卵 ··· 1~2個</li>

                    <li class="inlist2"><u>調味料</u></li>
                    <li class="dashi">水 ··· 100ml</li>
                    <li class="dashi">しょうゆ ··· 大さじ1</li>
                    <li class="dashi">みりん ··· 大さじ1</li>
                    <li class="dashi">料理酒 ··· 大さじ1</li>
                    <li class="dashi">砂糖 ··· 大さじ1/2</li>

                    <li class="inlist3"><u>トッピング</u></li>
                    <li>刻みネギ ··· 1/4束ほど（あれば色どりが良くなります）</li>

                </ul>
            </div>
        </div>



        <!--- アコーディオンパネル --->
        <div class="row"></div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <span class="mx-auto d-block">
                            材料の画像
                        </span>
                        <!--- アコーディオンを閉じた マージン消す--->
                        <style>
                            .accordion-button.collapsed.text-center::after {
                                margin: 0;
                            }
                        </style>
                        <!--- アコーディオンを開いた時 マージン消す--->
                        <style>
                            .accordion-button.text-center::after {
                                margin: 0;
                            }
                        </style>

                    </button>
                </div>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div>
                            <img src="{{ asset('image/chapter/torimomo.jpg') }}"><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--- 作り方 --->

    <h2 class="mt-5">親子丼の作り方</h2>
    <div class="card-chapter">
        <div class="card-header bg-color-2 border-top border-bottom">
            <div class="m-3 fw-bold">STEP1 準備を整えよう</div>
        </div>
        <div class="card-body">
            <div class="">
                <img class="w-100" src="{{ asset('image/chapter/hocho.png') }}">
                <img class="w-100" src="{{ asset('image/chapter/tamanegi.png') }}">
            </div>

            <div class="cooking_text">
                <br>まずは、画像の通りまな板と包丁を作業スペースに置きましょう。
                <br>ボールに玉ねぎ1個が漬かるくらいの水をため、玉ねぎを5分～10分程度漬けておきましょう。<br><br>
            </div>

            <div class="textBox">玉ねぎを水に漬けておくと、皮が柔らかくなって剥きやすくなります。</div>
        </div>
    </div>

    <div class="card-chapter">
        <div class="card-header bg-color-2 border-top border-bottom">
            <div class="m-3 fw-bold">STEP2 鶏もも肉を切ろう</div>
        </div>
        <div class="card-body">
            <div class="">
                <video class="w-100" src="{{ asset('image/chapter/TORINIKU_cut.mp4') }}"controls></video>
            </div>

            <div class="cooking_text">
                <br>鶏もも肉は小さめの一口大に切りましょう。
                <br>1cm～2cmくらいを目安にすると良いと思います。
            </div>
        </div>
    </div>

    <div class="card-chapter">
        <div class="card-header bg-color-2 border-top border-bottom">
            <div class="m-3 fw-bold">STEP3 玉ねぎを切ろう</div>
        </div>
        <div class="card-body">
            <div class="">
                <video class="w-100" src="{{ asset('image/chapter/tamanegi.mp4') }}"controls></video>
            </div>

            <!--- 皮むき --->
            <div class="cooking_text">
                <br>まずは、皮むきからです。
                <br>1.根本の部分を、皮を少し残して切ります。
                <br>2.皮を押さえてめくります。
                <br>反対側も同じようにします。
            </div>

            <div class="textBox">
                根本と頭を切り落とすときに皮をめくることによって、
                <br>皮の面積が分断され、剥きやすくなります。
            </div>

            <!--- 切り方 --->

            <div class="">
                <video class="w-100" src="{{ asset('image/chapter/tamanegi_cut.mp4') }}"controls></video>
            </div>

            <div class="cooking_text">
                <br>では、皮をむいた玉ねぎを切っていきましょう。
                <br>1/4の大きさに切り、5mm幅くらいで包丁を真っすぐ入れて切りましょう。
            </div>

            <div class="textBox">
                難しいと感じたら幅は広くても大丈夫です。
                <br>ゆっくり切っていきましょう。
            </div>
        </div>
    </div>

    <div class="card-chapter">
        <div class="card-header bg-color-2 border-top border-bottom">
            <div class="m-3 fw-bold">STEP4 つゆを沸かそう</div>
        </div>
        <div class="card-body">
            <div class="">
                <video class="w-100" src="{{ asset('image/chapter/CHOMIRYO.mp4') }}"controls></video>
                <video class="w-100" src="{{ asset('image/chapter/YAKI.mp4') }}"controls></video>
            </div>

            <div class="cooking_text">
                <br>用意した調味料をすべて混ぜ合わせます
                <br>火をつけて、調味料を入れます。
                <br>その後、玉ねぎも入れます。
                <br>煮立ったら鶏肉も入れましょう。
            </div>

            <div class="textBox">
                火はずっと中火で大丈夫です。
            </div>
        </div>
    </div>

    <div class="card-chapterd">
        <div class="card-header bg-color-2 border-top border-bottom">
            <div class="m-3 fw-bold">STEP6 卵で閉じよう</div>
        </div>
        <div class="card-body">
            <div class="">
                <video class="w-100" src="{{ asset('image/chapter/TAMAGO.mp4') }}"controls></video>
            </div>

            <div class="cooking_text">
                <br>鶏肉にも火が通ったら、溶き卵を加えます。
                <br>3秒くらいかき混ぜた後、火を弱火にします。
                <br>10秒ほど経ったら火を止めて、器にごはんをよそいましょう。
            </div>

            <div class="textBox">
                溶き卵を入れた後は、あまり混ぜすぎないようにすることで<br>
                とろふわ食感に仕上がります。
            </div>
        </div>
    </div>

    <div class="card-chapter">
        <div class="card-header bg-color-2 border-top border-bottom">
            <div class="m-3 fw-bold">STEP7 完成!!!</div>
        </div>
        <div class="card-body">
            <div class="">
                <video class="w-100" src="{{ asset('image/chapter/KANSEI.mp4') }}"controls></video>
            </div>

            <div class="cooking_text">
                <br>ごはんの上に盛りつけましょう。
                <br>ネギを用意している場合は、ネギを乗せて完成です。
            </div>

        </div>
    </div>

    <button type="button"><a  href="{{ route('snspost') }}">SNSに投稿してみよう!</a></button>


</div>