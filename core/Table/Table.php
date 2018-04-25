<?php
    namespace Core\Table;
    
    use Core\Database\Database;

    class Table{

        protected $table;
        protected $db;

        public function __construct(Database $db)  //Injection de dépendance $db, precision de la classe Database
        {
            $this->db = $db;    <--
            if(is_null($this->table)){
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name));
            }
        }

        public function all(){
            return $this->db->query('SELECT * FROM blog.articles');
        }
    }
?>
