<?php 

    $DB_HOST = "DB_HOST";
    $DB_USER = "DB_USER";
    $DB_PASS = "DB_PASS";
    $DB_NAME = "DB_NAME";

    $migrator = new Migrator($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
    $migrator->migrate(array(
        'MyFirstMigration'
    ));

?>