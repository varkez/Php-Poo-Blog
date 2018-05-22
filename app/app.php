<?php

use Core\Config;
use Core\Database\MysqlDatabase;


class App{

    public $title = "Mon super site";
    private $db_instance;
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
    /**
     * Include le fichier correspondant a notre classe passer en paramètre, Lance les Autoloaders
     * @param le nom de la class voulu
     * @return le chemain est nom de la class.php
     */
    public static function load(){
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }
    /**
     * Permet de return un object(App\Table\PostsTable) avec un protected 'table' => string 'posts'
     * Et Instancie la connexion a la base de donnée par Injection de Dépendances.
     */
    public function getTable($name){
        
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb()); //injection de Dépendances.
    }

    public function getDb(){
        $config = Config::getInstance(ROOT . '/config/Config.php'); //Appel de  l'instance class Config (Singleton)
        if(is_null($this->db_instance)){
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

    public function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    public function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page Introuvable');
    }
}
?>