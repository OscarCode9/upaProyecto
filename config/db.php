<?php

    class db {
        private $dbhost = 'localhost';
        private $dbuser = 'root';
        private $dbpass = 'tristeGDA13##1';
        private $dbname = 'db_clinica';
        //cnnect
        public function connect ( ){
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname;";
            $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
            $dbConnection -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }