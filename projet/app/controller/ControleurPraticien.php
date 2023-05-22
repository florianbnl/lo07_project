<!-- début ControleurPraticien -->
<?php

class ControleurPraticien {
    
    public static function PraticienReadSpecialites(){
        $results = ModelPersonne::getPraticiensInfo();
        
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewPraticienSpecialites';
        if (DEBUG){
            echo("ControleurPraticien : PraticienreadSpecialites : vue = $vue");
        }
        require ($vue);
    }
}
?>
<!-- début ControleurPraticien -->