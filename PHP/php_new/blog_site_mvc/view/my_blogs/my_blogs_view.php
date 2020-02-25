<?php require_once('../../controller/myblogs/myblogs_controller.php'); ?>
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
      My Blogs
    </title>
  </head>
  <body>
  <div class="container">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" href="./my_blogs/my_blogs_view.php">My Blogs</a>
      </li>
      <li class="nav-item">
        <?php 
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
        <a class="nav-link"  href="../../controller/logout/logout_controller.php">Logout</a>
        <?php }else{ ?>
        <a class="nav-link"  href="../login/login_view.php">Login</a>
        <?php } ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../add_blogs/add_blogs_view.php">Add Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="../home/index.php">Home</a>
      </li>
      </ul>
      <?php if(isset($del_succ)) { ?>
        <div class="alert alert-success">
          <?php echo $del_succ; ?>
        </div>
      <?php } ?>
      <?php if(isset($noblog_msg)) { ?>
        <div class="alert alert-success">
          <?php echo $noblog_msg; ?>
        </div>
      <?php } 
      else { 
        foreach ($posts as $blog) { ?>
          <div class='card'>
            <div class='card-img-top'>
              <?php echo "<img  class='card-img' src='".$blog['IMAGE']."'>"; ?>
            </div>
            <div class='card-body'>
              <div class='card-title'>
                <?php echo $blog['TITLE']; ?>
              </div>
              <?php $date = date('d/m/Y', $blog['BLOG_DATE']); ?>
              <div class='card-text'>
                <?php echo $date; ?>
              </div>
              <div class="home">
                <form method='POST' action=''>
                  <?php echo "<input type='hidden' name='pass_id' value= '".$blog['ID']."'/>"; ?>
                  <button class='btn btn-primary' type='submit' name='read'>Read More</button>
                  <button class='btn btn-primary' type='submit' id='edit' name='edit'>Edit</button>
                  <button class='btn btn-primary' type='submit' name='delete'>Delete</button>
                </form>
        </div>
            </div>
          </div>
        <?php }
      } ?>
  </div>
  </body>
</html>
