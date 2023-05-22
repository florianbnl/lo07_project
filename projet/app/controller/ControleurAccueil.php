<!-- début ControleurAcceuil-->
<?php
class ControleurAccueil {
    
    public static function caveAccueil(){
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG){
             echo("ControllerAccueil : DoctolibAccueil : vue = $vue");
        }
        require ($vue);
    }
}
?>
<!-- fin ControleurAcceuil-->