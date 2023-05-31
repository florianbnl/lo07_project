
<!-- ----- debut ModelSpecialites -->

<?php
require_once 'Model.php';

class ModelSpecialites {
    public static function getAll(){
        try {
            $database = Model::getInstance();
            $query = "select * from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialites");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // retourne une liste des id
    public static function getAllId() {
      try {
       $database = Model::getInstance();
       $query = "select id from specialite";
       $statement = $database->prepare($query);
       $statement->execute();
       $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
       return $results;
      } catch (PDOException $e) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
       return NULL;
      }
    }
    
    public static function getOne($id) {
        try {
            $database = Model::getInstance();
            $query = "select * from specialite where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
   }


}

?>
<!-- ----- fin ModelSpecialites -->
