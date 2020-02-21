<?php
namespace blogger;

class user {
  private $user_name;
  private $pass_word;
  private $contact;
  private $email;
  private $name;
  
  function __construct($user_name,$pass_word,$contact,$email,$name) {
    $this->user_name=$user_name;
    $this->pass_word=$pass_word;
    $this->contact=$contact;
    $this->email=$email;
    $this->name=$name;
  }

  function get_username() {
    return $this->user_name;
  }

  function get_password() {
    return $this->pass_word;
  }

  function get_contact() {
    return $this->contact;
  }

  function get_email() {
    return $this->email;
  }

  function get_name() {
    return $this->name;
  }  
}