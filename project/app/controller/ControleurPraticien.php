<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRDV.php';

class ControleurPraticien {
    
    public static function praticienReadSpecialites(){
        $results = ModelPersonne::getPraticiensInfo();
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewPraticien.php';
        if (DEBUG){
            echo("ControleurPraticien : praticienReadSpecialites : vue = $vue");
        }
        require ($vue);
    }
    
    public static function listePatients(){
        $results = ModelRDV::getPatients($_SESSION['login']->getId());
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewAllPatients.php';
        if (DEBUG){
            echo("ControleurPraticien : listePatients : vue = $vue");
        }
        require ($vue);
    }
    
    
}
?>
