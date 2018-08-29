<?php
	/* 	
	Author: Gabriel Popa
	Date: 	02-15-2017
	Title: Lab 8
	Description: 
	*/	
?>
<html>
	<head>
		<title>Lab 8</title>
		<style>
		body { font-family: Verdana; margin-left: 50px; margin-right: 50px; }
		h1 { text-align: center; }
		</style>
	</head>
	<body>
	<hr>
	<h1> Lab 8 </h1>
	<hr>
	<br>
	
<?php

	if (!isset($_POST['submit'])) { 
// testing to see if the submit button was clicked. If yes, it will print a different version of the form
// here is if it was NOT clicked, so we're printing a no-php form
		print 
		"<form action='lab8.php' method='post'>
		
		<p><label for='data'>Enter 4 comma-separated numbers : </label><input type='text' name='data' value='' size='20' maxlength='20'></p>
	
		<p><input type='submit' id='submit' name='submit' value='Submit'></p>
		<p><input type='reset' id='reset' name='reset' value='Clear'></p>
		</form>";
	
    } else {
//submit button clicked, so we're adding the php, variables and other code
		
		print 
		"<form action='lab8.php' method='post'>
		
		<p><label for='data'>Enter 4 comma-separated numbers : </label><input type='text' name='data' value='' size='20' maxlength='20'></p>
	
		<p><input type='submit' id='submit' name='submit' value='Submit'></p>
		<p><input type='reset' id='reset' name='reset' value='Clear'></p>
		</form>";
		
		$data = $_POST["data"];
		$arr_main = explode(",", $data); 
	
		print"<pre>";
		print_r($arr_main);
		print"</pre>";
		
		//$sub_arr_element;	
		
		$sum = 0;
			
foreach ($arr_main as $key => $main_elem)
{
	$arr_main[$key] = explode(" ", $arr_main[$key]);
	$subarray = $arr_main[$key];
	
	for ($i = 0; $i < $main_elem; $i++)
	{
		$subarray[$i] = $i+1;
	}
	$arr_main[$key] = $subarray;
}			
	print"<pre>";
	print_r($arr_main);
	print"</pre>";			
			
/* foreach($arr_main as $key => $main_elem)
	{
		$arr_main[$key] = explode(" ", $arr_main[$key]);
		$sub_arr_element = 1;
		$first = array_shift($arr_main[$key]);
		while ($sub_arr_element <= $main_elem)
		{
		array_push($arr_main[$key], $sub_arr_element);
		$sub_arr_element++;		
		}		
	} */
	
	/* 
		print"<pre>";
		print_r($arr_main);
		print"</pre>";	
 */	
		// now to calculate the sum of the elements of the sub-arrays
		foreach($arr_main as $key=>$elem)
		{ 
			if (is_array($elem)) {
				foreach($elem as $value)
					{ 
					$sum = $sum + $value;
					}
			}
		}				
		print "<br><br>Sum: " . $sum;
		
}

?>
</body>
</html>		
