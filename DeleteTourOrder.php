<?php
require_once('./Controller/TourOrder.php');
require_once('./Model/TourOrderDTO.php');

if (isset($_POST['idTourOrder'])) {
    if (TourOrderDTO::getInstance()->DeleteTourOrder($_POST['idTourOrder']))
        echo "<script>alert('Xóa TourOrder thành công')</script>";
    header("Location:tour-history.php");
}
?>
