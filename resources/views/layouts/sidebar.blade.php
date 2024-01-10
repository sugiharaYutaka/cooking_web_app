<!-- sidebar.blade.php -->
<div class="">
    <h2>タグで検索</h2>
    <form action="{{ route('tags') }}" method="GET">
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
                <label class="form-check-label" for="tag2">豚肉</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag3" name="tags[]" value="野菜">
                <label class="form-check-label" for="tag3">野菜</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag4" name="tags[]" value="卵">
                <label class="form-check-label" for="tag4">卵</label>
            </div>

            <label class="mt-2">調理法：</label><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag1" name="tags[]" value="焼き料理">
                <label class="form-check-label" for="tag1">焼き料理</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag2" name="tags[]" value="ゆで料理">
                <label class="form-check-label" for="tag2">ゆで料理</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag3" name="tags[]" value="煮込み料理">
                <label class="form-check-label" for="tag3">煮込み料理</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag4" name="tags[]" value="揚げ料理">
                <label class="form-check-label" for="tag4">揚げ料理</label>
            </div>
            <!-- 他のタグを追加 -->
        </div>
        <button type="submit" class="btn btn-primary">検索</button>
    </form>
</div>