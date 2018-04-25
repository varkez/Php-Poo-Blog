<?php
namespace Core;

class Config{

    private $settings = []; // Contiendra la connexion a la base de donnée

    private static $_instance; // L'attribut qui stockera l'instance unique
 

    /**
    * Le constrcuteur avec sa logique est privé pour émpêcher l'instanciation de la class en dehors de la classe
    * @return Exemple : App.php Ligne 38, Fait appel a core/config.php
    **/
    private function __construct($file){
        //$this->id = uniqid();
        $this->settings = require ($file);
    }

    /**
    * La méthode statique qui permet d'instancier ou de récupérer l'instance unique. (Singleton)
    **/
    public static function getInstance($file){
        if(is_null(self::$_instance)){
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    /** Permet d'obtenir la valeur de la configuration a la DB avec getInstance()->get('db_name');
     * @param $key clef a récupérer dans le tableau (core/config.php)
     */
    public function get($key){
        if(!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }
}
?>
