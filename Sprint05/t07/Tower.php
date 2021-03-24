<?php
  include "Building.php";
  class Tower extends Building {
    private $elevator;
    private $arc_capacity;
    private $height;
    public function hasElevator() {
      if ($this->elevator) {
        return '+';
      }
      else {
        return '-';
      }
    }
    public function setElevator($elevator) {
      $this->elevator = $elevator;
    }
    public function getArcCapacity() : int {
      return $this->arc_capacity;
    }
    public function setArcCapacity($arc_capacity) {
      $this->arc_capacity = $arc_capacity;
    }
    public function getHeight() {
      return $this->height;
    }
    public function setHeight($height) {
      $this->height = $height;
    }
    public function getFloorHeight() : float {
      return $this->height / $this->floors;
    }
    public function toString(): string {
      $props = [
        "Elevator : " . $this->hasElevator(),
        "Arc reactor capacity : " . $this->arc_capacity,
        "Height : " . $this->height,
        "Floor height : " . $this->getFloorHeight(),
      ];
      $string = parent::toString();
      foreach ($props as $prop) {
        $string = $string . $prop . "\n";
      }
      return $string;
    }
  }
  // require_once(__DIR__. "/Building.php");
  // require_once(__DIR__. "/Tower.php");
  // $StarkTower= new Tower(93, "Different", "Manhattan, NY");
  
  // $StarkTower->setElevator(true);
  // $StarkTower->setArcCapacity(70);
  // $StarkTower->setHeight(1130);
  // echo $StarkTower->toString();

?>