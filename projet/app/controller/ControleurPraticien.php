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
}
?>
<!-- début ControleurPraticien -->