<!DOCTYPE html>
<html>
    <head>
        <title>MD ARRAY COMPARISON</title>
    </head>
    <body>
    <?php
        function compare($a1,$a2)
        {
            $count=count($a1[0]);
            for($i=0;$i<$count;$i++)
            {
                $diff=$a1[0][$i]-$a2[0][$i];
                $diff=abs($diff);
                echo "The difference first and second array is: " .$diff. "<br>";
            }
        }
        $arr1=array(
                        array(5,76,23,12)
                    );
        $arr2=array(
                        array(56,89,35,29)
                    );
        compare($arr1,$arr2);
    ?>
    </body>
</html>