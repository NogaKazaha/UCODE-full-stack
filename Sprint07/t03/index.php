<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Charset</title>
    </head>
    <body>
    <h1>Charset</h1>
    <form action="index.php" method="post">
        <span>Change charset:</span>
        <input name="str" placeholder="Input string">
        <br> <br>
        <span>Select charset or several charsets:</span>
        <select  size="3" multiple name="charsets[]">
            <option>UTF-8</option>
            <option>ISO-8859-1</option>
            <option>Windows-1252</option>
        </select>
        <input name="change" type="submit" value="Change charset" >
        <input name="clear" type="submit" value="Clear">
    </form><br>
    <?php
        if(isset($_POST['change'])) {
            $_SESSION['str'] = $_POST['str'];
            $i = 0;
            while($_POST['charsets'][$i]) {
                utf8_encode($_SESSION['str']);
                if($i == 0) {
                    echo 'Input string' . '<br>' . '<textarea>' . $_SESSION['str'] . '</textarea><br>';
                }
                if($_POST['charsets'][$i]) {
                    echo $_POST['charsets'][$i] . '<br>' . '<textarea>';
                    if($i == 0)
                        echo $_SESSION['str'];
                    else if($i == 1)
                        echo iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $_SESSION['str']);
                    else if($i == 2)
                        echo iconv('UTF-8', 'Windows-1252', $_SESSION['str']);
                    echo '</textarea><br>';
                }
                $i++;
            }
        }
    ?>
    </body>
</html>
