<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
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
    <title>Tour - Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/full-blog3.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Risque&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <a class="header__logo" href="./home-page.php">
            <img src="../assets/img/Logo.png" alt="" width="60px" height="60px">
            <h2>GoWorld</h2>
        </a>
        <div class="header__navbar">
            <div class="header__navbar-home">
                <a href="./home-page.php">Trang chủ</a>
            </div>
            <div class="header__navbar-blog">
                <a href="./blog.php">Blog</a>
                <div class="header__underline"></div>
                <div class="header__underline underline-show"></div>
            </div>
            <div class="header__navbar-contact">
                <a href="./contact.php">Liên hệ</a>
                <div class="header__underline"></div>
            </div>
        </div>
        <?php include './View/HeaderAccount.php'; ?>
    </header>
    <div class="container">
        <div class="container__list-blog">
            <?php include './View/BlogInBlogFull.php' ?>
        </div>
        <?php if (count($listBlog) <= 12)
            $displayNumber = "none";
        else $displayNumber = "flex";
        $count = count($listBlog) / 12;
        $count = (int)$count;
        ?>
        <div class="container__page" style="display:<?php echo $displayNumber; ?>">
            <form action="#" method="post">
                <input type="hidden" name="pageNumber" value="<?php echo 1; ?>">
                <button> Đầu </button>
            </form>
            <?php
            if ($pageNumber == 0) {
                $startNumberPage = 1;
                $lastNumberPage = min($count + 1, $startNumberPage + 2);
            }
            if ($pageNumber == $count) {
                $startNumberPage = max(1, $pageNumber - 2);
                $lastNumberPage = $pageNumber + 1;
            }
            for ($i = $startNumberPage; $i <= $lastNumberPage; $i++) { ?>
                <form action="#" method="post">
                    <input type="hidden" name="pageNumber" value="<?php echo $i; ?>">
                    <button><?php echo $i; ?></button>
                </form>
            <?php } ?>
            <form action="#" method="post">
                <input type="hidden" name="pageNumber" value="<?php echo $count+1; ?>">
                <button> Cuối </button>
            </form>
        </div>
    </div>
    <?php include './View/Footer.php' ?>
</body>

</html>