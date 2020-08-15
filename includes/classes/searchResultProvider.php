<?php
class SearchResultProvider{
    private $con, $username;

    public function __construct($con, $username){
        $this -> con = $con;
        $this -> username = $username;
    }

    public function getResult($inputTest){
        $entities = EntityProvider::getSearchEntities($this->con, $inputTest);
    }
}
?>