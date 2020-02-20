<?php
require_once('../user_active.php');
require_once('./get_edits.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <title>
      Edit Blog
    </title>
  </head>
  <body>

  <div class="container">
      <ul class="nav nav-pills">
      <li class="nav-item">
          <?php
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
            <a class="nav-link"  href="../../logout/logout.php">Logout</a>
          <?php }else{ ?>
            <a class="nav-link"  href=".../../login/login.php">Login</a>
          <?php } ?>
          </li>
          <?php 
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
            <li class="nav-item">
          <a class="nav-link" href="../myblogs.php">My Blogs</a>
          </li>
          <?php } ?>
          <?php 
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
            <li class="nav-item">
          <a class="nav-link" href="../add_blogs/add_blogs.php">Add Blogs</a>
          </li>
          <?php } ?>
          <li class="nav-item">
          <a class="nav-link"  href="../../index.php">Home</a>
          </li>
      </ul>
    <?php require_once('./image_validate.php'); ?>
    <form class="form-group" method="POST" enctype="multipart/form-data" action="">
    <label for="title">Enter Title:</label>
    <input
      type="text"
      name='title'
      id='title'
      class="form-control"
      value='<?php echo $title; ?>'
      required>
    <label for="content">Enter Content:</label>
    <textarea 
      rows='15'
      cols='40'
      name='content'
      id='content'
      class="form-control"
      required><?php echo $content; ?></textarea>
    <label for="fileToUpload">Upload Image: </label>
    <input 
      type="file" 
      name="fileToUpload" 
      id="fileToUpload"
      class="form-control">
    <span class="error">* <?php echo $imageErr;?></span>
    <input
      type='submit'
      name='submit'
      id='submit'
      class="btn btn-primary "
      value='Update'>
    </form>
    <?php echo "<img  src='".'../../'.$data['IMAGE']."'>"; ?>
    <?php
    require_once('./update_edits.php');
    ?>
  </div>
  </body>
</html>