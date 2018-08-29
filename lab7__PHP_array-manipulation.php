<?php
	/* 	Author: Gabriel Popa
		Date: 	02-08-2017
		Title: Lab 7
		Description: 
	*/
?>
<html>
	<head>
		<title>Lab 7</title>		
	</head>	
	<body>
	<h1 style="text-align: center; font-size: 42px; font-family: Verdana;">Lab 7</h1>
<?php
	//original string:
	$str = "John, Jerry, Ann, Sanji, Wen, Paul, Louise, Peter";
	print "<h2>1. Original String:</h2>";
	print $str;
	print "<br>";
	
	// turning the string into an array using explode() :
	$str_array = explode(",", $str); 
	print "<h2>2. - 3. Original string 'exploded' into an array:</h2>";
	print_r($str_array);
	print "<br>";
	
	// sorting the array in ascending order:
	$str_array_sorted = $str_array; 
	sort($str_array_sorted, SORT_NATURAL); 
	print "<h2>4. - 5. Original array sorted in ascending order using 'sort':</h2>";
	print_r($str_array_sorted);
	print "<br>";
	
	// reversing the sorted array:
	$arr_reverse_sorted = array_reverse($str_array_sorted);
	print "<h2>6. Original array reversed:</h2>";
	print_r($arr_reverse_sorted);
	print "<br>";
	
	// removing the first element:
	$arr_rev_first = array_shift($arr_reverse_sorted);
	print "<h2>7. - 8. Original array reversed and first element removed:</h2>";
	print_r($arr_reverse_sorted);
	print "<br>";
	
	// adding Willie and Daniel:
	$willie_daniel = $arr_reverse_sorted;
	array_push($willie_daniel, 'Willie', 'Daniel');
	print "<h2>9. Same array as above but with Willie and Daniel added:</h2>";
	print_r($willie_daniel);
	print "<br>";
	
	// replacing Paul with Andre:
	$andre = $willie_daniel;
	$andre[2] = 'Andre';
	print "<h2>10. Same array as above but replaced 'Paul' with 'Andre':</h2>";
	print_r($andre);
	print "<br>";
	
	// var_dump() :
	print "<h2>11. Array displayed using var_dump(), Willie & Daniel added, Paul replaced Andre:</h2>";
	print_r(var_dump($andre));
	print "<br>";
	
	// adding Alisha to beginning of array:
	$alisha = $andre;
	array_unshift($alisha, 'Alisha');
	print "<h2>12. Added 'Alisha' to beginning of array using array_unshift():</h2>";
	print_r($alisha);
	print "<br>";
	
	// new array with new names:
	$new_arr = array('Mary', 'Janet', 'Gabe', 'Lisa', 'Michelle');
	print "<h2>13. New array of new, different names:</h2>";
	print_r($new_arr);
	print "<br>";
	
	// var_dump() :
	print "<h2>14. New array displayed using var_dump():</h2>";
	print_r(var_dump($new_arr));
	print "<br>";
	
	// merge and sort arrays:
	$merged = array_merge($alisha, $new_arr);
	sort($merged, SORT_NATURAL);
	print "<h2>15. - 16. Both arrays merged, results in sorted order:</h2>";
	print_r($merged);
	print "<br><br>";
?>
	<h1 style="text-align: center; font-size: 42px; font-family: Verdana;">- The End -</h1>
	</body>
</html>		
