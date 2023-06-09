<!-- début ControleurRDV-->
<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRDV.php';

class ControleurRDV {
    
    public static function praticienReadDisponibilite(){
        include 'config.php';
        $results = ModelRDV::getPraticienDisponibilite($_SESSION['login']->getId());//ça marche !
        $vue = $root . '/app/view/praticien/viewDisponibilites.php';
        if (DEBUG){
            echo("ControleurPraticien : viewDisponibilite : vue = $vue");
        }
        require ($vue);
    }
    
    
    
    public static function ajoutDisponibilites(){
        include 'config.php';
        $vue = $root. '/app/view/praticien/viewInsert.php';
        if (DEBUG){
            echo("ControleurPraticien : ajoutDisponibilites : vue = $vue");
        }
        require($vue);
    }
    
    public static function integrationNouvellesDisponibilites(){
        //fct qui crée les nouvelles dispos
    }
    
    public static function listeRDVPraticien(){
        $results = ModelRDV::getRDVPraticien($_SESSION['login']->getId());
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewAllRdv.php';
        if (DEBUG){
            echo("ControleurAdministrateur : listeRDVPraticien : vue = $vue");
        }
        require ($vue);
    }
    
    public static function listeRDVPatient(){
        $results = ModelRDV::getRDVOne(htmlspecialchars($_SESSION['login']->getId()));
        include 'config.php';
        $vue = $root . '/app/view/patient/viewAllRdv.php';
        if (DEBUG){
            echo("ControleurAdministrateur : listeRDVPatient : vue = $vue");
        }
        require ($vue);
    }
    
    public static function disponibilitesAjoutees(){
        ModelRDV::disponibilitesAjoutees();
    }
    
    public static function priseDeRDV(){
        $results = ModelPersonne::getAll(ModelPersonne::PRATICIEN);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewPraticien.php';
        if (DEBUG){
            echo("ControleurAdministrateur : listeRDVPatient : vue = $vue");
        }
        require ($vue);
    }
    
    public static function disponibilitesPraticien(){
        $results = ModelRDV::getPraticienDisponibilite($_GET['id']);
        print_r($results);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewRDVPraticien.php';
        if (DEBUG){
            echo("ControleurAdministrateur : listeRDVPatient : vue = $vue");
        }
        require ($vue);
    }
    
    public static function RDVAjoutPatient(){
        print_r($_GET);
        $results = ModelRDV::modify(htmlspecialchars($_GET['praticien_id']), htmlspecialchars($_GET['rdv_date']));
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG){
             echo("ControllerRDV : RDVajoutPatient : vue = $vue");
        }
        require ($vue);
    }
}
?>
<!-- fin ControleurRDV-->