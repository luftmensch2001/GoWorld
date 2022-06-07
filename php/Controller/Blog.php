<?php 
Class Blog{
    private $id;
    private $imageUrl;
    private $nameBlog;
    private $date;
    private $detail;
    private $idAccount;
    private $countAccess;

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
    function SetNameBlog($nameBlog)
    {
        $this->nameBlog = $nameBlog;
        return $this;
    }
    function GetNameBlog() {
        return $this->nameBlog;
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
    function SetCountAccess($countAccess){
        $this->countAccess = $countAccess;
        return $this;
    }
    function GetCountAccess() {
        return $this->countAccess;
    }
    function SetDate($date){
        $this->date = $date;
        return $this;
    }
    function GetDate() {
        return $this->date;
    }
}