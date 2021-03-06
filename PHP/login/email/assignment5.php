<?php include '../session_info/session_info.php';?>
<html>
	<head>
		<title>EMAIL VALIDATION</title>
		<link rel="stylesheet" type="text/css" href="../css/assignment.css">
		
	</head>
	<body>
		<?php include '../name/assign1_validation.php';?>
		<?php include '../image/assign2_validation.php';?>
        <?php include '../marks/assign3_validation.php';?>
        <?php include '../contact/assign4_validation.php';?>
        <?php include '../email/assign5_validation.php';?>
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
        Marks:
        <textarea 
            name="marks" 
            rows="5" 
            id="marks"
			placeholder="Enter sub & marks in Sub|marks format"></textarea>
            <span class="error">* <?php echo $marksErr;?></span>
        <br><br>
        Contact: 
        <input 
            type="text" 
            name="contact" 
            id="contact" 
            maxlength="14" 
            pattern="[+]{1}[9]{1}[1]{1}[1-9]{1}[0-9]{9}"
			placeholder="start with +91">
		<span class="error">* <?php echo $contactErr;?></span>
		<br><br>
        Email:
        <input 
            type="text" 
            name="email" 
            id="email" 
            maxlength="320"
			placeholder="Enter Email">
		<span class="error">* <?php echo $emailErr;?></span>
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
                && $imageErr == "" && $marksErr=="" && $contactErr == "" && $emailErr == "")
            {
                include '../name/assign1_display.php';
                include '../image/assign2_display.php';
                include '../marks/assign3_display.php';
                include '../contact/assign4_display.php';
                include '../email/assign5_display.php';
                echo "<a href='../form_response/form_response.php'>Download Response</a>"."<br>";
            }
        ?>
		<br>
        <a href="../name/assignment1.php">ASSIGNMENT1</a>
        <br>
        <a href="../image/assignment2.php">ASSIGNMENT2</a>
        <br>
        <a href="../marks/assignment3.php">ASSIGNMENT3</a>
        <br>
        <a href="../contact/assignment4.php">ASSIGNMENT4</a>
        </h2>
		<script type="text/javascript" src="../js/assignment.js"></script>
	</body>
</html>