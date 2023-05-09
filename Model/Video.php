
<?php

require_once '../Controller/Database.php';

class Video
{
    private  $id;
    private $title;
    private $category;
    private $description;
    private $thumbnail;
    private $date;
    private $state;
    private $views;
    private $url;
    private $userID;

    /**
     * @param $id
     * @param $title
     * @param $category
     * @param $description
     * @param $thumbnail
     * @param $date
     * @param $state
     * @param $views
     * @param $url
     * @param $userID
     */
    public function __construct($id=null, $title=null, $category=null, $description=null, $thumbnail=null, $date=null, $state=null, $views=null, $url=null, $userID=null)
{
    $this->id = $id;
    $this->title = $title;
    $this->category = $category;
    $this->description = $description;
    $this->thumbnail = $thumbnail;
    $this->date = $date;
    $this->state = $state;
    $this->views = $views;
    $this->url = $url;
    $this->userID = $userID;
}

    

    /**
     * @param $id
     * @param  $category
     * @param $description
     * @param $thumbnail
     * @param $date
     * @param $state
     * @param $views
     * @param $url
     * @param $userID
     */

    /**
     * @param $id
     * @param $category
     * @param $description
     * @param $thumbnail
     * @param $date
     * @param $state
     * @param $views
     * @param $url
     * @param $userID
     */




    /**
     * @param $id
     * @param $category
     * @param $description
     * @param $thumbnail
     * @param $date
     * @param $state
     * @param $views
     * @param $url
     * @param $userID
     */



    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Video
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * @return Video
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }








    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }


    public function getThumbnail()
    {
        return $this->thumbnail;
    }


    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }


    public function getDate()
    {
        return $this->date;
    }


    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }


    public function getState()
    {
        return $this->state;
    }


    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }


    public function getViews()
    {
        return $this->views;
    }


    public function setViews($views)
    {
        $this->views = $views;
        return $this;
    }


    public function getUrl()
    {
        return $this->url;
    }


    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }


    public function getUserID()
    {
        return $this->userID;
    }


    public function setUserID($userID)
    {
        $this->userID = $userID;
        return $this;
    }
}

