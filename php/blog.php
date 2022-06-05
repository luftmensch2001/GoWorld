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
    <title>Tour - Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/blog.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
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
        <div class="container__header">
            <span>
                BÀI NỔI BẬT
            </span>
        </div>
        <div class="container__hot-blog">
            <div class="container__hot-blog-col-left col l-5">
                <div class="container__hot-blog-big">
                    <a href="" class="container__hot-blog-big-img link">
                        <img src="../assets/img/BackImgLogin.png" alt="">
                    </a>
                    <div class="container__hot-blog-big-text">
                        <a href="" class="container__hot-blog-big-header link">
                            Địa điểm đáng du lịch 2021
                        </a>
                        <p class="container__hot-blog-big-content">
                            Đối với nhiều người, mùa hè là khoảng thời gian "đáng sợ" với nắng gió bỏng rát, không khí ngột ngạt, và cứ nghĩ đến du lịch vào khoảng thời gian này thì ai cũng sẽ nghĩ đến biển xanh, cát trắng, nắng vàng, nơi mà chúng ta có thể thoải mái vùng vẫy và "trốn thoát" khỏi sự ngột ngạt của mùa hè chốn đô thị đông đúc, náo nhiệt.
                            <br>HoaBinh Tourist có cách giúp bạn biến mùa hè "ác mộng" ấy trở thành thiên đường. Với top 10 địa điểm du lịch hot nhất năm 2021, hãy cùng lưu lại nhé, quên đi cơn nóng của mùa hè và “refresh” lại tinh thần ngay thôi!
                        </p>
                        <div class="container__hot-blog-info upload-info">
                            <div class="date-upload">19/04/2022</div>
                            <div class="author">By Tan1234</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container__hot-blog-col-right col l-7">
                <div class="row container__hot-blog-col-right-row">
                    <div class="container__hot-blog-small c-o-1 l-5">
                        <div class="container__hot-blog-small-item">
                            <a href="" class="container__hot-blog-small-img link">
                                <img src="../assets/img/BackImgLogin.png" alt="">
                            </a>
                            <div class="container__hot-blog-small-text">
                                <a href="" class="container__hot-blog-small-header link">
                                    7 điều thú vị về đảo Phú Quốc
                                </a>
                                <p class="container__hot-blog-small-content">
                                    Với 150km đường bờ biển, Phú Quốc sở hữu nhiều bãi biển đẹp trải dài từ phía bắc đến phía nam. Đến đây, du khách ...
                                </p>
                                <div class="container__hot-blog-info upload-info">
                                    <div class="date-upload">19/04/2022</div>
                                    <div class="author">By Tan1234</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container__hot-blog-small c-o-1 l-5">
                        <div class="container__hot-blog-small-item">
                            <a href="" class="container__hot-blog-small-img link">
                                <img src="../assets/img/BackImgLogin.png" alt="">
                            </a>
                            <div class="container__hot-blog-small-text">
                                <a href="" class="container__hot-blog-small-header link">
                                    7 điều thú vị về đảo Phú Quốc
                                </a>
                                <p class="container__hot-blog-small-content">
                                    Với 150km đường bờ biển, Phú Quốc sở hữu nhiều bãi biển đẹp trải dài từ phía bắc đến phía nam. Đến đây, du khách ...
                                </p>
                                <div class="container__hot-blog-info upload-info">
                                    <div class="date-upload">19/04/2022</div>
                                    <div class="author">By Tan1234</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container__hot-blog-small c-o-1 l-5">
                        <div class="container__hot-blog-small-item">
                            <a href="" class="container__hot-blog-small-img link">
                                <img src="../assets/img/BackImgLogin.png" alt="">
                            </a>
                            <div class="container__hot-blog-small-text">
                                <a href="" class="container__hot-blog-small-header link">
                                    7 điều thú vị về đảo Phú Quốc
                                </a>
                                <p class="container__hot-blog-small-content">
                                    Với 150km đường bờ biển, Phú Quốc sở hữu nhiều bãi biển đẹp trải dài từ phía bắc đến phía nam. Đến đây, du khách ...
                                </p>
                                <div class="container__hot-blog-info upload-info">
                                    <div class="date-upload">19/04/2022</div>
                                    <div class="author">By Tan1234</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container__hot-blog-small c-o-1 l-5">
                        <div class="container__hot-blog-small-item">
                            <a href="" class="container__hot-blog-small-img link">
                                <img src="../assets/img/BackImgLogin.png" alt="">
                            </a>
                            <div class="container__hot-blog-small-text">
                                <a href="" class="container__hot-blog-small-header link">
                                    7 điều thú vị về đảo Phú Quốc
                                </a>
                                <p class="container__hot-blog-small-content">
                                    Với 150km đường bờ biển, Phú Quốc sở hữu nhiều bãi biển đẹp trải dài từ phía bắc đến phía nam. Đến đây, du khách ...
                                </p>
                                <div class="container__hot-blog-info upload-info">
                                    <div class="date-upload">19/04/2022</div>
                                    <div class="author">By Tan1234</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container__newest-blog">
            <div class="container__header">
                <span>
                    BÀI MỚI NHẤT
                </span>
                <a href="">Xem thêm <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="container__newest-blog-list row">
                <div class="container__newest-blog-item">
                    <a class="container__newest-blog-item-img" href="">
                        <img src="../assets/img/BackImgLogin.png" alt="">
                    </a>
                    <div class="container__newest-blog-item-text">
                        <a href="" class="container__newest-blog-item-header link">
                            Du lịch Tam Đảo cần chú ý những gì..
                        </a>
                        <p class="container__newest-blog-item-content">
                            Được mệnh danh là Đà Lạt của miền Bắc với làn sương mờ ảo và tiết trời se lạnh, Tam Đảo là địa điểm “đi trốn” yêu thích của nhiều tín đồ du lịch. Bỏ túi kinh nghiệm du lịch Tam Đảo từ A tới Z cùng Ví MoMo và sẵn sàng tận hưởng một kỳ nghỉ tuyệt...
                        </p>
                        <div class="container__newest-blog-item-info upload-info">
                            <div class="date-upload">19/04/2022</div>
                            <div class="author">By Tan1234</div>
                        </div>
                    </div>
                </div>
                <div class="container__newest-blog-item">
                    <a class="container__newest-blog-item-img" href="">
                        <img src="../assets/img/BackImgLogin.png" alt="">
                    </a>
                    <div class="container__newest-blog-item-text">
                        <a href="" class="container__newest-blog-item-header link">
                            Du lịch Tam Đảo cần chú ý những gì..
                        </a>
                        <p class="container__newest-blog-item-content">
                            Được mệnh danh là Đà Lạt của miền Bắc với làn sương mờ ảo và tiết trời se lạnh, Tam Đảo là địa điểm “đi trốn” yêu thích của nhiều tín đồ du lịch. Bỏ túi kinh nghiệm du lịch Tam Đảo từ A tới Z cùng Ví MoMo và sẵn sàng tận hưởng một kỳ nghỉ tuyệt...
                        </p>
                        <div class="container__newest-blog-item-info upload-info">
                            <div class="date-upload">19/04/2022</div>
                            <div class="author">By Tan1234</div>
                        </div>
                    </div>
                </div>
                <div class="container__newest-blog-item">
                    <a class="container__newest-blog-item-img" href="">
                        <img src="../assets/img/BackImgLogin.png" alt="">
                    </a>
                    <div class="container__newest-blog-item-text">
                        <a href="" class="container__newest-blog-item-header link">
                            Du lịch Tam Đảo cần chú ý những gì..
                        </a>
                        <p class="container__newest-blog-item-content">
                            Được mệnh danh là Đà Lạt của miền Bắc với làn sương mờ ảo và tiết trời se lạnh, Tam Đảo là địa điểm “đi trốn” yêu thích của nhiều tín đồ du lịch. Bỏ túi kinh nghiệm du lịch Tam Đảo từ A tới Z cùng Ví MoMo và sẵn sàng tận hưởng một kỳ nghỉ tuyệt...
                        </p>
                        <div class="container__newest-blog-item-info upload-info">
                            <div class="date-upload">19/04/2022</div>
                            <div class="author">By Tan1234</div>
                        </div>
                    </div>
                </div>
                <div class="container__newest-blog-item">
                    <a class="container__newest-blog-item-img" href="">
                        <img src="../assets/img/BackImgLogin.png" alt="">
                    </a>
                    <div class="container__newest-blog-item-text">
                        <a href="" class="container__newest-blog-item-header link">
                            Du lịch Tam Đảo cần chú ý những gì..
                        </a>
                        <p class="container__newest-blog-item-content">
                            Được mệnh danh là Đà Lạt của miền Bắc với làn sương mờ ảo và tiết trời se lạnh, Tam Đảo là địa điểm “đi trốn” yêu thích của nhiều tín đồ du lịch. Bỏ túi kinh nghiệm du lịch Tam Đảo từ A tới Z cùng Ví MoMo và sẵn sàng tận hưởng một kỳ nghỉ tuyệt...
                        </p>
                        <div class="container__newest-blog-item-info upload-info">
                            <div class="date-upload">19/04/2022</div>
                            <div class="author">By Tan1234</div>
                        </div>
                    </div>
                </div>
                <div class="container__newest-blog-item">
                    <a class="container__newest-blog-item-img" href="">
                        <img src="../assets/img/BackImgLogin.png" alt="">
                    </a>
                    <div class="container__newest-blog-item-text">
                        <a href="" class="container__newest-blog-item-header link">
                            Du lịch Tam Đảo cần chú ý những gì..
                        </a>
                        <p class="container__newest-blog-item-content">
                            Được mệnh danh là Đà Lạt của miền Bắc với làn sương mờ ảo và tiết trời se lạnh, Tam Đảo là địa điểm “đi trốn” yêu thích của nhiều tín đồ du lịch. Bỏ túi kinh nghiệm du lịch Tam Đảo từ A tới Z cùng Ví MoMo và sẵn sàng tận hưởng một kỳ nghỉ tuyệt...
                        </p>
                        <div class="container__newest-blog-item-info upload-info">
                            <div class="date-upload">19/04/2022</div>
                            <div class="author">By Tan1234</div>
                        </div>
                    </div>
                </div>
                <div class="container__newest-blog-item">
                    <a class="container__newest-blog-item-img" href="">
                        <img src="../assets/img/BackImgLogin.png" alt="">
                    </a>
                    <div class="container__newest-blog-item-text">
                        <a href="" class="container__newest-blog-item-header link">
                            Du lịch Tam Đảo cần chú ý những gì..
                        </a>
                        <p class="container__newest-blog-item-content">
                            Được mệnh danh là Đà Lạt của miền Bắc với làn sương mờ ảo và tiết trời se lạnh, Tam Đảo là địa điểm “đi trốn” yêu thích của nhiều tín đồ du lịch. Bỏ túi kinh nghiệm du lịch Tam Đảo từ A tới Z cùng Ví MoMo và sẵn sàng tận hưởng một kỳ nghỉ tuyệt...
                        </p>
                        <div class="container__newest-blog-item-info upload-info">
                            <div class="date-upload">19/04/2022</div>
                            <div class="author">By Tan1234</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include './View/Footer.php' ?>
</body>

</html>