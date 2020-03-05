$(document).ready(function(){
  $("#username").keyup(function(){
    var username = $(this).val().trim();
    if(username != ''){
      $.ajax({
        url: '../controller/register/user_validate_controller.php',
        type: 'post',
        data: {username: username},
        success: function(response){
          if(response == 'available') {
            $('#uname_response').html(response).css({"color": "green"});
          }
          else {
            $('#uname_response').html(response).css({"color": "red"});
          }
        }
      });
    }
    else {
      $("#uname_response").html("");
    }
  });

  $("#fullname").keyup(function(){
    var fullname = $(this).val().trim();
    if(fullname != ''){
      $.ajax({
        url: '../controller/register/user_validate_controller.php',
        type: 'post',
        data: {fullname: fullname},
        success: function(response){
        $('#fullname_response').html(response);
        }
      });
    }
    else {
      $("#fullname_response").html("");
    }
  });

  $("#contact").keyup(function(){
    var contact = $(this).val().trim();
    if(contact != ''){
      $.ajax({
        url: '../controller/register/user_validate_controller.php',
        type: 'post',
        data: {contact: contact},
        success: function(response){
        $('#contact_response').html(response);
        }
      });
    }
    else {
      $("#contact_response").html("");
    }
  });

  $("#email").keyup(function(){
    var email = $(this).val().trim();
    if(email != ''){
      $.ajax({
        url: '../controller/register/user_validate_controller.php',
        type: 'post',
        data: {email: email},
        success: function(response){
        $('#email_response').html(response);
        }
      });
    }
    else {
      $("#email_response").html("");
    }
  });

  function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#confirm").val();
    if (password != confirmPassword)
      $("#password_response").html("Passwords do not match!");
    else
      $("#password_response").html("");
  }
  $("#confirm").keyup(checkPasswordMatch);
});
