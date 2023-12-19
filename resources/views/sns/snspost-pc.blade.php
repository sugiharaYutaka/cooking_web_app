<style>
    html,
    .full-height {
        height: 100%;
    }

    .card {
        padding: 20px;
    }

    #userInput {
        width: 100%;
        height: 180px;
        resize: none;
        border: 2px solid #ccc;
        border-radius: 8px;
        padding: 4px;
        box-sizing: border-box;
    }

    body {
        padding-bottom: 30px;
    }
</style>

<body>
    @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">Create Image Post</div>

                    <div class="card-body d-flex flex-column ">
                        <button type="button" class="mt-3" style="border: none; background: none;">テキストを入力</button>

                        <form method="POST" action="{{ route('snspost') }}" enctype="multipart/form-data"> <!-- 後でactionの中を書く -->
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