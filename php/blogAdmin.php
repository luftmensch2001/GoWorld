<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
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
  }
  if ($account->GetRole() == 0) {
    header("Location:Setting.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../assets/css/main.css" />
  <link rel="stylesheet" href="../assets/css/tour.css" />
  <link rel="stylesheet" href="../assets/css/base.css" />
  <link rel="stylesheet" href="../assets/css/phuong.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="../assets/js/tour.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Risque&family=Urbanist:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header class="header">
    <?php include './View/HeaderA.php'; ?>
    <?php include './View/HeaderAccount.php'; ?>
  </header>

  <div>
    <h1 class="title mb-4">Tour</h1>
    <hr class="divider">
    </hr>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-auto">
        <div id="sidenav" class="sidenav">
          <a id="sidenav-tour" class="sidenav-link active" href="#">Danh Sa??ch Blog</a>
          <a id="sidenav-tour" href="./tour.php">Danh Sa??ch Tour</a>
        </div>
      </div>
      <div class="col" style="position:relative">
        <div class="panel panel-primary filterable border border-dark box mt-3 ms-5 table-container position-relative" style="overflow:auto;">
          <table id="tableTours" class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">Hi??nh a??nh</th>
                <th class="text-center">T??n Blog</th>
                <th class="text-center">Ng??y ????ng</th>
                <th class="text-center">L?????t xem</th>
                <th class="text-center"></th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody>
              <?php include './View/BlogInAdmin.php' ?>
            </tbody>
          </table>
        </div>
      </div>
      <a href="./postBlog.php">
        <button style="position:fixed" id="btn-add" class="btn btn-outline-primary btn-circle btn-l position-absolute bottom-0 end-0 mb-2 me-2" type="button" aria-expanded="false">
          <i class="fa-solid fa-plus"></i>
        </button>
      </a>
    </div>
  </div>
</body>

</html>