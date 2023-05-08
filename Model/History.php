<?php 
/**
 * Summary of History
 */
class History{
    private $watchDate;
    private $elapsedTime;
    private $userID;
    /**
     * Summary of __construct
     * @param mixed $watchDate
     * @param mixed $elapsedTime
     * @param mixed $userID
     */
    public function __construct($watchDate,$elapsedTime,$userID){
        $this->watchDate = $watchDate;
        $this->elapsedTime = $elapsedTime;
        $this->userID =$userID;
    }
    /**
     * Summary of getwatchDate
     * @return mixed
     */
    public function getwatchDate()
    {
        return $this->watchDate;
    }

    /**
     * @param mixed $watchDate
     * @return History
     */
    public function setwatchDate($watchDate)
    {
        $this->watchDate = $watchDate;
        return $this;
    }

    /**
     * Summary of getelapsedTime
     * @return mixed
     */
    public function getelapsedTime()
    {
        return $this->elapsedTime;
    }

    /**
     * @param mixed $elapsedTime
     * @return History
     */
    public function setelapsedTime($elapsedTime)
    {
        $this->elapsedTime = $elapsedTime;
        return $this;
    }

	/**
	 * @return mixed
	 */
	public function getUserID() {
		return $this->userID;
	}
	
	/**
	 * @param mixed $UserID 
	 * @return self
	 */
	public function setUserID($UserID): self {
		$this->userID = $UserID;
		return $this;
	}
}