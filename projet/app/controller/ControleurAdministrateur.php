<!-- début ControleurrAdministrateur -->
<?php

require_once '../model/ModelPersonne';
require_once '../model/ModelSpecialite';
require_once '../model/ModelRendezvous';


class ControllerAdministrateur {
    
    public static function administrateurInfo(){
        $results_specialite = ModelSpecialite::getAll();
        $results_administrateur = ModelPersonne::getAll(ModelPersonne::ADMINISTRATEUR);
        $results_praticien = ModelPersonne::getAll(ModelPersonne::PRATICIEN);
        $results_patient = ModelPersonne::getAll(ModelPersonne::PATIENT);
        $results_rendezvous = ModelRendezvous::getAll();
        
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewInfo.php';
        require ($vue);
    }
}
?>

<!-- fin ControleurAdministrateur -->