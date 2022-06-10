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
    <title>Tour - Trang chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/home-page2.css">
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
        <?php
        if (isset($_POST['dateIn'])) {
            $dateIn = $_POST['dateIn'];
        }
        if (isset($_POST['hiddenDateIn'])) {
            $dateIn = $_POST['hiddenDateIn'];
        }
        if (isset($_POST['dateOut'])) {
            $dateOut = $_POST['dateOut'];
        }
        if (isset($_POST['hiddenDateOut'])) {
            $dateOut = $_POST['hiddenDateOut'];
        }
        $currentDateTime = date('Y-m-d');
        ?>
        <form method="post" action="#" class="container__box-search">
            <div class="box-search__option">
                <div>
                    <img src="../assets/img/date.png" alt="" width="20px" height="20px">
                    <label for="">Ngày checkin</label>
                </div>
                <input type="date" name="dateIn" id="" value="<?php echo $dateIn ?>">
            </div>
            <div class="box-search__option">
                <div>
                    <img src="../assets/img/date.png" alt="" width="20px" height="20px">
                    <label for="">Ngày checkout</label>
                </div>
                <input type="date" name="dateOut" id="" value="<?php echo $dateOut ?>">
            </div>
            <input type="submit" name="submitSearch" class="primary-btn" value="Tìm kiếm"> </input>
        </form>
        <div class="container__box-tour">
            <?php include './View/TourInHomePage.php' ?>
        </div>
        <?php if (count($listTour) <= 12)
            $displayNumber = "none";
        else $displayNumber = "flex";
        $count = count($listTour) / 12;
        $count = (int)$count;
        ?>
        <div class="container__page" style="display:<?php echo $displayNumber; ?>">
            <form action="#" method="post">
                <input type="hidden" name="pageNumber" value="<?php echo 1; ?>">
                <input type="hidden" name="hiddenDateIn" value="<?php echo $hiddenDateIn ?>">
                <input type="hidden" name="hiddenDateOut" value="<?php echo $hiddenDateOut ?>">
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
                    <input type="hidden" name="hiddenDateIn" value="<?php echo $hiddenDateIn ?>">
                    <input type="hidden" name="hiddenDateOut" value="<?php echo $hiddenDateOut ?>">
                    <button><?php echo $i; ?></button>
                </form>
            <?php } ?>
            <form action="#" method="post">
                <input type="hidden" name="pageNumber" value="<?php echo $count + 1; ?>">
                <input type="hidden" name="hiddenDateIn" value="<?php echo $hiddenDateIn ?>">
                <input type="hidden" name="hiddenDateOut" value="<?php echo $hiddenDateOut ?>">
                <button> Cuối </button>
            </form>
        </div>
    </div>
    <?php include './View/Footer.php' ?>
</body>

</html>