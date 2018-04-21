<?php
namespace App;

class Config{

    private $setting = [];

    private static $_instance;

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    public function __construct(){
        $this->id = uniqid();
        $this->setting = require dirname(__DIR__) . '/app/config/config.php';

    }

    public function get($key){
        if(!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }
}
?>