<?php
class VideoPlaylist
{
    private $VideoID;
    private $PlaylistID;

	/**
	 * @return mixed
	 */

     public function __construct($VideoID, $PlaylistID)
     {
         $this->VideoID = $VideoID;
         $this->PlaylistID = $PlaylistID;
     }
    /**
     * Summary of getPlaylistID
     * @return mixed
     */
	public function getPlaylistID() {
		return $this->PlaylistID;
	}
	
	/**
	 * @param mixed $PlaylistID 
	 * @return self
	 */
	public function setPlaylistID($PlaylistID): self {
		$this->PlaylistID = $PlaylistID;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getVideoID() {
		return $this->VideoID;
	}
	
	/**
	 * @param mixed $VideoID 
	 * @return self
	 */
	public function setVideoID($VideoID): self {
		$this->VideoID = $VideoID;
		return $this;
	}
}