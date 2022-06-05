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
    if ($account==null) {
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
    <title>Tour - Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/contact.css">
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
            </div>
            <div class="header__navbar-contact">
                <a href="./contact.php">Liên hệ</a>
                <div class="header__underline"></div>
                <div class="header__underline underline-show"></div>
            </div>
        </div>
        <?php include './View/HeaderAccount.php'; ?>
    </header>
    <div class="container">
        <div class="container__contact">
            <div class="container__contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62694.933383631!2d106.7181449051778!3d10.854608470658166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d85e042bf04b%3A0xbb26baec1664394d!2zVGjhu6cgxJDhu6ljLCBIbyBDaGkgTWluaCBDaXR5LCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1653560247115!5m2!1sen!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class="container__contact-info">
                <h3 class="container__contact-info-header">
                    Thông tin liên hệ
                </h3>
                <div class="container__contact-info-contact">
                    <div>Địa chỉ: 12abc/34 D2, Q.Thủ Đức, Hồ Chí Minh</div>
                    <div>Hotline: 09xx.xxx.xxx</div>
                    <div>Email: gowolrd@gmail.com</div>
                </div>
                <div class="container__contact-info-social">
                    <button class="contact-fb img-btn"></button>
                    <button class="contact-email img-btn"></button>
                </div>
            </div>
        </div>
    </div>
    <?php include './View/Footer.php' ?>
</body>

</html>