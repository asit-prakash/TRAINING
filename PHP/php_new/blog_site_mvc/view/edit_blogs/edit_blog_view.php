<?php
require_once('../../controller/edit_blogs/editblogs_controller.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/style.css?v=1">
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js?v=1"></script>
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
            <a class="nav-link"  href="../../controller/logout/logout.php">Logout</a>
          <?php }else{ ?>
            <a class="nav-link"  href=".../../login/login.php">Login</a>
          <?php } ?>
          </li>
          <?php 
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
            <li class="nav-item">
          <a class="nav-link" href="../my_blogs/my_blogs_view.php">My Blogs</a>
          </li>
          <?php } ?>
          <?php 
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
            <li class="nav-item">
          <a class="nav-link" href="../add_blogs/add_blogs_view.php">Add Blogs</a>
          </li>
          <?php } ?>
          <li class="nav-item">
          <a class="nav-link"  href="../home/index.php">Home</a>
          </li>
      </ul>
    <form class="form-group" method="POST" enctype="multipart/form-data" action="">
    <label for="title">Enter Title:</label>
    <input
      type="text"
      name='title'
      id='title'
      maxlength="100"
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
      <script>CKEDITOR.replace( 'content' );</script>
    <label for="fileToUpload">Upload Image: </label>
    <input 
      type="file" 
      name="fileToUpload" 
      id="fileToUpload"
      class="form-control">
    <span class="error"><?php echo $imageErr;?></span>
    <input
      type='submit'
      name='submit'
      id='submit'
      class="btn btn-primary "
      value='Update'>
    </form>
    <?php echo "<img style='width:300px;' src='".$img_path."'>"; ?>
  </div>
  </body>
</html>