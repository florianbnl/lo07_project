<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRDV.php';

class ControleurSpecialites {
    public static function specialitesReadAll() {
        $results = ModelSpecialite::getAll();
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllSpecialite.php';
        if (DEBUG){
            echo("ControleurSpecialites : specialitesReadAll : vue = $vue");
        }
        require($vue);
    }
    
    public static function specialitesReadOne(){
        $specialite_id = $_GET['id'];
        $results = ModelSpecialite::getOne($specialite_id);
        
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAllSpecialite.php';
        if (DEBUG){
            echo("ControleurSpecialites : SpecialitesReadOne : vue = $vue");
        }
        require ($vue);
    }
    
    public static function specialitesCreate(){
        require 'config.php';
        $vue = $root . '/app/view/administrateur/viewInsert.php';
        if (DEBUG){
            echo("ControleurSpecialites : SpecialitesCreate : vue = $vue");
        }
        require ($vue);
    }
    
    public static function specialitesCreated(){
        $valeur = $_GET['label'];
        if (Model::verifyInputString($valeur) == 0){
            ControleurSpecialites::specialitesCreate();
        }
        else {
            $results = ModelSpecialite::insert(htmlspecialchars($_GET['label']));
            include 'config.php';
            $vue = $root . '/app/view/administrateur/viewInserted.php';
            if (DEBUG){
                echo("ControleurSpecialites : SpecialitesCreated : vue = $vue");
            }
            require ($vue);
        }
        
    }
    
    
    public static function selectionDUneSpecialite(){
        $results = ModelSpecialite::getAllId();
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewId.php';
        if (DEBUG){
            echo("ControleurSpecialites : selectionDUneSpecialite : vue = $vue");
        }
        require ($vue);
    }
    
}
?>