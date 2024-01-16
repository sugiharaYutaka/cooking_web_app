<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <script src="https://cook.academic-gihara0655.com/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <link href="https://cook.academic-gihara0655.com/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レシピ投稿画面</title>

    <style>
        body {
          
        }

        textarea {
            margin-left: 20px;
            margin-right: 20px;
        }

        .card {
            padding: 5px;
            margin-left: 50px;
            margin-right: 50px;
        }

        .form-label {
            border: 1px solid #000;
            padding: 5px;
            display: inline-block;
            border-radius: 5px;
        }

        #userInput2 {
            height: 30px;
            margin-right: 50px;
            margin-left: 50px;
        }

        #image-preview-container {
            max-width: 300px;
            /* プレビュー領域の最大幅を指定 */
            max-height: 300px;
            /* プレビュー領域の最大高さを指定 */
            overflow: hidden;
            /* オーバーフローを非表示にする */
        }

        .image-preview {
            width: 100%;
            /* 画像をプレビュー領域の幅に合わせる */
            height: auto;
            /* アスペクト比を維持する */
            display: block;
            /* インライン要素をブロック要素に変更 */
            margin-bottom: 10px;
        }
    </style>
</head>


<div id="app">
    <recipe-post-pc-component post-url="{{ json_encode( url('/recipe/postForm') ) }}"></recipe-post-pc-component>
</div>
</html>
