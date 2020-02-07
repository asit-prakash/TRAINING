<!DOCTYPE html>
<html>
    <head>
        <title>ROCK-PAPER-SCISSOR</title>
    </head>
    <body>
        <form method="POST" action="">
            <input type="radio" name="user_choice" value="rock" id="rock" required>Rock<br>
            <input type="radio" name="user_choice" value="paper" id="paper" required>Paper<br>
            <input type="radio" name="user_choice" value="scissor" id="scissor" required>Scissor<br><br>
            <input type="submit" name="submit" id="submit"> 
        </form>
        <?php
            class game
            {
                function __construct()
                {
                    $user_choice=$_POST['user_choice'];
                    $elements=array('rock','paper','scissor');
                    shuffle($elements);
                    $comp_choice=$elements[1];
                    echo "You Chose: ".$user_choice."<br>";
                    echo "Computer Chose: ".$comp_choice."<br>";
                    
                    if($user_choice==$comp_choice)
                    {
                        echo "OhOh...The game have been tied";
                    }
                    if($user_choice=="rock")
                    {
                        if($comp_choice=="paper")
                        {
                            echo "Computer Won";
                        }
                        elseif($comp_choice=="scissor")
                        {
                            echo "you Won";
                        }
                    }
                    elseif($user_choice=="paper")
                    {
                        if($comp_choice=="scissor")
                        {
                            echo "Computer Won";
                        }
                        elseif($comp_choice=="rock")
                        {
                            echo "you Won";
                        }
                    }
                    elseif($user_choice=="scissor")
                    {
                        if($comp_choice=="rock")
                        {
                            echo "Computer Won";
                        }
                        elseif($comp_choice=="paper")
                        {
                            echo "you Won";
                        }
                    }
                }
            }
            if(isset($_POST['submit']))
            {
                $run=new game;
            }
        ?>
    </body>
</html>