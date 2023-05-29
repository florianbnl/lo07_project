
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerVin.php');
require ('../controller/ControllerProducteur.php');
require ('../controller/ControllerCave.php');
// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
 case "DoctolibAccueil":
 case "AccueilDeconnexion":
 case "AccueilInscription":
 case "AccueilInscription":
 case "AccueilInscrire":
 case "AccueilLogin":
 case "AccueilLogined":
     ControleurAccueil::$action();
     break;

 case "AdministrateurInfo":
     ControleurrAdministrateur::$action();
     break;
 
 case "PatientReadInfo":
     ControleurPatient::$action();
     break;
 
 case "PraticienReadSpecialites":
 case "PraticienReadDisponibilite":
 case "PraticienCreate":
 case "PraticienCreated":
     ControleurPraticien::$action();
     break;
 
 case "SpecialitesReadAll":
 case "SpecialitesReadOne":
 case "SpecialitesCreate":
 case "SpecialitesCreated":
     ControleurSpecialites::$action();
     break;

 // Tache par défaut
 default:
     $action = "DoctolibAccueil";
     ControllerAccueil::$action();
}
?>
<!-- ----- Fin Router1 -->

