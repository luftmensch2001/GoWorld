<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
require_once('./Controller/Blog.php');
require_once('./Model/BlogDTO.php');
error_reporting(E_ALL ^ E_NOTICE);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$idAccount = $_SESSION['idAccount'];
if ($idAccount == null || $idAccount == -1)
    header("Location:login.php");
else {
    $type = "none";
    $type2 = "block";
    $account = new Account();
    $account = AccountDTO::getInstance()->GetAccount($idAccount);
    if ($account == null) {
        header("Location:Logout.php");
    } else
        $fullName = $account->GetFullName();
    if (isset($_POST['idBlog'])) {
        $id = $_POST['idBlog'];
        $blog = BlogDTO::getInstance()->GetBlog($id);
        $nameBlog = $blog->GetNameBlog();
        $imageUrl = $blog->GetImageUrl();
        $detail = $blog->GetDetail();
        $summary = $blog->GetSummary();
    }

    if (isset($_POST['submit'])) {
        $nameBlog = $_POST['nameBlog'];
        $detail = $_POST['detail'];
        $uploaddir = '../assets/img/blogs/';
        $rand1 = rand('1111111111', '9999999999');
        $rand2 = rand('1111111111', '9999999999');
        $value = $_FILES['imageUrl']['name'];
        if ($value != '') {
            $uploadfile = $uploaddir . $rand1 . $rand2 . $value;
            move_uploaded_file($_FILES['imageUrl']['tmp_name'], $uploadfile);
        } else {
            $uploadfile = $_POST['oldImage'];
        }
        $currentDateTime = date('Y-m-d');
        $idBlog = $_POST['idBlog'];
        $imageUrl = $uploadfile;
        $summary = $_POST['summary'];
        $blog = new Blog();
        $blog->SetNameBlog($nameBlog)
            ->SetDetail($detail)
            ->SetImageUrl($uploadfile)
            ->SetDate($currentDateTime)
            ->SetSummary($summary)
            ->SetIdAccount($idAccount)
            ->SetId($idBlog);
        if (BlogDTO::getInstance()->UpdateBlog($blog)) {
           header("Location:blogAdmin.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/postTour.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Risque&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <?php include './View/HeaderA.php' ?>
        <?php include './View/HeaderAccount.php' ?>
    </header>

    <form enctype="multipart/form-data" class="container" action="#" method="post" onsubmit="return Check()">
        <h1 class="post__title">SỬA BÀI VIẾT</h1>
        <img src="<?php echo $imageUrl ?>" id="image" alt="" class="post__img">
        <input type="hidden" id="hidden" name="oldImage" value="<?php echo $imageUrl ?>">
        <input type="hidden" id="hiddenId" name="idBlog" value="<?php echo $id ?>">
        <label>
            <input style="display: none;" id="image-input" type="file" name="imageUrl" accept="image/jpeg, image/png, image/jpg"></input>
            <span class="post__button-upload">Chọn hình ảnh</span>
        </label>
        <div class="post__info-field">
            <p class="post__info-title">Tên bài viết</p>
            <input type="text" name="nameBlog" id="nameTour" class="post__info-input" value="<?php echo $nameBlog ?>" required="required">
        </div>
        <div class="post__info-field">
            <p class="post__info-title" >Tóm tắt nội dung</p>
            <input style="height: 100px" type="text" name="summary" id="nameTour" class="post__info-input" value="<?php echo $summary ?>" required="required">
        </div>
        <h2 class="post__info-title" style="font-size: 2.5em; margin-top: 40px">Nội dung chính</h2>
        <textarea name="detail" id="editor" cols="30" rows="30" style="width:100%"><?php echo $detail ?></textarea>
        <div class="post__button-zone">
            <input type="submit" name="submit" class="post__button" value="Sửa blog"></input>
            <!-- <button class="post__button-2" type="reset" id="deleteButton">Xoá thông tin</button>-->
        </div>
    </form>

</body>
<script src="./ckeditor/ckeditor.js"></script>
<script src="./ckfinder/ckfinder.js"></script>
<script>
    CKEDITOR.replace('editor', {
        filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
</script>
<script src="../assets/js/postBlog.js"></script>

</html>