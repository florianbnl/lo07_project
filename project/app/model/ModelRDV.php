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
              ':id' => $id,
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
        $praticien_id = $_SESSION['login']->getId();
        
        // Définition de l'heure de départ
        $heure_debut = strtotime('10:00', strtotime($rdv_date));
        try{
            for ($i = 0; $i < $rdv_nombre; $i++) {
            // Calcule la date et l'heure du rendez-vous en ajoutant l'heure de départ et la durée en secondes
                $rdv_timestamp = $heure_debut + ($i * 3600); // Ajoute une heure (3600 secondes) à chaque itération

                // Formate la date et l'heure du rendez-vous selon le format attendu ('Y-m-d H:i:s')
                $rdv_date = date('Y-m-d H:i:s', $rdv_timestamp);
                $formattedDate = date('Y-m-d à H\hi', strtotime($rdv_date));
                echo($formattedDate);

                ModelRDV::insert($praticien_id, $formattedDate);
            }
            return 1;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return -1;
        }
    
    }
    
    public static function insert($praticien_id, $rdv_date){
         try{
             $database = Model::getInstance();
             $query = "select max(rendezvous.id) from rendezvous";
             $statement = $database->prepare($query);
             $statement->execute();
             $tuple = $statement->fetch();
             $id = $tuple[0];
             $id++;  
             $found = ModelRDV::findRDV($rdv_date, $praticien_id);
             if (!$found){
                 $query = "insert into rendezvous (id, patient_id, praticien_id, rdv_date) values (:id, 0, :praticien_id, :rdv_date)";
                $statement = $database->prepare($query);
                $statement->execute([
                    ':id' => $id,
                    ':praticien_id' => $praticien_id,
                    ':rdv_date' => $rdv_date,
                ]);
                $results = new ModelRDV();
                $results->setId($id);
                $results->setPraticien_id(0);
                $results->setPraticien_id($praticien_id);
                $results->setRdv_date($rdv_date);
             }
             
             return $id;
         } catch (Exception $ex) {
             printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
             return -1;
         }
     }
     
    public static function findRDV($rdv_date, $praticien_id){
        try {
            $database = Model::getInstance();
            $query = "SELECT COUNT(*) FROM rendezvous WHERE rdv_date = :rdv_date AND praticien_id = :praticien_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'rdv_date' => $rdv_date,
                'praticien_id' => $praticien_id
            ]);

            $count = $statement->fetchColumn();

            if ($count > 0) {
                return 1; // Le praticien a déjà un rendez-vous à la date spécifiée
            } else {
                return 0; // Le praticien n'a pas de rendez-vous à la date spécifiée
            }
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
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
    
    public static function getRDVPraticien($id){
        try{
           $database = Model::getInstance();
            $query = "select patient.nom as nom_patient, patient.prenom as prenom_patient, rdv_date from rendezvous, personne as patient cross join personne as praticien where rendezvous.patient_id = patient.id and rendezvous.praticien_id = praticien.id and rendezvous.patient_id > 0 and rendezvous.praticien_id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC); 
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }
      
}

?>