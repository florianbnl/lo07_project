<!-- début ControleurrAdministrateur -->
<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialites.php';
/*require_once '../model/ModelRendezvous.php';*/


class ControleurAdministrateur {
    
    public static function administrateurInfo(){
        $results_specialite = ModelSpecialite::getAll();
        $results_administrateur = ModelPersonne::getAll(ModelPersonne::ADMINISTRATEUR);
        $results_praticien = ModelPersonne::getAll(ModelPersonne::PRATICIEN);
        $results_patient = ModelPersonne::getAll(ModelPersonne::PATIENT);
        $results_rendezvous = ModelRendezvous::getAll();
        
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewInfo.php';
        if (DEBUG){
            echo("ControleurAdministrateur : administrateurInfo : vue = $vue");
        }
        require ($vue);
    }
    
    public static function listeSpecialites(){
        $results = ModelSpecialites::getAll();
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllSpecialite.php';
        if (DEBUG){
            echo("ControleurAdministrateur : administrateurSpecialites : vue = $vue");
        }
        require ($vue);
    }
    
    public static function selectionDUneSpecialite(){
        $results = ModelSpecialites::getAllId();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewId.php';
        require ($vue);
    }


    public static function specialitesReadOne(){
        $specialite_id = $_GET['id'];
        $results = ModelSpecialites::getOne($specialite_id);
        
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAllSpecialite';
        if (DEBUG){
            echo("ControleurSpecialites : SpecialitesReadOne : vue = $vue");
        }
        require ($vue);
    }
    
    public static function specialitesCreate(){//copie ControleurSpecialites
        require 'config.php';
        $vue = $root . '/app/view/administrateur/viewInsert.php';
        if (DEBUG){
            echo("ControleurSpecialites : SpecialitesCreate : vue = $vue");
        }
        require ($vue);
    }
    
    public static function specialitesCreated(){//copie ControleurSpecialites
        $results = ModelSpecialites::insert(htmlspecialchars($_GET['label'])); //'nom' avant que je change
        
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewInserted.php';
        if (DEBUG){
            echo("ControleurSpecialites : SpecialitesCreated : vue = $vue");
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