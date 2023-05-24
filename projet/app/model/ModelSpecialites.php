
<!-- ----- debut ModelSpecialites -->

<?php
require_once 'Model.php';

class ModelSpecialites {
    private $specialite = array();

 public function __construct() {
    $this->specialite[0] = "Je ne suis pas praticien";
    $this->specialite[1] = "Médecin généraliste";
    $this->specialite[2] = "Infirmier";
    $this->specialite[3] = "Dentiste";
    $this->specialite[4] = "Sage-femme";
    $this->specialite[5] = "Ostéopathe";
    $this->specialite[6] = "Kinésithérapeute";
}

}

?>
<!-- ----- fin ModelSpecialites -->
