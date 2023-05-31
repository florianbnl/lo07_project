<!-- début ControleurSpecialites -->
<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialites.php';
/*require_once '../model/ModelRendezvous.php';*/

class ControleurSpecialites {
    public static function specialitesReadAll() {
        $results = ModelSpecialites::getAll();
        include 'config.php';
        $vue = $root . '/app/view/admistrateur/viewAllSpecialite';
        if (DEBUG){
            echo("ControleurSpecialites : specialitesReadAll : vue = $vue");
        }
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
    
    public static function selectionDUneSpecialite(){
        $results = ModelSpecialites::getAllId();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewId.php';
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
        $results = ModelSpecialites::insert(htmlspecialchars($_GET['label'])); //'nom' avant que je change
        
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewInserted.php';
        if (DEBUG){
            echo("ControleurSpecialites : SpecialitesCreated : vue = $vue");
        }
        require ($vue);
    }
    
}
?>
<!-- fin ControleurSpecialites -->