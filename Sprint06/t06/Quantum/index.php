<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Quantum space</title>
</head>

<body>
  <?php
    function calculate_time() : array {
      return [11, 11, 30];
    } 
  $time = calculate_time();
  echo "<p>In quantum space you were absent for " . $time[0] . " years, ". $time[1] . " months, " . $time[2] . " days</p>";
  ?>
</body>

</html>