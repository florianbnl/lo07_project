<!-- début ControleurPraticien -->
<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
/*require_once '../model/ModelRendezvous.php';*/

class ControleurPraticien {
    
    public static function praticienReadSpecialites(){//à quoi sert cette fonction ?
        $results = ModelPersonne::getPraticiensInfo();
        
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewPraticien';
        if (DEBUG){
            echo("ControleurPraticien : PraticienreadSpecialites : vue = $vue");
        }
        require ($vue);
    }
    
    public static function listePatients(){
        $results = ModelRDV::getPatients($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllPatients.php';
        if (DEBUG){
            echo("ControleurAdministrateur : listeRDVPraticien : vue = $vue");
        }
        require ($vue);
    }
    
    
}
?>
<!-- début ControleurPraticien -->