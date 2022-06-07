<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
require_once('./Controller/Tour.php');
require_once('./Model/TourDTO.php');
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
    if (isset($_POST['submit']))
    {
        $tourOrder = new tourOrder();
        $idTour = $_POST['idTour'];
        $countAdult = $_POST['hiddenCountAdult'];
        $countChild = $_POST['hiddenCountChild'];
        $totalPrice = $_POST['hiddenTotalPrice'];

        $tourOrder->SetIdAccount($idAccount)
        ->SetIdTour($idTour)
        ->SetCountAdult($countAdult)
        ->SetCountChild($countChild)
        ->SetTotalPrice($totalPrice);

        if (TourOrderDTO::getInstance()->CreateTourOrder($tourOrder)){
            echo "<script>alert('Thêm tour mới thành công')</script>";

            
            header("Location:tour-history.php");
        }
    }
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
        if (isset($_POST['idTour'])) {
            $idTour = $_POST['idTour'];
            $tour = TourDTO::getInstance()->GetTour($idTour);
            $nameTour = $tour->GetNameTour();
            $detail = $tour->GetDetail();
            $priceAdult = $tour->GetPriceAdult();
            $priceChild = $tour->GetPriceChild();
            $dateIn = $tour->GetDateIn();
            $dateOut = $tour->GetDateOut();
        }
        ?>

        <div class="container__info">
            <h1 class="container__info-header">
                <?php echo $nameTour ?>
            </h1>
            <div class="tour-item__rate">
                <img src="../assets/img/upvote.png">
                <img src="../assets/img/upvote.png">
                <img src="../assets/img/upvote.png">
                <img src="../assets/img/upvote.png">
                <img src="../assets/img/downvote.png">
            </div>
            <?php echo $detail ?>
        </div>
        <div class="container__book-form">
            <h2 class="container__book-form-price"><?php echo $priceAdult ?> VND</h2>
            <div class="container__book-form-option">
                <div class="container__book-form-date">
                    <div class="date-come date-pick">
                        <span>Ngày đến</span>
                        <div class="background-div">
                        <span id="dateCome"> <?php echo $dateIn ?></span>
                        </div>
                    </div>
                    <div class="date-leave date-pick">
                        <span>Ngày đi</span>
                        <div class="background-div">
                        <span id="dateLeave"> <?php echo $dateOut ?></span>
                        </div>
                    </div>
                </div>
                <div class="container__book-form-ticket">
                    <div class="ticket-type">
                        <span>Người lớn</span>
                        <div class="ticket-price adult-ticket">
                            <span class="adult-price"><?php echo $priceAdult ?></span>
                            <button class="updown-btn" id="btDownCountAdult">-</button>
                            <span id="cntAdultTicket">1</span>
                            <button class="updown-btn"id="btUpCountAdult">+</button>
                        </div>
                    </div>
                    <div class="ticket-type">
                        <span>Trẻ em</span>
                        <div class="ticket-price child-ticket">
                            <span class="child-price"><?php echo $priceChild ?></span>
                            <button class="updown-btn" id="btDownCountChild">-</button>
                            <span id="cntChildTicket">0</span>
                            <button class="updown-btn" id="btUpCountChild">+</button>
                        </div>
                    </div>
                </div>
                <button id="btn-booktour" class="primary-btn ">Đặt ngay</button>
            </div>
        </div>
    </div>
    <?php include './View/Footer.php' ?>
    <form action="#" method ="post" id="overlay-book-confirm" class="modal">
        <div id="modal-overlay-book-confirm" class="modal__overlay"></div>
        <div class="modal__body">
            <div class="book-confirm">
                <input type="hidden" name="idTour" value="<?php echo $idTour;?>">
                <input type="hidden" name="idAccount" value="<?php echo $idAccount;?>">
                <span class="book-confirm__header">
                    Xác nhận đặt tour
                </span>
                <div class="book-confirm__info-tour">
                    <span class="book-confirm__divheader">
                        Thông tin chi tiết tour
                    </span>
                    <div class="book-confirm__info-tour-name">
                        <?php echo $nameTour ?><br>
                        Giá:<?php echo $priceAdult?>/ 1 người lớn - <?php echo $priceChild?>/ 1 trẻ em
                    </div>
                    <div class="book-confirm__row">
                        <span class="book-confirm__row-header">
                            Ngày đến
                        </span>
                        <span class="book-confirm__row-content background-div" name="" id="dateCome-confirm"><?php echo $dateIn?></span>
                    </div>
                    <div class="book-confirm__row">
                        <span class="book-confirm__row-header">
                            Ngày đi
                        </span>
                        <span class="book-confirm__row-content background-div" name="" id="dateLeave-confirm"><?php echo $dateOut?></span>
                    </div>
                    <div class="book-confirm__row">
                        <span class="book-confirm__row-header">
                            Người lớn
                        </span>
                        <div class="book-confirm__row-content background-div adult-ticket-confirm">
                            <input type="hidden" name="hiddenCountAdult" id="hiddenCountAdult" value="1">
                            <span id="cntAdultTicket-confirm">1</span>
                        </div>
                    </div>
                    <div class="book-confirm__row">
                        <span class="book-confirm__row-header">
                            Trẻ em
                        </span>
                        <div class="book-confirm__row-content background-div child-ticket-confirm">
                            <input type="hidden" name="hiddenCountChild" id="hiddenCountChild" value="0">
                            <span id="cntChildTicket-confirm">0</span>
                        </div>
                    </div>
                    <div class="book-confirm__row">
                        <span class="book-confirm__row-header">
                            Tổng giá
                        </span>
                        <input type="hidden" name="hiddenTotalPrice" id="hiddenTotalPrice" value="1500000">;
                        <span id="book-confirm-price" class="book-confirm__row-content">
                            1.500.000 VNĐ
                        </span>
                    </div>
                </div>
                <?php
                    $account = AccountDTO::getInstance()->GetAccount($idAccount);
                    $fullName = $account->GetFullName();
                    $cmnd = $account->GetCmnd();
                    $email = $account->GetEmail();
                    $phoneNumber = $account->GetPhoneNumber();
                    $address = $account->GetAddress();
                ?>
                <div class="book-confirm__info-booker">
                    <span class="book-confirm__divheader">
                        Thông tin người đặt
                    </span>
                    <div class="book-confirm__row">
                        <h4 class="book-confirm__row-header">
                            Họ tên
                        </h4>
                        <h4 class="book-confirm__row-content">
                            <?php echo $fullName; ?>
                        </h4>
                    </div>
                    <div class="book-confirm__row">
                        <h4 class="book-confirm__row-header">
                            CMND/CCCD
                        </h4>
                        <h4 class="book-confirm__row-content">
                        <?php echo $cmnd; ?>
                        </h4>
                    </div>
                    <div class="book-confirm__row">
                        <h4 class="book-confirm__row-header">
                            Số điện thoại
                        </h4>
                        <h4 class="book-confirm__row-content">
                        <?php echo $phoneNumber; ?>
                        </h4>
                    </div>
                    <div class="book-confirm__row">
                        <h4 class="book-confirm__row-header">
                            Địa chỉ email
                        </h4>
                        <h4 class="book-confirm__row-content">
                        <?php echo $email; ?>
                        </h4>
                    </div>
                    <div class="book-confirm__row">
                        <h4 class="book-confirm__row-header">
                            Địa điểm đón
                        </h4>
                        <h4 class="book-confirm__row-content">
                        <?php echo $address; ?>
                        </h4>
                    </div>
                </div>
                <div class="book-confirm__btn">
                    <input class="book-confirm__btn" style="background-color:var(--primary-color);color:white" type="submit" name="submit" value="Xác nhận"class="btn-confirm">
                    </input>
                </div>
            </div>
        </div>
    </form>
    <script src="../assets/js/info-tour3.js"></script>
</body>

</html>