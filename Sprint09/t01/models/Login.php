<?php
    class Login {
        public $login;
        public $password;
        public $full_name;
        public $email;
        public $admin;
        public function setConnection() {
            $this->db_connection = new DatabaseConnection('127.0.0.1', null, "osavich", "securepass", "sword");
            $this->connection = $this->db_connection->connection;
        }
        public function __construct() {
            $this->setConnection();
            $sqlMainQuery = file_get_contents("db.sql");
            $this->connection->query($sqlMainQuery);
            $this->connection->commit();
        }
        public function checkLogin($login, $pass=null) {
            $query1 = "SELECT * FROM `users` WHERE `login`='".$this->connection->escape_string($login)."' AND `password`='$pass'";
            $query2 = "SELECT `id` FROM `users` WHERE `login`='".$this->connection->escape_string($login)."'";
            if($pass) {
                $result = $this->connection->query($query1);
            }
            else {
                $result = $this->connection->query($query2);
            }
            $result = $result->fetch_all()[0];
            if ($pass === null)
                if($result[0]) {
                    return true;
                }
                else {
                    return false;
                }
            if (!$result)
                return null;
            $this->id = $result[0];
            $this->login = $result[1];
            $this->password = $result[2];
            $this->full_name = $result[3];
            $this->email = $result[4];
            if($result[5] == '1') {
                $this->admin = true;
            }
            else {
                $this->admin = false;
            }
            return true;
        }
    }
?>