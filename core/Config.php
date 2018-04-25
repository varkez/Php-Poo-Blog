<?php
namespace Core;

class Config{

    private $settings = [];

    private static $_instance; // L'attribut qui stockera l'instance unique
 

    /**
    * Le constrcuteur avec sa logique est privé pour émpêcher l'instanciation de la class en dehors de la classe
    * @return Exemple : App.php Ligne 38, Fait appel a core/config.php
    **/
    private function __construct($file){
        //$this->id = uniqid();
        var_dump('__construct($file)', $file);
        $this->settings = require ($file);
    }

    /**
    * La méthode statique qui permet d'instancier ou de récupérer l'instance unique class Config (Singleton)
    **/
    public static function getInstance($file){
        if(is_null(self::$_instance)){
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    /** Permet d'obtenir la valeur de la configuration avec getInstance()->get('db_name');
     * @param $key clef a récupérer dans tableau config/config.php
     */
    public function get($key){
        if(!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }
}
?>