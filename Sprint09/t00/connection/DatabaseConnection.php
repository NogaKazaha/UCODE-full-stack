<?php
    class DatabaseConnection {
        public function __construct($host, $port, $username, $password, $database) {
            $this->connection = new mysqli($host, $username, $password, $database, $port);
        }
        public function __destruct(){
            $this->connection->close();
        }
        public function getConnectionStatus() {
            if($this->connection) {
              return true;
            } 
            else {
              return false;
            }
        }
    }
?>