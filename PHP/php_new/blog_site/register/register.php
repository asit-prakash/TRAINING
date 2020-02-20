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
      REGISTER PAGE
    </title>
  </head>
  <body>
  <div class="register-content">
    <?php require_once('./validation.php');?>
    <h2>REGISTER HERE</h2>
      <form class="form-group" id="registerform" method="post" action="" >
      <label for="fullname">Enter Fullname:</label>
      <span class="error">* <?php echo $nameErr;?></span>
      <input
        type="text"
        placeholder="Enter Fullname"
        name="fullname"
        id="fullname"
        title="only letters allowed"
        class="form-control"
        required>
      <label for="username">Enter Username:</label>
      <span class="error">* <?php echo $usernameErr;?></span>
      <input
        type="text"
        placeholder="Enter Username"
        name="username"
        maxlength="15"
        id="username"
        class="form-control"
        title="Only letters,numbers and '@','_','-' are allowed"
        required>
      <label for="contact">Enter Contact:</label>
      <span class="error">* <?php echo $contactErr;?></span>
        <input 
        type="text" 
        name="contact" 
        id="contact"
        class="form-control"
        maxlength="14"
        pattern="[+]{1}[9]{1}[1]{1}[1-9]{1}[0-9]{9}"
        title="start with +91"
        placeholder="start with +91">
      <label for="email">Enter Email:</label>
      <span class="error">* <?php echo $emailErr;?></span>
        <input 
        type="text" 
        name="email" 
        id="email"
        class="form-control"
        maxlength="320"
        placeholder="Enter Email"
        title="Enter your email"
        required>
      <label for="password">Enter Password:</label>
      <span class="error">* <?php echo $passwordErr;?></span>
        <input
        type="password"
        placeholder="Enter Password"
        name="password"
        id="password"
        class="form-control"
        title="enter a strong password"
        required>
      <label for="confirm">Confirm Password:</label>
        <input
        type="password"
        placeholder="Confirm Password"
        name="confirm"
        id="confirm"
        class="form-control"
        title="Re-enter your password"
        required>
        <input
        type="submit"
        name="register"
        id="register"
        class="btn btn-primary "
        value="Register">
        <div class="login-link">
          <a href="../login/login.php">Login</a>
        </div>
      </form>
      <?php require_once('./db_entry.php');?>
  </div> 
  </body>
</html>