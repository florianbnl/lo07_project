<!-- début ControleurAcceuil-->
<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRDV.php';

class ControleurAccueil {
    
    public static function doctolibAccueil(){
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG){
             echo("ControllerAccueil : DoctolibAccueil : vue = $vue");
        }
        require ($vue);
    }
    
    public static function accueilDeconnexion(){
        include 'config.php';
        $_SESSION['login'] = "vide";
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG){
             echo("ControllerAccueil : DoctolibAccueil : vue = $vue");
        }
        require ($vue);
    }
    
    public static function accueilInscription(){
        $results = ModelSpecialite::getAll();
        include 'config.php';
        $vue = $root . '/app/view/seconnecter/viewInscription.php';
        if (DEBUG){
             echo("ControleurAccueil : AccueilInscription : vue = $vue");
        }
        require ($vue);
    }
    
    public static function accueilInscrire(){
        $verif = ModelPersonne::getVerifyLogin(htmlspecialchars($_GET['login']));
        include 'config.php';
        if ($verif == 0){
            $results = ModelPersonne::insert(htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse']), htmlspecialchars($_GET['login']), htmlspecialchars($_GET['password']), htmlspecialchars($_GET['statut']), htmlspecialchars($_GET['specialite_id'])); 
            $vue = $root . '/app/view/viewDoctolibAccueil.php';
        }
        else{
            $results = ModelSpecialite::getAll();
            $vue = $root . '/app/view/seconnecter/viewInscription.php'; 
        }
        require($vue);
    }
    
    public static function accueilLogin(){
        include 'config.php';
        $vue = $root . 'app/view/seconnecter/viewLogin.php';
        if (DEBUG){
             echo("ControllerAccueil : AccueilLogin : vue = $vue");
        }
        require($vue);
    }
    
    public static function accueilLogined(){
        $verif = ModelPersonne::getPasswordLogin(htmlspecialchars($_GET['login']), htmlspecialchars($_GET['password']));
        include 'config.php';
        if ( $verif == 1){
            $vue = $root . '/app/view/viewDoctolibAccueil.php';
        }
        else{
            $vue = $root . '/app/view/seconnecter/viewLogin.php';
        }
        if (DEBUG){
             echo("ControllerAccueil : AccueilLogined : vue = $vue");
        }
        require($vue);
    }
    
    public static function accueilInnovation(){
        include 'config.php';
        $vue = $root . 'app/view/innovations/viewInnovation.php';
        if (DEBUG){
             echo("ControllerAccueil : AccueilLogin : vue = $vue");
        }
        require($vue);
    }
}
?>
<!-- fin ControleurAcceuil-->