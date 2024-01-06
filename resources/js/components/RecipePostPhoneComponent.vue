<template>
    <html lang="ja">


    <body class="body-margin">
        <div class="card mt-5 mx-1 p-0">
            <!--<div class="card-header">献立を投稿</div>-->
            <label class="border-bottom rounded-top bg-color-3 mb-2"><span class="h6 ms-1">タイトル</span></label>
            <div class="mx-5">
                <textarea class="form-control m-0 p-0" name="text"></textarea>
            </div>

            <label class="border-bottom border-top bg-color-3 mt-5 mb-2"><span class="h6 ms-1">料理写真</span></label>
            <div class="mx-5">
                <input type="file" class="form-control" id="image" name="image" onchange="previewImage('ryouri_pre',this)">
                <div id="image-preview-container">
                    <img id="ryouri_pre" class="image-preview" alt="料理写真プレビュー">
                </div>
            </div>

            <label class="border-bottom border-top bg-color-3 mt-5 mb-2"><span class="h6 ms-1">レシピの紹介</span></label>
            <div class="mx-5">
                <textarea class="form-control m-0 p-0" name="text"></textarea>
            </div>

            <label class="border-bottom border-top bg-color-3 mt-5 mb-2"><span class="h6 ms-1">材料</span></label>
            <div class="mx-5">
                <textarea class="form-control m-0 p-0" name="text"></textarea>
            </div>

            <label class="border-bottom border-top bg-color-3 mt-5 mb-2"><span class="h6 ms-1">作り方</span></label>

            <div v-for="index in stepCount">
                <div class="card my-2">
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-12">
                                <input name="text" class="col-8 p-0" :value="'工程' + index" style="border: none;" required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control col-12 h-100 m-0 p-0" name="text"></textarea>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <lanel class="form-label2 col-3 p-0">工程写真</lanel>
                            </div>
                            <div class="col-12">
                                <input type="file" class="form-control col-12" id="image" name="image"
                                    onchange="previewImage('koutei_pre',this)" ml-auto>
                                <div id="image-preview-container">
                                    <img id="koutei_pre" class="image-preview" alt="プレビュー">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-outline-secondary col-12 mt-2"  @click="addStep()">工程を追加</button>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-outline-secondary col-12 mt-2" ml-auto  @click="deleteStep()">工程を削除</button>
                    </div>
                </div>
            </div>

            <label class="border-bottom border-top bg-color-3 mt-5 mb-2"><span class="h6 ms-1">コツ・豆知識</span></label>
            <div class="mx-5">
                <textarea class="form-control m-0 p-0" name="text"></textarea>
            </div>

            <label class="border-bottom border-top bg-color-3 mt-5 mb-2"><span class="h6 ms-1">タグ</span></label>
            <div class="mx-5">
                <select>
                    <option value="">タグを選択</option>
                    <option value="#tag">#tag</option>
                    <option value="#tag">#tag</option>
                </select>

                <textarea class="form-control m-0 p-0" name="text"></textarea>
            </div>

            <label class="border-bottom border-top bg-color-3 mt-5 mb-2"><span class="h6 ms-1">難易度</span></label>
            <div class="mx-5">
                <select>
                    <option value="">タグを選択</option>
                    <option value="#tag">#tag</option>
                    <option value="#tag">#tag</option>
                </select>
            </div>

            <div class="row">
                <div class="col d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary mt-5 mb-3">
                        <span class="mx-5">投稿</span>
                    </button>
                </div>
            </div>

        </div>


    </body>

    </html>
</template>
<script>
export default {
    data() {
        return {
            stepCount: 1,
        };
    },
    methods: {
        addStep() {
            if(this.stepCount < 20)
            {
                this.stepCount++;
            }
        },
        deleteStep() {
            if(this.stepCount > 1)
            {
                this.stepCount--;
            }
        },
    },

    mounted() {
    }
};
function previewImage(target, obj) {
    var fileReader = new FileReader();
    fileReader.onload = (function () {
        document.getElementById(target).src = fileReader.result;
        });
    fileReader.readAsDataURL(obj.files[0]);
}
</script>