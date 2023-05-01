<?php 
/**
 * Summary of History
 */
class History{
    private $watchDate;
    private $elapsedTime;
    public function __construct($watchDate,$elapsedTime){
        $this->watchDate = $watchDate;
        $this->elapsedTime = $elapsedTime;
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


   
}