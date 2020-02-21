<?php
$imageErr="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$image_path='';
	$filename=$_FILES["fileToUpload"]["name"];
	$temp_filename=$_FILES["fileToUpload"]["tmp_name"];
	$target_dir = "./uploads/".$filename;
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
		$uploadOk = 1;
		} 
		else {
			//echo "File is not an image.";
			$uploadOk = 0;
			$imageErr="Please choose an image file";
		}
	}
	else {
		echo "hiii";
		$image_path="./my_blogs/add_blogs/uploads/default.jpeg";
		$uploadOk = 1;
		//$imageErr="Please choose an image file";
	}
	if($image_path=="") {
		if ($uploadOk == 1) {
			$image_path="./my_blogs/add_blogs/uploads/".$_FILES["fileToUpload"]["name"];
			if (move_uploaded_file($temp_filename, $target_dir)) {
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			}
			else {
			echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	
}
?>