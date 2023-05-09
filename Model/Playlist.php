<?php

class Playlist
{
    private $PlaylistID;
    private $numOfVideosPlaylist;
    private $PlaylistName;
    private $description;
    private $userID;

    /**
     * @param $PlaylistID
     * @param $numOfVideosPlaylist
     * @param $PlaylistName
     * @param $description
     * @param $userID
     */
    public function __construct($PlaylistID, $numOfVideosPlaylist, $PlaylistName, $description,$userID)
    {
        $this->PlaylistID = $PlaylistID;
        $this->numOfVideosPlaylist = $numOfVideosPlaylist;
        $this->PlaylistName = $PlaylistName;
        $this->description = $description;
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getPlaylistID()
    {
        return $this->PlaylistID;
    }

    /**
     * @param mixed $PlaylistID
     * @return Playlist
     */
   

    /**
     * @return mixed
     */
    public function getNumOfVideosPlaylist()
    {
        return $this->numOfVideosPlaylist;
    }

    /**
     * @param mixed $numOfVideosPlaylist
     * @return Playlist
     */
    

    /**
     * @return mixed
     */
    public function getPlaylistName()
    {
        return $this->PlaylistName;
    }

    /**
     * @param mixed $PlaylistName
     * @return Playlist
     */
    public function setPlaylistName($PlaylistName)
    {
        $this->PlaylistName = $PlaylistName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Playlist
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    

    /**
     * @param mixed $userID
     * @return Playlist
     */
   
	/**
	 * @return mixed
	 */
	public function getUserID() {
		return $this->userID;
	}
	
	/**
	 * @param mixed $userID 
	 * @return self
	 */
	public function setUserID($userID): self {
		$this->userID = $userID;
		return $this;
	}
}