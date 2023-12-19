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
                <!-- 投稿を表示するカード -->
                <div class="row">
                    <div class="col">
                        <hr>
                        <div v-for="(post,index) in parsedData" :key="index">
                            <div class="post-body">
                                <div class="container">
                                    <div class="row mt-1">
                                        <div class="col-2 text-end">
                                            <!--
                                            <img class="post-icon" :src="_imagePath + parsedData[index].icon_filename">
                                            -->
                                            <input type="image" class="post-icon" :src="_imagePath + parsedData[index].icon_filename" @click="sendPost('profile', parsedData[index].id)">
                                        </div>
                                        <div class="col align-self-center">
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
                                            <img class="post-image" :src="_imagePath + parsedData[index].image_filename">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col text-end">
                                            <div class="like-form">
                                                <input type="hidden" name="post_id" v-bind:value=parsedData[index].id>
                                                <span class="like-count">{{parsedData[index].good}}</span> <!-- いいね数を表示 -->
                                                <button type="submit" class="like-btn interaction-button my-2" @click="sendPost('like',parsedData[index].id)">♡</button>
                                                <!-- 他のボタンとフォーム -->
                                            </div>
                                            <!--<button class="like-btn interaction-button my-2">♡</button>-->
                                            <button class="reply-btn interaction-button my-2">リプライ</button>
                                            <form :class="commentInput + parsedData[index].id" style="display: none;">
                                                <div class="mb-3">
                                                    <label for="commentInput" class="form-label">コメントを入力</label>
                                                    <textarea class="form-control" id="commentInput" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">投稿</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </div>
</template>

<script>
import Echo from 'laravel-echo';
  export default {
    props:["postData","replyUrl","profileUrl","imagePath"],
    data() {
      return {
        parsedData:null,
        postMax:0,
        _imagePath:null,
        _replyUrl:null,
        profileUrl:null,
        commentInput:"comment-input"
      };
    },
    methods:{
        sendPost(target,postId){
            let formData = new FormData();
            formData.append('post_id', postId);
            if (target == 'like'){
                //replyUrlにPOST送信
                axios.post(this._replyUrl,formData)
            }else if (target == 'profile'){
                //profileUrlにPOST送信
                axios.post(this.profileUrl,formData)
            }
        },
    },

    mounted(){
        //bladeから受けっとったデータの整形
        this.parsedData = JSON.parse(this.postData);
        this._imagePath = this.imagePath.replaceAll('\\','').replaceAll('"','') + '/';
        this._replyUrl = this.replyUrl.replaceAll('\\','').replaceAll('"','');
        //console.log(this.parsedData)
        //console.log(this._replyUrl)
        //console.log(this._imagePath)

        //ページを最初に読み込んだ時の、投稿の数を入れとく
        this.postMax = this.parsedData.length;


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
                if(event.post_data.length > this.postMax)
                {
                    event.post_data = event.post_data.slice(event.post_data.length - this.postMax,);
                }
                //postのデータ更新
                this.parsedData = event.post_data;
            }
        });
    }
  };

const replyButtons = document.querySelectorAll('.reply-btn8');
replyButtons.forEach(button => {
    button.addEventListener('click', function() {
        const commentInput = this.parentElement.nextElementSibling;
        if (commentInput.style.display === 'none') {
            commentInput.style.display = 'block';
        } else {
            commentInput.style.display = 'none';
        }
    });
});
</script>
