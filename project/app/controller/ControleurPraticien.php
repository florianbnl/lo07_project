<!-- début ControleurPraticien -->
<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialites.php';
/*require_once '../model/ModelRendezvous.php';*/

class ControleurPraticien {
    
    public static function praticienReadSpecialites(){
        $results = ModelPersonne::getPraticiensInfo();
        
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewPraticien';
        if (DEBUG){
            echo("ControleurPraticien : PraticienreadSpecialites : vue = $vue");
        }
        require ($vue);
    }
    
    public static function praticienReadDisponibilite(){
        include 'config.php';
        $results = ModelPersonne::getPraticienDisponibilite();//mettre en paramètre l'id du praticien ($_SESSION['id']) ?
        $vue = $root . '/app/view/praticien/viewDisponibilite.php';
        if (DEBUG){
            echo("ControleurPraticien : viewDisponibilite : vue = $vue");
        }
        require ($vue);
    }
    
    public static function praticienCreate(){// pas plutot 'ajoutDisponibilités' ?
        include 'config.php';
        $vue = $root. '/app/view/praticien/viewInsert.php';
        if (DEBUG){
            echo("ControleurPraticien : Praticien Insert : vue = $vue");
        }
        require($vue);
    }
    
    public static function integrationNouvellesDisponibilites(){
        //fct qui crée les nouvelles dispos
    }
    
    public static function listeRDVPraticien(){
        $results = ModelRDV::getRDVPraticien($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllRdv.php';
        if (DEBUG){
            echo("ControleurAdministrateur : listeRDVPraticien : vue = $vue");
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