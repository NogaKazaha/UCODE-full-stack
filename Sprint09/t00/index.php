<?php
    require_once("connection/DatabaseConnection.php");
    require_once("models/Registration.php");
    echo(file_get_contents("index.html"));
    if (!$_POST)
        die();
    $Registration = new Registration();
    $login = $_POST["login"];
    $password = md5($_POST["password"]);
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    if ($Registration->findLogin($login)) {
        echo("<script>alert('Such login is already exist!')</script>");
        die();
    }
    $Registration->createUser($login, $password, $full_name, $email);
    $Registration->saveUser();
    echo("<script>alert('You registered successfully!')</script>");
?>