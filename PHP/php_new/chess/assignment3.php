<!DOCTYPE html>
<html>
    <head>
        <title>CHESS</title>
    </head>
    <body>
        <?php
            class chess
            {
                function __construct()
                {
                    $row=8;
                    $column=8;
                    echo "<table border='1' width=300px cellpadding=0px>";
                    for($r=0;$r<$row;$r++)
                    {
                        echo "<tr>";
                        for($c=0;$c<$column;$c++)
                        {
                            if(($r + $c) % 2 == 0)
                            {
                                echo "<td style=background-color:white;height:30px;width:30px;>";
                                echo "<td>";
                            }
                            else
                            {
                                echo "<td style=background-color:black;height:30px;width:30px;>";
                                echo "<td>";
                            }
                        }
                        echo "<tr>";
                    }
                    echo "</table>";
                }
            }
            $show_chess=new chess;
        ?>
    </body>
</html>