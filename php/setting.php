<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
error_reporting(E_ALL ^ E_NOTICE);
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$idAccount = $_SESSION['idAccount'];
if ($idAccount == null || $idAccount == -1)
  include './login.php';
else {

  $account = new Account();
  $account = AccountDTO::getInstance()->GetAccount($idAccount);
  $fullName = $account->GetFullName();
  $email = $account->GetEmail();
  $cmnd = $account->GetCmnd();
  $phoneNumber = $account->GetPhoneNumber();
  $address = $account->GetAddress();
  $password = $account->GetPassword();

  if (isset($_POST['submit'])) {
      $fullName = $_POST['fullName'];
      $email = $_POST['email'];
      $cmnd = $_POST['cmnd'];
      $phoneNumber = $_POST['phoneNumber'];
      $address = $_POST['address'];

      $account->SetFullName($fullName)->SetEmail($email)->SetPhoneNumber($phoneNumber)->SetAddress($address);
      if (AccountDTO::getInstance()->UpdateAccount($account))
      {
        echo "<script> alert('Thay đổi thông tin thành công') </script>";
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../assets/css/main.css" />
  <link rel="stylesheet" href="../assets/css/base.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Risque&family=Urbanist:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div id="account" class="header__account">
      <div id="accountForm" class="header__account-user">
        <a href="">
          <img src="../assets/img/avatar.png" alt="" class="header__account-user-img">
        </a>
        <div class="header__account-user-menu">
          <div class="account-user__info">
            <a href="./setting.php">
              <img src="../assets/img/avatar.png" alt="" width="30px" height="30px">
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
            <a href="Logout.php" class="account-user__option-item">
              <img src="../assets/img/logout.png" alt="">
              <span>Đăng xuất</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div>
    <h1 class="title">Cài đặt tài khoản</h1>
  </div>
  <div class="container">
    <div class="row mt-5">
      <div class="col border border-dark rounded-3 p-5 me-5 box">
        <h1>Thông tin cá nhân</h1>
        <form class="position-relative" method="post" action="#">
          <div class="mb-3">
            <label for="inputUsername" class="form-label">Tên người dùng</label>
            <input type="text" name="fullName" class="form-control" value="<?php echo $fullName; ?>" id="inputUsername">
          </div>
          <div class="mb-3">
            <label for="inputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" id="inputEmail1">
          </div>
          <div class="mb-3">
            <label for="inputID" class="form-label">CMND/CCCD</label>
            <input type="number" name="cmnd" class="form-control" value="<?php echo $cmnd; ?>" id="inputID">
          </div>
          <div class="mb-3">
            <label for="inputPhoneNumber" class="form-label">Số điện thoại</label>
            <input type="number" name="phoneNumber" class="form-control" value="<?php echo $phoneNumber; ?>" id="inputPhoneNumber">
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ đón</label>
            <textarea name="address" class="form-control" id="address"><?php echo $address; ?></textarea>
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Lưu thay đổi"></input>
        </form>
      </div>
      <div class="col">
        <div class="row border border-dark rounded-3 p-5 mb-5 box">
          <h1>Đổi mật khẩu</h1>
          <p>Bạn có thể đổi mật khẩu tài khoản tại đây. Mật khẩu phải có ít nhất 6 ký tự</p>
          <button class="btn btn-primary btn-lg">Đổi mật khẩu</button>
        </div>
        <!-- <div class="row border border-dark rounded-3 p-5 my-5 box">
                    <h1>Đăng xuất</h1>
                    <p>Bạn có thể đăng xuất tài khoản hiện tại tại đây</p>
                    <button class="btn btn-primary btn-lg">Đăng xuất</button>
                </div> -->
      </div>
    </div>
  </div>
</body>

</html>