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
    <title>Tour - Trang chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/home-page.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Risque&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
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
                <div class="header__underline underline-show"></div>
            </div>
            <div class="header__navbar-blog">
                <a href="./blog.php">Blog</a>
                <div class="header__underline"></div>  
            </div>
            <div class="header__navbar-contact">
                <a href="./contact.php">Liên hệ</a>
                <div class="header__underline"></div>
            </div>
        </div>
        <?php include './View/HeaderAccount.php'; ?>
    </header>
    <div class="container">
        <div class="container__box-search">
            <div class="box-search__option">
                <div>
                    <img src="../assets/img/location.png" alt="" width="20px" height="20px">
                    <label for="">Địa điểm</label>
                </div>
                <select name="" id="">
                    <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                    <option value="Hà Nội">Hà Nội</option>
                </select>
            </div>
            <div class="box-search__option">
                <div>
                    <img src="../assets/img/people.png" alt="" width="20px" height="20px">
                    <label for="">Số người</label>
                </div>
                <select name="" id="">
                    <option value="1">1 Người</option>
                    <option value="2">2 Người</option>
                    <option value="3">3 Người</option>
                </select>
            </div>
            <div class="box-search__option">
                <div>
                    <img src="../assets/img/date.png" alt="" width="20px" height="20px">
                    <label for="">Ngày checkin</label>
                </div>
                <input type="date" name="" id="">
            </div>
            <div class="box-search__option">
                <div>
                    <img src="../assets/img/date.png" alt="" width="20px" height="20px">
                    <label for="">Ngày checkout</label>
                </div>
                <input type="date" name="" id="">
            </div>
            <button class="primary-btn">Tìm kiếm</button>
        </div>
        <div class="container__box-tour">
            <a class="tour-item" href="#">
                <img src="../assets/img/tour.png" alt="" width="340px" height="220px">
                <div class="tour-item__header">
                    <span>Tour Đảo Phú Quốc</span> <br>
                    <span>(3 ngày 2 đêm)</span>
                    <div class="tour-item__rate">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/downvote.png">
                    </div>
                    <div class="row-end">
                        <div class="tour-item__price">1.500.000 VND</div>
                        <button class="primary-btn">Xem tour</button>
                    </div>
                </div>
            </a>
            <a class="tour-item" href="#">
                <img src="../assets/img/tour.png" alt="" width="340px" height="220px">
                <div class="tour-item__header">
                    <span>Tour Đảo Phú Quốc</span> <br>
                    <span>(3 ngày 2 đêm)</span>
                    <div class="tour-item__rate">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/downvote.png">
                    </div>
                    <div class="row-end">
                        <div class="tour-item__price">1.500.000 VND</div>
                        <button class="primary-btn">Xem tour</button>
                    </div>
                </div>
            </a>
            <a class="tour-item" href="#">
                <img src="../assets/img/tour.png" alt="" width="340px" height="220px">
                <div class="tour-item__header">
                    <span>Tour Đảo Phú Quốc</span> <br>
                    <span>(3 ngày 2 đêm)</span>
                    <div class="tour-item__rate">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/downvote.png">
                    </div>
                    <div class="row-end">
                        <div class="tour-item__price">1.500.000 VND</div>
                        <button class="primary-btn">Xem tour</button>
                    </div>
                </div>
            </a>
            <a class="tour-item" href="#">
                <img src="../assets/img/tour.png" alt="" width="340px" height="220px">
                <div class="tour-item__header">
                    <span>Tour Đảo Phú Quốc</span> <br>
                    <span>(3 ngày 2 đêm)</span>
                    <div class="tour-item__rate">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/downvote.png">
                    </div>
                    <div class="row-end">
                        <div class="tour-item__price">1.500.000 VND</div>
                        <button class="primary-btn">Xem tour</button>
                    </div>
                </div>
            </a>
            <a class="tour-item" href="#">
                <img src="../assets/img/tour.png" alt="" width="340px" height="220px">
                <div class="tour-item__header">
                    <span>Tour Đảo Phú Quốc</span> <br>
                    <span>(3 ngày 2 đêm)</span>
                    <div class="tour-item__rate">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/upvote.png">
                        <img src="../assets/img/downvote.png">
                    </div>
                    <div class="row-end">
                        <div class="tour-item__price">1.500.000 VND</div>
                        <button class="primary-btn">Xem tour</button>
                    </div>
                </div>
            </a>
        </div>
        <div class="container__page">
            <button> Đầu </button>
            <button class="current-page">1</button>
            <button>2</button>
            <button>3</button>
            <button> Cuối </button>
        </div>
    </div>
    <?php include './View/Footer.php' ?>
</body>

</html>