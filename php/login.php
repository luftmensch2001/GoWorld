<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_reporting(E_ALL ^ E_NOTICE);
if (isset($_POST['usernameLogin'])) {
    $usernameLogin = $_POST['usernameLogin'];
    $passwordLogin =  md5($_POST['passwordLogin']);

    $id = AccountDTO::getInstance()->GetId($usernameLogin, $passwordLogin);
    if ($id != -1) {
        $_SESSION['idAccount'] = $id;
        header("Location: ./Home-page.php");
    } else {
        echo "<script>alert('Tên tài khoản hoặc mật khẩu không chính xác')</script>";
    }
}
if (isset($_POST['usernameSignup'])) {
    $usernameSignup = $_POST['usernameSignup'];
    $passwordSignup =  md5($_POST['passwordSignup']);
    $emailSignup = $_POST['emailSignup'];
    $repasswordSignup = md5($_POST['re-passwordSignup']);

    if (AccountDTO::getInstance()->AccountExists($usernameSignup)) {
        echo "<script>alert('Tên tài khoản đã tồn tại')</script>";
    } else {
        $account = new Account();
        $account->SetUsername($usernameSignup)->SetPassword($passwordSignup)->SetEmail($emailSignup);
        if (AccountDTO::getInstance()->CreateAccount($account))
        {
            echo "<script>alert('Tạo tài khoản thành công')</script>";
            $id = AccountDTO::getInstance()->GetId($usernameSignup, $passwordSignup);
            $_SESSION['idAccount'] = $id;
            header("Location: ./Home-page.php");
        }
        else
        {
            echo "<script>alert('Tạo tài khoản thất bại')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<script type="text/javascript">
        function validate() {
            var password = document.forms["registerForm"]["passwordSignup"].value;
            var repassword = document.forms["registerForm"]["re-passwordSignup"].value;
            if (password != repassword) {
                document.forms["registerForm"]["passwordSignup"].style.border = "1px solid red";
                document.forms["registerForm"]["re-passwordSignup"].style.border = "1px solid red";
                document.forms["registerForm"]["passwordSignup"].value = "";
                document.forms["registerForm"]["re-passwordSignup"].value = "";
                return false;
            }
            return true;
        }
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour - Trang chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/login.css">
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
                <a href="">Trang chủ</a>
                <div class="header__underline underline-show"></div>
            </div>
            <div class="header__navbar-blog">
                <a href="">Blog</a>
                <div class="header__underline"></div>
            </div>
            <div class="header__navbar-contact">
                <a href="">Liên hệ</a>
                <div class="header__underline"></div>
            </div>
        </div>
        <div class="header__account">
            <!-- <button class="header__account-btn primary-btn">Đăng nhập</button>
            <button class="header__account-btn secondary-btn">Đăng ký</button>
             <div class="header__account-user">
                <a href="">
                    <img src="../assets/img/avatar.png" alt="" class="header__account-user-img">
                </a>
                <div class="header__account-user-menu">
                    <div class="account-user__info">
                        <a href="">
                            <img src="../assets/img/avatar.png" alt=""  width="30px" height="30px">
                            <div>
                                <span class="account-user__info-name">Họ Và Tên</span> <br>
                                <span class="account-user__info-sub">Thông tin cá nhân</span> 
                            </div>
                        </a>
                    </div>
                    <div class="account-user__option">
                        <a href="" class="account-user__option-item">
                            <img src="../assets/img/history.png" alt="">
                            <span>Lịch sử đặt tour</span>
                        </a href="">
                        <a href="" class="account-user__option-item">
                            <img src="../assets/img/setting.png" alt="">
                            <span>Cài đặt</span>
                        </a href="">
                        <a href="" class="account-user__option-item">
                            <img src="../assets/img/logout.png" alt="">
                            <span>Đăng xuất</span>
                        </a href="">
                    </div>
                </div>
            </div> -->
        </div>
    </header>
    <div class="container">
        <input id="type" type="hidden" value="<?php echo $type; ?>">
        <div class="container__form">
            <div class="container__form-header">
                <a href="" class="form-signup__header-login">
                    ĐĂNG NHẬP
                </a>
                <a href="" class="form-signup__header-signup">
                    ĐĂNG KÝ
                </a>
            </div>
            <div class="container__form-text">
                <span>Chào mừng đến GoWorld!
                    Hãy điền tên đăng nhập và mật khẩu để truy
                    cập bằng tài khoản cá nhân của bạn</span>
            </div>
            <div class="container__form-signup">
                <form name ="registerForm" method="POST" action="#" class="form-signup__form" onsubmit="return validate()">
                    <input type="text" class="form-signup__form-username" name="usernameSignup" spellcheck="false" placeholder="Tên đăng nhập" value="<?php echo $usernameSignup ?>" required>
                    <input type="email" class="form-signup__form-email" name="emailSignup" spellcheck="false" placeholder="Địa chỉ email" value="<?php echo $emailSignup ?> " required>
                    <input type="password" class="form-signup__form-password" name="passwordSignup" spellcheck="false" placeholder="Mật khẩu" required>
                    <input type="password" class="form-signup__form-repassword" name="re-passwordSignup" spellcheck="false" placeholder="Nhập lại mật khẩu" required>
                    <div class="form-signup__btn-signup">
                        <button>ĐĂNG KÝ</button>
                        </script>
                    </div>
                </form>

            </div>
            <div class="container__form-login">
                <form method="post" action="#" class="form-login__form">
                    <input type="text" class="form-login__form-username" name="usernameLogin" spellcheck="false" placeholder="Tên đăng nhập" required>
                    <input type="password" class="form-login__form-password" name="passwordLogin" spellcheck="false" placeholder="Mật khẩu" required>
                    <div class="form-login__btn-login">
                        <button>ĐĂNG NHẬP</button>
                    </div>
                </form>
                <div>
                    <button class="form-login__forgot-password">Quên mật khẩu?</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    <footer class="footer">
        <div class="footer__detail">
            <div class="footer__header">GoWorld - Công Ty Đầu Tư Phát Triển Dịch Vụ Du Lịch</div>
            <div>Địa chỉ: 12abc/34 D2, Q.Thủ Đức, Hồ Chí Minh</div>
            <div>Mã số thuế: 0361263711</div>
            <div>Website: <a href="">GoWorld.com</a></div>
        </div>
        <div class="footer__about">
            <div class="footer__header">Về GoWorld</div>
            <a href="">Tour</a>
            <a href="">Blog</a>
            <a href="">Liên hệ</a>
        </div>
        <div class="footer__contact">
            <div class="footer__header">Tư vấn và hỗ trợ</div>
            <div>Hotline: 09xx.xxx.xxx</div>
            <div>Email: gowolrd@gmail.com</div>
        </div>
    </footer>
    <script src="../assets/js/login.js"></script>
</body>

</html>