<?php
class Account {
        private $id;
        private $username;
        private $password;
        private $fullName;
        private $email;
        private $cmnd;
        private $address;

        public function __construct()
        {
            
        }
        public function SetId($id) {
            $this->id = $id;
            return $this;
        }
        public function GetId() {
            return $this->id;
        }

        public function SetUsername($username) {
            $this->username = $username;
            return $this;
        }
        public function GetUsername() {
            return $this->username;
        }

        public function SetSex($sex) {
            $this->sex = $sex;
            return $this;
        }
        function GetSex() {
            return $this->sex;
        }

        function SetFullName($fullName) {
            $this->fullName = $fullName;
            return $this;   
        }
        function GetFullName() {
            return $this->fullName;
        }

        function SetEmail($email) {
            $this->email = $email;
            return $this;
        }
        function GetEmail() {
            return $this->email;
        }

        function SetPassword($password) {
            $this->password = $password;
            return $this;
        }
        function GetPassword() {
            return $this->password;
        }

        function SetCmnd($cmnd){
            $this->cmnd = $cmnd;
            return $this;
        }
        function GetCmnd() {
            return $this->cmnd;
        }

        function SetAddress($address){
            $this->address = $address;
            return $this;
        }

        function Getaddress() {
            return $this->address;
        }
    }
