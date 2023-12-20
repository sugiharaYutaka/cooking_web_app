<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <script src="https://cook.academic-gihara0655.com/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <link href="https://cook.academic-gihara0655.com/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レシピ投稿画面</title>

    <style>
        body{
            padding-top: 70px;
            
        }
        textarea{
            margin-left: 20px;
            margin-right: 20px;
        }
        .card {
            padding: 5px;
            margin-left: 50px;
            margin-right: 50px; 
        }
        .form-label{
            border: 1px solid #000;
            padding: 5px;
            display: inline-block;
            border-radius: 5px;
        }
        #userInput2{
            height: 30px;
            margin-right: 50px;
            margin-left: 50px;
        }

        #image-preview-container {
            max-width: 300px; /* プレビュー領域の最大幅を指定 */
            max-height: 300px; /* プレビュー領域の最大高さを指定 */
            overflow: hidden; /* オーバーフローを非表示にする */
        }

        .image-preview {
            width: 100%; /* 画像をプレビュー領域の幅に合わせる */
            height: auto; /* アスペクト比を維持する */
            display: block; /* インライン要素をブロック要素に変更 */
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="card mt-5">
        <!--<div class="card-header">献立を投稿</div>-->
            <label for="image" class="form-label" style="margin-right: 1045px;">タイトルを決定</label>
                <textarea id="userInput2" name="text" ></textarea>
                    <div class="mb-3 mt-5">
                        <label for="image" class="form-label">料理写真を選択</label>
                        <input type="file" class="form-control" id="image" name="image" onchange="previewImage('ryouri_pre',this)" >
                    </div>
                    <div id="image-preview-container">
                        <img id="ryouri_pre" class="image-preview" alt="料理写真プレビュー">
                    </div>
            <label for="image" class="form-label mt-5" style="margin-right: 1050px;">レシピの紹介</label>
                <textarea id="userInput2" name="text"></textarea>
            <label for="image" class="form-label mt-5" style="margin-right: 1100px;">材料</label>
                <textarea id="userInput2" name="text" style="height: 80px;"></textarea>

            <label for="image" class="form-label mt-5" style="margin-right: 1090px;">作り方</label>

            <div class="card">
                <div class="container mt-2">
                        <div class="row">
                            <div class="col-1">
                                <label for="image" class="form-label2">①</label>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn col-8"><a href="#recipemodalProfile" data-bs-toggle="modal" style="color: black; text-decoration: none;">工程名を選択</a></button>
                            </div>
                            <div class="col-5">
                            </div>
                            <div class="col-3">
                                <lanel for="image" class="form-label2 col-3" >工程写真を選択</lanel>
                            </div>
                        </div>
                </div>
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-8">
                            <textarea class="form-control col-12" id="userInput" name="text" style="height: 80px;"></textarea>
                        </div>
                        <div class="col-4">
                            <input type="file" class="form-control col-12" id="image" name="image" onchange="previewImage('koutei_pre',this)" ml-auto>
                            <div id="image-preview-container">
                                <img id="koutei_pre" class="image-preview" alt="プレビュー">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-3">
                            <button type="submit" class="col-12 mt-2">工程を追加</button>
                        </div>
                        <div class="col-6">
                        </div>
                        <div class="col-3">
                            <button type="submit" class="col-12 mt-2" ml-auto>工程を削除</button>
                        </div>
                    </div>
                </div>
            </div>

            <label for="image" class="form-label mt-5" style="margin-right: 1055px;">コツ・豆知識</label>
            <textarea id="userInput2" name="text" style="height: 80px;"></textarea>
            <label for="image" class="form-label mt-5" style="margin-right: 1055px;">タグ</label>
            <textarea id="userInput2" name="text" style="height: 80px;">#</textarea>
        
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                        <button type="button" class="col-12">投稿</button>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
            </div>

    </div>

    <script>
    function previewImage(target,obj) {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.getElementById(target).src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
    </script>

</body>
</html>

@extends('layouts.recipemodal')