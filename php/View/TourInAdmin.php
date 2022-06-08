<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
require_once('./Controller/Tour.php');
require_once('./Model/TourDTO.php');

$listTour = TourDTO::getInstance()->GetListTourByIdAccount($idAccount);
for ($i = 0; $i < count($listTour); $i++) {
    $imageUrl = $listTour[$i]->GetImageUrl();
    $code = $listTour[$i]->GetCode();
    $nameTour = $listTour[$i]->GetNameTour();
    $priceAdult = $listTour[$i]->GetPriceAdult();
    $priceChild = $listTour[$i]->GetPriceChild();
    $dateIn = $listTour[$i]->GetDateIn();
    $dateOut = $listTour[$i]->GetDateOut();
?>
    <tr id="tour-1" class="tour-list-row" data-bs-toggle="modal" data-bs-target="#tourModal">
        <td class="text-center">
            <img class="table-img" src="<?php echo $imageUrl ?>" al="tour image" />
        </td>
        <td class="text-center"><?php echo $code ?></td>
        <td class="text-center"><?php echo $nameTour ?></td>
        <td class="text-center"><?php echo $priceAdult ?></td>
        <td class="text-center"><?php echo $priceChild ?></td>
        <td class="text-center"><?php echo $dateIn ?></td>
        <td class="text-center"><?php echo $dateOut ?></td>
        <td class="text-center">
            <form action="./tourOrder.php" method="post">
                <input type="hidden" name="idTour" value="<?php echo $listTour[$i]->GetId() ?>">
                <input type="submit" value="Chi tiết">
            </form>
        </td>
    </tr>
<?php
}
?>