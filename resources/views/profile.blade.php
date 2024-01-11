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

        .imgcircle {
            text-align: center;
            height: 120px;
            width: 120px;
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
            margin-right: 45%;
            margin-bottom: 10px;
            height: 60px;
            width: 60px;
        }

        .forminput p {
            font-size: 18px;
            width: 90px;
        }

        .forminput span {
            text-align: left;
            height: 30px;
            width: 60%;
            font-size: 15px;
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
            margin-top: 10px;
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
        @if (!isset($email) && !isset($target_email))
        <p>ログインしてください</p>
        @else



        @if ($icon_filename == "user_icon.png")
        <img class="imgcircle" src="{{ asset('/image/icon/user_icon.png') }}">
        @else
        <img class="imgcircle" src="{{ asset('/image/icon/' . $icon_filename) }}">
        @endif


        @if ($is_following != 2 && $email != $target_email)
        <form action="{{ route('followprofile') }}" method="post" class="forminput">
            @csrf
            <input type="hidden" name="target_email" value="{{ $target_email }}" />

            @if ($is_following == 1)
            <input class="submit-button" type="submit" value="フォローを外す">
            @elseif ($is_following == 0)
            <input class="submit-button" type="submit" value="フォローする">
            @endif

        </form>
        @endif


        <hr>

        <form action="{{ route('updateprofile') }}" method="post" enctype="multipart/form-data" class="forminput">
            @method('PUT')
            @csrf

            @foreach($data as $userData)
            @endforeach


            @if ($email == $target_email)
            <input type="hidden" name="email" value="{{ $email }}" />

            <div class="flex-icon">
                <p>アイコン</p>
                <img class="imgcircle" id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
                <input type="file" class="form-control" name="image" onchange="previewImage(this);" accept=".jpg, .jpeg, .png">
            </div>

            <hr>
            @endif

            <div class="flex-name">
                <p>名前</p>
                @if ($email == $target_email)
                <input type="text" class="text" name="name" value="{{ $userData->name }}" required>
                @else
                <span>{{ $userData->name }}</span>
                @endif
            </div>

            <hr>

            <div class="flex-comment">
                <p>自己紹介</p>
                @if ($email == $target_email)
                <textarea name="comment" cols="35" rows="5">{{ $userData->comment }}</textarea>
                @else
                <span>{{ $userData->comment }}</span>
                @endif
            </div>

            <hr>

            <div class="flex-history">
                <p>料理歴</p>
                @if ($email == $target_email)
                <input type="text" class="text" name="history" value="{{ $userData->history }}" required>
                @else
                <span>{{ $userData->history }}</span>
                @endif
            </div>

            @if ($email == $target_email)
            <input class="submit-button" type="submit" value="変更">
            @endif

        </form>
        @endif
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