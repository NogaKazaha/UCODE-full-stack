<?php
  class HardWorker {
    private $name;
    private $age;
    private $salary;
    public function setName($str) {
      $this->name = $str;
    }
    public function getName() {
      return $this->name;
    }
    public function setAge($int) {
      if ($int > 0 && $int < 100) {
        $this->age = $int;
        return true;
      }
      else {
        return false;
      }
    }
    public function getAge() {
      return $this->age;
    }
    public function setSalary($int) {
      if ($int > 100 && $int < 10000) {
        $this->salary = $int;
        return true;
      }
      else {
        return false;
      }
    }
    public function getSalary() {
      return $this->salary;
    }
    public function toArray() {
      $arr = ['name' => $this->name, 'age' => $this->age, 'salary' => $this->salary];
      return $arr;
    }
  }
  /*
  $Bruce = new HardWorker();
  $Bruce->setName("Bruce");
  echo $Bruce->getName() . "\n";
  $Bruce->setAge(50);
  $Bruce->setSalary(1500);
  print_r ($Bruce->toArray());
  $Bruce->setName("Linda");
  $Bruce->setAge(140);
  print_r ($Bruce->toArray());
  */
?>