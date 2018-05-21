<?php
    namespace Core\Table;
    
    use Core\Database\Database;
    

    class Table{

        protected $table;
        protected $db;

        public function __construct(Database $db)
        {
            $this->db = $db;
            if(is_null($this->table)){
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)). 's';
            }
        }

       public function all(){
            
            return $this->query('SELECT * FROM blog.' . $this->table);
        }

        public function find($id){
            return $this->query("SELECT * FROM blog.{$this->table} WHERE id= ?", [$id], true);
        }

        public function query($statement, $attributes = null, $one = false){
            //var_dump($statement);
            //var_dump($this->db);
            //var_dump($attributes);
            if($attributes){
                return $this->db->prepare(
                    $statement,
                    $attributes,
                    str_replace('Table', 'Entity', get_class($this)),
                    $one
                );
            
            }else{
                    //echo "hello";
                    return $this->db->query(
                        $statement,
                        str_replace('Table', 'Entity', get_class($this)), 
                        $one
                    );
                
            }
        }
    }
?>