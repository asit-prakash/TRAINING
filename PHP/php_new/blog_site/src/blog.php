<?php
namespace blogs;

class blog {
  private $title;
  private $author;
  private $content;
  private $timestamp;
  private $user_name;
  private $image_path;
  
  function __construct($title,$author,$content,$timestamp,$user_name,$image_path) {
    $this->title=$title;
    $this->author=$author;
    $this->content=$content;
    $this->timestamp=$timestamp;
    $this->user_name=$user_name;
    $this->image_path=$image_path;
  }

  function get_title() {
    return $this->title;
  }

  function get_author() {
    return $this->author;
  }

  function get_content() {
    return $this->content;
  }

  function get_timestamp() {
    return $this->timestamp;
  }

  function get_user_name() {
    return $this->user_name;
  }

  function get_image_path() {
    return $this->image_path;
  }  
}