<style>
    /* 追加のCSS */
    html,

    .full-height {
        height: 100%;
    }

    .card {
        padding: 20px;
    }

    #userInput {
        width: 100%;
        height: 300px;
        /* 適切な高さに調整してください */
        resize: none;
        border: 2px solid #ccc;
        border-radius: 8px;
        padding: 4px;
        box-sizing: border-box;
    }

    body {
        padding-bottom: 70px;
    }
</style>

<body>
    @section('content')
    <div class="container pt-4 pb-5 mt-5"> <!-- 画面いっぱいに広がるコンテナ -->
        <div class="row justify-content-center align-items-center"> <!-- コンテンツを中央に配置 -->
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">Create Image Post</div>

                    <div class="card-body d-flex flex-column "> <!-- カード内コンテンツを垂直方向に配置 -->
                        <!-- ここにフォームやコンテンツを追加 -->
                        <!-- Image Upload Form -->
                        <button type="button" class="mt-3" style="border: none; background: none;">テキストを入力</button>
                        <form method="POST" action="{{ route('snspost') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}" />

                            <textarea id="userInput" name="text"></textarea>
                            <div class="mb-3">
                                <label for="image" class="form-label">画像を追加する</label>
                                <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
                            </div>
                            <img id="preview" src="#" alt="Image Preview" class="" style="display: none; max-width: 200px; max-height: 200px; margin: 0 auto; text-align: center;">
                            <button type="submit" class="btn btn-primary">送信</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>