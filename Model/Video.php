<?php
class Video {
    private  $id;
    private Category $category;
    private $description;
    private $thumbnail;
    private $date;
    private $state;
    private $views;
    private $url;
    private $userID;

    /**
     * @param $id
     * @param Category $category
     * @param $description
     * @param $thumbnail
     * @param $date
     * @param $state
     * @param $views
     * @param $url
     * @param $userID
     */
    public function __construct($id, Category $category, $description, $thumbnail, $date, $state, $views, $url, $userID)
    {
        $this->id = $id;
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
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Video
     */
    public function setCategory(Category $category): Video
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
enum Category {
    case SPORT;
    case SOUND;
    case PODCAST;
    case EDUCATION;
    case GAMING;

}