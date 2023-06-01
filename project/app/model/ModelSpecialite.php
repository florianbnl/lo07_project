
<!-- ----- debut ModelSpecialite -->

<?php
require_once 'Model.php';

class ModelSpecialite {
    private $id, $label;
    
    public function __construct($id=NULL, $label=NULL) {
        $this->id = $id;
        $this->label = $label;
    }

    
    public function getId() {
        return $this->id;
    }

    public function getLabel() {
        return $this->label;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setLabel($label){
        $this->label = $label;
    }

        
    public static function getAll(){
        try {
            $database = Model::getInstance();
            $query = "select * from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
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
                ':id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
        
   }
   
    public static function insert($label){
         try{
             $database = Model::getInstance();

             $query = "select max(specialite.id) from specialite";
             $statement = $database->query($query);
             $tuple = $statement->fetch();
             $id = $tuple[0];
             $id++;  

             $query = "insert into specialite (id, label) values (:id, :label)";
             $statement = $database->prepare($query);
             $statement->execute([
                 ':id' => $id,
                 ':label' => $label
             ]);
             $results = new ModelSpecialite();
             $results->setId($id);
             $results->setLabel($label); 
             return $id;
         } catch (Exception $ex) {
             printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
             return -1;
         }
     }


}

?>
<!-- ----- fin ModelSpecialite -->
