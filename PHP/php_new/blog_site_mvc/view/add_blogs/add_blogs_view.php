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
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js?v=1"></script>
    <title>
      Add Blogs
    </title>
  </head>
  <body>
    <div class="navigation">
      <div class="site">
        <a class="nav-link" href="http://www.site.com/home">Blogastic.com</a>
      </div>
      <div class="links">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link"  href="http://www.site.com/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://www.site.com/myblogs">My Blogs</a>
          </li>
          <li class="nav-item">
          <?php
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
          <li class="nav-item">
            <a class="nav-link active" href="http://www.site.com/addblog">Add Blog</a>
          </li>
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['username']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Your Profile</a>
              <a class="dropdown-item" href="http://www.site.com/logout">Logout</a>
          </div>
          <?php }
          else { ?>
          <a class="nav-link"  href="http://www.site.com/login">Login</a>
          <?php } ?>
          </li>
        </ul>
      </div>
    </div>
    <div class="container">
      <?php if(isset($added)) { ?>
        <div class="alert alert-success">
          <?php echo $added ?>
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
          placeholder="Title goes here"
          required>
        <label for="content">Enter Content:</label>
        <textarea 
          rows='15'
          cols='40'
          name='content'
          id='content'
          class="form-control"
          placeholder='Content goes here'
          required></textarea>
          <script>CKEDITOR.replace( 'content' );</script>
        <label for="fileToUpload">Upload Image: </label>
        <input
          type="file"
          name="fileToUpload"
          id="fileToUpload"
          class="form-control img-upload">
        <span class="error"><?php echo $imageErr;?></span>
        <input
          type='submit'
          name='submit'
          id='post'
          class="btn btn-primary "
          value='Post'>
        </form>
      </div>
    </div>
    <div class="footer">
      <div class="footer-top">
        <div class="row">
          <div class="about">
            <h5>About Us</h5>
            <a class="site-footer" href="http://www.site.com/home">Blogastic.com</a>
            <p class="tagline">Navigating you to multiverse of ideas and people</p>
          </div>
          <div class="footer-tab">
            <h5>Quick Links</h5>
            <div>
              <a class="link-footer" href="http://www.site.com/home">Home</a>
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
  </body>
</html>