<?php
  abstract class Model
  {
    public $connection;
    public $table;
    public function __construct($table) {
      $this->setConnection();
      $this->setTable($table);
    }
    protected function setTable($table) {
      $this->table = $table;
    }
    protected function setConnection() {
      $this->connection = new DatabaseConnection('localhost', null, 'osavich', 'securepass', 'ucode_web');
    }
    abstract public function find($id);
    abstract public function save();
    abstract public function delete();
  }
?>