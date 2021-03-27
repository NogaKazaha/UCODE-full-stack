<?php
  class Ingestion {
    public $id = 0;
    public $meal_type = ["breakfast", "lunch", "dinner"];
    public $day_of_diet;
    public $products = array();
    public function __construct($meal_type, $day_of_diet) {
      $this->day_of_diet = $day_of_diet;
      $in_arr = false;
      for($i = 0; $i < count($this->meal_type); $i++) {
        if($this->meal_type[$i] == $meal_type) {
          $in_arr = true;
          break;
        }
      }
      if(!$in_arr) {
        echo "Incorrect meal type!\n";
      }
    }
    public function get_from_fridge($product) {
      if($this->products[$product]->getKcal() > 200) {
        throw new EatException("No more junk food, dumpling");
      }
    }
    public function setProduct($product) {
      $this->products[$product->name] = $product;
    }
    public function getProducts() {
      return $this->products;
    }
  }
  // require_once("EatException.php");
  // require_once("Product.php");
  // $namesProducts = [
  //   'Nutella',
  //   'Chicken',
  //   'Coca-Cola',
  //   'Biscuit',
  //   'Brocolli',
  //   'Tomatoes',
  //   'Apple',
  //   'Potato',
  //   'Pizza',
  //   'Beer'
  // ];
  // $stock = new Ingestion('breakfast', 1);
  // foreach($namesProducts as $name) {
  //   $stock->setProduct(new Product($name, rand(40, 500)));
  // } 
  // $allProducts = $stock->getProducts();
  // foreach($namesProducts as $product) {
  //   $count = rand(1, 5);
  //   try {
  //     echo "***\nGetting ". $allProducts[$product]->getName() . " that has ";
  //     echo $allProducts[$product]->getKcal() . " calories.\n";
  //     $stock->get_from_fridge($product);
  //     echo"You're doing great, ". $product. " is good!\n";
  //   }
  //   catch (EatException $e) {
  //     echo "Caught exception: ". $e->getMessage() . "! ";
  //     echo "Throw ". $product. " away!\n";
  //   }
  // }
?>