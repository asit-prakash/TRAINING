<?php
//require_once('../my_blogs/user_active.php');
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
  header("Location:../../login/login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <title>
      My Blogs
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
          <a href="../myblogs.php">My Blogs</a>
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
      placeholder="Title goes here"
      required>
    Enter Content:
    <textarea 
      rows='20'
      cols='100'
      name='content'
      id='content'
      placeholder='Content goes here'
      required></textarea>
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
      value='Submit'>
    </form>
    <?php require_once('./blog_entry.php'); ?>
  </body>
</html>