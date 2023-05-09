


<?php

class VideoModel {
   private $db;

   function __construct(Database $db) {
      // Set the database controller object as a property of the model
      $this->db = $db;
   }

   function searchVideos($searchQuery) {
      // Call the searchVideos() method of the database controller
      $videos = $this->db->searchVideos($searchQuery);
      
      // Return the search results
      return $videos;
   }
}
?>