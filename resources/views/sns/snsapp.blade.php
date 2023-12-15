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
                <div class="post-body">
                    <div class="container">
                        <div class="row mt-1">
                            <div class="col-2 text-end">
                                <img class="post-icon" src="{{ asset( 'image' ) . '/'. $post->icon_filename }}">
                            </div>
                            <div class="col align-self-center">
                                <span class="h5">{{ $post->name }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 offset-2">
                                <span>{{ $post->text }}</span>
                            </div>
                        </div>

                        @if($post->image_filename)
                        <div class="row">
                            <div class="col-10 offset-2">
                                <img class="post-image" src="{{ asset( 'image' ) . '/'. $post->image_filename }}">
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col text-end">
                                <form class="like-form" method="POST" action="/like-post">
                                    @csrf <!-- CSRFトークンを追加 -->
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <span class="like-count">{{ $likeCounts[$post->id] }}</span> <!-- いいね数を表示 -->
                                    <button type="submit" class="like-btn interaction-button my-2">♡</button>
                                    <!-- 他のボタンとフォーム -->
                                </form>
                                <!--<button class="like-btn interaction-button my-2">♡</button>-->
                                <button class="reply-btn interaction-button my-2">リプライ</button>
                            </div>
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
                <hr>
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
</body>

</html>