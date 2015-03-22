<?php
//membuat class databse
class database {
    // properti
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass = "andhika";
    private $dbName = "crud_oop";

    // method koneksi MySQL
    function connectMySQL() {
        mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
        mysql_select_db($this->dbName) or die("Database tidak ada!");
    }

?>
