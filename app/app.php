<?php
namespace App;

class App{

    public $title = "Mon super site";
    private static $_instance;

    /**
    * La méthode statique qui permet d'instancier ou de récupérer l'instance unique class App (Singleton)
    **/
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

}
?>