<!DOCTYPE html>
<html>
  <head>
    <title>
      LOGIN PAGE
    </title>
  </head>
  <body>
  <form id="loginform" method="post" action="" >
  <input
    type="text"
    placeholder="Enter Username"
    name="username"
    id="username"
    required>
    <input
    type="password"
    placeholder="Enter Password"
    name="password"
    id="password"
    required>
    <input
    type="submit"
    name="login"
    id="login"
    value="Login">
    <a href="../forget_pwd/forget.php">Forget Password</a>
    Never have been here before?
    <a href="../register/register.php">Register Here</a>
    <a href="../index.php">Continue</a> without login
  </form>
  <?php require_once('validation.php');?>
  </body>
</html>