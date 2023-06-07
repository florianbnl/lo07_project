
<!-- ----- debut ModelRDV -->

<?php
require_once 'Model.php';

class ModelRDV {
    
    public static function getAll(){
        try{
           $database = Model::getInstance();
            $query = "select * from rendezvous";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC); 
            print_r($results);
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }
    
    public static function getPraticienDisponibilite(){
        try{
            $database = Model::getInstance();
            $query = 'select rdv_date from rendezvous where patient_id = 0';
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO:: FETCH_COLUMN, 0);
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $eX->getCode(), $eX->getMessage());
            return -1;
        }
    }
    
    public static function disponibilitesAjoutees(){
        $rdv_date = $_GET['rdv_date'];
        $rdv_nombre = $_GET['rdv_nombre'];
        try{
            $database = Model::getInstance();
            $query = 'select rdv_date from rendezvous';
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $eX->getCode(), $eX->getMessage());
        }       
    }
    
    public static function getRDVPraticien($id){
        //affiche la liste des rendez-vous du praticien avec id = $id --> where id_patient > 0
    }
    
    public static function getRDVPatient($id){
        //affiche la liste des rendez-vous du patient avec id = $id
    }
}

?>
<!-- ----- fin ModelRDV -->
