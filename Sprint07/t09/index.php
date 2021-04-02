<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Marvel API</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
        $public_key = "c92e36640f4a0337efa7932d4d47f7de";
        $private_key = "2c5a0035e325476a41604b2e985adc212e4cec14";
        $time = time();
        $hash = md5($time.$private_key.$public_key);
        $api = "http://gateway.marvel.com/v1/public/comics?&ts=$time&apikey=$public_key&hash=".$hash;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $api);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($result, true);
        function createPage($arr) {
            foreach ($arr as $key => $value) {
                if (gettype($value) !== "array" && gettype($value) !== "object") {
                    echo("
                    <div class=\"boxes\">
                        <span class=\"key\">$key:</span>
                        <span class=\"value\">$value</span>
                    </div>
                    ");
                }
                else {
                    echo("<div class=\"data\">
                    <span class=\"text\">$key:</span>");
                    createPage($value);
                    echo("</div>");
                }
            }
        }
        createPage($json);
    ?>
    </body>
</html>
