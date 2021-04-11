<?php
    session_start();
    require_once("connection/DatabaseConnection.php");
    require_once("models/Model.php");
    $login = null;
    $password = null;
    if (!$_POST) {
        if (!$_SESSION["login"]) {
            echo(file_get_contents("index.html"));
            die();
        }
        else {
            $login = $_SESSION["login"];
            $password = $_SESSION["password"];
        }
    }
    if ($_POST["logout"]) {
        unset($_SESSION["login"]);
        unset($_SESSION["password"]);
        echo(file_get_contents("index.html"));
        session_destroy();
        die();
    }
    $Login = new Model();
    if (!$login) {
        $login = $_POST["login"];
    }
    if (!$password) {
        $password = md5($_POST["password"]);
    }
    if (!$Login->checkLogin($login, $password)) {
        echo(file_get_contents("index.html"));
        echo("<script>alert('Login or password is wrong!')</script>");
        die();
    }
    $_SESSION["login"] = $login;
    $_SESSION["password"] = $password;
    echo("<script>alert('You have sign in successfully!')</script>");
    echo("Admin: ".($Login->admin ? "true" : "false") .
    "<br>Login: ".$Login->login.
    "<br>Full name: ".$Login->full_name.
    "<br>Email: ".$Login->email);
    echo("<form action='login.php' method='POST'><input type='text' name='logout' value='1' style='display:none;'><input type='submit' value='Log out'></form>")
?>
