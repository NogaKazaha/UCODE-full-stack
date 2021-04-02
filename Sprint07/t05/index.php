<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Parsing CSV data</title>
        <style>
            table {
                border: 1px solid grey;
            }
            td {
                border: 1px solid grey;
            }
            .hide {
                display: none;
            }
        </style>
    </head>
    <body>
        <h1>Parsing CSV data</h1>
        <form method="post" enctype="multipart/form-data">
            <span>Upload file:</span>
            <input type="file" name="csv" accept=".csv">
            <input type="submit" value="Upload">
        </form>
        <?php
            if ($_FILES) {
                $file = fopen($_FILES["csv"]["name"], "r");
                $arr = [];
                $col = 0;
                while (($row = fgetcsv($file))) {
                    if ($col === 0)
                        $col = count($row);
                    array_push($arr, $row);
                }
                fclose($file);
                $file = fopen("temp", "w");
                foreach ($arr as $key)
                    fputcsv($file, $key);
                fclose($file);
                echo("<form method=\"post\" class=\"filter\">
                <span>Filter:</span><select><option selected>NOT SELECTED</option></select>
                <input type=\"button\" value=\"APPLY\"></form>");
                echo("<table cellspacing=\"0\"><tbody>");
                echo("<tr>");
                for ($i = 0; $i < $col; $i++)
                    echo("<td><form method=\"post\">
                    <input class=\"hide\" type=\"text\" name=\"col\" value=\"".$arr[0][$i]."\">
                    <input type=\"submit\" value=\"".$arr[0][$i]."\"></form></td>");
                echo("</tr>");
                for ($i = 1; $i < count($arr); $i++) {
                    echo("<tr>");
                    for ($j = 0; $j < $col; $j++)
                        echo("<td>".$arr[$i][$j]."</td>");
                    echo("</tr>");
                }
                echo("</tbody></table>");
            }
            else if ($_POST) {
                $col = $_POST["col"];
                $filter = $_POST["filter"];
                $file = fopen("temp", "r");
                $arr = [];
                $col = 0;
                while (($row = fgetcsv($file))) {
                    if ($col === 0)
                        $col = count($row);
                    array_push($arr, $row);
                }
                if (!$filter) {
                    for ($i = 0; $i < $col; $i++)
                        if ($arr[0][$i] === $col) {
                            $col = $i;
                            break;
                        }
                }
                else {
                    $col = explode(",", $filter)[1];
                    $filter = explode(",", $filter)[0];
                }
                $uniq = [];
                echo("<form method=\"post\" class=\"filter\">
                <span>Filter:</span>
                <select name=\"filter\"><option selected>NOT SELECTED</option>");
                for ($i = 1; $i < count($arr); $i++) {
                    if (!in_array($arr[$i][$col], $uniq)) {
                        array_push($uniq, $arr[$i][$col]);
                        echo("<option value=\"".$arr[$i][$col].",".$col."\">".$arr[$i][$col]."</option>");
                    }
                }
                echo("</select><input type=\"submit\" value=\"APPLY\"></form>");
                echo("<table cellspacing=\"0\"><tbody>");
                echo("<tr>");
                for ($i = 0; $i < $col; $i++)
                    echo("<td><form method=\"post\">
                    <input class=\"hide\" type=\"text\" name=\"col\" value=\"".$arr[0][$i]."\">
                    <input type=\"submit\" value=\"".$arr[0][$i]."\"></form></td>");
                echo("</tr>");
                for ($i = 1; $i < count($arr); $i++) {
                    if (!$filter || $arr[$i][$col] === $filter) {
                        echo("<tr>");
                        for ($j = 0; $j < $col; $j++)
                            echo("<td>".$arr[$i][$j]."</td>");
                        echo("</tr>");
                    }
                }
                echo("</tbody></table>");
            }
        ?>
    </body>
</html>
