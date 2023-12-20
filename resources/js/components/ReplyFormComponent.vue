<template>
    <div>
        <button class="reply-btn interaction-button my-2" @click="replyshow()">
            返信
        </button>

        <div class="commentInput" style="display: none;">
            <div class="mb-3">
                <label for="commentInput" class="form-label">コメントを入力</label>
                <textarea class="form-control" id="commentInput" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" @click="replyPost()">
                投稿
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["postId", "replyPostUrl"],
    data() {
        return {
            _replyPostUrl: null,
            commentInput: "comment-input",
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
                formData.append('post_id', this.postId);
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

    },

    mounted() {
        this._replyPostUrl = this.replyPostUrl.replaceAll('\\', '').replaceAll('"', '');
    }
};
</script>
