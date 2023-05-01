<?php
include 'CRUD.php';
include 'Database.php';
include'../Model/Playlist.php';
include'../Model/Video.php';
include'../Model/user.php';
include'../Model/History.php';

/**
 * Summary of ManageHistory
 */
class ManageHistory implements CRUD{
    /**
     * Summary of create
     * @param mixed $History
     * @return void
     */
    //Till we finish the front, dont forget the add and remove (can implement the function multiple times?)
    function create($History){
        //Get database connection
        $database = new Database();
        $conn = $database->getConn();
        
    }
    /**
     * Summary of delete
     * @param mixed $id
     * @return void
     */
    public function delete($id){
     // TODO: Implement delete() method.
    }
    /**
     * Summary of retrive
     * @param mixed $id
     * @return void
     */
    public function retrive($id)
    {
     // TODO: Implement retrive() method.
    }
    /**
     * Summary of update
     * @param mixed $Playlist
     * @return void
     */
    public function update($History){
     // TODO: Implement update() method. 
    }
}