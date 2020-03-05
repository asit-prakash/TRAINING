<?php
ob_start();
//session_start();
require './vendor/autoload.php';
use dbcon\db_conn;
use blog\blogs_model;

$id=$_SESSION['id'];
$obj_db=new db_conn;
$access=$obj_db->open_db_conn();
$obj_model = new blogs_model($access);
$posts=$obj_model->get_edits($id);
$title=$posts[0]['TITLE'];
$content=$posts[0]['CONTENT'];
$img_path=$posts[0]['IMAGE'];

$imageErr="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
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
		}
	}
	else {
		$image_path=$img_path;
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
			echo "Sorry, there was an error uploading your file.";
			}
		}
	}
}

if($_SERVER["REQUEST_METHOD"] == "POST" && $imageErr == "") {
  $upd_title=$_POST['title'];
	$upd_title=addslashes($upd_title);
	$upd_title = htmlspecialchars($upd_title);
	$upd_content=$_POST['content'];
	$upd_content=addslashes($upd_content);
	//$upd_content = htmlspecialchars($upd_content);
  $timestamp=time();

  $update=$obj_model->update_edits($upd_title,$upd_content,$timestamp,$image_path,$id);
  if ($update == true) {
    $updated="Your blog is successfully updated";
    header ('Refresh: 0.5; URL=http://www.site.com/myblogs');
	}
	else {
		echo $update;		
  }
}
require_once('./view/edit_blogs/edit_blog_view.php');