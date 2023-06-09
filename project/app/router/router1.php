
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControleurAccueil.php');
require ('../controller/ControleurAdministrateur.php');
require ('../controller/ControleurPatient.php');
require ('../controller/ControleurPraticien.php');
require ('../controller/ControleurSpecialites.php');
require ('../controller/ControleurRDV.php');
// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
 case "doctolibAccueil":
 case "accueilDeconnexion":
 case "accueilInscription":
 case "accueilInscription":
 case "accueilInscrire":
 case "accueilLogin":
 case "accueilLogined":
 case "accueilInnovation":
     ControleurAccueil::$action();
     break;

 case "administrateurInfo":
 case "listePraticiensAvecSpecialite":
 case "nombrePraticiensParPatient":
     ControleurAdministrateur::$action();
     break;
 
 case "patientReadInfo":
     ControleurPatient::$action();
     break;
 
 case "praticienReadSpecialites":
 case "listePatients":
     ControleurPraticien::$action();
     break;
 
 case "specialitesReadAll":
 case "specialitesReadOne":
 case "specialitesCreate":
 case "specialitesCreated":
 case "selectionDUneSpecialite":
     ControleurSpecialites::$action();
     break;
 
 case "praticienReadDisponibilite":
 case "ajoutDisponibilites":
 case "integrationNouvellesDisponibilites":
 case "listeRDVPraticien":
 case "listeRDVPatient":
 case "priseDeRDV":
 case "disponibilitesAjoutees":
 case "disponibilitesPraticien":
 case "RDVAjoutPatient":
     ControleurRDV::$action();
     break;

 // Tache par défaut
 default:
     $action = "doctolibAccueil";
     ControleurAccueil::$action();
}
?>
<!-- ----- Fin Router1 -->

