
<?php 

class VideoController {
   private $db;
   private $view;
   
   public function __construct($view, $db) {
       $this->view = $view;
       $this->db = $db;
   }
   
   public function search() {
       // Get the search query from the GET parameters
       $searchQuery = $_GET['query'];
       
       // Call the search function in the model to retrieve the search results
       $searchResults = $this->db->searchVideos($searchQuery);
       
       require_once'searchResult.php';
       //$searchResults = $model->searchVideos($searchQuery);
       $searchResultView = new View();
       $searchResultView->displaySearchResults($searchResults);
       


       // Pass the search results to the search results view
       //$this->view->displaySearchResults($searchResults);
   }
}


?>