<?php
require_once('document.php');

function show_dt()
{
  global $clg_dt;
  foreach ($clg_dt as $key=>$value)
  {      
    echo "Name: " . $value->name . "<br>";
    echo "College_ID: " . $value->id . "<br>";
    foreach($value->details as $key1=>$value1)
    {        
      echo "Doc_Name: " . $value1['doc-name'] . "<br>";
      echo "Doc_Type: " . $value1['doc-type'] . "<br>";
      if($value1['doc-status'] == 1)
      {
        echo "Success" . "<br>";
      }
      else
      {
      echo "Fail" . "<br>";
			}
		}
		echo "<br>";
  }
}
show_dt();
/*echo "<pre>";
print_r($clg_dt);
print_r($doc_dt);
echo "</pre>";*/
?>