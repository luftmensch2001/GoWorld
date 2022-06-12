<?php
require_once('./Controller/Tour.php');
require_once('./Model/TourDTO.php');

if (isset($_POST['idTour'])) {
    if (TourDTO::getInstance()->DeleteTour($_POST['idTour']))
        echo "<script>alert('Xóa Tour thành công')</script>";
    header("Location:Tour.php");
}
