<?php  /* 	
		*		Author: 	 Gabriel Popa
		*		Date: 		 03-29-2017
		*		Title: 		 Lab 15
		*		Description: Database Access & Queries 
		*/	
print "<html>	<head>	<title>Lab 15</title> 	
		<style>
		body { font-family: Verdana; margin-top: 15px; }
		form { padding: 10px; background-color: #70db70; border:0px solid #000; width: 60%; margin:auto; font-size: 18px; font-family: Verdana;}
		form div { margin: 5px 0; }
		label { width: 330px; text-align: right; display: inline-block; margin-right: 10px; }
		input[type='text'] { width: 330px; display: inline-block; }
		fieldset { margin: 10px; text-align: center; padding: 0px; border: 1px dotted #000; }
		legend { font-style: italic; font-size: 20px; font-weight: bold; margin: 0 0 0 30px; padding: 5px 0 15px 0; }
		.button { width: 260px; padding: 7px 0; font-size: 18px; color: #fff; background-color: #404040; text-align: center; margin: 15px 10px 25px 10px; cursor: pointer; border-radius: 10px; text-decoration: none; outline: none; border: none; box-shadow: 0 9px #999; }
		.button:hover { background-color: #000; }
		.button:active { background-color: #000; box-shadow: 0 5px #595959; transform: translateY(4px); }
		h1 { text-align: center; font-style: italic; margin: 0 0 15px 0; padding: 0px; } 
		h3 { text-align: center; font-style: italic; margin: 0 0 5px 0; padding: 0px; }
		h2, h4, h5 { text-align: center; }
		.error { color: #ff0000; margin: 10px auto; text-align: center; }
		.entry { color: #008000; margin: 10px auto; text-align: center; }		
		#queryTable { margin: 10px auto; border: 1px solid #000; }
		td, th { border: 1px solid #000; padding: 7px 5px; text-align: center; }
		</style> </head> 	<body>	<h1>Lab 15 - Database Access & Queries</h1>";
	
		function showForm() {
			print "<form name='lab15form' action=" . $_SERVER['PHP_SELF'] . " method='post'>
				<fieldset>	
				<div><button class='button' type='submit' name='transaction' value='Display Cars'>Display Cars</button></div>
				</fieldset>
				<fieldset>
				<legend>To add a car use the fields below:</legend>
				<div><label for='id'>Car ID:</label>
				<input type='text' id='id' name='car_id' value='' size='30' maxlength='30'></div>
	
				<div><label for='make'>Car Make:</label>
				<input type='text' id='make' name='car_make' value='' size='30' maxlength='50'></div>
				
				<div><label for='model'>Car Model:</label>
				<input type='text' id='model' name='car_model' value='' size='30' maxlength='50'></div>
				
				<div><label for='vin'>VIN:</label>
				<input type='text' id='vin' name='car_vin' value='' size='30' maxlength='20'></div>
				
				<div><label for='color'>Car color:</label>
				<input type='text' id='color' name='car_color' value='' size='30' maxlength='30'></div>
				
				<div><label for='mileage'>Car mileage:</label>
				<input type='text' id='mileage' name='car_mileage' value='' size='30' maxlength='20'></div>	
				
				<div><button class='button' type='submit' name='transaction' value='Add a car'>Add a car</button></div>
				</fieldset>
				<fieldset><legend>To change a car's mileage use the form below:</legend>
				<div><label for='vinSearch'>Change mileage for VIN:</label>
				<input type='text' id='vinSearch' name='vinSearch' value='' size='30' maxlength='20'></div>
				<div><label for='newMileage'>New mileage:</label>
				<input type='text' id='newMileage' name='newMileage' value='' size='30' maxlength='20'></div>
				<div><button class='button' type='submit' name='transaction' value='Modify a car'>Modify a car</button></div>
				</fieldset>		
			</form>";
		}
	
if (!isset($_POST['transaction'])) 
{ 	// testing to see if 'Submit' was clicked. If yes, it will print a different version of the form
	// here is if no buttons were clicked, so we're printing a no-php form
	
	showForm();	
}
else  // submit button clicked, so we're adding the php, variables and other code to this lab lab{		
	{
		if (isset($_POST['car_id'])) { $car_id = $_POST['car_id']; } 
		else { print "<p>car id not set</p>"; }
		
		if (isset($_POST['car_make'])) { $car_make = $_POST['car_make']; }
		else { print "<p>car make not set</p>"; }
		
		if (isset($_POST['car_model'])) { $car_model = $_POST['car_model']; } 
		else { print "<p>car model not set</p>"; }
		
		if (isset($_POST['car_vin'])) { $car_vin = $_POST['car_vin']; }
		else { print "<p>car vin not set</p>"; }
		
		if (isset($_POST['car_color'])) { $car_color = $_POST['car_color']; }
		else { print "<p>car color not set</p>"; }
		
		if (isset($_POST['car_mileage'])) { $car_mileage = $_POST['car_mileage']; }
		else { print "<p>car mileage not set</p>"; }
		
		if (isset($_POST['vinSearch'])) { $vinSearch = $_POST['vinSearch']; }
		else { print "<p>VIN not entered</p>"; }
		
		if (isset($_POST['newMileage'])) { $newMileage = $_POST['newMileage']; }
		else { print "<p>New Mileage not set</p>"; }
				
	try {
		/**/// start school database info
		/**/
		/**/ 	//$username = "popa";
		/**/ 	//$password = "gabriel";
		/**/ 	//$host = "sftweb01";
		/**/ 	//$dbname = "popa";
		/**/ 	//$charset = "uft8";
		/**/ 	//$dsn = "mysql:host=$host;dbname=$dbname; charset=$charset";
		/**/ 	//$db = new PDO($dsn, $username, $password);
		/**/
		/**/// end school database info
		
		/**/// start laptop database info
		/**/
		/**/	$host = "PhpMySqlLabs";
		/**/ 	$dbname = "popa";
		/**/ 	$dsn = "mysql:host=$host;dbname=$dbname";
		/**/ 	$username='root';
		/**/ 	$db = new PDO($dsn,$username);
		/**/
		/**/// end laptop database info
		
		echo "<h3>You are connected to the database '" . $dbname . "' on the host '" . $host . "'</h3><br>";
		
		function display_cars($db) // display the table with the cars in it
		{
			$display_query = 'SELECT * FROM car_t ORDER BY Car_id;';
			$cars = $db->query($display_query);
			echo "<table id='queryTable'>";	
			echo "<tr><th>Car ID</th><th>Car Make</th><th>Car Model</th><th>VIN</th><th>Car Color</th><th>Car Mileage</th></tr>";
			foreach($cars as $car)
			{
				echo "<tr>
					<td>" . $car['Car_Id'] . "</td>
					<td>" . $car['Car_Make'] . "</td>
					<td>" . $car['Car_Model'] . "</td>
					<td>" . $car['Car_Vin'] . "</td>
					<td>" . $car['Car_Color'] . "</td>
					<td>" . $car['Car_Mileage'] . "</td>
				</tr>";
			}	
			echo "</table><br><br><br>";	
		}
		
		function insert_car($db) // insert a new car into the table using the fields from the form
		{
			if (isset($_POST['car_id'])) { $car_id = $_POST['car_id']; } 
			else { print "<p>car id not set</p>"; }
		
			if (isset($_POST['car_make'])) { $car_make = $_POST['car_make']; }
			else { print "<p>car make not set</p>"; }
		
			if (isset($_POST['car_model'])) { $car_model = $_POST['car_model']; } 
			else { print "<p>car model not set</p>"; }
		
			if (isset($_POST['car_vin'])) { $car_vin = $_POST['car_vin']; }
			else { print "<p>car vin not set</p>"; }
		
			if (isset($_POST['car_color'])) { $car_color = $_POST['car_color']; }
			else { print "<p>car color not set</p>"; }
		
			if (isset($_POST['car_mileage'])) { $car_mileage = $_POST['car_mileage']; }
			else { print "<p>car mileage not set</p>"; }		

			$query_insert = "INSERT INTO car_t VALUES ($car_id, '$car_make', '$car_model', '$car_vin', '$car_color', $car_mileage);";
			
			if ((!empty($car_id)) && (!empty($car_make)) && (!empty($car_model)) && (!empty($car_vin)) && (!empty($car_color)) && (!empty($car_mileage)))
			  {
				echo "<h4 class='entry'>New entry successfully made in the database.</h4>";
				$cars = $db->query($query_insert);
			  } else
			  {
				echo "<h3 class='error'>One or more fields were empty.</h3>";
				echo "<h3 class='error'>No entry made in the database.</h3>";
			  }
		}

		function modifyCar($db) // updates a specific car's mileage in the table based on vin entered
		{
			if (isset($_POST['vinSearch'])) { $vinSearch = $_POST['vinSearch']; }
			else { print "<p>VIN not entered</p>"; }
		
			if (isset($_POST['newMileage'])) { $newMileage = $_POST['newMileage']; }
			else { print "<p>New Mileage not set</p>"; }
			
			
			$query_modify = "UPDATE car_t SET Car_Mileage=$newMileage WHERE Car_Vin='$vinSearch'";
									
			if ((!empty($vinSearch)) && (!empty($newMileage)))
			  {
				echo "<h4 class='entry'>Mileage change request submitted to the database.</h4>";
				$cars = $db->query($query_modify);
			  }
				else
			  {
				echo "<h3 class='error'>One or more fields were empty.</h3>";
				echo "<h3 class='error'>No change made in the database.</h3>";
			  }
		}		
	}
	catch (pdoexception $e)
	{ 
		$error_message = $e->getMessage();
		echo "<p>An error has occured while connecting to the database: $error_message </p>";	
	}
					
		$transaction = $_POST['transaction'];
		switch ($transaction)
		{
		  case ('Display Cars'):	
			showForm();
			display_cars($db);
			break;
			
		  case ('Add a car'):
		  	insert_car($db);
			showForm();					
			display_cars($db);			
			break;
			
		  case ('Modify a car'):		
			modifyCar($db);
			showForm();
			display_cars($db);			
			break;
			
		  default:
			print "<p>Hello</p>";
		}
}
print "</body> </html>";
?>
