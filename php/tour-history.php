<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
require_once('./Controller/Tour.php');
require_once('./Model/TourDTO.php');
require_once('./Controller/TourOrder.php');
require_once('./Model/TourOrderDTO.php');
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../assets/css/base.css">
  <link rel="stylesheet" href="../assets/css/main.css" />
  <link rel="stylesheet" href="../assets/css/phuong.css" />
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
    <h1 class="title">Li??ch s???? ca??c tour ??a?? ??????t</h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="panel panel-primary filterable border border-dark box" style="margin-top: 50px">
        <table id="tableTours" class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">Ma?? tour</th>
              <th class="text-center">T??n tour</th>
              <th class="text-center">Gia?? ve?? ng?????i l???n</th>
              <th class="text-center">S???? ng??????i</th>
              <th class="text-center">Gia?? ve?? tr??? em</th>
              <th class="text-center">S???? ng??????i</th>
              <th class="text-center">Nga??y ??????n</th>
              <th class="text-center">Nga??y ??i</th>
              <th class="text-center">T????ng gia??</th>
              <th class="text-center"></th>
            </tr>
          </thead>

          <tbody>
            <?php
            $listTourOrder = TourOrderDTO::getInstance()->GetListTourOrder($idAccount);
            for ($i = 0; $i < count($listTourOrder); $i++) {
              $tour = TourDTO::getInstance()->GetTour($listTourOrder[$i]->GetIdTour());
              $code = $tour->GetCode();
              $nameTour = $tour->GetNameTour();
              $priceAdult = $tour->GetPriceAdult();
              $priceChild = $tour->GetPriceChild();
              $dateIn = $tour->GetDateIn();
              $dateOut = $tour->GetDateOut();
              $countAdult = $listTourOrder[$i]->GetCountAdult();
              $countChild = $listTourOrder[$i]->GetCountChild();
              $totalPrice = $listTourOrder[$i]->GetTotalPrice();
            ?>
              <tr id="tour-1" class="tour-list-row" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <td class="text-center"><?php echo $code ?></td>
                <td class="text-center"><?php echo $nameTour ?></td>
                <td class="text-center"><?php echo $priceAdult ?></td>
                <td class="text-center"><?php echo $countAdult ?></td>
                <td class="text-center"><?php echo $priceChild ?></td>
                <td class="text-center"><?php echo $countChild ?></td>
                <td class="text-center"><?php echo $dateIn ?></td>
                <td class="text-center"><?php echo $dateOut ?></td>
                <td class="text-center"><?php echo $totalPrice ?></td>
                <?php
                if ($dateIn >= date('Y-m-d')) {
                ?>
                  <td class="text-center" style="width:10px">
                    <form action="./DeleteTourOrder.php" method="post">
                      <input type="hidden" name="idTourOrder" value="<?php echo $listTourOrder[$i]->GetId() ?>">
                      <input type="submit" value="X??a" class="blog-button">
                    </form>
                  </td>
              </tr>
          <?php
                }
              }
          ?>
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
          <h3 class="modal-title" id="exampleModalLabel">Th??ng tin tour</h2>
        </div>
        <div class="modal-body">
          <div class="row">
            <h5>Th??n tin chi ti????t tour</h5>
            <p class="ms-2 fw-bold">Tour ??a??o Phu?? Qu????c(3 nga??y - 2 ????m)</p>
            <p class="ms-2 fw-bold">Gia??: 1,500,000/1 ng??????i l????n - 750,000/1 tre?? em</p>
            <div class="mb-2 row ms-2">
              <label for="inputArrivalDay" class="form-label w-50">Nga??y ??????n</label>
              <input type="date" class="form-control w-50" id="inputArrivalDay" value="2022-04-19" />
            </div>
            <div class="mb-2 row ms-2">
              <label for="inputLeaveDay" class="form-label w-50">Nga??y ??i</label>
              <input type="date" class="form-control w-50" id="inputLeaveDay" value="2022-04-19" />
            </div>
            <div class="mb-2 row ms-2">
              <label for="inputAdultAmount" class="form-label w-50">Ng??????i l????n</label>
              <input class="numberstyle form-control w-25" type="number" min="1" step="1" value="1">
            </div>
            <div class="mb-2 row ms-2">
              <label for="inputAdultAmount" class="form-label w-50">Tre?? em</label>
              <input class="numberstyle form-control w-25" type="number" min="1" step="1" value="1">
            </div>
            <div class="row ms-2">
              <label class="form-label w-50">T????ng gia??</label>
              <p class="w-50 fw-bold">1,500,000</p>
            </div>
          </div>
          <div class="row">
            <h5>Th??ng tin ng??????i ??????t</h5>
            <div class="row ms-2">
              <label class="form-label w-50">Ho?? t??n</label>
              <p class="w-50 fw-bold">Vu?? T??n</p>
            </div>
            <div class="row ms-2">
              <label class="form-label w-50">CMND/CCCD</label>
              <p class="w-50 fw-bold">281244619</p>
            </div>
            <div class="row ms-2">
              <label class="form-label w-50">S???? ??i????n thoa??i</label>
              <p class="w-50 fw-bold">0366901216</p>
            </div>
            <div class="row ms-2">
              <label class="form-label w-50">??i??a chi?? email</label>
              <p class="w-50 fw-bold">19520939@gm.uit.edu.vn</p>
            </div>
            <div class="row ms-2">
              <label class="form-label w-50">??i??a ??i????m ??o??n</label>
              <p class="w-50 fw-bold">KTX khu B, ??H Qu???c Gia
                H??? Ch?? Minh</p>
            </div>
          </div>
          <div class="row">
            <h5>??a??nh gia??</h5>
            <div class="row ms-2">
              <label class="form-label w-50">Rating</label>
              <div id="rating-container">
                <div class="rating" data-rating="1" onclick=rate(1)>???</div>
                <div class="rating" data-rating="2" onclick=rate(2)>???</div>
                <div class="rating" data-rating="3" onclick=rate(3)>???</div>
                <div class="rating" data-rating="4" onclick=rate(4)>???</div>
                <div class="rating" data-rating="5" onclick=rate(5)>???</div>
              </div>
            </div>
            <div class="row ms-2">
              <label class="form-label w-50">Bi??nh lu????n</label>
              <textarea class="form-control w-50"></textarea>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Hu??y bo??</button>
          <button type="button" class="btn btn-primary">Xa??c nh????n</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>