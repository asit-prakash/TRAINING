<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel='stylesheet' type='text/css' href='./style.css'>
    <title>
      HOMEPAGE
    </title>
  </head>
  <body>
    <div class="container">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <?php 
          session_start();
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
            <a class="nav-link"  href="./logout/logout.php">Logout</a>
          <?php }else{ ?>
            <a class="nav-link"  href="./login/login.php">Login</a>
          <?php } ?>
        </li>
          <?php 
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
        <li class="nav-item">
          <a class="nav-link" href="./my_blogs/myblogs.php">My Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./my_blogs/add_blogs/add_blogs.php">Add Blog</a>
        </li>
          <?php } ?>
      </ul>
      <?php require_once('get_blogs.php'); ?>
    </div>
  </body>
</html>
