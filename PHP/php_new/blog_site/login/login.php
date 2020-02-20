<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>
      LOGIN PAGE
    </title>
  </head>
  <body>
  <div class="login-content">
    <h2>LOGIN</h2>
      <form class="form-group" id="loginform" method="post" action="" >
      <label for="username">Enter Username:</label>
      <input
        type="text"
        placeholder="Enter Username"
        name="username"
        id="username"
        class="form-control"
        required>
        <label for="password">Enter Password:</label>
        <input
        type="password"
        placeholder="Enter Password"
        name="password"
        id="password"
        class="form-control"
        required>
        <input
        type="submit"
        name="login"
        id="login"
        class="btn btn-primary "
        value="Login">
        <!-- <div class="forget">
          <a href="../forget_pwd/forget.php">Forget Password</a>
        </div> -->
        <div class="continue">
          <a href="../index.php">Continue Without Login</a>
        </div>
        <div class="register">
          <a href="../register/register.php">Register Here</a>
        </div>
      </form>
      <?php require_once('validation.php');?>
  </div>
  </body>
</html>