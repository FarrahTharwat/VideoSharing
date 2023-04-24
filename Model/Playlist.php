<?php

class Playlist
{
    private $PlaylistID;
    private $numOfVideosPlaylist;
    private $PlaylistName;
    private $description;
    private $userID;
    private $privacy;

    /**
     * @param $PlaylistID
     * @param $numOfVideosPlaylist
     * @param $PlaylistName
     * @param $description
     * @param $userID
     * @param $privacy
     */
    public function __construct($PlaylistID, $numOfVideosPlaylist, $PlaylistName, $description, $userID, $privacy)
    {
        $this->PlaylistID = $PlaylistID;
        $this->numOfVideosPlaylist = $numOfVideosPlaylist;
        $this->PlaylistName = $PlaylistName;
        $this->description = $description;
        $this->userID = $userID;
        $this->privacy = $privacy;
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
    public function setPlaylistID($PlaylistID)
    {
        $this->PlaylistID = $PlaylistID;
        return $this;
    }

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
    public function setNumOfVideosPlaylist($numOfVideosPlaylist)
    {
        $this->numOfVideosPlaylist = $numOfVideosPlaylist;
        return $this;
    }

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
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     * @return Playlist
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * @param mixed $privacy
     * @return Playlist
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;
        return $this;
    }


}