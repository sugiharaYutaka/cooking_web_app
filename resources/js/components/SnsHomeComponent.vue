<template>
    <div>

        <head>
            <meta charset="UTF-8">
            <title>SNS - 投稿一覧</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body class="body-margin">
            <!-- ナビゲーションバー -->
            <!-- ...（前回のナビゲーションバー） ... -->

            <!-- コンテンツ -->
            <div class="container-fluid">
                <h1>投稿一覧</h1>
                <hr>
                <div v-for="(post, index) in parsedData" :key="index">
                    <div class="post-body">
                        <div class="row mt-1">
                            <div class="col-2 d-flex justify-content-center">
                                <form :action=_profileUrl method="post">
                                    <input type="hidden" name="_token" :value=csrfToken>
                                    <input type="hidden" name="post_id" :value=parsedData[index].id>
                                    <input type="image" name="submit" class="post-icon" :src="_imagePath + 'icon/' +parsedData[index].icon_filename">
                                </form>
                            </div>
                            <div class="col-10 align-self-center">
                                <span class="h5">{{ parsedData[index].name }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 offset-2">
                                <span>{{ parsedData[index].text }}</span>
                            </div>
                        </div>

                        <div v-if="parsedData[index].image_filename" class="row">
                            <div class="col-10 offset-2">
                                <img class="post-image" :src="_imagePath + 'post/' + parsedData[index].image_filename">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-end">
                                <div class="like-form" style="display: inline;">
                                    <input type="hidden" name="post_id" v-bind:value=parsedData[index].id>
                                    <!-- いいね数を表示 -->
                                    <button type="submit" :id="'likebutton_' + parsedData[index].id" class="like-btn interaction-button my-2"
                                        @click="likePost(parsedData[index].id)">{{ parsedData[index].good }}♡</button>
                                    <!-- 他のボタンとフォーム -->
                                </div>

                                <form :action=_replyShowUrl method="post" style="display: inline;">
                                    <input type="hidden" name="_token" :value=csrfToken>
                                    <input type="hidden" name="post_id" :value=parsedData[index].id>
                                    <button class="reply-btn interaction-button my-2">
                                        返信
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>

                <!-- もっと見るボタン -->
                <button type="button" class="more-post btn btn-secondary" @click="loadMore">もっと見る</button>

            </div>
        </body>
    </div>
</template>

<script>
import Echo from 'laravel-echo';
import axios from 'axios';

export default {
    props: ["postData", "replyUrl", "imagePath", "replyPostUrl", "replyShowUrl", "profileUrl"],
    data() {
        return {
            parsedData: [],
            offset: 0,
            limit: 10,
            postMax: 0,
            _imagePath: null,
            _replyUrl: null,
            _replyPostUrl: null,
            _replyShowUrl: null,
            _profileUrl: null,
            commentInput: "comment-input",
            csrfToken: null,
        };
    },
    methods: {
        likePost(postId) {
            let likebutton = document.getElementById(`likebutton_${postId}`);
            likebutton.textContent = parseInt(likebutton.textContent) + 1 + "♡";

            let formData = new FormData();
            formData.append('post_id', postId);
            //replyUrlにPOST送信
            axios.post(this._replyUrl, formData)
        },
        replyshow(index) {
            const commentInputClass = this.commentInput + this.parsedData[index].id;
            const commentInput = document.querySelector('.' + commentInputClass);
            if (commentInput) {
                if (commentInput.style.display === 'none' || commentInput.style.display === '') {
                    commentInput.style.display = 'block';
                } else {
                    commentInput.style.display = 'none';
                }
            }
        },
        replyPost(index) {
            const commentInputClass = this.commentInput + this.parsedData[index].id;
            const commentInput = document.querySelector('.' + commentInputClass);
            const comment = commentInput.querySelector('textarea').value; // コメントの値を取得する
            if (comment) {
                let formData = new FormData();
                formData.append('post_id', this.parsedData[index].id);
                formData.append('comment', comment);

                axios.post(this._replyPostUrl, formData) // ここでリプライ送信用のエンドポイントを指定
                    .then(response => {
                        // リプライが送信された後の処理をここに記述
                        console.log('Reply sent successfully');
                        // 他の更新やリダイレクトなどが必要ならば追加してください
                    })
                    .catch(error => {
                        // エラーが発生した場合の処理
                        console.error('Error sending reply:', error);
                    });
            }
        },
        loadData() {
            axios.get(`/snsMore?offset=${this.offset}&limit=${this.limit}`).then(response => {
                this.parsedData = this.parsedData.concat(response.data.data);
            });

            //ページを最初に読み込んだ時の、投稿の数を入れとく
            this.postMax = this.parsedData.length;
        },
        loadMore() {
            this.offset += this.limit;
            this.loadData();
        },
    },

    mounted() {
        //bladeから受けっとったデータの整形
        //this.parsedData = JSON.parse(this.postData);
        this._imagePath = this.imagePath.replaceAll('\\', '').replaceAll('"', '') + '/';
        this._replyUrl = this.replyUrl.replaceAll('\\', '').replaceAll('"', '');
        this._replyPostUrl = this.replyPostUrl.replaceAll('\\', '').replaceAll('"', '');
        this._replyShowUrl = this.replyShowUrl.replaceAll('\\', '').replaceAll('"', '');
        this._profileUrl = this.profileUrl.replaceAll('\\', '').replaceAll('"', '');

        //snsapp.blade.phpに記述されているcsrfトークンを取得
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        //console.log(this.parsedData);
        //console.log(this._replyUrl);
        //console.log(this._imagePath);
        //console.log(this._replyPostUrl);


        this.loadData();


        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: process.env.MIX_PUSHER_APP_KEY,
            cluster: process.env.MIX_PUSHER_APP_CLUSTER,
            encrypted: true,
        });

        window.Echo.channel('good-channel').listen('GoodEvent', (event) => {
            if (event.error) {
                console.error('Pusher error:', event.error);
            } else {
                //postMaxより要素数が多くなって値がかえって来た場合　多くなった分の要素を削除する
                //いいねボタンを押す間に新しい投稿がされたときの対策
                if (event.post_data.length > this.postMax) {
                    event.post_data = event.post_data.slice(event.post_data.length - this.postMax,);
                }
                //postのデータ更新
                this.parsedData = event.post_data;
            }
        });
    }
};
</script>
