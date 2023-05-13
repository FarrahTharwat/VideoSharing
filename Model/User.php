<?php

class User
{
    public $UserID;
    public $email;
    public $password;
    public $country;
    public $Name;
    public $numOfVideoUser;

    public function __construct($UserID = null, $Name = null, $email = null, $password = null, $country = null)
    {
        $this->UserID = $UserID;
        $this->Name = $Name;
        $this->email = $email;
        $this->password = $password;
        $this->country = $country;
    }

    public function getUserID()
    {
        return $this->UserID;
    }

    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getUserName()
    {
        return $this->Name;
    }

    public function setUserName($UserName)
    {
        $this->Name = $UserName;
        return $this;
    }

    public function getNumOfVideoUser()
    {
        return $this->numOfVideoUser;
    }

    public function setNumOfVideoUser($numOfVideoUser)
    {
        $this->numOfVideoUser = $numOfVideoUser;
        return $this;
    }
}
 ?>