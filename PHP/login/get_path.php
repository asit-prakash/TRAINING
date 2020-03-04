<?php
if(isset($_GET["q"]))
    {
        $get_path = $_GET["q"];
        if($get_path == '1')
        {
            header("location:../name/assignment1.php");
            exit;
        }
        if($get_path == '2')
        {
            header("location:../image/assignment2.php");
            exit;
        }
        if($get_path == '3')
        {
            header("location:../marks/assignment3.php");
            exit;
        }
        if($get_path == '4')
        {
            header("location:../contact/assignment4.php");
            exit;
        }
        if($get_path == '5')
        {
            header("location:../email/assignment5.php");
            exit;
        }
    }
?>