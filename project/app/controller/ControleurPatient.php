<!-- début ControleurPatient -->
<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialites.php';
/*require_once '../model/ModelRendezvous.php';*/

class ControleurPatient {
    public static function patientReadInfo(){
        $results = ModelPersonne::getPersonneInfo();
        include 'config.php';
        $vue = $root . '/app/view/Patient/viewMonCompte';
        if (DEBUG){
            echo("ControleurPatient : PatientReadInfo : vue = $vue");
        }
        require($vue);
    }
    
    public static function listeRDVPatient(){
        $results = ModelRDV::getRDVPatient($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewAllRdv.php';
        if (DEBUG){
            echo("ControleurAdministrateur : listeRDVPatient : vue = $vue");
        }
        require ($vue);
    }
    
    public static function priseDeRDV(){
        //méthode pour prendre un rdv avec un médecin (2 formulaires successifs)
    }
}
?>
<!-- fin ControleurPatient -->