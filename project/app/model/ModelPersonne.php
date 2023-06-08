<?php

require_once 'Model.php';



class ModelPersonne {
    const ADMINISTRATEUR = 0;
    const PRATICIEN = 1;
    const PATIENT = 2;
    
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $login;
    private $password;
    private $statut;
    private $specialite;
    
    public function __construct($id=null, $nom=null, $prenom=null, $adresse=null, $login=null, $password=null, $statut=null, $specialite=null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->login = $login;
        $this->password = $password;
        $this->statut = $statut;
        $this->specialite = $specialite;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function getSpecialite() {
        return $this->specialite;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse){
        $this->adresse = $adresse;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setStatut($statut){
        $this->statut = $statut;
    }
    
    public function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }
    
    public static function getAll($param){
        try{
           $database = Model::getInstance();
            $query = "select id, nom, prenom, adresse, specialite_id from personne where statut = :param and nom <> '?'";
            $statement = $database->prepare($query);
            $statement->execute([
                ':param' => $param
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            switch($param){
                case 1:
                    $praticiensInfo = [];
                    foreach ($results as $element){
                        $element["specialite"] = ControleurSpecialites::convertIdSpecialiteToString($element['specialite_id']);
                        $praticiensInfo[] = $element;
                    }
                    return $praticiensInfo;
                    break;
                default:
                    return $results;
            }                
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        } 
    }
    
    public static function getOne($id){
        try {
            $database = Model::getInstance();
            $query = "select * from personne where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
              'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
           } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
           }
    }

    public static function getNombrePraticiensParPatient(){
        try{
            $database = Model::getInstance();
            $query = "select P.nom, P.prenom, count(distinct R.praticien_id) as nombre_praticiens from personne as P join rendezvous as R on P.id = R.patient_id where P.id <> 0 group by P.id, P.nom, P.prenom";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_BOTH);
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }
    
    public static function getPersonneInfo(){
        try{
            $database = Model::getInstance();
            $query = "select * from personne where id =" . $_SESSION["id"];
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }
    
    public static function getPraticiensInfo(){
        try{
            $database = Model::getInstance();
            $query = "select * from personne where statut = 1";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $praticiensInfo = [];
            foreach ($results as $element){
                $element["specialite"] = ControleurSpecialites::convertIdSpecialiteToString($element['specialite_id']);
                $praticiensInfo[] = $element;
            }
            return $praticiensInfo;
        } catch (Exception $ex) {
             printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }
    
    public static function getPasswordLogin($login, $password){
        try{
            $database = Model::getInstance();
            $query = "SELECT * FROM personne WHERE login = :login AND password = :password";
            $statement = $database->prepare($query);
            $statement->execute([
                ':login' => $login,
                ':password' => $password,
            ]);
            $tuple = $statement->fetch(PDO::FETCH_ASSOC);

            if ($tuple) {
                $results = new ModelPersonne();
                $results->setId($tuple['id']);
                $results->setNom($tuple['nom']);
                $results->setPrenom($tuple['prenom']);
                $results->setAdresse($tuple['adresse']);
                $results->setLogin($tuple['login']);
                $results->setPassword($tuple['password']);
                $results->setSpecialite($tuple['specialite_id']);
                $results->setStatut($tuple['statut']);
                $_SESSION['login'] = $results;
                $verif = 1;
            } else {
                $verif = 0;
            }

            return $verif;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }


    
    public static function getVerifyLogin($login){
        try{
            print_r($login);
            $database = Model::getInstance();
            $query = "select count(id) from personne where login = :login";
            $statement = $database->prepare($query);
            $statement->execute([
                ':login' => $login,
            ]);
            $tuple = $statement->fetch();
            print_r($tuple);
            if ($tuple[0]==0){
                $results=0;
            }else{
                $results = 1;
            }
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }
    
    public static function insert($nom, $prenom, $adresse, $login, $password, $statut, $specialite_id){
        try{
            $database = Model::getInstance();
        
            $query = "select max(personne.id) from personne";
            $statement = $database->prepare($query);
            $statement->execute();
            $tuple = $statement->fetch();
            $id = $tuple[0];
            $id++;

            $query = "insert into personne values (:id, :nom, :prenom, :adresse, :login, :password, :statut, :specialite_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                ':id' => $id,
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':adresse' => $adresse,
                ':login' => $login,
                ':password' => $password,
                ':statut' => $statut,
                ':specialite_id' => $specialite_id
            ]);
            $results = new ModelPersonne();
            $results->setId($id);
            $results->setNom($nom);
            $results->setPrenom($prenom);
            $results->setAdresse($adresse);
            $results->setLogin($login);
            $results->setPassword($password);
            $results->setSpecialite($specialite_id);
            $results->setStatut($statut);
            $_SESSION['login'] = $results;
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return -1;
        }
    }
    
}
