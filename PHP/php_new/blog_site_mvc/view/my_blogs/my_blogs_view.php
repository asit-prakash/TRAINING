<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../view/assets/style.css?v=1">
    <title>
      My Blogs
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
            <a class="nav-link active" href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/myblogs">My Blogs</a>
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
                  <button id="delete" class='btn btn-primary' type='submit' name='delete'>Delete</button>
                </form>
        </div>
            </div>
          </div>
        <?php }
      } ?>
  </div>
  <div class="footer">
      <div class="footer-top">
        <div class="row">
          <div class="about">
            <h5>About Us</h5>
            <a class="site-footer" href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/home">Blogastic.com</a>
            <p class="tagline">Navigating you to multiverse of ideas and people</p>
          </div>
          <div class="footer-tab">
            <h5>Quick Links</h5>
            <div>
              <a class="link-footer" href="http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/home">Home</a>
            </div>
          </div>
          <div class="footer-tab">
            <h5>Powered By:</h5>
            <div class="innoraft-logo">
              <img class="innoraft-img" src="../view/assets/innoraft.png" alt="image">
            </div>
          </div>
          <div class="footer-tab">
            <h5>Let us help you</h5>
            <p class="support">Need support? Poke us at</p>
            <p class="support-email">asit.prakash@innoraft.com</p>
          </div>
          <div class="footer-tab">
            <h5>Follow us on</h5>
            <div class="icons">
              <a href="https://www.facebook.com/">
                <i class="fa fa-facebook-f follow-icon"></i>
              </a>
              <a href="https://www.instagram.com/">
                <i class="fa fa-instagram follow-icon"></i>
              </a>
              <a href="https://www.twitter.com/">
                <i class="fa fa-twitter follow-icon"></i>
              </a>  
            </div>
          </div>
          <div class="donate">
            <hr>
            <div class="donate-content">
              <p class="support">Donations show appreciation.</p>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                Donate
              </button>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pay via UPI</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <img class="upi-img" src="../view/assets/upi.jpeg">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p class="copyright"> &copy; 2020 Blogastic.com All rights reserved</p>
      </div>
    </div>
  <script type="text/javascript" src="../components/confirm_delete.js?v=2"></script>
  </body>
</html>
