<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Session for new</title>
    </head>
    <body>
        <h1>Session for new</h1>
        <form action="index.php" method="post" style="border: 1px solid black; padding: 40px 20px 30px;"
            <?php 
            session_start();
            if(isset($_POST['send'])) {
                echo 'hidden';
            } 
            else {
                echo 'display';
            } 
            ?> 
        >
            <div style="border: 1px solid black; padding: 20px 10px;">
                <span style="background-color: white; top: 108px; padding: 5px; position:absolute;">About candidate</span>
                <br>
                <span>Real Name</span>
                <input type="text" name="name" placeholder="Name"></input>
                <span>Current Alias</span>
                <input type="text" name="alias" placeholder="Alias"></input>
                <span>Age</span>
                <input type="number" name="age" size="6" min="1" max="999" step="1"></input>
                <br> <br>
                <span>About</span>
                <textarea rows="5" cols="50" name="about" maxlength="500" placeholder="Tell about yourself, max 500 symbols"></textarea><br><br>
                <span>Photo:</span>
                <input type="file" name="photo"></input>
            </div>
            <br>
            <div style="border: 1px solid black; padding: 20px 10px;">
                <span style="background-color: white; top: 350px; padding: 5px; position:absolute;">Powers</span>
                <br>
                <input type="checkbox" name="strength">Strength</input>
                <input type="checkbox" name="speed">Speed</input>
                <input type="checkbox" name="intelligence">Intelligence</input>
                <input type="checkbox" name="teleportation">Teleportation</input>
                <input type="checkbox" name="immortal">Immortal</input>
                <input type="checkbox" name="another">Another</input>
                <br> <br>
                <input type="range" value="0" name="control_lvl">Level of control</input>
            </div>
            <br>
            <div style="border: 1px solid black; padding: 20px 10px;">
                <span style="background-color: white; top: 487px; padding: 5px; position:absolute;">Publicity</span>
                <br>
                <input type="radio" name="publicity">UNKNOWN</input>
                <input type="radio" name="publicity">LIKE A GHOST</input>
                <input type="radio" name="publicity">I AM IN COMICS</input>
                <input type="radio" name="publicity">I HAVE FUN CLUB</input>
                <input type="radio" name="publicity">SUPERSTAR</input>
            </div>
            <br>
            <input name="clear" type="reset" value="CLEAR">
            <input name="send" type="submit" value="SEND"></input>
        </form>
        <br>
        <form action="index.php" method="post"
            <?php if(!isset($_POST['send'])) {
                echo 'hidden';
                } 
                else {
                    echo 'display';
                    } 
            ?> 
        >
            <div style="padding-left: 40px;">
                <?php
                    if(isset($_POST['send'])) {
                        send();
                    }
                    function send() {
                        $arr = [
                            "name" => $_POST["name"] ? $_POST["name"] : "",
                            "alias" => $_POST["alias"] ? $_POST["alias"] : "",
                            "age" => $_POST["age"] ? $_POST["age"] : "",
                            "about" => $_POST["about"] ? $_POST["about"] : "",
                            "strength" => $_POST["strength"] ? "has" : "",
                            "speed" => $_POST["speed"] ? "has" : "",
                            "intelligence" => $_POST["intelligence"] ? "has" : "",
                            "teleportation" => $_POST["teleportation"] ? "has" : "",
                            "immortal" => $_POST["immortal"] ? "has" : "",
                            "another" => $_POST["another"] ? "another" : "",
                            "level" => $_POST["control_lvl"] ? ($_POST["control_lvl"] / 10) : "",
                            "publicity" => $_POST["publicity"] ? $_POST["publicity"] : "",
                        ];
                        $_SESSION["data"] = $arr;
                        if($_SESSION["data"]) {
                            foreach($_SESSION["data"] as $key => $value) {
                                echo $key.": ".$value . "<br>";
                            }
                        }
                    }
                    if(isset($_POST['reset'])) {
                        forget_button();   
                    }
                    function forget_button() {
                        session_destroy();
                    }
                ?>
            </div>
            <div style="border: 1px solid black; padding: 20px; margin-top: 20px;">
                <input name="forget_button" type="submit" value="FORGET">
            </div>
        </form>
    </body>
</html>
