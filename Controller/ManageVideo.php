<?php
include 'CRUD.php';
class ManageVideo implements CRUD
{

    public function create($entity)
    {
        // TODO: Implement create() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function retrive($id)
    {
        // TODO: Implement retrive() method.
    }

    public function update($entity)
    {
        // TODO: Implement update() method.
    }

    public function checkExtension ($extenstion)
    {  $allowedExtenstion = array("wmv","avi","mp4");
        if(in_array($extenstion,$allowedExtenstion) )
            return true;
        else
            return false;

    }
}