
<!-- ----- debut ModelRDV -->

<?php
require_once 'Model.php';

class ModelRDV {
    public static function getPraticienDisponibilite(){
        try{
            $database = Model::getInstance();
            $query = 'select rdv_date from rendrezvous where patient_id = 0';
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO:: FETCH_COLUMN, 0);
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $eX->getCode(), $eX->getMessage());
            return -1;
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
