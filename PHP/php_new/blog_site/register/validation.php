<?php
$nameErr = $usernameErr = $contactErr = $emailErr = $passwordErr =  "";
$name = $user_name = $contact =  $email = $pass_word = $confirm =  "";
$name_check = $username_check = $contact_check = $email_check = $password_check = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["fullname"]);
  $name_check=preg_match("/^[a-zA-Z]+(\ [a-zA-Z]+)?$/",$name);
  if (!$name_check) {
	  $nameErr = "Only letters are allowed";
  }

  $user_name = test_input($_POST["username"]);
	$username_check=preg_match("/^[A-Za-z@\-_0-9]+$/",$user_name);
	if (!$username_check) {
		$usernameErr = "Only letters,numbers and '@','_','-' are allowed";
  }
  
  $contact=test_input($_POST["contact"]);
  if(!empty($contact)) {
    if (!preg_match("/^[+]{1}[9]{1}[1]{1}[1-9]{1}[0-9]{9}$/",$contact)) {
    $contactErr = "Enter a valid contact number";
    }
  }
  
  $email=$_POST["email"];
	$email=test_input($email);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		$emailErr="Enter a valid email address";
  }
  
  $pass_word=$_POST["password"];
  $pass_word=test_input($pass_word);
  $confirm=$_POST["confirm"];
  $confirm=test_input($confirm);
  if($pass_word != $confirm) {
    $passwordErr="Password didn't matched,try again";
  }
}

function test_input($data) {
	$data = trim($data);//remove extra spaces
	$data = stripslashes($data);//remove slashes
	$data = htmlspecialchars($data);//convert special characters into html entities
	return $data;//return pure data
}

