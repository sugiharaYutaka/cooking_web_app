<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Bootstrap Radio Buttons in PHP</title>
</head>
<body>
    <div class="modal fade" id="recipemodalProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-color-2">
                    <h5 class="modal-title" id="exampleModalLabel">工程選択</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body bg-color-1">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <lanel for="image" class="form-label2 col-3" >工程名を選択</lanel>
                                            <div class="container mt-3">
                                                <div class="row">
                                                    <form action="process_form.php" method="post">

                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="options" id="option1" value="option1">
                                                                    <label class="form-check-label" for="option1">
                                                                        下処理
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="options" id="option2" value="option2">
                                                                <label class="form-check-label" for="option2">
                                                                    焼く
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="options" id="option4" value="option3">
                                                                <label class="form-check-label" for="option3">
                                                                    煮る
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="options" id="option4" value="option4">
                                                                <label class="form-check-label" for="option4">
                                                                    揚げる
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="options" id="option5" value="option5">
                                                                <label class="form-check-label" for="option5">
                                                                    茹でる
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="options" id="option6" value="option6">
                                                                <label class="form-check-label" for="option6">
                                                                    炒める
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="options" id="option7" value="option7">
                                                                <label class="form-check-label" for="option7">
                                                                    盛り付け
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="options" id="option8" value="option8">
                                                                <label class="form-check-label" for="option8">
                                                                    その他
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <textarea class="form-control col-12" id="userInput" name="text" style="height: 40px;"></textarea>
                                                        <button type="submit" class="btn btn-primary mt-1">決定</button>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>