<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRDV.php';

class ControleurRDV {
    
    public static function praticienReadDisponibilite(){
        include 'config.php';
        $results = ModelRDV::getPraticienDisponibilite($_SESSION['login']->getId());
        $vue = $root . '/app/view/praticien/viewDisponibilites.php';
        if (DEBUG){
            echo("ControleurRDV : praticienReadDisponibilite : vue = $vue");
        }
        require ($vue);
    }
    
    
    
    public static function ajoutDisponibilites(){
        include 'config.php';
        $vue = $root. '/app/view/praticien/viewInsert.php';
        if (DEBUG){
            echo("ControleurRDV : ajoutDisponibilites : vue = $vue");
        }
        require($vue);
    }
    
    public static function listeRDVPraticien(){
        $results = ModelRDV::getRDVPraticien($_SESSION['login']->getId());
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewAllRdv.php';
        if (DEBUG){
            echo("ControleurRDV : listeRDVPraticien : vue = $vue");
        }
        require ($vue);
    }
    
    public static function listeRDVPatient(){
        $results = ModelRDV::getRDVOne(htmlspecialchars($_SESSION['login']->getId()));
        include 'config.php';
        $vue = $root . '/app/view/patient/viewAllRdv.php';
        if (DEBUG){
            echo("ControleurRDV : listeRDVPatient : vue = $vue");
        }
        require ($vue);
    }
    
    public static function disponibilitesAjoutees(){
        $valeur = $_GET['rdv_nombre'];
        $date = $_GET['rdv_date'];
        if (Model::verifyInputInt($valeur, 1, 10) == 0 || Model::verifyInputDate($date) == 0){
            ControleurRDV::ajoutDisponibilites();
        }
        else {
            $results = ModelRDV::disponibilitesAjoutees();
            include 'config.php';
            $vue = $root . '/app/view/praticien/viewInserted.php';
            if (DEBUG){
                echo("ControleurRDV : disponibilitesAjoutees : vue = $vue");
            }
            require ($vue);
        }
        
    }
    
    public static function priseDeRDV(){
        $results = ModelPersonne::getAll(ModelPersonne::PRATICIEN);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewPraticien.php';
        if (DEBUG){
            echo("ControleurRDV : priseDeRDV : vue = $vue");
        }
        require ($vue);
    }
    
    public static function disponibilitesPraticien(){
        $results = ModelRDV::getPraticienDisponibilite($_GET['id']);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewRDVPraticien.php';
        if (DEBUG){
            echo("ControleurRDV : disponibilitesPraticien : vue = $vue");
        }
        require ($vue);
    }
    
    public static function RDVAjoutPatient(){
        $results = ModelRDV::modify(htmlspecialchars($_GET['praticien_id']), htmlspecialchars($_GET['rdv_date']));
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG){
             echo("ControleurRDV : RDVajoutPatient : vue = $vue");
        }
        require ($vue);
    }
}
?>