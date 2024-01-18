<body>
    <div class="modal fade" id="recipemodalProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-color-2">
                    <h5 class="modal-title" id="exampleModalLabel">タグ選択</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body bg-color-1">

                    <h2>タグで検索</h2>

                    <form action="{{ route('tags') }}" method="GET">
                        <div class="form-group">
                            <div class="row">
                                <div class='col-6'>
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
                                </div>
                                <div class='col-6'>
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

                                    <br><br>
                                    <button type="submit" class="mt-5 btn btn-primary justify-content-end">検索</button>
                                    <button class="mt-5 btn justify-content-end" style="background-color: #EBE3D5; border: 1px solid #776B5D; color: black;"><a href="{{ route('recipes') }}" class="no-underline text-color-5">最初に戻る</a></button>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>