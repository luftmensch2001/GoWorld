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
<link rel="stylesheet" href="../assets/css/base.css">
  <link rel="stylesheet" href="../assets/css/main.css" />
  <link rel="stylesheet" href="../assets/css/tour-history.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="./js/tour-history.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Risque&family=Urbanist:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <header class="header">
    <?php include './View/HeaderA.php'; ?>
    <?php include './View/HeaderAccount.php'; ?>
  </header>
</nav>
  <div>
    <h1 class="title">Lịch sử các tour đã đặt</h1>
  </div>
  <div class="container">
    <div class="row">
      <table class="table">
        <thead>
          <tr class="filters">
            <th>Địa điểm
              <input type="text" id="search" class="form-control mt-2" placeholder="Nhập tên tour" />
            </th>
            <th>Số người
              <select id="amount-filter" class="form-control mt-2">
                <option>All</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            </th>
            <th>Ngày đến
              <select id="arrivalDate-filter" class="form-control mt-2">
                <option>All</option>
                <option>19/04/2022</option>
                <option>13/05/2022</option>
              </select>
            </th>
            <th>Ngày đi
              <select id="leaveDate-filter" class="form-control mt-2">
                <option>All</option>
                <option>19/04/2022</option>
                <option>13/05/2022</option>
              </select>
            </th>
          </tr>
        </thead>
      </table>
      <div class="panel panel-primary filterable border border-dark box">
        <table id="table" class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">Mã tour</th>
              <th class="text-center">Tên tour</th>
              <th class="text-center">Giá vé</th>
              <th class="text-center">Số người</th>
              <th class="text-center">Ngày đến</th>
              <th class="text-center">Ngày đi</th>
              <th class="text-center">Tổng giá</th>
            </tr>
          </thead>

          <tbody>

            <tr id="tour-1" class="tour-list-row" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <td class="text-center">1</td>
              <td class="text-center">Tour du lịch Cát Bà</td>
              <td class="text-center">1,500,000</td>
              <td class="text-center">1</td>
              <td class="text-center">19/04/2022</td>
              <td class="text-center">19/04/2022</td>
              <td class="text-center">1,500,000</td>
            </tr>
            <tr id="tour-2" class="tour-list-row">
              <td class="text-center">2</td>
              <td class="text-center">Tour du lịch Phan Thiết</td>
              <td class="text-center">1,500,000</td>
              <td class="text-center">2</td>
              <td class="text-center">13/05/2022</td>
              <td class="text-center">13/05/2022</td>
              <td class="text-center">3,000,000</td>
            </tr>
            <tr id="tour-3" class="tour-list-row">
              <td class="text-center">4</td>
              <td class="text-center">Tour du lịch Nha Trang</td>
              <td class="text-center">2,500,000</td>
              <td class="text-center">3</td>
              <td class="text-center">19/04/2022</td>
              <td class="text-center">13/05/2022</td>
              <td class="text-center">7,500,000</td>
            </tr>
            <tr id="tour-4" class="tour-list-row">
              <td class="text-center">4</td>
              <td class="text-center">Tour du lịch Sa Pa</td>
              <td class="text-center">1,500,000</td>
              <td class="text-center">4</td>
              <td class="text-center">19/04/2022</td>
              <td class="text-center">19/04/2022</td>
              <td class="text-center">6,000,000</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Thông tin tour</h2>
        </div>
        <div class="modal-body">
          <div class="row">
            <h5>Thôn tin chi tiết tour</h5>
            <p class="ms-2 fw-bold">Tour Đảo Phú Quốc(3 ngày - 2 đêm)</p>
            <p class="ms-2 fw-bold">Giá: 1,500,000/1 người lớn - 750,000/1 trẻ em</p>
            <div class="mb-2 row ms-2">
              <label for="inputArrivalDay" class="form-label w-50">Ngày đến</label>
              <input type="date" class="form-control w-50" id="inputArrivalDay" value="2022-04-19" />
            </div>
            <div class="mb-2 row ms-2">
              <label for="inputLeaveDay" class="form-label w-50">Ngày đi</label>
              <input type="date" class="form-control w-50" id="inputLeaveDay" value="2022-04-19" />
            </div>
            <div class="mb-2 row ms-2">
              <label for="inputAdultAmount" class="form-label w-50">Người lớn</label>
              <input class="numberstyle form-control w-25" type="number" min="1" step="1" value="1">
            </div>
            <div class="mb-2 row ms-2">
              <label for="inputAdultAmount" class="form-label w-50">Trẻ em</label>
              <input class="numberstyle form-control w-25" type="number" min="1" step="1" value="1">
            </div>
            <div class="row ms-2">
              <label class="form-label w-50">Tổng giá</label>
              <p class="w-50 fw-bold">1,500,000</p>
            </div>
          </div>
          <div class="row">
            <h5>Thông tin người đặt</h5>
            <div class="row ms-2">
              <label class="form-label w-50">Họ tên</label>
              <p class="w-50 fw-bold">Vũ Tân</p>
            </div>
            <div class="row ms-2">
              <label class="form-label w-50">CMND/CCCD</label>
              <p class="w-50 fw-bold">281244619</p>
            </div>
            <div class="row ms-2">
              <label class="form-label w-50">Số điện thoại</label>
              <p class="w-50 fw-bold">0366901216</p>
            </div>
            <div class="row ms-2">
              <label class="form-label w-50">Địa chỉ email</label>
              <p class="w-50 fw-bold">19520939@gm.uit.edu.vn</p>
            </div>
            <div class="row ms-2">
              <label class="form-label w-50">Địa điểm đón</label>
              <p class="w-50 fw-bold">KTX khu B, ĐH Quốc Gia
                Hồ Chí Minh</p>
            </div>
          </div>
          <div class="row">
            <h5>Đánh giá</h5>
            <div class="row ms-2">
              <label class="form-label w-50">Rating</label>
              <div id="rating-container">
                <div class="rating" data-rating="1" onclick=rate(1)>★</div>
                <div class="rating" data-rating="2" onclick=rate(2)>★</div>
                <div class="rating" data-rating="3" onclick=rate(3)>★</div>
                <div class="rating" data-rating="4" onclick=rate(4)>★</div>
                <div class="rating" data-rating="5" onclick=rate(5)>★</div>
              </div>
            </div>
            <div class="row ms-2">
              <label class="form-label w-50">Bình luận</label>
              <textarea class="form-control w-50"></textarea>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Hủy bỏ</button>
          <button type="button" class="btn btn-primary">Xác nhận</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>