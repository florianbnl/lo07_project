<!-- début ControleurPatient -->
<?php

class ControleurPatient {
    public static function PatientReadInfo(){
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