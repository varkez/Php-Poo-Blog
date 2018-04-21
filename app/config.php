<?php
namespace App;

class Config{

    private $setting = [];

    private static $_instance; // L'attribut qui stockera l'instance unique

    /**
    * La méthode statique qui permet d'instancier ou de récupérer l'instance unique class Config (Singleton)
    **/
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    /**
    * Le constrcuteur avec sa logique est privé pour émpêcher l'instanciation en dehors de la classe
    **/
    private function __construct(){
        $this->id = uniqid();
        $this->setting = require dirname(__DIR__) . '/app/config/config.php';

    }

    /** Permet d'obtenir la valeur de la configuration avec getInstance()->get('db_name');
     * @param $key clef a récupérer
     */
    public function get($key){
        if(!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }
}
?>