
<!-- ----- debut ModelRDV -->

<?php
require_once 'Model.php';

class ModelRDV {
    private $id, $patient_id, $praticien_id, $rdv_date;
    
    public function __construct($id=null, $patient_id=null, $praticien_id=null, $rdv_date=null) {
        $this->id = $id;
        $this->patient_id = $patient_id;
        $this->praticien_id = $praticien_id;
        $this->rdv_date = $rdv_date;
    }

    public function getId() {
        return $this->id;
    }

    public function getPatient_id() {
        return $this->patient_id;
    }

    public function getPraticien_id() {
        return $this->praticien_id;
    }

    public function getRdv_date() {
        return $this->rdv_date;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setPatient_id($patient_id){
        $this->patient_id = $patient_id;
    }

    public function setPraticien_id($praticien_id){
        $this->praticien_id = $praticien_id;
    }

    public function setRdv_date($rdv_date){
        $this->rdv_date = $rdv_date;
    }

        
    public static function getAll(){
        try{
           $database = Model::getInstance();
            $query = "select patient.nom as nom_patient, patient.prenom as prenom_patient, praticien.nom as nom_praticien, praticien.prenom as prenom_praticien, rdv_date from rendezvous, personne as patient cross join personne as praticien where rendezvous.patient_id = patient.id and rendezvous.praticien_id = praticien.id ";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC); 
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }
    
    public static function getPraticienDisponibilite($id){
        try{
            $database = Model::getInstance();
            $query = "select * from rendezvous where patient_id = 0 and praticien_id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
              ':id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
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
            return $results; //il n'y avait pas avant
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $eX->getCode(), $eX->getMessage());
        }       
    }
    
    public static function getPatients($id){
        try{
            $database = Model::getInstance();
            $query = "select distinct patient.nom, patient.prenom, patient.adresse from rendezvous as r join personne as patient on r.patient_id = patient.id where r.praticien_id = :id and r.patient_id > 0";
            $statement = $database->prepare($query);
            $statement->execute([
              'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
             printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }
    
    public static function getRDVOne($id){
        try{
            $database = Model::getInstance();
            $query = "select patient.nom as nom_patient, patient.prenom as prenom_patient, praticien.nom as nom_praticien, praticien.prenom as prenom_praticien, rdv_date from rendezvous, personne as patient cross join personne as praticien where rendezvous.patient_id = patient.id and rendezvous.praticien_id = praticien.id and (patient.id = :id or praticien.id = :id)";
            $statement = $database->prepare($query);
            $statement->execute([
                ':id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;       
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }
    
    public static function modify($praticien_id, $rdv_date){
        try{
            $database = Model::getInstance();
            $query = "update rendezvous set patient_id = :patient_id where praticien_id = :praticien_id and rdv_date = :rdv_date";
            $statement = $database->prepare($query);
            $statement->execute([
                ':patient_id' => $_SESSION['login']->getId(),
                ':praticien_id' => $praticien_id,
                ':rdv_date' => $rdv_date
            ]);
            return 0;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return -1;
        }
    }
    
}

?>
<!-- ----- fin ModelRDV -->
