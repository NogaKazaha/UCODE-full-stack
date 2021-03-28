<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>A new set</title>
  </head>
  <body>
    <h1>New Avenger application</h1>
    <div style=
      "background-color: darkgray; 
      border: 2px solid black; 
      height: 200px; 
      padding: 10px 10px 10px 40px; 
      margin-bottom: 20px;"
    >
      <p>POST</p>
        <?php
          $arr = [
            "name" => $_POST["name"],
            "email" => $_POST["email"],
            "age" => $_POST["age"],
            "description" => $_POST["about"],
            "photo" => $_POST["photo"]
          ];
          if($arr["name"]) {    
            print_r ($arr);
          }
        ?>
    </div>
    <form action="index.php" method="post" style=
      "padding: 40px 20px 30px;
      border: 1px solid black;"
    >
      <div style="border: 1px solid black; padding: 20px 10px;">
        <span style=
          "background-color: white;
          top: 350px;
          position:absolute; 
          padding: 5px;"
        >
        About candidate</span>
        <br>
        <span>Name</span>
        <input type="text" name="name" required placeholder="Tell your name"></input>
        <span>E-mail</span>
        <input type="text" name="email" required placeholder="Tell your e-mail"></input>
        <span>Age</span>
        <input type="number" name="age" size="6" required min="1" max="999" step="1"></input>
        <br> <br>
        <span>About</span>
        <textarea rows="5" cols="50" name="about" required maxlength="500" placeholder="Tell about yourself, max 500 symbols"></textarea>
        <br> <br>
        <span>Your Photo:</span>
        <input type="file" name="photo" required> </input>
      </div>
      <br>
      <input class="clear_button" type="reset" value="CLEAR">
      <input class="send_button" type="submit" value="SEND"></input>
    </form>
  </body>
</html>