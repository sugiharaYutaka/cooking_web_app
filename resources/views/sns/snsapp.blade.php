<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>SNS - 投稿一覧</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ...（前回のスタイル） ... */

        h1 {
            margin-top: 100px;
        }

        .interaction-icons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }


        .like-btn {
            background-color: #e0245e;
            color: #fff;
            border: none;
        }

        .reply-btn {
            background-color: #1da1f2;
            color: #fff;
            border: none;
        }

        .comment-input {
            margin-top: 10px;
        }
    </style>
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
                @foreach($data as $post)
                    <div class="card post mt-5">
                        <div class="cart-body">
                            <img src="{{ asset( 'image' ) . '/'. $post->image_filename }}">
                            {{ $post->name }}<br>
                            {{ $post->text }}
                            <div class="interaction-icons">
                                <button class="like-btn">いいね</button>
                                <button class="reply-btn">リプライ</button>
                            </div>

                            <form class="comment-input" style="display: none;">
                                <div class="mb-3">
                                    <label for="commentInput" class="form-label">コメントを入力</label>
                                    <textarea class="form-control" id="commentInput" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">投稿</button>
                            </form>
                        </div>
                    </div>
                    <!---<div class="card post mt-5">
                        <div class="card-body">
                            <div class="card-name">{{ $post->name}}</div>
                            <h5 class="card-title">{{ $post->text }}</h5>
                             いいねとリプライ（コメント）フォーム 
                            <div class="interaction-icons">
                                <button class="like-btn">いいね</button>
                                <button class="reply-btn">リプライ</button>
                            </div>
                             コメント入力フォーム 
                            <form class="comment-input" style="display: none;">
                                <div class="mb-3">
                                    <label for="commentInput" class="form-label">コメントを入力</label>
                                    <textarea class="form-control" id="commentInput" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">投稿</button>
                            </form>
                        </div>
                    </div> --->
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const replyButtons = document.querySelectorAll('.reply-btn');
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

    <script>
        var pusher = new Pusher('YOUR_PUSHER_APP_KEY', {
        cluster: 'YOUR_PUSHER_APP_CLUSTER',
        encrypted: true
        });

        var channel = pusher.subscribe('channel-name');
        channel.bind('App\\Events\\YourEventName', function(data) {
        // 新しい投稿があった場合の処理
        // データを取得して投稿リストに追加するなどの処理を行う
        });

    </script>
</body>

</html>