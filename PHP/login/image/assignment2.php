<?php include '../session_info/session_info.php';?>
<html>
	<head>
		<title>IMAGE DISPLAY</title>
		<link rel="stylesheet" type="text/css" href="../css/assignment.css">
		
	</head>
	<body>
		<?php include '../name/assign1_validation.php';?>
		<?php include '../image/assign2_validation.php';?>
		<form method="post" enctype="multipart/form-data" action="">  
		First Name: 
        <input 
            type="text" 
            name="firstname" 
            id="firstname"
			placeholder="Enter Firstname">
		<span class="error">* <?php echo $firstnameErr;?></span>
  		<br><br>
		Last Name: 
        <input 
            type="text" 
            name="lastname" 
            id="lastname"
			placeholder="Enter Lastname">
		<span class="error">* <?php echo $lastnameErr;?></span>
  		<br><br>
		Full Name: 
        <input 
            disabled="disabled" 
            type = "text" 
            name="fullname" 
            id="fullname" 
            value="">
        <br><br>
        Upload Image: 
        <input 
            type="file" 
            name="fileToUpload" 
            id="fileToUpload">
		<span class="error">* <?php echo $imageErr;?></span>
		<br><br>
		<input 
			type="submit" 
			name="submit" 
			value="SUBMIT">
		<input
            type="submit"
            name="logout"
            id="logout"
            value="LOGOUT">
		</form>
		<?php include '../get_path.php';?>
		<h2>Welcome
		<?php
            if($_SERVER["REQUEST_METHOD"] == "POST" && $firstnameErr == "" && $lastnameErr == ""
                && $imageErr == "")
            {
                include '../name/assign1_display.php';
                include '../image/assign2_display.php';
            }
        ?>
		<br>
        <a href="../name/assignment1.php">ASSIGNMENT1</a>
        <br>
        <a href="../marks/assignment3.php">ASSIGNMENT3</a>
        <br>
        <a href="../contact/assignment4.php">ASSIGNMENT4</a>
        <br>
        <a href="../email/assignment5.php">ASSIGNMENT5</a>
        </h2>
		<script type="text/javascript" src="../js/assignment.js"></script>
	</body>
</html>