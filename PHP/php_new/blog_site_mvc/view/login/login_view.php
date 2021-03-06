<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../view/assets/style.css?v=1">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type = "text/javascript" src="components/togglePassword.js?v=1"></script> 
    <title>
      LOGIN PAGE
    </title>
  </head>
  <body>
  <div class="navigation">
    <div class="site">
      <a class="nav-link" href="http://www.site.com/home">Blogastic.com</a>
    </div>
    <div class="links">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="http://www.site.com/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active"  href="http://www.site.com/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="http://www.site.com/register">Register</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="login-content">
    <h2>LOGIN</h2>
    <?php if(isset($invalid)) { ?>
    <div class="alert alert-danger">
      <?php echo $invalid ?>
    </div>
    <?php } ?>
      <form class="form-group" id="loginform" method="post" action="" >
      <label for="username">Enter Username:</label>
      <input
        type="text"
        placeholder="Enter Username"
        name="username"
        id="username"
        class="form-control"
        maxlength="15"
        required>
        <label for="password">Enter Password:</label>
        <i toggle="#password" class="fa fa-eye toggle-password" ></i>
        <input
        type="password"
        placeholder="Enter Password"
        name="password"
        id="password"
        class="form-control"
        maxlength="15"
        required>
        <div class="g-recaptcha" data-sitekey="6Lfc09wUAAAAACiWUYzq5nPqrDz_1MKpKMxblDi2"></div>
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
          <a href="http://www.site.com/home">Continue Without Login</a>
        </div>
        <div class="register">
          Never have been here before? <a href="http://www.site.com/register">Create New Account</a>
        </div>
      </form>
  </div>
  </body>
</html>