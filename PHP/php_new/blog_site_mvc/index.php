<?php
session_start();
// require 'vendor/autoload.php';
$uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$uri = basename($uri);

switch($uri) {
  case 'home':
    require_once('./controller/get_all_blogs/get_all_blogs_controller.php');
    break;
  
  case 'login':
    if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
      header("Location:http://www.site.com/home");
    }
    else {
      require_once('controller/login/login_controller.php');
    }
    break;

  case 'register':
    if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
      header("Location:http://www.site.com/home");
    }
    else {
      require_once('./controller/register/register_controller.php');
    }
    break;
  
  case 'readblog':
    if(isset($_SESSION['id'])) {
      require_once('./controller/read_blog/read_blog_controller.php');
    }
    else {
      header("Location:http://www.site.com/home");
    }
    break;
  
  case 'myblogs':
    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
      header("Location:http://www.site.com/login");
    }
    else {
      require_once('./controller/myblogs/myblogs_controller.php');
    }
    break;
  
  case 'editblog':
    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
      header("Location:http://www.site.com/login");
    }
    else {
      require_once('./controller/edit_blogs/editblogs_controller.php');
    }
    break;
  
  case 'addblog':
    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
      header("Location:http://www.site.com/login");
    }
    else {
      require_once('./controller/addblogs/addblogs_controller.php');
    }
    break;

  case 'delete':
    require_once('./controller/myblogs/myblogs_controller.php');
    break;

  case 'logout':
    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
      header("Location:http://www.site.com/home");
    }
    else {
      require_once('./controller/logout/logout_controller.php');
    }
    break;
  
  default:
    require_once('404.html');
    // print_r($_REQUEST);
    // echo $_REQUEST['q'];
}