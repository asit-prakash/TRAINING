<?php
require_once('./execution/ob_subj.php');
require_once('./execution/ob_std.php');

class index
{

  function show_sub($grade)
  {
    global $sub;
		foreach ($sub as $key => $value) 
		{
			if ($grade == $key)
			{
				foreach ($value as $key1 => $value1) 
				{
          echo "name = " . $value1->name . "<br>";
          echo "code = " . $value1->code . "<br>";
          echo "mm = " . $value1->mm . "<br><br>";
        }
      }
    }
	}
	
  function show_marks($id)
  {
    global $st;
		foreach ($st as $key => $value)
		{
			if($value->id == $id)
			{
        echo "<pre>";
        print_r($value->marks);
        echo "</pre>";
			}
    }
  }

  function cal_mm($key1)
  {
    global $sub;
    foreach ($sub as $key=>$value)
    {
      foreach ($value as $key2=>$value2)
      {
        if($value2->code == $key1)
        {
          return $value2->mm;
        }
      }
    }
  }

  function result($id)
  {
    global $st;
    $total=0;
    $i=0;
    $name='';
    $date='';
    $grade=0;
    $status='';
    foreach ($st as $key => $value)
    {
      if($value->id == $id)
      {
        $name=$value->name;
        $date=date('d-m-Y',$value->dob);
        $grade=$value->grade;
        foreach ($value->marks as $key1=>$value1)
        {
            $total=$total+$value1;
            $i++;
        }
      }
    }
    $percent=(($total)/($i*100))*100;
    if($percent>40)
    {
      $status='pass';
    }
    else
    {
      $status='fail';
    }
    echo "<table border='1' width=500px cellpadding=0px>";
      echo "<tr>";
        echo "<td>";
          echo "NAME";
        echo "</td>";
        echo "<td>";
          echo "DOB";
        echo "</td>";
        echo "<td>";
          echo "GRADE";
        echo "</td>";
        echo "<td>";
          echo "SUBJECTS";
        echo "</td>";
        echo "<td>";
          echo "RESULT";
        echo "</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>";
          echo $name;
        echo "</td>";
        echo "<td>";
          echo $date;
        echo "</td>";
        echo "<td>";
          echo $grade;
        echo "</td>";
        echo "<td>";
          foreach ($st as $key => $value)
          {
            if($value->id == $id)
            {
              foreach ($value->marks as $key1=>$value1)
              {
                //$mm=cal_mm($key1);
                echo $key1 . "(" . $value1 . "," . $this->cal_mm($key1) . ")" . "<br>";
              }
            }
          }
        echo "</td>";
        echo "<td>";
          echo $status;
        echo "</td>";
      echo "</tr>";
    echo "</table>";
  }
}

$show = new index;
$show->show_sub(12);
$show->show_marks('st2');
$show->result('st2');
?>