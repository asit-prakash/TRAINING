<?php
namespace blog;
require './vendor/autoload.php';
use dbcon\db_conn;

class blogs_model extends db_conn {

  private $access;
  private $posts=[];

  function __construct($access) {
    $this->access=$access;
  }

  public function get_all_blogs() {
    $ret_data="SELECT ID,TITLE,AUTHOR,BLOG_DATE,IMAGE FROM BLOG_DATA";
    $sql=mysqli_query($this->access, $ret_data);
    if($sql) {
      $count=mysqli_num_rows($sql);
      if($count>0) {
        while($data=mysqli_fetch_assoc($sql)) {
          $posts[]=$data;
        }
        return $posts;
      }
      else {
        return false;
      }
    }
    else {
      return mysqli_error($access);
    }
  }

  public function get_myblogs($user_name) {
    $ret_data="SELECT ID, TITLE,AUTHOR,BLOG_DATE,IMAGE FROM BLOG_DATA WHERE USERNAME='$user_name'";
    $sql=mysqli_query($this->access, $ret_data);
    if($sql) {
      $count=mysqli_num_rows($sql);
      if($count>0) {
        while($data=mysqli_fetch_assoc($sql)) {
          $posts[]=$data;
        }
        return $posts;
      }
      else {
        return false;
      }
    }
    // else {
    //   return mysqli_error($access);
    // }
  }

  public function read_blog($id) {
    $get_con="SELECT TITLE,CONTENT,BLOG_DATE,IMAGE FROM BLOG_DATA WHERE ID='$id'";
    $run=mysqli_query($this->access, $get_con);
    if($run) {
      $count=mysqli_num_rows($run);
      if($count>0) {
        while($content=mysqli_fetch_assoc($run)) {
          $posts[]=$content;
        }
      return $posts;
      }
    }
    else {
      return mysqli_error($this->access);
    }
  }

  public function add_blog($title,$author,$content,$timestamp,$user_name,$image_path) {
    $entry="INSERT INTO BLOG_DATA (TITLE,AUTHOR,CONTENT,BLOG_DATE,USERNAME,IMAGE) VALUES 
    ('$title','$author','$content','$timestamp','$user_name','$image_path')";
    $run_sql=mysqli_query($this->access, $entry);
    if ($run_sql) {
      return true;
    }
    else {
      return mysqli_error($this->access);
    }
  }

  public function get_edits($id) {
    $fetch="SELECT TITLE,CONTENT,IMAGE FROM BLOG_DATA WHERE ID=$id";
    $fetch_data=mysqli_query($this->access, $fetch);
    if($fetch_data) {
      $count=mysqli_num_rows($fetch_data);
      if($count>0) {
        while($data=mysqli_fetch_assoc($fetch_data)) {
          $posts[]=$data;
        }
        return $posts;
      }
    }
    // else {
    //   return mysqli_error($access);
    // }
  }

  public function update_edits($upd_title,$upd_content,$timestamp,$image_path,$id) {
    $upd_blog="UPDATE BLOG_DATA SET TITLE='".$upd_title."',CONTENT='".$upd_content."',
            BLOG_DATE='".$timestamp."',IMAGE='".$image_path."' WHERE ID='".$id."'";
    $run_updates=mysqli_query($this->access, $upd_blog);
    if ($run_updates) {
      return true;
    }
    else {
      return mysqli_error($this->access);		
    }
  }

  public function delete_blog($id) {
    $rm_blog="DELETE FROM BLOG_DATA WHERE ID='$id'";
    $del_blog=mysqli_query($this->access, $rm_blog);
    if ($del_blog) {
      return true;
    }
    else {
      return mysqli_error($this->access);	
    }
  }
}