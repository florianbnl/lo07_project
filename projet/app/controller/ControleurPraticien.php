<!-- début ControleurPraticien -->
<?php

class ControleurPraticien {
    
    public static function PraticienReadSpecialites(){
        $results = ModelPersonne::getPraticiensInfo();
        
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewPraticien';
        if (DEBUG){
            echo("ControleurPraticien : PraticienreadSpecialites : vue = $vue");
        }
        require ($vue);
    }
    
    public static function PraticienReadDiponibilite(){
        include 'config.php';
        $results = ModelPersonne::getPraticienDisponibilite();
        $vue = $root . '/app/view/praticien/viewDisponibilite.php';
        if (DEBUG){
            echo("ControleurPraticien : PraticienReadDisponibilite : vue = $vue");
        }
        require ($vue);
    }
    
    public static function PraticienCreate(){
        include 'config.php';
        $vue = $root. '/app/view/praticien/viewInsert.php';
        if (DEBUG){
            echo("ControleurPraticien : Praticien Insert : vue = $vue");
        }
        require($vue);
    }
    
    public static function PraticienCreated(){
        /*faut faire la fonction pour ajouter des rdv*/
    }
    
    
}
?>
<!-- début ControleurPraticien -->