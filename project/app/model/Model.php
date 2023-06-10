<?php
session_start();

date_default_timezone_set('Europe/Paris');


class Model extends PDO {

    private static $_instance;

    // Constructeur : héritage public obligatoire par héritage de PDO
    public function __construct() {
    }

    //Singleton
    public static function getInstance() {
     // les variables sont définies dans le fichier config.php

     //include_once '../controller/config.php';
     include '../controller/config.php';

     if (DEBUG) echo ("Model : getInstance : dsn = $dsn</br>");

     $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

     if (!isset(self::$_instance)) {
      try {
       self::$_instance = new PDO($dsn, $username, $password, $options);
      } catch (PDOException $e) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      }
     }
     return self::$_instance;
    }
 
    public static function verifyInputString($valeur){
       if (isset($valeur)) {
           $response = trim($valeur);
           if (!empty($response) && is_string($response) && !preg_match('/\d/', $response)) {
               return 1;
           } else {
               return 0;
           }
       } else {
           return 0;
       }

    }
 
    public static function verifyInputInt($valeur){
       if (isset($valeur)) {
           $response = trim($valeur);
           if (!empty($response) && is_numeric($response) && $response >= 1 && $response <= 10) {
               return 1;
           } else {
               return 0;
           }
       } else {
           return 0;
       }

    }
    
    public static function verifyInputDate($valeur){
        if (isset($valeur)) {
            $date = trim($valeur);
            echo($date);
            if (!empty($date)) {
                if (Model::validateDate($date) && Model::isFutureDate($date)) {
                    return 1;
                }
                else{
                    return 0;
                }
           } else {
               return 0;
           }
        } else {
           return 0;
        }

    } 
 
    public static function validateDate($date) {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    public static function isFutureDate($date) {
        $currentDate = strtotime(date('Y-m-d'));
        $inputDate = strtotime($date);
        if ($inputDate == FALSE){
            return 0;
        }
        return $inputDate >= $currentDate;    
    }

}
?>