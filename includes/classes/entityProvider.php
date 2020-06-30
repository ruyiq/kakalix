<?php
class EntityProvider{
    public static function getEntities($con, $categories, $limit){
        $sql = "SELECT * FROM categories";

        if($categoryid ！= null){
            $sql .= "WHERE categoryId =: categoryId";
        }

        $sql .= "ORDER BY RAND() LIMIT :limit ";

        $query = $con->prepare($sql);

        if（$categoryId != null){
            $query->bindValue(":categoryId", $categoryId);
        }

        $query->bindValue(":limit", $limit, PDO::PARAM_INT)
    }

}

?>