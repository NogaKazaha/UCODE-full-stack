<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Notepad mini</title>
        <style>
            select, textarea, input {
                margin-top: 10px;
            }
            form {
                display: flex;
                flex-direction: column;
                width: fit-content;
            }
        </style>
    </head>
    <body>
        <h1>Notepad mini</h1>
        <form method="post">
            <input type="text" name="name" placeholder="Name">
            <select name="selector">
                <option selected>low</option>
                <option>medium</option>
                <option>high</option>
            </select>
            <textarea name="content" placeholder="Text of note..."></textarea>
            <input type="submit" name="create" value="Create">
        </form>
        <?php
            function loadFile($file) { 
                include(__DIR__ . '/' . $file . '.php'); 
            }
            spl_autoload_register("loadFile");
            $file = fopen("notes", "c");
            $content = file_get_contents("notes"); 
            if ($content) {
                $notes = unserialize($content);
            }
            else {
                $notes = [];
            }
            if ($_GET && $_GET["delete"])
                foreach ($notes as $note)
                    if ($_GET["delete"] == $note->getName()) {
                        unset($notes[array_search($note, $notes)]); 
                        break;
                    }
            if ($_POST || $_GET["delete"]) {
                $delete = false;
                foreach ($notes as $note)
                    if ($_POST["name"] && $_POST["content"] && $_POST["name"] == $note->getName()) {
                        $note->setContent($_POST["content"]);
                        $delete = true;
                        break;
                    }
                if ($_POST["name"] && $_POST["content"] && !$delete) {
                    $note = new Note($_POST["name"], $_POST["selector"], $_POST["content"]);
                    array_push($notes, $note);
                }
                file_put_contents("notes", serialize($notes));
            }
            $note_pad = new NotePad($notes);
            echo("<h2>List of notes</h2>");
            echo($note_pad);
            if ($_GET && $_GET["note"]) {
                echo('<h2>Detail of "'.$_GET["note"].'"</h2>');
                echo($note_pad->getNoteWithName($_GET["note"]));
            }
            fclose($file);
        ?>
    </body>
</html>