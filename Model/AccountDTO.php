<?php
require_once('./Controller/Account.php');
require_once('DataProvider.php');
class AccountDTO
{
  public static $_instance = null;
  private function __construct()
  {
  }
  public static function getInstance()
  {
    if (self::$_instance == null) {
      self::$_instance = new AccountDTO();
    }

    return self::$_instance;
  }
  public function GetId($userName, $password)
  {
    $query = "SELECT * FROM Account Where username = '$userName' AND password = '$password'";
    $result = DataProvider::getInstance()->Execute($query);

    $row = mysqli_num_rows($result);
    if ($row > 0) {
      $row = $result->fetch_assoc();
      return $row["id"];
    } else {
      return -1;
    }
  }
  public function GetAccount($id)
  {
    $query = "SELECT * FROM Account Where id = '$id'";
    $result = DataProvider::getInstance()->Execute($query);

    $row = mysqli_num_rows($result);
    if ($row > 0) {
      $row = $result->fetch_assoc();
      $account = new Account();
      $account->SetId($row["id"])
        ->SetEmail($row["email"])
        ->SetPassword($row["password"])
        ->SetFullName($row["fullName"])
        ->SetCmnd($row["cmnd"])
        ->SetUsername($row["userName"])
        ->SetAddress($row["address"])
        ->SetPhoneNumber($row["phoneNumber"])
        ->SetRole($row["role"]);
        return $account;
    } else
      return null;
  }
  public function AccountExists($userName)
  {
    $query = "SELECT * FROM Account Where username = '$userName'";
    $result = DataProvider::getInstance()->Execute($query);
    $row = mysqli_num_rows($result);
    if ($row > 0)
      return true;
    else
      return false;
  }
  public function CreateAccount($account)
  {
    $username = $account->GetUsername();
    $password = $account->GetPassword();
    $fullName = $account->GetFullName();
    $email = $account->GetEmail();
    $query = "Insert into account(userName, password, email,fullName) 
    values('$username','$password','$email','$fullName')";
    $result = DataProvider::getInstance()->Execute($query);

    return $result;
  }
  public function UpdateAccount($account)
  {
    $id = $account->GetId();
    $username = $account->GetUsername();
    $password = $account->GetPassword();
    $fullName = $account->GetFullName();
    $email = $account->GetEmail();
    $cmnd = $account->GetCmnd();
    $address = $account->GetAddress();
    $phoneNumber = $account->GetPhoneNumber();
    $query = "Update account Set userName = '$username',
        password = '".$password."',
        fullName = '$fullName',
        email = '$email',
        cmnd = $cmnd,
        address = '$address',
        phoneNumber = '$phoneNumber' Where id= '$id'";
    $result = DataProvider::getInstance()->Execute($query);
    return $result;
  }
}
