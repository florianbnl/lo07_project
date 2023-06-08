<!-- début ControleurrAdministrateur -->
<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRDV.php';


class ControleurAdministrateur {
    
    public static function administrateurInfo(){
        $results_specialite = ModelSpecialite::getAll();
        $results_administrateur = ModelPersonne::getAll(ModelPersonne::ADMINISTRATEUR);
        $results_praticien = ModelPersonne::getPraticiensInfo();//  getAll(ModelPersonne::PRATICIEN);
        $results_patient = ModelPersonne::getAll(ModelPersonne::PATIENT);
        $results_rendezvous = ModelRDV::getAll();
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewInfo.php';
        if (DEBUG){
            echo("ControleurAdministrateur : administrateurInfo : vue = $vue");
        }
        require ($vue);
    }
    
    public static function listePraticiensAvecSpecialite(){
        $results = ModelPersonne::getAll(1);//1 car on veut les praticiens
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewPraticiensAvecSpecialites.php';
        if (DEBUG){
            echo("ControleurAdministrateur : listePraticiensAvecSpecialite : vue = $vue");
        }
        require ($vue);
    }
    
    public static function nombrePraticiensParPatient(){
        $results = ModelPersonne::getNombrePraticiensParPatient();
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewPraticiensParPatient.php';
        if (DEBUG){
            echo("ControleurAdministrateur : nombrePraticiensParPatient : vue = $vue");
        }
        require ($vue);
    }
    
}
?>

<!-- fin ControleurAdministrateur -->