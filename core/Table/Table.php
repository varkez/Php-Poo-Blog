<?php
    namespace Core\Table;
    
    use Core\Database\Database;

    class Table{

        protected $table;
        protected $db;
        
        /*Injection de dépendance $db, precision de la classe Database parent de la classe MysqlDatabase utilisé
        */
        public function __construct(Database $db)
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
