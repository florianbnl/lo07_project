<?php

require_once 'Model.php';
class ModelPersonne {
    public const ADMINISTRATEUR = 0;
    public const PRATICIEN = 1;
    public const PATIENT = 2;
    private $id, $nom, $prenom, $adresse, $login, $password, $statut, $specialite;
    
    public static function __construct($id=null, $nom=null, $prenom=null, $adresse=null, $login=null, $password=null, $statut=null, $specialite=null) {
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
    
    public function getSpecialite(){
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
        switch ($statut) {
            case self::ADMINISTRATEUR:
                $this->statut = 0;
                break;
            case self::PRATICIEN:
                $this->statut = 1;
                break;
            case self::PATIENT:
                $this->statut=2;
                break;

            default:
                break;
        }
    }
    
    public function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }
    
    public static function getAll($param){
        try{
           $database = Model::getInstance();
            $query = "select id, nom, prenom, adresse from personne where statut = $param";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC); 
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        } 
    }
    
    public static function getOne($id){
        try {
            $database = Model::getInstance();
            $query = "select * from vin where id = :id";
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

    public static function getPraticiensParPatient(){
        try{
            $database = Model::getInstance();
            $query = "select count(id where statut = 1), count(id where statut = 2 from personne";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
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
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
            return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }
    
    public static function getPraticiensInfo(){
        try{
            $database = Model::getInstance();
            $query = "select nom, prenom, specialite_id from personne where status = 1";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (Exception $ex) {
             printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }
    
    public static function getPasswordLogin($login, $password){
        try{
            $database = Model::getInstance();
            $query = "select count(id) where login = :login and password = :password";
            $statement = $database->prepare($query);
            $statement->exectute([
                'login' => $login,
                'password' => $password,
            ]);
            $tuple = $statement->fetch();
            if ($tuple['0']==0){
                $verif=0;
            }else{
                $verif = 1;
                $query = "select * from personne where login = $login";
                $statement = $database->prepare($query);
                $statement->exectute();
                $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelPersonne');
                $_SESSION['login'] = $results;
            }
            return $verif;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
        
    }
    
    public static function getVerifyLogin($login){
        try{
            $database = Model::getInstance();
            $query = "select count(id) where login = :login";
            $statement = $database->prepare($query);
            $statement->exectute([
                'login' => $login,
            ]);
            $tuple = $statement->fetch();
            if ($tuple['0']==0){
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
    
    public static function insert($nom, $prenom, $adresse, $login, $password, $statut, $specialite){
        try{
            $database = Model::getInstance();
        
            $query = "select max(id) from personne";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            $query = "insert into personne value (:id, :nom, :prenom, :adresse, :login, :password, :statut, :specialite)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenon' => $prenom,
                'adresse' => $adresse,
                'login' => $login,
                'password' => $password,
                'statut' => $statut,
                'specialite' => $specialite
            ]);
            
            $query = "select * from personne where id = $id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelPersonne');
            $_SESSION['login']=$results;
            return $id;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

}
