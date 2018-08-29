<?php
/* 	
*	Author: Gabriel Popa
*	Date: 	03-08-2017
*	Title: Lab 11, 12, 13
*	Description: Guess a number! 3 labs in one! Yay! 
*/
	
print "<html>	<head>	<title>Lab 11</title>
		<style>
		body { font-family: Verdana; width: 95%; }
		form { padding: 10px; background-color:#b3ff99; border:1px solid #000; width: 600px; margin:auto; font-size: 1.2em; font-family: Verdana;}
		label { text-align: center; display: block; }
		input { margin: auto; }
		form p { text-align: center; }
		#submit, #reset { width: 150px; height: 32px; font-size: 18px; background-color: #000; color: #fff; }
		#submit:hover, #reset:hover { background-color: #fff; color: #000; }
		h1, h2, h3, h4, h5 { text-align: center; margin: 0;}
		.red { color: #ff0000; }
		.gray { color: gray; text-align: center; }
		</style>
	</head>
	<body>
	<hr><h1> Lab 11 - Guess A Number</h1><hr><br>";
	
	if (!isset($_POST['submit'])) { 
// testing to see if 'Submit' was clicked. If yes, it will print a different version of the form
// here is if the 'Submit' button was NOT clicked, so we're printing a no-php form
		$actionDefault = $_SERVER['PHP_SELF'];
 		print "<form name='guessform' action=" . $actionDefault . " method='post'>
		<p><label for='num'>I'm thinking of a number between 1 and 50.<br>Guess the number I'm thinking of : </label>
		<br><input type='text' name='num' value='' size='10' maxlength='10' autofocus>
		<br>
		<input type='hidden' name='guess_counter' value='' size='10' maxlength='10'>
		<input type='hidden' name='ran_num' value='' size='10' maxlength='10'></p>
		<p>Guesses counter:<br>
		<input type='radio' name='option' value='Hidden Form Field' checked>Hidden<br>
		<input type='radio' name='option' value='Cookie'>Cookie<br>
		<input type='radio' name='option' value='Session variable'>Session variable<br></p>
		<p><input type='submit' id='submit' name='submit' value='Submit'></p>
		<p><input type='reset' id='reset' name='reset' value='Clear'></p>
		</form>";	
    }
	else  //submit button clicked, so we're adding the php, variables and other code
	{	
		if (isset($_POST['option']))
		{ $option = $_POST['option']; }
	
			switch ($option)
			{
										// if the guess counter is a hidden form field :
			  case "Hidden Form Field":	
				print "<h1>" . $option . "</h1><br>";
				$ran_num = $_POST['ran_num'];
				if ($ran_num == null) 
				{ $ran_num = rand(1,50); }
				$guesses = $_POST['guess_counter'];
				if (isset($_POST['num']))
				{
					$guesses = $_POST['guess_counter']+1;
				}
				else
				{
					$guesses = 0;
				}
				print "<form name='guessform' action=" . $_SERVER['PHP_SELF'] . " method='post'>
				<p><label for='num'>I'm thinking of a number between 1 and 50.<br>Guess the number I'm thinking of : </label>
				<br><input type='text' name='num' value='' size='10' maxlength='10' autofocus><br>
				<input type='hidden' name='guess_counter' value='" . $guesses . "' size='10' maxlength='10'>
				<input type='hidden' name='ran_num' value='" . $ran_num . "' size='10' maxlength='10'></p>
				<input type='hidden' name='option' value='" . $option . "' size='20' maxlength='40'></p>
				<p><input type='submit' id='submit' name='submit' value='Submit'></p>
				<p><input type='reset' id='reset' name='reset' value='Clear'></p></form>";
				$userNum = $_POST['num'];
								
				if ((is_numeric($userNum)) && ($userNum >=1) && ($userNum <=50))
				{
					if ($userNum > $ran_num)
					{
						$msg = "You guessed " . $userNum . " which is high, try again!";
					} 
					elseif ($userNum < $ran_num)
					{
						$msg = "You guessed " . $userNum . " which is low, try again!";
					} 
					elseif ($userNum == $ran_num)
					{
						$msg = "You guessed correct!<br>Number was " . $userNum ;
					}
					
					print "<br><h3>" . $msg . "</h3><br>";
					print "<p class='gray'>Guess counter: " . $guesses . "</p>";
					print "<p class='gray'>The number I was thinking of is: " . $ran_num . "</p>";
					
					if ($ran_num==$userNum)
					{
						if ($guesses == 1)
						{
							print "<br><h3 class='red'>You did it in " . $guesses . " guess.</h3><br>";
						}
						elseif ($guesses > 1)
						{
							print "<br><h3 class='red'>You did it in " . $guesses . " guesses.</h3><br>";
						}
						
						unset($option);
						unset($ran_num);
						unset($userNum);
						unset($guesses);
						unset($msg);
						print "<br><h3><a href=" . $_SERVER['PHP_SELF'] . ">Click here to play again</a></h3><br>";
					}
				}
				else 
				{
					print "<br><h3>Please only enter a number between 1 and 50<br>Try again, I know you can do it</h3><br>"; 
					$secondsWait = 4;
					header("Refresh:$secondsWait");
				}	
				break;

			
								// if the guess counter is a cookie :
			  case "Cookie":
				$userNum = $_POST['num'];
				
				if (isset($_POST['guess_counter']))
				{
					$guess_count = $_POST['guess_counter'];
					setcookie("guesses", $guess_count, time()+30);
				}
				else
				{
					$guess_count = $_COOKIE['guesses'];
					setcookie("guesses", $guess_count);
				}
				
				if (!isset($_COOKIE['randomNumber']))
				{
					$randomNum = rand(1,50);
					setcookie("randomNumber", $randomNum);
				}
				else
				{
					$randomNum = $_COOKIE['randomNumber'];
					setcookie("randomNumber", $randomNum);
				}				
											
				print "<h1>" . $option . "</h1><br>";
				print "<form name='guessform' action=" . $_SERVER['PHP_SELF'] . " method='post'>
				<p><label for='num'>I'm thinking of a number between 1 and 50.<br>Guess the number I'm thinking of : </label>
				<br><input type='text' name='num' value='' size='10' maxlength='10' autofocus><br>
				<input type='hidden' name='option' value='" . $option . "' size='20' maxlength='40'></p>
				<p><input type='submit' id='submit' name='submit' value='Submit'></p>
				<p><input type='reset' id='reset' name='reset' value='Clear'></p></form>";
				if ((is_numeric($userNum)) && ($userNum >=1) && ($userNum <=50))
				{
					if ($userNum > $randomNum)
					{
						$msg = "You guessed " . $userNum . " which is high, try again!";
						$guess_count++;
						setcookie("guesses", $guess_count);
					} 
					elseif ($userNum < $randomNum)
					{
						$msg = "You guessed " . $userNum . " which is low, try again!";
						$guess_count++;
						setcookie("guesses", $guess_count);
					} 
					elseif ($userNum == $randomNum)
					{
						$msg = "You guessed correct!<br>Number was " . $userNum ;
						$guess_count++;
						setcookie("guesses", $guess_count);
					}
					
					print "<br><h3>" . $msg . "</h3><br>";
					print "<p class='gray'>Guess counter: " . $guess_count . "</p>";
					print "<p class='gray'>The number I was thinking of is: " . $randomNum . "</p>";
					
					if ($userNum == $randomNum)
					{
						if ($guess_count == 1)
						{
							print "<br><h3 class='red'>You did it in " . $guess_count . " guess.</h3><br>";
						}
						elseif ($guess_count > 1)
						{
							print "<br><h3 class='red'>You did it in " . $guess_count . " guesses.</h3><br>";
						}
						print "<br><h3><a href=" . $_SERVER['PHP_SELF'] . ">Click here to play again</a></h3><br>";
						setcookie("guesses", '', time()-1);
						setcookie("randomNumber", '', time()-1);
					}
				}
				else 
				{
					print "<br><h3>Please only enter a number between 1 and 50<br>Try again, I know you can do it</h3><br>"; 
					$secondsWait = 4;
					header("Refresh:$secondsWait");
				}
				break;
				
										// if the guess counter is a session variable :
			  case "Session variable":
					session_start();
				
					print "<h1>" . $option . "</h1><br>";		
					print "<form name='guessform' action=" . $_SERVER['PHP_SELF'] . " method='post'>
					<p><label for='num'>I'm thinking of a number between 1 and 50.<br>Guess the number I'm thinking of : </label><br>
					<input type='text' name='num' value='' size='10' maxlength='10' autofocus><br>
					<input type='hidden' name='guess_counter' value='' size='10' maxlength='10'>				
					<input type='hidden' name='option' value='" . $option . "' size='20' maxlength='40'></p>
					<p><input type='submit' id='submit' name='submit' value='Submit'></p>
					<p><input type='reset' id='reset' name='reset' value='Clear'></p></form>";
								
						$userNum = $_POST['num'];
								
						if(!isset($_SESSION['ran_num'])){
						print "<h3><br>Random-number session variable not set</h3>";
						$ran_num = rand(1, 50);
						$_SESSION['ran_num'] = $ran_num;
						$_SESSION['guess_counter'] = 0;
						}
						else
						{ 	// start the 'else' from 'if(!isset($_SESSION['ran_num']))'
							// what happens if the $_SESSION['ran_num'] variable has a value
					
						$ran_num = $_SESSION['ran_num'];
																	
						if ((is_numeric($userNum)) && ($userNum >=1) && ($userNum <=50))
						{
							if ($userNum > $ran_num)
							{
								$msg = "You guessed " . $userNum . " which is high, try again!";
								$_SESSION['guess_counter']++;
							} 
							elseif ($userNum < $ran_num)
							{
								$msg = "You guessed " . $userNum . " which is low, try again!";
								$_SESSION['guess_counter']++;
							} 
							elseif ($userNum == $ran_num)
							{
								$msg = "You guessed correct!<br>Number was " . $userNum;
								$_SESSION['guess_counter']++;
							}	
							print "<br><h3>" . $msg . "</h3><br>";
							print "<p class='gray'>Guess counter: " . $_SESSION['guess_counter'] . "</p>";
							print "<p class='gray'>The number I was thinking of is: " . $ran_num . "</p>";
						}
						else 
						{
							print "<br><h3>Please only enter a number between 1 and 50<br>Try again, I know you can do it</h3>"; 
							$secondsWait = 4;
							header("Refresh:$secondsWait");
						}
					
						if ($ran_num==$userNum)
						{ 
							if ($_SESSION['guess_counter'] == 1)
							{
								print "<h3 class='red'>You did it in " . $_SESSION['guess_counter'] . " guess.</h3><br>";
							}
							elseif ($_SESSION['guess_counter'] > 1)
							{
								print "<h3 class='red'>You did it in " . $_SESSION['guess_counter'] . " guesses.</h3><br>";
							}
						//session_destroy();
						print "<br><h3><a href=" . $_SERVER['PHP_SELF'] . ">Click here to play again</a></h3><br>";
						$ran_num = rand(1, 50);
						$_SESSION['ran_num'] = $ran_num;
						$_SESSION['guess_counter'] = 0;					
					}				  
				} // ending the 'else' from the 'if(!isset($_SESSION['ran_num']))'
		}
}
print "</body> </html>";
?>
