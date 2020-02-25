<?php require_once('../../controller/read_blog/read_blog_controller.php'); ?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/style.css?v=1">
    <title>
      READ BLOG
    </title>
  </head>
  <body>
    <div class="container">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <?php 
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
          <a class="nav-link"  href="../../controller/logout/logout_controller.php">Logout</a>
          <?php }else{ ?>
          <a class="nav-link"  href="../login/login_view.php">Login</a>
          <?php } ?>
        </li>
        <?php 
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
        <li class="nav-item">
          <a class="nav-link " href="../my_blogs/my_blogs_view.php">My Blogs</a>
        </li>
        <?php }?>
        <?php 
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
        <li class="nav-item">
          <a class="nav-link" href="../add_blogs/add_blogs_view.php">Add Blog</a>
        </li>
        <?php }?>
        <li class="nav-item">
          <a class="nav-link"  href="../home/index.php">Home</a>
        </li>
      </ul>
      <?php 
      foreach ($posts as $blog) { ?>
        <h1><?php echo $blog['TITLE']; ?></h1>
        <div class='show-img'>
          <?php echo "<img class='show-image' src='".$blog['IMAGE']."'>"; ?>
        </div>
        <div class='show-content'>
          <?php echo $blog['CONTENT']; ?>
        </div>
        <?php $date = date('d/m/Y', $blog['BLOG_DATE']); ?>
        <div class='show-date'>
          <?php echo "Last Edit: ".$date; ?>
        </div>
        <div class='show-author'>
          <?php echo "By: ".$author; ?>
        </div>
      <?php } ?>
    </div>
  </body>
</html>