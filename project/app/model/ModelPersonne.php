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
        $_SESSION['login'] = $this;
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
           $query  = "select personne.*, specialite.label as specialite from personne, specialite where statut = :param and specialite.id = personne.specialite_id";
            $statement = $database->prepare($query);
            $statement->execute([
                ':param' => $param
            ]);
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
            $query = "select * from personne where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                ':id' => $_SESSION['login']->getId()
            ]);
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
            $database = Model::getInstance();
            $query = "select count(id) from personne where login = :login";
            $statement = $database->prepare($query);
            $statement->execute([
                ':login' => $login,
            ]);
            $tuple = $statement->fetch();
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
    
    public static function getAdresseNumber(){
        try{
            $database = Model::getInstance();
            $query = "select adresse, count(id) as praticien from personne where statut = 1 group by adresse ";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_BOTH);
            $accessToken = 'pk.eyJ1IjoiZmxvZmxvc2giLCJhIjoiY2xpb2xvZTc0MDlxZzNmbGJmeHhhZDU0NCJ9.HRpcV6c-LpNUbBifaD5JCg';
            $i = 0;
            foreach ($results as $element) {
                $address = $element['adresse'];

                // Construire l'URL de requête pour chaque adresse
                $url = "https://api.mapbox.com/geocoding/v5/mapbox.places/" . urlencode($address) . ".json?access_token=" . $accessToken;

                // Récupérer les données JSON de l'API
                $response = file_get_contents($url);

                if ($response === false) {
                    die('Erreur lors de la récupération des données de l\'API.');
                }

                $data = json_decode($response, true);

                // Vérifier si des correspondances ont été trouvées
                if (!empty($data['features'])) {
                    $coordinates = $data['features'][0]['center'];
                }
                $results[$i]["coordinates"] = $coordinates;
                $i++;
            }
                return $results;
        } catch (Exception $ex) {
            printf("%s - %s<p/>\n", $ex->getCode(), $ex->getMessage());
            return NULL;
        }
    }
    
}
