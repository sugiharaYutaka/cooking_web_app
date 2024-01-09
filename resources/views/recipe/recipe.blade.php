@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))

<!DOCTYPE html>
<html lang="ja">


<div class="sidebar" style="padding-top: 100px;">
    <h2>タグ検索</h2>
    <ul>
        @foreach($tags as $tag)
        <li><a href="{{ route('recipe', ['tag' => $tag]) }}">{{ $tag }}</a></li>
        @endforeach
    </ul>
</div>

<body>
    <div class="" style="margin-top: 100px;">
        <button type=" btn" style="border: none; background: transparent;" class="btn"><a href="{{ route('recipepost') }}">レシピ投稿</a></button>
    </div>


</body>

</html>


@extends('layouts.footer')