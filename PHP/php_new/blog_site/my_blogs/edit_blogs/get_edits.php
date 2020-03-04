<?php
  require_once('../../db_connection/mysql.php');
  $id=$_SESSION['id'];
  $fetch="SELECT TITLE,CONTENT,IMAGE FROM BLOG_DATA WHERE ID=$id";
  $fetch_data=mysqli_query($conn, $fetch);
  if($fetch_data) {
    $count=mysqli_num_rows($fetch_data);
    if($count>0) {
      $data=mysqli_fetch_assoc($fetch_data);
      $title=$data['TITLE'];
      $content=$data['CONTENT'];
    }
  }