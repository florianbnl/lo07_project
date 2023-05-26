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
        include 'config.php';
        $vue = $root . '/app/view/seconnecter/viewInscription.php';
        if (DEBUG){
             echo("ControllerAccueil : DoctolibAccueil : vue = $vue");
        }
        require ($vue);
    }
    
    public static function AccueilInscrire(){
        $results = ModelPersonne::insert(htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse']), htmlspecialchars($_GET['login']), htmlspecialchars($_GET['password']), htmlspecialchars($_GET['statut']), htmlspecialchars($_GET['specialite']));
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
    }
}
?>
<!-- fin ControleurAcceuil-->