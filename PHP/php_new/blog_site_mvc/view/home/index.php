<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' href='../view/assets/style.css?v=1'>
    <title>
      HOMEPAGE
    </title>
  </head>
  <body>
    <div class="container">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active" href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/home">Home</a>
        </li>
        <li class="nav-item">
          <?php 
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
            <a class="nav-link"  href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/logout">Logout</a>
          <?php }else{ ?>
            <a class="nav-link"  href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/login">Login</a>
          <?php } ?>
        </li>
          <?php 
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
        <li class="nav-item">
          <a class="nav-link" href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/myblogs">My Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/addblog">Add Blog</a>
        </li>
          <?php } ?>
      </ul>
      <?php if(isset($noblog_msg)) { ?>
        <div class="alert alert-success">
          <?php echo $noblog_msg; ?>
        </div>
      <?php } 
      else { 
        foreach ($posts as $blog) { ?>
          <div class='card'>
          <div class='card-img-top'>
            <?php echo "<img class='card-img'  src='".$blog['IMAGE']."'>"; ?>
          </div>
          <div class='card-body'>
            <div class='card-title'>
              <?php echo $blog['TITLE']; ?>
            </div>
            <div class='card-text'>
              <?php echo "By: ".$blog['AUTHOR']; ?>
            </div>
            <?php $date = date('d/m/Y', $blog['BLOG_DATE']); ?>
            <div class='card-text'>
              <?php echo $date; ?>
            </div>
            <div class="home">
              <form method='POST' action=''>
                <?php echo "<input type='hidden' name='pass_id' value= '".$blog['ID']."'/>"; ?>
                <?php echo "<input type='hidden' name='pass_author' value= '".$blog['AUTHOR']."'/>"; ?>
                <button class='btn btn-primary' type='submit' name='read'>Read More</button>
              </form>
            </div>
          </div>
        </div>
  <?php }
      } ?>
    </div>
  </body>
</html>