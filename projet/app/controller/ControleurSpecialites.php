<!-- début ControleurSpecialites -->
<?php

class ControleurSpecialites {
    public static function SpecialitesReadAll() {
        $results = ModelSpecialites::getAll();
        include 'config.php';
        $vue = $root . '/app/view/admistrateur/viewAllSpecialite';
        if (DEBUG){
            echo("ControleurSpecialites : SpecialitesReadAll : vue = $vue");
        }
        require ($vue);
        
    }
    
    public static function SpecialitesReadOne(){
        $specialite_id = $_GET['id'];
        $results = ModelSpecialites::getOne($specialite_id);
        
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAllSpecialite';
        if (DEBUG){
            echo("ControleurSpecialites : SpecialitesReadOne : vue = $vue");
        }
        require ($vue);
    }
    
    public static function SpecialitesCreate(){
        require 'config.php';
        $vue = $root . '/app/view/administrateur/viewInsert.php';
        if (DEBUG){
            echo("ControleurSpecialites : SpecialitesCreate : vue = $vue");
        }
        require ($vue);
    }
    
    public static function SpecialitesCreated(){
        $results = ModelSpecialites::insert(htmlspecialchars($_GET['nom']));
        
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