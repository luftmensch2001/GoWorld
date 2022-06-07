<?php
require_once('./Controller/Tour.php');
require_once('DataProvider.php');
class TourDTO
{
    public static $_instance = null;
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new TourDTO();
        }

        return self::$_instance;
    }
    public function GetTour($id)
    {
        $query = "SELECT * FROM Tour Where id = '$id'";
        $result = DataProvider::getInstance()->Execute($query);

        $row = mysqli_num_rows($result);
        if ($row > 0) {
            $row = $result->fetch_assoc();
            $tour = new Tour();
            $tour->SetId($row["id"])
                ->SetImageUrl($row["imageURL"])
                ->SetCode($row["code"])
                ->SetNameTour($row["nameTour"])
                ->SetDateIn($row["dateIn"])
                ->SetDateOut($row["dateOut"])
                ->SetPriceAdult($row["priceAdult"])
                ->SetPriceChild($row["priceChild"])
                ->SetDetail($row["detail"])
                ->SetIdAccount($row["idAccount"]);
            return $tour;
        } else
            return null;
    }
    public function GetListTour()
    {
        $listTour = array();
        $query = "SELECT * FROM Tour";
        $result = DataProvider::getInstance()->Execute($query);

        $row = mysqli_num_rows($result);
        while ($row = $result->fetch_assoc()) {
            $tour = new Tour();
            $tour->SetId($row["id"])
                ->SetImageUrl($row["imageURL"])
                ->SetCode($row["code"])
                ->SetNameTour($row["nameTour"])
                ->SetDateIn($row["dateIn"])
                ->SetDateOut($row["dateOut"])
                ->SetPriceAdult($row["priceAdult"])
                ->SetPriceChild($row["priceChild"])
                ->SetDetail($row["detail"])
                ->SetIdAccount($row["idAccount"]);
            array_push($listTour,$tour);
        }
        return $listTour;
    }
    public function ExistCode($code)
    {
        $query = "SELECT * FROM tour Where code = '$code'";
        $result = DataProvider::getInstance()->Execute($query);
        $row = mysqli_num_rows($result);
        if ($row > 0)
            return true;
        else
            return false;
    }
    public function CreateTour($tour)
    {
        $imageUrl = $tour->GetImageUrl();
        $code = $tour->GetCode();
        $nameTour = $tour->GetNameTour();
        $dateIn = $tour->GetDateIn();
        $dateOut = $tour->GetDateOut();
        $priceAdult = $tour->GetPriceAdult();
        $priceChild = $tour->GetPriceChild();
        $detail = $tour->GetDetail();
        $idAccount = $tour->GetIdAccount();
        $query = "Insert into Tour(imageUrl,code,nameTour, dateIn, dateOut,priceAdult,priceChild,detail,idAccount) 
    values('$imageUrl','$code','$nameTour','$dateIn','$dateOut','$priceAdult','$priceChild','$detail','$idAccount')";
        $result = DataProvider::getInstance()->Execute($query);

        return $result;
    }
    public function UpdateTour($tour)
    {
        $id = $tour->GetId();
        $imageUrl = $tour->GetImageUrl();
        $code = $tour->GetCode();
        $nameTour = $tour->GetNameTour();
        $dateIn = $tour->GetDateIn();
        $dateOut = $tour->GetDateOut();
        $priceAdult = $tour->GetPriceAdult();
        $priceChild = $tour->GetPriceChild();
        $detail = $tour->GetDetail();
        $idAccount = $tour->GetIdAccount();
        $query = "Update tour set 
            imageUrl='$imageUrl',
            code='$code',
            nameTour='$nameTour',
            datein='$dateIn',
            dateOut='$dateOut',
            priceAdult='$priceAdult',
            priceChild='$priceChild',
            detail='$detail',
            idAccount='$idAccount' WHERE id ='$id'";
        $result = DataProvider::getInstance()->Execute($query);
        return $result;
    }
}
