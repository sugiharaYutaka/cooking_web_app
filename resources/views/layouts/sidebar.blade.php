<!-- sidebar.blade.php -->
<div class="h-100">
    <h2>タグで検索</h2>
    <form action="{{ route('tags') }}" method="GET" class="h-100">
        <div class="form-group">
            <label>材料：</label><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag1" name="tags[]" value="魚">
                <label class="form-check-label" for="tag1">魚</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag2" name="tags[]" value="牛肉">
                <label class="form-check-label" for="tag2">牛肉</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag2" name="tags[]" value="豚肉">
                <label class="form-check-label" for="tag3">豚肉</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag3" name="tags[]" value="野菜">
                <label class="form-check-label" for="tag4">野菜</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag4" name="tags[]" value="卵">
                <label class="form-check-label" for="tag5">卵</label>
            </div>

            <label class="mt-2">調理法：</label><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag5" name="tags[]" value="焼き料理">
                <label class="form-check-label" for="tag1">焼き料理</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag6" name="tags[]" value="ゆで料理">
                <label class="form-check-label" for="tag2">ゆで料理</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag8" name="tags[]" value="煮込み料理">
                <label class="form-check-label" for="tag3">煮込み料理</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag9" name="tags[]" value="揚げ料理">
                <label class="form-check-label" for="tag4">揚げ料理</label>
            </div>

            <label>難易度：</label><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="level1" name="levels[]" value="1">
                <label class="form-check-label" for="level1">☆</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="level2" name="levels[]" value="2">
                <label class="form-check-label" for="level2">☆☆</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="level3" name="levels[]" value="3">
                <label class="form-check-label" for="level3">☆☆☆</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="level4" name="levels[]" value="4">
                <label class="form-check-label" for="level4">☆☆☆☆</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="level5" name="levels[]" value="5">
                <label class="form-check-label" for="level5">☆☆☆☆☆</label>
            </div>
            <!-- 他のタグを追加 -->
        </div>
        <button type="submit" class="btn btn-primary">検索</button>
        <button class="btn btn-primary"><a href="{{ route('recipes') }}" class="no-underline text-color-1">最初に戻る</a></button>
    </form>

    <button class="btn btn-primary mt-3"><a href="{{ route('recipepost') }}" class="no-underline text-color-1">投稿を作成する</a></button>

</div>