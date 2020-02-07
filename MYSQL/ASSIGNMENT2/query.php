<?php
    include_once 'mysql.php';
    echo "QUERY1:";
    $quer1="SELECT EMPLOYEE_FIRST_NAME,EMPLOYEE_SALARY
            FROM EMPLOYEE_DETAILS_TABLE D,
            EMPLOYEE_SALARY_TABLE S WHERE
            D.EMPLOYEE_ID=S.EMPLOYEE_ID AND
            EMPLOYEE_SALARY>50000;";
    $querex1=mysqli_query($conn, $quer1);
    $row1 = mysqli_num_rows($querex1);
    if($row1>0)
    {
        echo "<table border = '2px solid black'>";
        echo "<th>"."EMPLOYEE_FIRST_NAME"."</th>";
        echo "<th>"."EMPLOYEE_SALARY"."</th>";
        while($row1 = mysqli_fetch_assoc($querex1))
        {
            echo "<tr>";
                echo "<td>" . $row1["EMPLOYEE_FIRST_NAME"] . "</td>";
                echo "<td>" . $row1["EMPLOYEE_SALARY"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    else
    {
        echo "Empty Table";
    }

    echo "QUERY2:";
    $quer2="SELECT EMPLOYEE_LAST_NAME FROM
    EMPLOYEE_DETAILS_TABLE WHERE
    GRADUATION_PERCENTILE>70;";
    $querex2=mysqli_query($conn, $quer2);
    $row2 = mysqli_num_rows($querex2);
    if($row2>0)
    {
        echo "<table border = '2px solid black'>";
        echo "<th>"."EMPLOYEE_LAST_NAME"."</th>";
        while($row2 = mysqli_fetch_assoc($querex2))
        {
            echo "<tr>";
                echo "<td>" . $row2["EMPLOYEE_LAST_NAME"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    else
    {
        echo "Empty Table";
    }

    echo "QUERY3:";
    $quer3="SELECT ECT.EMPLOYEE_CODE_NAME FROM EMPLOYEE_CODE_TABLE ECT WHERE ECT.EMPLOYEE_CODE IN(
        SELECT EST.EMPLOYEE_CODE FROM EMPLOYEE_SALARY_TABLE EST WHERE EST.EMPLOYEE_ID IN (
        SELECT EDT.EMPLOYEE_ID FROM EMPLOYEE_DETAILS_TABLE EDT WHERE EDT.GRADUATION_PERCENTILE<70));";
    $querex3=mysqli_query($conn, $quer3);
    $row3 = mysqli_num_rows($querex3);
    if($row3>0)
    {
        echo "<table border = '2px solid black'>";
        echo "<th>"."EMPLOYEE_CODE_NAME"."</th>";
        while($row3 = mysqli_fetch_assoc($querex3))
        {
            echo "<tr>";
                echo "<td>" . $row2["EMPLOYEE_CODE_NAME"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    else
    {
        echo "Empty Set"."<br><br>";
    }

    echo "QUERY4:";
    $quer4="SELECT CONCAT(EMPLOYEE_FIRST_NAME,' ',EMPLOYEE_LAST_NAME) AS FULLNAME FROM EMPLOYEE_DETAILS_TABLE EDT WHERE
    EDT.EMPLOYEE_ID IN (SELECT EST.EMPLOYEE_ID FROM EMPLOYEE_SALARY_TABLE EST WHERE EST.EMPLOYEE_CODE IN (
    SELECT ECT.EMPLOYEE_CODE FROM EMPLOYEE_CODE_TABLE ECT WHERE ECT.EMPLOYEE_DOMAIN!='JAVA'));";
    $querex4=mysqli_query($conn, $quer4);
    $row4 = mysqli_num_rows($querex4);
    if($row4>0)
    {
        echo "<table border = '2px solid black'>";
        echo "<th>"."EMPLOYEE_FULL_NAME"."</th>";
        while($row4 = mysqli_fetch_assoc($querex4))
        {
            echo "<tr>";
                echo "<td>" . $row4["FULLNAME"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    else
    {
        echo "Empty Set";
    }

    echo "QUERY5:";
    $quer5="SELECT ECT.EMPLOYEE_DOMAIN, SUM(EST.EMPLOYEE_SALARY) AS TOTAL_SAL FROM  
    EMPLOYEE_CODE_TABLE ECT JOIN EMPLOYEE_SALARY_TABLE EST
    ON EST.EMPLOYEE_CODE=ECT.EMPLOYEE_CODE
    GROUP BY ECT.EMPLOYEE_DOMAIN;";
    $querex5=mysqli_query($conn, $quer5);
    $row5 = mysqli_num_rows($querex5);
    if($row5>0)
    {
        echo "<table border = '2px solid black'>";
        echo "<th>"."EMPLOYEE_DOMAIN"."</th>";
        echo "<th>"."TOTAL_SAL"."</th>";
        while($row5 = mysqli_fetch_assoc($querex5))
        {
            echo "<tr>";
                echo "<td>" . $row5["EMPLOYEE_DOMAIN"] . "</td>";
                echo "<td>" . $row5["TOTAL_SAL"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    else
    {
        echo "Empty Set";
    }

    echo "QUERY6:";
    $quer6="SELECT ECT.EMPLOYEE_DOMAIN, SUM(EST.EMPLOYEE_SALARY) AS TOTAL_SAL FROM  
    EMPLOYEE_CODE_TABLE ECT JOIN EMPLOYEE_SALARY_TABLE EST
    ON EST.EMPLOYEE_CODE=ECT.EMPLOYEE_CODE
    WHERE EST.EMPLOYEE_SALARY>30000
    GROUP BY ECT.EMPLOYEE_DOMAIN;";
    $querex6=mysqli_query($conn, $quer6);
    $row6 = mysqli_num_rows($querex6);
    if($row6>0)
    {
        echo "<table border = '2px solid black'>";
        echo "<th>"."EMPLOYEE_DOMAIN"."</th>";
        echo "<th>"."TOTAL_SAL"."</th>";
        while($row6 = mysqli_fetch_assoc($querex6))
        {
            echo "<tr>";
                echo "<td>" . $row6["EMPLOYEE_DOMAIN"] . "</td>";
                echo "<td>" . $row6["TOTAL_SAL"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    else
    {
        echo "Empty Set";
    }

    echo "QUERY7:";
    $quer7="SELECT EMPLOYEE_ID FROM EMPLOYEE_SALARY_TABLE WHERE EMPLOYEE_CODE IS NULL;";
    $querex7=mysqli_query($conn, $quer7);
    $row7 = mysqli_num_rows($querex7);
    if($row7>0)
    {
        echo "<table border = '2px solid black'>";
        echo "<th>"."EMPLOYEE_DOMAIN"."</th>";
        echo "<th>"."TOTAL_SAL"."</th>";
        while($row7 = mysqli_fetch_assoc($querex7))
        {
            echo "<tr>";
                echo "<td>" . $row7["EMPLOYEE_DOMAIN"] . "</td>";
                echo "<td>" . $row7["TOTAL_SAL"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    else
    {
        echo "Empty Set";
    }

?>