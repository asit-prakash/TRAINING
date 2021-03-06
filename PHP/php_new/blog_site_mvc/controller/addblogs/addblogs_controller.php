<?php
ob_start();
//session_start();
require './vendor/autoload.php';
use dbcon\db_conn;
use blog\blogs_model;

$imageErr="";
$contentErr="";
$errorFlag=0;
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$content=$_POST['content'];
	if(str_word_count($content)<300) {
		$contentErr = "Blog content length should be minimmum 300 words";
		$errorFlag++;
	}
	$image_path='';
	$filename=$_FILES["fileToUpload"]["name"];
	$temp_filename=$_FILES["fileToUpload"]["tmp_name"];
	$target_dir = "./view/assets/uploads/".$filename;
	$target_file = $target_dir . basename($filename);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	// 				&& $imageFileType != "gif" ) {
	// 	$imageErr="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	// 	$uploadOk = 0;
	// }
	if(!empty($filename)) {
		$check = getimagesize($temp_filename);
		if($check !== false) {
		//echo "File is an image - " . $check["mime"] . ".";
			if ($_FILES["fileToUpload"]["size"] > 3000000) {
				$imageErr="maximmum image size is 3MB";
				$errorFlag++;
				$uploadOk = 0;
			}
			else {
				$uploadOk = 1;
			}
		} 
		else {
			//echo "File is not an image.";
			$uploadOk = 0;
			$imageErr="Please choose an image file";
			$errorFlag++;
		}
	}
	else {
		$image_path="../view/assets/uploads/default.jpeg";
		$uploadOk = 1;
		//$imageErr="Please choose an image file";
	}
	if($image_path=="") {
		if ($uploadOk == 1) {
			$image_path="../view/assets/uploads/".$_FILES["fileToUpload"]["name"];
			if (move_uploaded_file($temp_filename, $target_dir)) {
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			}
			else {
				$imageErr = "Sorry, there was an error uploading your file.";
				$errorFlag++;
			}
		}
	}
}

$obj_db=new db_conn;
$access=$obj_db->open_db_conn();
$obj_model = new blogs_model($access);

if($_SERVER["REQUEST_METHOD"] == "POST" && $errorFlag==0) {
  //session_start();
  $title=$_POST['title'];
	$title=addslashes($title);
	$title = htmlspecialchars($title);
  $author=$_SESSION['name'];
  $author=addslashes($author);
	$content=$_POST['content'];
	//$content = htmlspecialchars($content);
	$content=addslashes($content);
	//$content=htmlentities($content);
  $timestamp=time();
  $user_name=$_SESSION['username'];
  $user_name=addslashes($user_name);

  $add=$obj_model->add_blog($title,$author,$content,$timestamp,$user_name,$image_path);
    if ($add == true) {
    $added = "New blog created successfully";
    header ('Refresh: 0.5; URL=http://www.site.com/myblogs');
    }
    else {
    echo "Error: " . $run_sql . "" . mysqli_error($conn) . "<br>";		
    }
}
require_once('./view/add_blogs/add_blogs_view.php');