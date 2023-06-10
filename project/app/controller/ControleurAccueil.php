<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRDV.php';

class ControleurAccueil {
    
    public static function doctolibAccueil(){
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG){
             echo("ControleurAccueil : doctolibAccueil : vue = $vue");
        }
        require ($vue);
    }
    
    public static function accueilDeconnexion(){
        include 'config.php';
        $_SESSION['login'] = "vide";
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG){
             echo("ControleurAccueil : accueilDeconnexion : vue = $vue");
        }
        require ($vue);
    }
    
    public static function accueilInscription(){
        $results = ModelSpecialite::getAll();
        include 'config.php';
        $vue = $root . '/app/view/seconnecter/viewInscription.php';
        if (DEBUG){
             echo("ControleurAccueil : accueilInscription : vue = $vue");
        }
        require ($vue);
    }
    
    public static function accueilInscrire(){
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $adresse = $_GET['adresse'];
        $login = $_GET['login'];
        $password = $_GET['password'];
        if (Model::verifyInputString($nom) == 0 || Model::verifyInputString($prenom) == 0 || Model::verifyInputString($adresse) == 0 || Model::verifyInputString($login) == 0 || Model::verifyInputString($password) == 0){
                ControleurAccueil::accueilInscription();
        } else{
            $verif = ModelPersonne::getVerifyLogin(htmlspecialchars($_GET['login']));// vérifie si le login n'est pas déjà utilisé par qqn d'autre
            include 'config.php';
            if ($verif == 0){
                $results = ModelPersonne::insert(htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse']), htmlspecialchars($_GET['login']), htmlspecialchars($_GET['password']), htmlspecialchars($_GET['statut']), htmlspecialchars($_GET['specialite_id'])); 
                $vue = $root . '/app/view/viewDoctolibAccueil.php';
            } else{
                $results = ModelSpecialite::getAll();
                $vue = $root . '/app/view/seconnecter/viewInscription.php'; 
            }
            require($vue);
        
        }
        
    }
    
    public static function accueilLogin(){
        include 'config.php';
        $vue = $root . 'app/view/seconnecter/viewLogin.php';
        if (DEBUG){
             echo("ControleurAccueil : accueilLogin : vue = $vue");
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
             echo("ControleurAccueil : accueilLogined : vue = $vue");
        }
        require($vue);
    }
    
    public static function accueilInnovation(){
        $results = ModelPersonne::getAdresseNumber();
        include 'config.php';
        $vue = $root . 'app/view/innovations/viewInnovation.php';
        if (DEBUG){
             echo("ControleurAccueil : accueilInnovation : vue = $vue");
        }
        require($vue);
    }
}
?>