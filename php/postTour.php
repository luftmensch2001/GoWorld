<?php
    echo $_POST['test'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng Tour</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
        <link rel="stylesheet" href="../assets/css/base.css">
        <link rel="stylesheet" href="../assets/css/postTour.css">
        <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.1.1-web/css/all.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Risque&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    </head>
<body>
    <form class="container" action="" method="post">
        <h1 class="post__title">THÊM TOUR MỚI</h1>
        <img src="../assets/img/img-tour.png" alt="" class="post__img">
        <label>
            <input style="display:none;"  type="file" name=""> 
            <span class="post__button-upload">Chọn hình ảnh</span>
        </label>
        <div class="post__info-field">
            <p class="post__info-title">Mã Tour</p>
            <input type="text" name="" id="" class="post__info-input">
        </div>
        <div class="post__info-field">
            <p class="post__info-title">Tên Tour</p>
            <input type="text" name="" id="" class="post__info-input">
        </div>
        <div class="post__info-field">
            <p class="post__info-title">Ngày đến</p>
            <input type="date" name="" id="" class="post__info-input">
        </div>
        <div class="post__info-field">
            <p class="post__info-title">Ngày đi</p>
            <input type="date" name="" id="" class="post__info-input">
        </div>
        <div class="post__info-field">
            <p class="post__info-title">Giá vé người lớn (VNĐ)</p>
            <input type="number" name="" id="" class="post__info-input" style="width: 300px">
        </div>
        <div class="post__info-field">
            <p class="post__info-title">Giá vé trẻ em (VNĐ)</p>
            <input type="number" name="" id="" class="post__info-input" style="width: 300px">
        </div>
        <h2 class="post__info-title" style="font-size: 2.5em; margin-top: 40px">Mô tả về Tour</h2>
        <textarea name="test" id="editor" cols="30" rows="30"></textarea>
        <div class="post__button-zone">
            <button class="post__button">Thêm tour</button>
            <button class="post__button-2" type="reset">Xoá thông tin</button>
        </div>
    </form>
    
</body>
<script src="./ckeditor/ckeditor.js"></script>
<script src="./ckfinder/ckfinder.js"></script>
<script>
    CKEDITOR.replace( 'editor', {
	filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
	filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
} );
</script>
</html>