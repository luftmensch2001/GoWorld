<?php
require_once('./Controller/TourOrder.php');
require_once('DataProvider.php');
class TourOrderDTO
{
    public static $_instance = null;
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new TourOrderDTO();
        }
        return self::$_instance;
    }
    function GetTourOrder($id)
    {
        $query = "SELECT * FROM TourOrder Where id = '$id'";
        $result = DataProvider::getInstance()->Execute($query);

        $row = mysqli_num_rows($result);
        if ($row > 0) {
            $row = $result->fetch_assoc();
            $tourOrder = new TourOrder();
            $tourOrder->SetId($row["id"])
                ->SetIdAccount($row["idAccount"])
                ->SetIdTour($row["idTour"])
                ->SetCountAdult($row["countAdult"])
                ->SetCountChild($row["countChild"])
                ->SetTotalPrice($row["totalPrice"]);
            return $tourOrder;
        } else
            return null;
    }
    function GetListTourOrder($idAccount)
    {
        $query = "SELECT * FROM TourOrder Where idAccount = '$idAccount'";
        $result = DataProvider::getInstance()->Execute($query);

        $listTourOrder = array();
        $row = mysqli_num_rows($result);
        while ($row = $result->fetch_assoc()) {
            $tourOrder = new TourOrder();
            $tourOrder->SetId($row["id"])
                ->SetIdAccount($row["idAccount"])
                ->SetIdTour($row["idTour"])
                ->SetCountAdult($row["countAdult"])
                ->SetCountChild($row["countChild"])
                ->SetTotalPrice($row["totalPrice"]);
            array_push($listTourOrder, $tourOrder);
        }
        return $listTourOrder;
    }
    function GetListTourOrderByIdTour($idTour)
    {
        $query = "SELECT * FROM TourOrder Where idTour = '$idTour'";
        $result = DataProvider::getInstance()->Execute($query);

        $listTourOrder = array();
        $row = mysqli_num_rows($result);
        while ($row = $result->fetch_assoc()) {
            $tourOrder = new TourOrder();
            $tourOrder->SetId($row["id"])
                ->SetIdAccount($row["idAccount"])
                ->SetIdTour($row["idTour"])
                ->SetCountAdult($row["countAdult"])
                ->SetCountChild($row["countChild"])
                ->SetTotalPrice($row["totalPrice"]);
            array_push($listTourOrder, $tourOrder);
        }
        return $listTourOrder;
    }
    public function CreateTourOrder($tourOrder)
    {
        $idAccount = $tourOrder->GetIdAccount();
        $idTour = $tourOrder->GetIdTour();
        $countAdult = $tourOrder->GetCountAdult();
        $countChild = $tourOrder->GetCountChild();
        $totalPrice = $tourOrder->GetTotalPrice();
        $query = "Insert into TourOrder(idAccount,idTour,countAdult,countChild,totalPrice) 
    values('$idAccount','$idTour','$countAdult','$countChild','$totalPrice')";
        $result = DataProvider::getInstance()->Execute($query);

        return $result;
    }
    public function UpdateTourOrder($tourOrder)
    {
        $id = $tourOrder->GetId();
        $idAccount = $tourOrder->GetIdAccount();
        $idTour = $tourOrder->GetIdTour();
        $countAdult = $tourOrder->GetCountAdult();
        $countChild = $tourOrder->GetCountChild();
        $totalPrice = $tourOrder->GetTotalPrice();
        $query = "Update tour set 
            idAccount='$idAccount', 
            idTour='$idTour',
            countAdult='$countAdult',
            countChild='$countChild',
            totalPrice='$totalPrice',
            
            WHERE id ='$id'";
        $result = DataProvider::getInstance()->Execute($query);
        return $result;
    }
}
