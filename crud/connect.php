<?php

class database {
    // properti
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass = "andhika";
    private $dbName = "db_online_printing";

    
    function connectMySQL() {
        mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
        mysql_select_db($this->dbName) or die("Database tidak ada!");
    }
}
?>
