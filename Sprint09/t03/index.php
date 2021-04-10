<?php   
  $url = "http://localhost:3000/t03/index.php/?data=somedata&filter=somefilter";
  require_once(__DIR__ . "/Router.php");
  $router = New Router();
  $router->manageRequest($url);
  $router->printResult(); 
?>