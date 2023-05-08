<?php
interface CRUD{

    public function create($entity);
    public function delete($id);
    public function retrive($id);
    public function update ($entity);


}