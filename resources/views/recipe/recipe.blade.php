@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レシピ</title>

</head>

<body>
    <div class="col-2 d-flex justify-content-center ps-5" style="padding-top: 100px;">
        <button type="button" style="border: none; background: transparent;" class="btn"><a href="{{ route('recipepost') }}">レシピ投稿</a></button>
    </div>
</body>



</html>


@extends('layouts.footer')