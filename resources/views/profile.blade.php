@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール - CookingWeb</title>

    <style>
        body {
            padding-top: 85px;
            padding-bottom: 80px;
        }

        .center {
            text-align: center;
            margin-left: 15%;
            margin-right: 15%;
        }

        .center .imgcircle {
            text-align: center;
            height: 120px;
            width: 120px;
        }

        .imgcircle {
            border-radius: 50%;
            object-fit: cover;
        }



        .flex-icon,
        .flex-name,
        .flex-comment,
        .flex-history {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .flex-icon {
            flex-wrap: wrap;
        }







        .forminput .file {
            font-size: 15px;
        }

        .forminput img {
            margin-left: 20px;
            height: 60px;
            width: 60px;
        }

        .forminput p {
            font-size: 18px;
            width: 90px;
        }

        .forminput .text {
            height: 30px;
            width: 80%;
            font-size: 18px;
        }

        .forminput textarea {
            width: 80%;
            font-size: 14px;
            resize: none;
        }

        .forminput .text,
        .forminput textarea {
            border-radius: 3px;
            /*ボックス角の丸み*/
            border: 2px solid #ddd;
            /*枠線*/
            box-sizing: border-box;
            /*横幅の解釈をpadding, borderまでとする*/
        }

        .forminput .text:focus,
        .forminput textarea:focus {
            box-shadow: 0 0 5px 0 rgba(255, 153, 0, 1);
            border: 2px solid #FFF !important;
            outline: 0;
        }




        .forminput input.submit-button {
            display: block;
            text-decoration: none;
            height: 40px;
            width: 140px;
            margin: auto;
            font-weight: bold;
            border: 2px solid #111;
            color: #228b22;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="center">
        <h1>プロフィール</h1>
        <img class="imgcircle" src="{{ asset('/storage/img/'.$icon_filename) }}">


        <form action="{{ route('profile') }}" method="post" class="forminput">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}" />
            <input class="submit-button" type="submit" value="フォロー">
        </form>


        <hr>

        <form action="{{ route('profile') }}" method="post" enctype="multipart/form-data" class="forminput">
            @method('PUT')
            @csrf

            @foreach($data as $userData)
            @endforeach

            <input type="hidden" name="email" value="{{ $email }}" />

            <div class="flex-icon">
                <p>アイコン</p>

                <input type="file" class="file" name="image_file" onchange="previewImage(this);" accept=".jpg, .jpeg, .png">
                <img class="imgcircle" id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
            </div>

            <hr>

            <div class="flex-name">
                <p>名前</p>
                <input type="text" class="text" name="name" value="{{ $userData->name }}">
            </div>

            <hr>

            <div class="flex-comment">
                <p>自己紹介</p>
                <textarea name="comment" cols="35" rows="5">{{ $userData->comment }}</textarea>
            </div>

            <hr>

            <div class="flex-history">
                <p>料理歴</p>
                <input type="text" class="text" name="history" value="{{ $userData->history }}">
            </div>

            <input class="submit-button" type="submit" value="変更">

        </form>
    </div>
</body>

<script>
    const multiple = document.getElementById('multiple');
    const showFiles = document.getElementById('show-files');
    multiple.addEventListener('change', (event) => {
        const fileList = event.target.files;
        for (let i = 0; i < fileList.length; i++) {
            console.log(fileList[i]);
            const li = document.createElement('li');
            li.textContent = fileList[i].name;
            showFiles.appendChild(li);
        }
    });





    function previewImage(obj) {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.getElementById('preview').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
</script>

</html>

@extends('layouts.snsfooter')