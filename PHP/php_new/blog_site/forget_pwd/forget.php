<!DOCTYPE html>
<html>
    <head>
        <title>
            FORGET PASSWORD
        </title>
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['last_action']))
            {
                $diff=time()- $_SESSION['last_action'];
                /*echo $diff."\n";
                echo time()."\n";
                echo $_SESSION['last_action']."\n";*/
                if($diff>20)
                {   
                    unset($_SESSION['last_action']);
                    header("Location:../login/login.php");
                }
            }
            else{
                header("Location:../login/login.php");
            }
            if(isset($_SESSION['username']) && isset($_SESSION['password']))
            {
                header("Location:../index.php");
            }
            include '../db_connection/mysql.php';
            $username=$_SESSION['username'];
            $ques="SELECT QUESTION FROM USER_DETAILS WHERE USERNAME='$username'";
            $getq=mysqli_query($conn, $ques);
            $row = mysqli_fetch_assoc($getq);
            foreach($row as $key=>$value)
            {
                echo "Your security question: "."$value"."<br>";
            }
        ?>
        <form method="POST" action="">
          <input 
                type="text" 
                name="answer" 
                id="answer"
                placeholder="Enter your answer"
                required>
            <input 
                type="password" 
                name="answer" 
                id="answer"
                placeholder="Enter your answer"
                required>
            <br><br>
            <input
                type="submit"
                name="submit"
                id="submit"
                value="Submit">
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
            {
                $answer=$_POST['answer'];
                $ansq="SELECT USERNAME FROM SECRET_QA WHERE ANSWER='$answer'";
                $sqlans=mysqli_query($conn,$ansq);
                $user= mysqli_fetch_assoc($sqlans);
                $userdb=$user['USERNAME'];
                if(!strcasecmp("$username","$userdb"))
                {
                    header("Location:./reset_pass.php");
                }
                else
                {
                    echo "You have entered wrong answer";
                }
            }
        ?>
    </body>
</html>