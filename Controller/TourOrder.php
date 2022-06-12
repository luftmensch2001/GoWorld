<?php
class TourOrder
{
    private $id;
    private $idAccount;
    private $idTour;
    private $countAdult;
    private $countChild;
    private $totalPrice;

    function SetId($id)
    {
        $this->id = $id;
        return $this;
    }
    function GetId()
    {
        return $this->id;
    }
    function SetIdAccount($idAccount)
    {
        $this->idAccount = $idAccount;
        return $this;
    }
    function GetIdAccount()
    {
        return $this->idAccount;
    }
    function SetIdTour($idTour)
    {
        $this->idTour = $idTour;
        return $this;
    }
    function GetIdTour()
    {
        return $this->idTour;
    }
    function SetCountAdult($countAdult)
    {
        $this->countAdult = $countAdult;
        return $this;
    }
    function GetCountAdult()
    {
        return $this->countAdult;
    }
    function SetCountChild($countChild)
    {
        $this->countChild = $countChild;
        return $this;
    }
    function GetCountChild()
    {
        return $this->countChild;
    }
    function SetTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }
    function GetTotalPrice()
    {
        return $this->totalPrice;
    }
}
