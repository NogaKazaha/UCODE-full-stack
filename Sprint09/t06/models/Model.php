<?php
    class Model {
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
        public function createUser($login, $password, $full_name, $email) {
            $this->login = $login;
            $this->password = $password;
            $this->full_name = $full_name;
            $this->email = $email;
            $query = "INSERT INTO `users` (login, password, full_name, email)
            VALUES ('".$this->connection->escape_string($this->login)."',
            '".$this->connection->escape_string($this->password)."', 
            '".$this->connection->escape_string($this->full_name)."',
            '".$this->connection->escape_string($this->email)."')";
            $this->connection->query($query);
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
                if($result[0] == 1) {
                    return true;
                }
                else {
                    return false;
                }
            if (!$result)
                return null;
            $result = $result[0];
            $this->id = $result[0];
            $this->login = $result[1];
            $this->password = $result[2];
            $this->full_name = $result[3];
            $this->email = $result[4];
        }
        public function checkEmail($email) {
            $result = $this->connection->query("SELECT `id` FROM `users` WHERE `email`='$email'");
            $result = $result->fetch_all();
            if ($result)
                return $result[0][0];
            return null;
        }
        public function updateUser() {
            $query = "UPDATE `users` SET login='".$this->connection->escape_string($this->login)."',
            password='".$this->connection->escape_string($this->password)."', 
            full_name='".$this->connection->escape_string($this->full_name)."',
            email='".$this->connection->escape_string($this->email)."' 
            WHERE id=$this->id";
            $this->connection->query($query);
            $this->connection->commit();
        }
        public function findById($id) {
            $result = $this->connection->query("SELECT * FROM `users` WHERE `id`=$id");
            $result = $result->fetch_all()[0];
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
        }
    }
?>