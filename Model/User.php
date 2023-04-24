<?php

class User
{
private $UserID;
private $UserName;
private $numOfVideoUser;
private $account;


    public function __construct($UserID, $UserName, $numOfVideoUser, $account)
    {
        $this->UserID = $UserID;
        $this->UserName = $UserName;
        $this->numOfVideoUser = $numOfVideoUser;
        $this->account = $account;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->UserID;
    }

    /**
     * @param mixed $UserID
     * @return User
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->UserName;
    }

    /**
     * @param mixed $UserName
     * @return User
     */
    public function setUserName($UserName)
    {
        $this->UserName = $UserName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumOfVideoUser()
    {
        return $this->numOfVideoUser;
    }

    /**
     * @param mixed $numOfVideoUser
     * @return User
     */
    public function setNumOfVideoUser($numOfVideoUser)
    {
        $this->numOfVideoUser = $numOfVideoUser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     * @return User
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

}

