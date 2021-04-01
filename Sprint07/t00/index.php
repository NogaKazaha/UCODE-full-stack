<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cookie count</title>
    </head>
    <body>
        <h1>Cookie count</h1>
        <p>
            This page was loaded 
            <span>
                <?php 
                    session_start();
                    if (empty($_SESSION['count']) || !$_COOKIE['count']) {
                        $_SESSION['count'] = 1;
                        setcookie("count", $_SESSION['count'], time() + 60);
                        echo $_SESSION['count'];
                    } 
                    else { 
                        $_SESSION['count']++;
                        setcookie("count", $_SESSION['count'], time() + 60);
                        echo $_COOKIE['count']; 
                    } 
                ?>
            </span> 
            time(s) in last minute
        </p>
    </body>
</html>
