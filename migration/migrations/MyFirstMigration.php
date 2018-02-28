<?php
require_once(__DIR__."/../Migration.php");
require_once(__DIR__."/../iMigration.php");
class MyFirstMigration extends Migration implements iMigration
{   
    public function verify()
    {
        return !(parent::tableExists('vehiclesraterbridge'));
    }

    public function up()
    {
        $query = "CREATE TABLE `test` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
            ";
        return  $this->conn->query($query);
        
    }

    public function down()
    {
        $query = "DROP table test;";
        return  $this->conn->query($query);
    }

    
}
