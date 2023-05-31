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
    
}
?>
<!-- fin ControleurPatient -->