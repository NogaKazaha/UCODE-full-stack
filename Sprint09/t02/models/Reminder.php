<?php
    class Reminder {
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
        public function findId($id) {
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
        public function findEmail($email) {
            $result = $this->connection->query("SELECT `id` FROM `users` WHERE `email`='$email'");
            $result = $result->fetch_all();
            if ($result)
                return $result[0][0];
            return null;
        }
        public function update() {
            $query = "UPDATE `users` SET login='".$this->connection->escape_string($this->login)."',
            password='".$this->connection->escape_string($this->password)."', 
            full_name='".$this->connection->escape_string($this->full_name)."',
            email='".$this->connection->escape_string($this->email)."' 
            WHERE id=$this->id";
            $this->connection->query($query);
            $this->connection->commit();
        }
    }
?>