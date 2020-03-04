<?php
		$marksErr = "";//name-input-Error variable
		$marks = "";//name-input variable
		$marks_check =""; //name-input-patter-check variable
        
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
            $flag=0;
			$marks=$_POST['marks'];
			if($marks=="")
			{
				$marksErr="Enter marks in given format";
			}
			else
			{
				$exp = explode("\n",$marks);
				function trimvalues(&$key)
				{
					$key = trim($key," \r \t \n \0");
				}
	
				array_walk($exp, 'trimvalues');
					foreach($exp as $key => $value)
				{
					$len = strlen($value);
					if($len == 0)
					{	
						unset($exp[$key]);
						//echo"empty";
					}
				}
				foreach($exp as $key1 => $value1)
				{
					if(!preg_match("/^[a-zA-Z]+\|[0-9]+$/",$value1 ))
					{
						$flag = 1;
						$marksErr="Enter marks in given format";
					}
				}
			}
  			
		}
?>