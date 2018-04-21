<?php
    
    namespace App\Table;
    
    use App\App;
    
    class Table{

/** 
        private static function getTable(){
            if(static::$table === null){
                $class_name = explode('\\', get_called_class());//get_called_class remplace : __CLASS__
                static::$table = strtolower(end($class_name)) . 's';
            }
                return static::$table;
        }
*/

        public static function all(){
            return App::getDatabase()->query(
                "SELECT *
                FROM ". static::$table ."" // App\Table\Article
            , get_called_class());
        } 

        public static function find($id){
            return static::query(
                "SELECT *
                FROM " . static::$table . "
                WHERE id = ?
                ", [$id], true);
        }

        public static function query($statement, $attributes = null, $one = false){
            if($attributes){
                return App::getDatabase()->prepare($statement, $attributes, get_called_class(), $one);
            }else{
                return App::getDatabase()->query($statement, get_called_class(), $one);
            }
        }
    
        public function __get($key){
            $method = 'get' . ucfirst($key);
            $this->$key = $this->$method();
            return $this->$key;
        }
    }
?>