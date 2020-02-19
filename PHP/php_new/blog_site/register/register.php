<!DOCTYPE html>
<html>
  <head>
    <title>
      REGISTER PAGE
    </title>
  </head>
  <body>
  <?php require_once('./validation.php');?>
  <form id="registerform" method="post" action="" >
  <input
    type="text"
    placeholder="Enter Fullname"
    name="fullname"
    id="fullname"
    title="only letters allowed"
    required>
  <span class="error">* <?php echo $nameErr;?></span>
  <input
    type="text"
    placeholder="Enter Username"
    name="username"
    maxlength="15"
    id="username"
    title="Only letters,numbers and '@','_','-' are allowed"
    required>
  <span class="error">* <?php echo $usernameErr;?></span>
    <input 
    type="text" 
    name="contact" 
    id="contact" 
    maxlength="14"
    pattern="[+]{1}[9]{1}[1]{1}[1-9]{1}[0-9]{9}"
    title="start with +91"
		placeholder="start with +91">
  <span class="error">* <?php echo $contactErr;?></span>
    <input 
    type="text" 
    name="email" 
    id="email" 
    maxlength="320"
		placeholder="Enter Email"
    title="Enter your email"
    required>
  <span class="error">* <?php echo $emailErr;?></span>
    <input
    type="password"
    placeholder="Enter Password"
    name="password"
    id="password"
    title="enter a strong password"
    required>
    <input
    type="password"
    placeholder="Confirm Password"
    name="confirm"
    id="confirm"
    title="Re-enter your password"
    required>
  <span class="error">* <?php echo $passwordErr;?></span>
    <input
    type="submit"
    name="register"
    id="register"
    value="Register">
    Already a member <a href="../login/login.php">Login</a> here
  </form>
  <?php require_once('./db_entry.php');?>
  </body>
</html>