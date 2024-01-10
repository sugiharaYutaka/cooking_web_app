
<template>
    <html lang="ja">

    <!-- 既存のコードがここにあると仮定 -->

    <!-- モーダルのテンプレート -->
    <div v-if="showConfirmationModal" class="custom-modal">
        <!-- モーダルのコンテンツ -->
        <div class="modal-content">
            <p>この内容で投稿して宜しいですか？</p>
            <button @click="confirmPost">はい</button>
            <button @click="cancelPost">キャンセル</button>
        </div>
    </div>

    <body class="body-margin">
        <div class="card mt-5 p0">
            <div class="container-fluid p-0">
                <div class="row m-0">
                    <label class="border-bottom rounded-top bg-color-3 mb-2"><span class="h6 ms-1">タイトル</span></label>
                    <div class="col">
                        <div class="mx-5">
                            <textarea :class="formClass['title']" placeholder="鶏もも肉の甘辛チキン" v-model="title"></textarea>
                            <div v-if="validateError['title']">
                                <ul>
                                    <li v-for="error in validateError['title']" class="h6 text-danger">
                                        {{ error }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <label class="border-bottom border-top bg-color-3 mt-5 mb-2"><span class="h6 ms-1">料理写真</span></label>
                    <div class="col">
                        <div class="mx-5">
                            <input type="file" :class="formClass['dishImage']" accept="image/*" @change="changeImage">
                            <div v-if="validateError['dishImage']">
                                <ul>
                                    <li v-for="error in validateError['dishImage']" class="h6 text-danger">
                                        {{ error }}
                                    </li>
                                </ul>
                            </div>
                            <div id="image-preview-container">
                                <img id="ryouri_pre" class="image-preview" alt="料理写真プレビュー" :src="dishImage"
                                    v-if="dishImage">
                            </div>
                        </div>
                    </div>

                    <label class="border-bottom border-top bg-color-3 mt-5 mb-2"><span class="h6 ms-1">レシピの紹介</span></label>
                    <div class="col">
                        <div class="mx-5">
                            <textarea :class="formClass['description']"
                                placeholder="鶏もも肉を、醤油とザラメ糖を使って、甘辛く仕上げた一品。寒い日にぴったりです。" v-model="description">
                            </textarea>
                            <div v-if="validateError['description']">
                                <ul>
                                    <li v-for="error in validateError['description']" class="h6 text-danger">
                                        {{ error }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <label class="border-bottom border-top bg-color-3 mt-5 mb-2">
                        <span class="h6 ms-1">材料(1人前)</span>
                    </label>
                    <div class="col">
                        <div class="mx-5">
                            <textarea :class="formClass['ingredients']" placeholder="醤油:大さじ3"
                                v-model="ingredients"></textarea>
                            <div v-if="validateError['ingredients']">
                                <ul>
                                    <li v-for="error in validateError['ingredients']" class="h6 text-danger">
                                        {{ error }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <label class="border-bottom border-top bg-color-3 mt-5 mb-2"><span class="h6 ms-1">作り方</span></label>
                    <div v-for="index in stepCount">
                        <div class="card my-2">
                            <div class="container mt-2">
                                <div class="row">
                                    <div class="col-8">
                                        <input class="form-control btn" :value="'工程' + index" required readonly>
                                        <textarea :class="formClass['stepText'][index - 1]" id="userInput"
                                            :placeholder="stepPlaceholder[index - 1]" v-model="stepText[index - 1]">
                                        </textarea>
                                        <div v-if="validateError['stepText'][index - 1]">
                                            <ul>
                                                <li v-for="error in validateError['stepText'][index - 1]"
                                                    class="h6 text-danger">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label2 col-3">工程写真</label>
                                        <br>
                                        <input type="file" :class="formClass['stepImage'][index - 1]" id="image"
                                            accept="image/*" @change="changeStepImage($event, index - 1)" ml-auto>
                                        <div id="image-preview-container">
                                            <img class="image-preview" alt="プレビュー" v-bind:src="stepImage[index - 1]"
                                                v-if="stepImage[index - 1]">
                                        </div>
                                        <div v-if="validateError['stepImage'][index - 1]">
                                            <ul>
                                                <li v-for="error in validateError['stepImage'][index - 1]"
                                                    class="h6 text-danger">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <div class="row">
                            <div class="offset-8 col-2">
                                <button type="submit" class="btn btn-outline-secondary col-12 mt-2"
                                    @click="addStep()">工程を追加</button>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-outline-secondary col-12 mt-2" @click="deleteStep()"
                                    ml-auto>工程を削除</button>
                            </div>
                        </div>
                    </div>

                    <label class="border-bottom border-top bg-color-3 mt-5 mb-2 p-0"><span
                            class="h6 ms-1">コツ・豆知識</span></label>
                    <div class="col">
                        <div class="mx-5">
                            <textarea :class="formClass['point']" placeholder="鶏肉を焼く時に皮を下にして焼くのがおすすめです。"
                                v-model="point"></textarea>
                            <div v-if="validateError['point']">
                                <ul>
                                    <li v-for="error in validateError['point']" class="h6 text-danger">
                                        {{ error }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <label class="border-bottom border-top bg-color-3 mt-5 mb-2 p-0"><span class="h6 ms-1">タグ</span></label>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 ms-5 pe-0">
                                <select class="form-control rounded-top-L" id="select-tag">
                                    <option value="">タグを選択</option>
                                    <option value="#魚">#魚</option>
                                    <option value="#肉">#肉</option>
                                </select>
                            </div>
                            <div class="col-3 me-1 ps-0">
                                <button class="btn btn-outline-secondary rounded-top-R h-100 py-0 px-1" @click="addTag">
                                    <span class="h5">＋</span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mx-5">
                                    <div class="form-control h-100" style="border-top-left-radius: 0;">

                                        <span v-for="tag in tagList">
                                            <span class="btn rounded-5 my-1 mx-1"
                                                style="background-color: rgb(198, 198, 198);">
                                                <span class="h6" style="color:rgb(39, 158, 255)">
                                                    {{ tag }}
                                                </span>
                                                <span class="rounded-5 del-tag px-1" style="color:rgb(63, 63, 63)"
                                                    @click="deleteTag(tag)">
                                                    ✕
                                                </span>
                                            </span>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <label class="border-bottom border-top bg-color-3 mt-5 mb-2 p-0"><span
                            class="h6 ms-1">難易度</span></label>
                    <div class="col">
                        <div class="mx-5">
                            <select class="form-control" id="level">
                                <option value="1">☆</option>
                                <option value="2">☆☆</option>
                                <option value="3">☆☆☆</option>
                                <option value="4">☆☆☆☆</option>
                                <option value="5">☆☆☆☆☆</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary mt-5 mb-3" @click="postForm">
                                <span class="mx-5">投稿</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>
</template>

<script>
export default {
    props: ["postUrl"],
    data() {
        return {
            _postUrl: "",
            stepCount: 3,
            dishImage: null,
            showConfirmationModal: false,

            tagList: ['#ユーザ投稿'],
            stepPlaceholder: [
                'まずは調味料を作ります。用意した醤油、酒、コチュジャンを混ぜ合わせます。',
                '次に鶏肉を一口大に切り、片栗粉をまぶします',
                'フライパンに油を入れ、工程2で処理した鶏肉を焼いていきます'
            ],

            title: "",
            description: "",
            ingredients: "",
            point: "",
            stepText: Array.from({ length: 20 }, () => ''),
            stepImage: Array.from({ length: 20 }),
            postStepImage: Array.from({ length: 20 }, () => null),
            postDishImage: null,

            validateError: {
                title: [],
                dishImage: [],
                description: [],
                ingredients: [],
                point: [],
                stepImage: Array.from({ length: 20 }),
                stepText: Array.from({ length: 20 }),
                check: false,
            },

            formClass: {
                title: 'form-control',
                dishImage: 'form-control',
                description: 'form-control',
                ingredients: 'form-control',
                point: 'form-control',
                stepImage: Array.from({ length: 20 }, () => 'form-control'),
                stepText: Array.from({ length: 20 }, () => 'form-control'),
            }
        };
    },

    // モーダルのメソッド
    methods: {
        confirmPost() {
            let element = document.getElementById('level');
            formData.append('level', element.value)
            formData.append('tag', this.tagList)
            formData.append('stepCount', this.stepCount);
            axios.post(this._postUrl, formData)
                .then(response => {
                    // 投稿が成功した場合の処理
                    // モーダルを非表示にする
                    this.showConfirmationModal = false;
                    // 投稿が完了した後のリダイレクト
                    window.location.href = '/recipes';
                })
                .catch(error => {
                    // エラー時の処理
                    console.error('投稿エラー:', error);
                    // エラー処理を行う（例えば、エラーメッセージを表示するなど）
                });
        },
        cancelPost() {
            this.showConfirmationModal = false; // モーダルを非表示にする
        }
    },
    methods: {
        addStep() {
            if (this.stepCount < 20) {
                this.stepCount++;
            }
        },
        deleteStep() {
            if (this.stepCount > 1) {
                this.stepCount--;
            }
        },
        addTag() {
            const tag = document.getElementById("select-tag").value;
            if (tag != "" && this.tagList.indexOf(tag) == -1) {
                this.tagList.push(tag);
            }
        },
        deleteTag(tag) {
            const index = this.tagList.indexOf(tag);
            if (index >= 0) {
                this.tagList.splice(index);
            }
        },
        changeImage(event) {
            const image = event.target.files[0];
            this.postDishImage = image;
            var fileReader = new FileReader();
            fileReader.onload = (e) => {
                this.dishImage = e.target.result;
            };
            fileReader.readAsDataURL(image);
        },
        changeStepImage(event, index) {
            const image = event.target.files[0];
            this.postStepImage[index] = image;
            var fileReader = new FileReader();
            fileReader.onload = (e) => {
                this.stepImage[index] = e.target.result;
            };
            fileReader.readAsDataURL(image);

        },
        validate(value, rules) {
            let message = {};
            if (rules.indexOf('required') != -1 && value.length == 0) {
                message['required'] = '必須項目です';
            }
            if (rules.indexOf('max50') != -1 && value.length > 50) {
                message['max50'] = '50文字未満にしてください';
            }
            if (rules.indexOf('max500') != -1 && value.length > 500) {
                message['max500'] = '500文字未満にしてください';
            }
            if (rules.indexOf('slash') != -1 && value.search('/') != -1) {
                message['slash'] = '/を使用しないでください';
            }

            if (Object.keys(message).length) {
                return message;
            }
            else {
                return false;
            }
        },
        validateFile(value, rules) {
            let message = {};
            try {
                if (rules.indexOf('required') != -1 && value == null) {
                    message['required'] = '必須項目です';
                }
                if (rules.indexOf('max3MB') != -1 && value.size > 3072000) {
                    message['max3MB'] = 'ファイルサイズは3MB未満にしてください';
                }
            }
            catch (e) {
                message['required'] = '必須項目です';
            }
            if (Object.keys(message).length) {
                return message;
            }
            else {
                return false;
            }
        },
        postForm() {
            let formData = new FormData();
            let checkSum = 0;
            let checkSumMax = 5 + (this.stepCount * 2)

            let result = null;
            if (result = this.validate(this.title, ['required', 'max50'])) {
                //バリデーションエラー発生
                this.validateError['title'] = result;
                this.formClass['title'] = 'form-control is-invalid';
            }
            else {
                //バリデーション成功
                this.formClass['title'] = 'form-control';
                this.validateError['title'] = null;
                formData.append('title', this.title);
                checkSum++;
            }

            if (result = this.validate(this.description, ['required', 'max50'])) {
                //バリデーションエラー発生
                this.validateError['description'] = result;
                this.formClass['description'] = 'form-control is-invalid';

            }
            else {
                //バリデーション成功
                this.formClass['description'] = 'form-control';
                this.validateError['description'] = null;
                formData.append('description', this.description);
                checkSum++;
            }

            if (result = this.validate(this.ingredients, ['required', 'max500', 'slash'])) {
                //バリデーションエラー発生
                this.validateError['ingredients'] = result;
                this.formClass['ingredients'] = 'form-control is-invalid';
            }
            else {
                //バリデーション成功
                this.formClass['ingredients'] = 'form-control';
                this.validateError['ingredients'] = null;
                formData.append('ingredients', this.ingredients.replace('\n', "//"));
                checkSum++;
            }

            if (result = this.validate(this.point, ['required', 'max500'])) {
                //バリデーションエラー発生
                this.validateError['point'] = result;
                this.formClass['point'] = 'form-control is-invalid';
            }
            else {
                //バリデーション成功
                this.formClass['point'] = 'form-control';
                this.validateError['point'] = null;
                formData.append('point', this.point);
                checkSum++;
            }

            if (result = this.validateFile(this.postDishImage, ['required', 'max3MB'])) {
                //バリデーションエラー発生
                this.validateError['dishImage'] = result;
                this.formClass['dishImage'] = 'form-control is-invalid';
            }
            else {
                //バリデーション成功
                this.formClass['dishImage'] = 'form-control';
                this.validateError['dishImage'] = null;
                formData.append('dishImage', this.postDishImage);
                checkSum++;
            }

            for (let index = 0; index < this.stepCount; index++) {
                if ((result = this.validateFile(this.postStepImage[index], ['max3MB'])) && this.postStepImage[index] != null) {
                    this.validateError['stepImage'][index] = result;
                    this.formClass['stepImage'][index] = 'form-control is-invalid';
                }
                else {
                    this.formClass['stepImage'][index] = 'form-control';
                    this.validateError['stepImage'][index] = null;
                    formData.append('step' + String(index + 1) + 'Image', this.postStepImage[index]);
                    checkSum++;
                }
                if (result = this.validate(this.stepText[index], ['required', 'max500', 'slash'])) {
                    this.validateError['stepText'][index] = result;
                    this.formClass['stepText'][index] = 'form-control is-invalid';
                }
                else {
                    this.formClass['stepText'][index] = 'form-control';
                    this.validateError['stepText'][index] = null;
                    formData.append('step' + String(index + 1) + 'Text', this.stepText[index]);
                    checkSum++;
                }
            }

            if (checkSum == checkSumMax) {
                this.showConfirmationModal = true;

                let element = document.getElementById('level');
                formData.append('level', element.value)
                formData.append('tag', this.tagList)
                formData.append('stepCount', this.stepCount);
                axios.post(this._postUrl, formData);
                //window.location.href = 'https://example.com';
            }

        },
    },

    mounted() {
        this._postUrl = this.postUrl.replaceAll('\\', '').replaceAll('"', '');
    }
};
</script>