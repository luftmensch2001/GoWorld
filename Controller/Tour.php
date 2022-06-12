<?php 
Class Tour{
    private $id;
    private $imageUrl;
    private $code;
    private $nameTour;
    private $dateIn;
    private $dateOut;
    private $priceAdult;
    private $priceChild;
    private $detail;
    private $idAccount;

    function SetId($id){
        $this->id = $id;
        return $this;
    }
    function GetId(){
        return $this->id;
    }
    function SetImageUrl($imageUrl){
        $this->imageUrl = $imageUrl;
        return $this;
    }
    function GetImageUrl() {
        return $this->imageUrl;
    }
    function SetCode($code){
        $this->code = $code;
        return $this;
    }
    function GetCode() {
        return $this->code;
    }
    function SetNameTour($nameTour)
    {
        $this->nameTour = $nameTour;
        return $this;
    }
    function GetNameTour() {
        return $this->nameTour;
    }
    function SetDateIn($dateIn){
        $this->dateIn = $dateIn;
        return $this;
    }
    function GetDateIn() {
        return $this->dateIn;
    }
    function SetDateOut($dateOut){
        $this->dateOut = $dateOut;
        return $this;
    }
    function GetDateOut() {
        return $this->dateOut;
    }
    function SetPriceAdult($priceAdult){
        $this->priceAdult = $priceAdult;
        return $this;
    }
    function GetPriceAdult() {
        return $this->priceAdult;
    }
    function SetPriceChild($priceChild){ 
        $this->priceChild = $priceChild;
        return $this;
    }
    function GetPriceChild() {
        return $this->priceChild;
    }
    function SetDetail($detail){
        $this->detail = $detail;
        return $this;
    }
    function GetDetail() {
        return $this->detail;
    }
    function SetIdAccount($idAccount){
        $this->idAccount = $idAccount;
        return $this;
    }
    function GetIdAccount() {
        return $this->idAccount;
    }
}