<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>画像登録画面</h1>
    <form action="{{ route('taktiedebugreg') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" class="form-control" name="image_file">
        <hr>
        <button class="btn btn-success">登録</button>
    </form>

    <h1>画像</h1>
</body>

</html>