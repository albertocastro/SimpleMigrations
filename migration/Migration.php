<?php 
    class Migration {
       
        public function __construct($conn){
           
            $this->conn = $conn;
        }


        public function hasColumn($column, $table){
            $query  = "SHOW COLUMNS FROM $table LIKE '$column'";
             $result = $this->conn->query($query);
             return ( $result->num_rows >0);

        }
        public function tableExists( $table){
            $query = "select 1 from $table limit 1";
            return  $this->conn->query($query);
        }
    }
    class Migrator{
        public function __construct($host,$user,$pass,$table){
            $mysqli = new mysqli($host,$user, $pass, $table);
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }            
            $this->conn = $mysqli;
        }

        public function migrate(Array $migrations){
            foreach ($migrations as $migration) {
                $migrationPath = __DIR__."/../migration/migrations/".$migration.".php";
                if(!file_exists($migrationPath)) {
                    echo "Migration doesn't exists";
                }else{
                    require_once($migrationPath);
                    if(class_exists($migration)){
                        $migrationObject = new $migration($this->conn);
                        if($migrationObject->verify()){
                            $migrationObject->up();
                        }
                    }else{
                        echo "Class doesn't exists";
                    }

                }
            }
        }

    }
?>
