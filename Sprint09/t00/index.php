<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <script src="checkPass.js"></script>
  </head>
  <body>
    <div class="signup-form">
        <form action="models/insert.php" method="post" onSubmit = "return checkPassword(this)">
        <h2>Register</h2>
        <p class="hint-text">Create your account</p>
            <div class="form-group">
          <div class="form-group">
            <div class="col"><input type="text" class="form-control" name="login" placeholder="Login" required="required"></div>
          </div>
          <div class="form-group">
            <div class="col"><input type="text" class="form-control" name="full_name" placeholder="Full name" required="required"></div>
          </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
        <div class="form-group">
                <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
            </div>
        <div class="form-group">
                <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" required="required">
            </div>
        </div>
        <div class="form-group">
                <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Register Now</button>
            </div>
        </form>
    </div>
  </body>
</html>
