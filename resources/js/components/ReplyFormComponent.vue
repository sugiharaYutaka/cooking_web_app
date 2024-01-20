<template>
    <!--main post-->
    <div class="body-margin">
        <div class="container-fluid">
            <div class="post-body">
                <div class="row mt-1">
                    <div class="col-2 d-flex justify-content-center">
                        <img class="post-icon" :src="after_imagePath + 'icon/' + after_mainPost.icon_filename">
                    </div>
                    <div class="col-8 align-self-center">
                        <span class="h3 text-color-gray">{{ after_mainPost.name }}</span>
                    </div>
                    <div class="col-2 text-end">
                        <span v-if="after_mainPost.email==after_sessionEmail" class="h3 text-color-gray"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="h5 col-10 offset-2">
                        <span>{{ after_mainPost.text }}</span>
                    </div>
                </div>

                <div v-if="after_mainPost.image_filename">
                    <div class="row">
                        <div class="col-10 offset-2">
                            <img class="post-image" :src="after_imagePath + 'post/' + after_mainPost.image_filename">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-end">
                        <strong class="like-count h5" style="color:#e0245e;">{{ after_mainPost.good }}♡</strong>
                        <div style="display:inline;">
                            <button class="reply-btn interaction-button my-2" @click="replyshow()">
                                返信
                            </button>

                            <div class="commentInput" style="display: none;">
                                <div class="mb-3">
                                    <label for="commentInput" class="form-label">コメントを入力</label>
                                    <div style="align: right; margin-left: 17%;">
                                        <textarea class="form-control" id="commentInput" rows="3" style="border: 2px solid #ccc;"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" @click="replyPost()">
                                    投稿
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <hr>
    <hr>


    <!-- reply -->
    <div v-for="reply in after_allReply">
        <div class="post-body">
            <div class="row mt-1">
                <div class="col-2 text-end">
                    <img class="post-icon" :src="after_imagePath + 'icon/' + reply.icon_filename">
                </div>
                <div class="col-10 align-self-center">
                    <span class="h5 text-color-gray">{{ reply.name }}</span>
                    <span class="text-color-gray">{{ reply.created_at }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-10 offset-2">
                    <span>{{ reply.text }}</span>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
</template>

<script>
import Echo from 'laravel-echo';
export default {
    props: ["replyPostUrl", "mainPost", "allReply", "imagePath","sessionEmail"],
    data() {
        return {
            after_replyPostUrl: null,
            after_mainPost: null,
            after_allReply: null,
            after_imagePath: null,
            after_sessionEmail:null,
            icon_dir:"icon/",
            post_dir:"post/",
        };
    },
    methods: {
        replyshow() {
            const commentInput = document.querySelector('.commentInput');
            if (commentInput) {
                if (commentInput.style.display === 'none' || commentInput.style.display === '') {
                    commentInput.style.display = 'block';
                } else {
                    commentInput.style.display = 'none';
                }
            }
        },
        replyPost() {
            const commentInput = document.querySelector('.commentInput');
            const comment = commentInput.querySelector('textarea').value; // コメントの値を取得する
            if (comment) {
                let formData = new FormData();
                formData.append('post_id', this.after_mainPost.id);
                formData.append('comment', comment);

                axios.post(this.after_replyPostUrl, formData) // ここでリプライ送信用のエンドポイントを指定
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

    },

    mounted() {
        let mainPost_0 = JSON.parse(this.mainPost);
        this.after_mainPost = mainPost_0[0];
        this.after_allReply = JSON.parse(this.allReply);
        this.after_replyPostUrl = this.replyPostUrl.replaceAll('\\', '').replaceAll('"', '');
        this.after_imagePath = this.imagePath.replaceAll('\\', '').replaceAll('"', '') + '/';
        this.after_sessionEmail = this.sessionEmail.replaceAll('"', '')

        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: process.env.MIX_PUSHER_APP_KEY,
            cluster: process.env.MIX_PUSHER_APP_CLUSTER,
            encrypted: true,
        });

        window.Echo.channel('reply-channel').listen('ReplyEvent', (event) => {
            if (event.error) {
                console.error('Pusher error:', event.error);
            } else {
                this.after_allReply = event.replies_data;
                this.after_mainPost = event.post_data[0];
                console.log("after rep",this.after_allReply);
                console.log("after main",this.after_mainPost);
            }
        });
    }
};
</script>
