<?php
    session_start();
    if(isset($_POST['save'])) {
        header('Refresh:0');
    }
    if(isset($_POST['clear'])) {
        header('Refresh:0');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hack it!</title>
    </head>
    <body>
        <h1>Password</h1>
        <?php
            if(isset($_POST['check']) && isset($_POST['password'])) {
                if(crypt($_POST['password'], $_SESSION['salt']) == $_SESSION['hash']) {
                    echo '<p style="color: green;">Hacked!</p>';
                    unset($_SESSION['hash']);
                    unset($_SESSION['salt']);
                    session_destroy();
                } else {
                    echo '<p style="color: red;">Access denied!</p>';
                }
            }
        ?>
        <form action="index.php" method="post" 
            <?php 
                if(isset($_SESSION['hash'])) {
                    echo 'hidden';
                } 
                else {
                    echo 'display';
                } 
            ?> 
        >
            <span>Password not saved at session</span>
            <br>
            <span>Password for saving to session</span>
            <input name="password" placeholder="Password to session">
            <br>
            <span>Salt for saving to session</span>
            <input name="salt" placeholder="Salt to session">
            <br>
            <input name="save" type="submit" value="Save">
        </form>
        <form action="index.php" method="post" 
            <?php 
                if(!isset($_SESSION['hash'])) {
                    echo 'hidden';
                } 
                else {
                    echo 'display';
                } 
            ?> 
        >
            <span>Password saved at session</span>
            <br>
            <span>Hash is&nbsp;<span>
                <?php 
                    echo $_SESSION['hash'] 
                ?>
            <br>
            <span>Try to guess</span>
            <input name="password" placeholder="Password to session">
            <input name="check" type="submit" value="Check password">
            <br>
            <input name="clear" type="submit" value="Clear">
        </form>
        <?php
            if(isset($_POST['save']) && isset($_POST['password']) && isset($_POST['salt'])) {
                $_SESSION['hash'] = crypt($_POST['password'], $_POST['salt']);
                $_SESSION['salt'] = $_POST['salt'];
            }
            if(isset($_POST['clear'])) {
                session_destroy();   
            }
        ?>
    </body>
</html>
