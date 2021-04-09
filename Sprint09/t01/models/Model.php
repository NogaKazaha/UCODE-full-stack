<?php
    class Model {
        public $login;
        public $password;
        public $full_name;
        public $email;
        public $admin;
        public function setConnection() {
            $this->db_connection = new DatabaseConnection('127.0.0.1', null, "osavich", "", "sword");
            $this->connection = $this->db_connection->connection;
        }
        public function __construct() {
            $this->setConnection();
            $sqlMainQuery = file_get_contents("db.sql");
            $this->connection->query($sqlMainQuery);
            $this->connection->commit();
        }
        public function checkLogin($login, $passwordHash=null) {
            $query1 = "SELECT * FROM `users` WHERE `login`='".$this->connection->escape_string($login)."' AND `password`='$passwordHash'";
            $query2 = "SELECT `id` FROM `users` WHERE `login`='".$this->connection->escape_string($login)."'";
            $result = $this->connection->query($passwordHash ? $query1 : $query2);
            $result = $result->fetch_all()[0];
            if ($passwordHash === null)
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