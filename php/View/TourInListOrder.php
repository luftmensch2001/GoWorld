<?php
require_once('./Controller/TourOrder.php');
require_once('./Model/TourOrderDTO.php');
$listTourOrder = TourOrderDTO::getInstance()->GetListTourOrderByIdTour($idTour);
for ($i = 0; $i < count($listTourOrder); $i++) {
    $idAccount = $listTourOrder[$i]->GetIdAccount();
    $account = AccountDTO::getInstance()->GetAccount($idAccount);
    $fullName = $account->GetFullName();
    $email = $account->GetEmail();
    $phoneNumber = $account->GetPhoneNumber();
    $address = $account->GetAddress();
    $cmnd = $account->GetCmnd();

    $countAdult = $listTourOrder[$i]->GetCountAdult();
    $countChild = $listTourOrder[$i]->GetCountChild();
?>
    <tr id="tour-1" class="tour-list-row" data-bs-toggle="modal" data-bs-target="#tourModal">
        <td class="text-center"><?php echo $fullName ?></td>
        <td class="text-center"><?php echo $countAdult ?></td>
        <td class="text-center"><?php echo $countChild ?></td>
        <td class="text-center"><?php echo $cmnd ?></td>
        <td class="text-center"><?php echo $email ?></td>
        <td class="text-center"><?php echo $phoneNumber ?></td>
        <td class="text-center"><?php echo $address ?></td>
    </tr>
<?php
}
?>