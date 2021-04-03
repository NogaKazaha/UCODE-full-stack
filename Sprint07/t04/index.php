<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Files</title>
    </head>
    <body>
        <h1>Files</h1>
        <form action="index.php" method="post">
            <label>File name:</label>
            <input type="text" name="file">
            <label>Content:</label>
            <textarea name="content"></textarea>
            <input type="submit" value="Create file">
            <br>
        </form>
        <h2>List of files:</h2>
        <?php
        function autoload($pClassName) {
            include(__DIR__ . '/' . $pClassName . '.php');
        }
        spl_autoload_register("autoload");
        if ($_POST["delete"]) {
            unlink("tmp/" . $_GET["file"]);
            unset($_POST["delete"]);
            unset($_GET["file"]);
            echo '<script>window.location = window.location.href.split("?")[0];</script>';
        }
        if ($_POST && $_POST["file"]) {
            $file = new File("tmp/" . $_POST["file"]);
            $file->writeToList($_POST["content"]);
        }
        $list= new FilesList("tmp");
        echo $list->createList() . "\n";
        if ($_GET) {
            echo '<h2>Selected file: <i>"tmp/' . $_GET["file"] . '"</i></h2>';
            echo '<form method="post"><input type="submit" name="delete" value="Delete file"></form><br>';
            $file= new File("tmp/" . $_GET["file"]);
            echo $file->createList();
        }
        ?>
    </body>
</html>