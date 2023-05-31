<!-- début ControleurRDV-->
<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialites.php';
/*require_once '../model/ModelRendezvous.php';*/

class ControleurRDV {
    
    public static function praticienReadDisponibilite(){
        include 'config.php';
        $results = ModelRDV::getPraticienDisponibilite();//mettre en paramètre l'id du praticien ($_SESSION['id']) ?
        $vue = $root . '/app/view/praticien/viewDisponibilite.php';
        if (DEBUG){
            echo("ControleurPraticien : viewDisponibilite : vue = $vue");
        }
        require ($vue);
    }
    
    
    
    public static function ajoutDisponibilites(){
        include 'config.php';
        $vue = $root. '/app/view/praticien/viewInsert.php';
        if (DEBUG){
            echo("ControleurPraticien : ajoutDisponibilites : vue = $vue");
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
<!-- fin ControleurRDV-->