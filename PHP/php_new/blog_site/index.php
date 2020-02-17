<!DOCTYPE html>
<html>
  <head>
    <title>
      HOMEPAGE
    </title>
    <style>
      *{
        margin:0;
        padding:0;
      }
      .nav {
        width:100%;
        background-color:gray;
        float:left;
      }
      a {
        float:right;
        text-decoration:none;
        list-style:none;
        padding:10px;
        color:white;
      }
      .teaser {
        float:left;
      }
      .blog {
        padding:10px;
      }
    </style>
  </head>
  <body>
    <div class="nav">
      <ul>
        <li>
          <a href="myblogs.php">MyBlogs</a>
          <a href="myblogs.php">MyBlogs</a>
        </li>
      </ul>
    </div>
    <div class="teaser">
      <?php
        require_once('./db_connection/mysql.php');
        $ret_data="SELECT TITLE,AUTHOR,BLOG_DATE FROM BLOG_DATA";
        $sql=mysqli_query($conn, $ret_data);
        if($sql) {
          $count=mysqli_num_rows($sql);
          if($count>0) {
            while($data=mysqli_fetch_assoc($sql)) {
              echo "<div class='blog'>";
              echo $data['TITLE'];
              echo $data['AUTHOR'];
              echo $data['BLOG_DATE'];
              echo "</div>";
            }
          }
          else {
            echo "Sorry..No blogs on this site,please come back later";
          }
        }
      ?>
    </div>
  </body>
</html>