<?php

    interface iMigration{
        public function verify();
        public function up();
        public function down();
    }

?>