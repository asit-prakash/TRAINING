<?php
require_once('../user_active.php');
require_once('./get_edits.php');
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <title>
      Edit Blog
    </title>
  </head>
  <body>
    <div class="nav">
      <ul>
        <li>
          <?php 
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
            <a href="../../logout/logout.php">Logout</a>
          <?php }else{ ?>
            <a href="../../login/login.php">Login</a>
          <?php } ?>
          <a href="../my_blogs/myblogs.php">My Blogs</a>
          <a href='../add_blogs/add_blogs.php'>Add Blog</a>
          <a href="../../index.php">Home</a>
        </li>
      </ul>
      </div>
    <?php require_once('./image_validate.php'); ?>
    <form method="POST" enctype="multipart/form-data" action="">
    Enter Title:
    <input
      type="text"
      name='title'
      id='title'
      value='<?php echo $title; ?>'
      required>
    Enter Content:
    <textarea 
      rows='20'
      cols='100'
      name='content'
      id='content'
      required><?php echo $content; ?></textarea>
    Upload Image: 
    <input 
      type="file" 
      name="fileToUpload" 
      id="fileToUpload">
    <span class="error">* <?php echo $imageErr;?></span>
    <input
      type='submit'
      name='submit'
      id='submit'
      value='Update'>
    </form>
    <?php
    require_once('./update_edits.php');
    ?>
  </body>
</html>