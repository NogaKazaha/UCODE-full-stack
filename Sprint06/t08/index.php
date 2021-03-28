<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>What about forms?</title>
  </head>
  <body>
    <h1>What Thanos did for the Soul Stone?</h1>
    <form action="index.php" method="post">
      <input type="radio" name="choice" value="1">Jumped from the mountain</input><br>
      <input type="radio" name="choice" value="2">Made stone keeper to jump from the mountain</input><br>
      <input type="radio" name="choice" value="3">Pushed Gamora off the mountain</input><br><br>
      <input type="submit" value="I made a choice!"></input><br><br>
    </form>
    <p>
      <?php
        $choice = $_POST["choice"];
        if($choice == "1" || $choice == "2") {
          echo "<p>Shame on you! Go and watch Avengers</p>";
        } 
        else {
          echo "<p>Right one</p>";
        }
      ?>
    </p>
  </body>
</html>