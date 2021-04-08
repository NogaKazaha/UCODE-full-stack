<?php
  $name = 'osavich';
  $pass = 'securepass';
  $login = $_POST['login'];
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  try {
    $dbh = new PDO('mysql:host="127.0.0.1";dbname=sword', $user, $pass);
    $dbh->query('INSERT INTO users(login, full_name, email_address, password) VALUES($login, $full_name, $email, $pass)');
    $dbh = null; 
  }
  catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
  }
?>