<?php
class Entity {
    private $con, $sqlData;

    public function __construct($con, $input) {
        $this->con = $con;
        $this->input = $input;
        
        if(is_array($input)) {
            $this -> sqlData = $input;
        }
        else {
            $query = $this->con->prepare("SELECT * FROM entities WHERE id=:id");
            $query->bindValue(":id", $input);
            $query->execute();
            $this->sqlData = fetch(PDO::FETCH_ASSOC);
        }
        
    }

    public function getId() {
        return $this->sqlData["id"];
    }

    public function getName() {
        return $this->sqlData["name"];
    }

    public function getThumbnail() {
        return $this->sqlData["thumbnail"];
    }

    public function getPreview() {
        return $this->sqlData["preview"];
    }
}   

?>