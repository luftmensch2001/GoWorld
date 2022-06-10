<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
require_once('./Controller/Tour.php');
require_once('./Model/TourDTO.php');


$listTour = TourDTO::getInstance()->GetListTour();
if (!isset($_POST['pageNumber']))
{
    $pageNumber = 0;
} else
{
    $pageNumber = $_POST['pageNumber']-1;
}

$startNumber = ($pageNumber*12);
$lastNumber =min($startNumber+12,count($listTour));
for ($i = $startNumber; $i < $lastNumber; $i++) {
    $id = $listTour[$i]->GetId();
    $imageUrl = $listTour[$i]->GetImageUrl();
    $code = $listTour[$i]->GetCode();
    $nameTour = $listTour[$i]->GetNameTour();
    $priceAdult = $listTour[$i]->GetPriceAdult();
    $priceChild = $listTour[$i]->GetPriceChild();
    $dateIn = $listTour[$i]->GetDateIn();
    $dateOut = $listTour[$i]->GetDateOut();
?>
    <form class="tour-item" method="post" action="./info-tour.php">
        <img src="<?php echo $imageUrl?>" alt="" width="340px" height=" 220px">
        <input type="hidden" name="idTour" value="<?php echo $id?>">
        <div class="tour-item__header">
            <span><?php echo $nameTour?></span> 
            <div class="tour-item__rate">
                <img src="../assets/img/upvote.png">
                <img src="../assets/img/upvote.png">
                <img src="../assets/img/upvote.png">
                <img src="../assets/img/upvote.png">
                <img src="../assets/img/downvote.png">
            </div>
            <div class="row-end">
                <div class="tour-item__price"><?php echo $priceAdult?> VNĐ</div>
                <button class="primary-btn">Xem tour</button>
            </div>
        </div>
    </form>
<?php
}
?>