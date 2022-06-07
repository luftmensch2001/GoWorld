<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
require_once('./Controller/Blog.php');
require_once('./Model/BlogDTO.php');
require_once('./Controller/TourOrder.php');
require_once('./Model/TourOrderDTO.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_reporting(E_ALL ^ E_NOTICE);
$idAccount = $_SESSION['idAccount'];
if ($idAccount != null && $idAccount != -1) {
    $type = "none";
    $type2 = "block";
    $account = AccountDTO::getInstance()->GetAccount($idAccount);
    if ($account == null) {
        header("Location:Logout.php");
    } else
        $fullName = $account->GetFullName();
} else {
    $type = "block";
    $type2 = "none";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour - Trang chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/info-tour.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Risque&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <?php include './View/HeaderA.php'; ?>
        <?php include './View/HeaderAccount.php'; ?>
    </header>
    <div class="container">
        <?php
        if (isset($_POST['idBlog'])) {
            $idBlog = $_POST['idBlog'];
            $blog = BlogDTO::getInstance()->GetBlog($idBlog);
            $nameBlog = $blog->GetNameBlog();
            $detail = $blog->GetDetail();
            $date = $blog->GetDate();
            $countAccess = $blog->GetCountAccess();
            $account = AccountDTO::getInstance()->GetAccount($idAccount);
    $userName = $account->GetUserName();
        }
        ?>

        <div class="container__info">
            <h1 class="container__info-header">
                <?php echo $nameBlog ?>
            </h1>
            <hr>
            <h2>Đăng ngày <?php echo $date ?> bởi <?php echo $userName ?></h2>
            <hr>
            <?php echo $detail ?>
        </div>
    </div>
    <?php include './View/Footer.php' ?>
    <script src="../assets/js/info-tour3.js"></script>
</body>

</html>