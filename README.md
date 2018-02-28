# SimpleMigrations

Library to easily have small implementation of migrations in php.

## How to use it

You create a new Migrator object and run the method migrate giving it an array with the name of the Migration.

```php
$migrator = new Migrator($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
    $migrator->migrate(array(
        'MyFirstMigration'
    ));
```

Each Migration should have a verify and up method indicating if it hasn't already been run and what to do in case it hasn't 

```php
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
```
## Example 

There is an example in index.php