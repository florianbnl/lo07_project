<!-- début ControleurPatient -->
<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRDV.php';

class ControleurPatient {
    public static function patientReadInfo(){
        $results = ModelPersonne::getPersonneInfo();
        include 'config.php';
        $vue = $root . '/app/view/patient/viewMonCompte.php';
        if (DEBUG){
            echo("ControleurPatient : PatientReadInfo : vue = $vue");
        }
        require($vue);
    }
    
}
?>
<!-- fin ControleurPatient -->