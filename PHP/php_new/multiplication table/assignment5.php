<!DOCTYPE html>
<html>
    <head>
        <title>MULTIPLICATION-TABLE</title>
    </head>
    <body>
        <form method="POST" action="">
           <input type=text name="row" id="row" placeholder="Enter no. of rows" required>
           <input type=text name="column" id="column" placeholder="Enter no. of columns" required>
           <input type="submit" name="submit" value="submit" id="submit"><br><br>
        </form>
        <?php
            class mult_table
            {
                function __construct()
                {
                    $row=$_POST['row'];
                    $column=$_POST['column'];
                    echo "<table border='1' width=300px cellpadding=0px>";
                    for($r=1;$r<=$row;$r++)
                    {
                        echo "<tr>";
                        for($c=1;$c<=$column;$c++)
                        {
                            echo "<td style=height:30px;width:30px;>";
                                echo $r."*".$c."=".$r*$c;
                            echo "</td>";
                        }
                        echo "<tr>";
                    }
                    echo "</table>";
                }
            }
         if(isset($_POST['submit']))
         {
            $show_table=new mult_table;
         }
        ?>
    </body>
</html>