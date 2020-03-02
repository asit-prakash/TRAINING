<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../view/assets/style.css?v=1">
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js?v=1"></script>
    <title>
      Edit Blog
    </title>
  </head>
  <body>
    <div class="navigation">
      <div class="site">
        <a class="nav-link" href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/home">Blogastic.com</a>
      </div>
      <div class="links">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link"  href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/myblogs">My Blogs</a>
          </li>
          <li class="nav-item">
          <?php
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/addblog">Add Blog</a>
          </li>
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['username']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Your Profile</a>
              <a class="dropdown-item" href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/logout">Logout</a>
          </div>
          <?php }
          else { ?>
          <a class="nav-link"  href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/login">Login</a>
          <?php } ?>
          </li>
        </ul>
      </div>
    </div>
    <div class="container">
      <?php if(isset($updated)) { ?>
        <div class="alert alert-success">
          <?php echo $updated ?>
        </div>
      <?php } ?>
      <div class="blog-form">
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
          id='update'
          class="btn btn-primary "
          value='Update'>
        </form>
        <?php echo "<img style='width:300px;' src='".$img_path."'>"; ?>
      </div>
    </div>
  </body>
</html>