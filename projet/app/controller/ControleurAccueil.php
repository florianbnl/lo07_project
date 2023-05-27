<!-- début ControleurAcceuil-->
<?php
class ControleurAccueil {
    
    public static function DoctolibAccueil(){
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG){
             echo("ControllerAccueil : DoctolibAccueil : vue = $vue");
        }
        require ($vue);
    }
    
    public static function AccueilDeconnexion(){
        include 'config.php';
        $_SESSION['login'] = "vide";
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG){
             echo("ControllerAccueil : DoctolibAccueil : vue = $vue");
        }
        require ($vue);
    }
    
    public static function AccueilInscription(){
        $results = ModelSpecialites::getAll();
        include 'config.php';
        $vue = $root . '/app/view/seconnecter/viewInscription.php';
        if (DEBUG){
             echo("ControllerAccueil : AccueilInscription : vue = $vue");
        }
        require ($vue);
    }
    
    public static function AccueilInscrire(){
        $verif = ModelPersonne::getVerifyLogin(htmlspecialchars($_GET['login']));
        include 'config.php';
        if ($verif == 1){
            $results = ModelPersonne::insert(htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse']), htmlspecialchars($_GET['login']), htmlspecialchars($_GET['password']), htmlspecialchars($_GET['statut']), htmlspecialchars($_GET['specialite'])); 
            $vue = $root . '/app/view/viewDoctolibAccueil.php';
        }
        else{
            $vue = $root . '/app/view/seconnecter/viewInscription.php'; 
        }
        require($vue);
    }
    
    public static function AccueilLogin(){
        include 'config.php';
        $vue = $root . 'app/view/seconnecter/viewLogin';
        if (DEBUG){
             echo("ControllerAccueil : AccueilLogin : vue = $vue");
        }
        require($vue);
    }
    
    public static function AccueilLogined(){
        $verif = ModelPersonne::getPasswordLogin($_GET['login'], $_GET['password']);
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
    
}
?>
<!-- fin ControleurAcceuil-->