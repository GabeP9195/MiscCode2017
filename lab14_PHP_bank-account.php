<?php	/* 	
		*		Author: Gabriel Popa
		*		Date: 	03-22-2017
		*		Title: Lab 14
		*		Description: 
		*
		*/	
print "<html>	<head>	<title>Lab 14</title> 	<style>
		body { font-family: Verdana; margin-top: 25px; }
		form { padding: 10px; background-color:#ff9999; border:1px solid #000; width: 60%; margin:auto; font-size: 18px; font-family: Verdana;}
		form div { margin: 5px 0; }
		label { width: 330px; text-align: right; display: inline-block; margin-right: 10px; }
		input[type='text'] { width: 330px; display: inline-block; }
		#labels_textboxes { margin: auto; text-align: center; }
		fieldset { margin: auto; text-align: center; }
		.button { width: 260px; height: 32px; font-size: 18px; color: #fff; background-color: #595959; text-align: center; margin: 15px 10px 10px 10px; cursor: pointer; border-radius: 10px; text-decoration: none; outline: none; border: none; box-shadow: 0 9px #999; }
		.button:hover { background-color: #000; }
		.button:active { background-color: #000; box-shadow: 0 5px #595959; transform: translateY(4px); }
		h1, h2, h3, h4, h5 { text-align: center; }
		</style> </head> 	<body>	<h1>Lab Lab 14</h1>";
	
if (!isset($_POST['transaction'])) 
{ 	// testing to see if 'Submit' was clicked. If yes, it will print a different version of the form
	// here is if the 'Submit' button was NOT clicked, so we're printing a no-php form
	
	print "<form name='lab4form' action=" . $_SERVER['PHP_SELF'] . " method='post'>
	<fieldset><legend>Bank Account Lab Lab</legend>
		
	<div><label for='number'>Account Number:</label>
	<input type='text' name='number' value='' size='10' maxlength='10' autofocus></div>
	
	<div><label for='name'>Customer Name:</label>
	<input type='text' name='name' value='' size='30' maxlength='50'></div>
	
	<div><label for='address'>Customer Address:</label>
	<input type='text' name='address' value='' size='70' maxlength='99'></div>
	
	<div><label for='amount'>Amount to deposit or withdraw:</label>
	<input type='text' name='amount' value='' size='30' maxlength='30'></div>	
		
	<div><label for='balance'>Balance:</label>
	<input type='text' name='balance' value='' size='30' maxlength='30'></div>";
	
	print "<div>
	<button class='button' type='submit' name='transaction' value='Deposit to Checking'>Deposit to Checking</button>
	<button class='button' type='submit' name='transaction' value='Deposit to Savings'>Deposit to Savings</button>
	</div>
	<div>
	<button class='button' type='submit' name='transaction' value='Withdraw from Checking'>Withdraw from Checking</button>
	<button class='button' type='submit' name='transaction' value='Withdraw from Savings'>Withdraw from Savings</button>
	</div>
	<div>
	<button class='button' type='submit' name='transaction' value='Display Checking Balance'>Display Checking Balance</button>
	<button class='button' type='submit' name='transaction' value='Display Savings Balance'>Display Savings Balance</button>
	</div>
	<div>
	<button class='button' type='submit' name='transaction' value='Display Total Balance'>Display Total Balance</button>
	</div>
	<div>
	<button class='button' type='reset' name='reset' value='Clear'>Clear</button>
	</div>
	</fieldset>
	</form>";	
}
else  // submit button clicked, so we're adding the php, variables and other code to this lab lab
{	
	if (!isset($_POST['number']))
	{ $acct_num = 999999; } 
	else 
	{ $acct_num = $_POST['number']; }

	if (!isset($_POST['name']))
	{ $name = 'Name not set'; } 
	else 
	{ $name = $_POST['name']; }

	if (!isset($_POST['address']))
	{ $address = 'Address not set'; }
	else 
	{ $address = $_POST['address']; }

	if (!isset($_POST['amount']))
	{ $amount = 0; }
	else
	{ $amount = $_POST['amount']; }

	if (!isset($_POST['balance']))
	{ $bal = 0; } 
	else 
	{ $bal = $_POST['balance']; }

	if (!isset($_POST['chkbal'])) // checking baclance
	{ $chkbal = 0; } 
	else 
	{ $chkbal = $_POST['chkbal']; }
	
	if (!isset($_POST['savbal'])) // savings balance
	{ $savbal = 0; } 
	else 
	{ $savbal = $_POST['savbal']; }
	
	//if (isset($amount))
	//{ $amount_hidden = $_POST['amount']; }
	
		
	class BankAccount
	{
		public $number;
		private $name;
		private $address;	
		function __construct($number, $name, $address)
		{
			if (!empty($number) && !empty($name) && !empty($address))
			{
				$this->number = $number;
				$this->name = $name;
				$this->address = $address;
			}
		}
	}	
	
	class CheckingAccount extends BankAccount
	{
		private $chkbalance;
		private $arg;
		function __construct($number, $name, $address, $chkbalance)
		{
			if (!empty($number) && !empty($chkbalance))
				{ $this->chkbalance = $chkbalance; }	
			parent::__construct($number, $name, $address);
		}
		function checking_account_deposit($arg)
			{ 	
				$this->chkbalance = $this->chkbalance + $arg;
				$chkbal = $this->chkbalance;
				
				return $chkbal;				
			}
		function checking_account_withdrawal($arg) 
			{ 	
				$this->chkbalance = $this->chkbalance - $arg;
				$chkbal = $this->chkbalance;
				
				return $chkbal;			
			}
	}
	
	class SavingsAccount extends BankAccount
	{
		private $savbalance;
		private $arg;
		function __construct($number, $name, $address, $savbalance)
		{
			if (!empty($number) && !empty($savbalance))
				{ $this->savbalance = $savbalance; }	
			parent::__construct($number, $name, $address);
		}
		function savings_account_deposit($arg)
			{ 	
				$this->savbalance = $this->savbalance + $arg;
				$savbal = $this->savbalance;
				return $savbal;				
			}
		function savings_account_withdrawal($arg) 
			{ 	
				$this->savbalance = $this->savbalance - $arg;
				$savbal = $this->savbalance;
				return $savbal;			
			}
	}
		
//	$cust_account = new BankAccount($acct_num, $name, $address);
	$chk_account = new CheckingAccount($acct_num, $name, $address, $chkbal);
	$sav_account = new SavingsAccount($acct_num, $name, $address, $savbal);

	$transaction = $_POST['transaction']; // which transaction button was clicked
	switch ($transaction)
	{
		case ('Deposit to Checking'):
			//print "<p>'" . $transaction . "' was pressed</p>";
			
			$chk_account->checking_account_deposit($amount);
						
			if ($chkbal = 0)
			  {
				$chkbal = $chkbal + $amount;
			  } 
			else
			  {
				$chkbal = $chk_account->checking_account_deposit($chkbal);
			}			
			$bal = '';
			
			//print "<pre>";	print_r($chk_account); print "</pre>";
			//print "Amount (amount): " . $amount . "<br>";
			//print "Checking balance (chkbal): " . $chkbal . "<br>";
			break;
		case ('Withdraw from Checking'):
			//print "<p>'" . $transaction . "' was pressed</p>";
			
			$chk_account->checking_account_withdrawal($amount);
			
			if ($chkbal != 0)
			  {
				$chkbal = $chkbal - $amount;
			  } 
			 else
			  {
				$chkbal = $chk_account->checking_account_deposit($chkbal);
			}			
			$bal = '';
			
			/* print "<pre>";	print_r($chk_account); print "</pre>";
			print "Amount (amount): " . $amount . "<br>";
			print "Checking balance (chkbal): " . $chkbal . "<br>"; */
			break;
		case ('Deposit to Savings'):
			//print "<p>'" . $transaction . "' was pressed</p>";
			
			$sav_account->savings_account_deposit($amount);
						
			if ($savbal = 0)
			  {
				$savbal = $savbal + $amount;
			  } 
			else
			  {
				$savbal = $sav_account->savings_account_deposit($savbal);
			}			
			$bal = '';
			
			/* print "<pre>";	print_r($sav_account); print "</pre>";
			print "Amount (amount): " . $amount . "<br>";
			print "Savings balance (savbal): " . $savbal . "<br>"; */
			break;
		case ('Withdraw from Savings'):
			//print "<p>'" . $transaction . "' was pressed</p>";
			
			$sav_account->savings_account_withdrawal($amount);
			
			if ($savbal != 0)
			  {
				$savbal = $savbal - $amount;
			  } 
			 else
			  {
				$savbal = $sav_account->savings_account_deposit($savbal);
			}			
			$bal = '';
			
			/* print "<pre>";	print_r($sav_account); print "</pre>";
			print "Amount (amount): " . $amount . "<br>";
			print "Savings balance (savbal): " . $savbal . "<br>"; */
			break;
		case ('Display Checking Balance'):
			//print "<p>'" . $transaction . "' was pressed</p>";
			$bal = "Checking: $ $chkbal";
			/* print "<pre>";	print_r($chk_account); print "</pre>";
			print "Checking balance (chkbal): " . $chkbal . "<br>"; */
			break;
		case ('Display Savings Balance'):
			//print "<p>'" . $transaction . "' was pressed</p>";
			$bal = "Savings: $ $savbal";
			/* print "<pre>";	print_r($sav_account); print "</pre>";
			print "Savings balance (savbal): " . $savbal . "<br>"; */
			break;
		case ('Display Total Balance'):
			//print "<p>'" . $transaction . "' was pressed</p>";
			$bal = $chkbal + $savbal;
			$bal = "Total: $ $bal";
			
			/* print "<pre>";	print_r($chk_account); print "</pre>";
			print "<pre>";	print_r($sav_account); print "</pre>";
			print "Amount value: " . $amount . "<br>";
			print "Checking balance (chkbal): " . $chkbal . "<br>";
			print "Savings balanace (savbal): " . $savbal . "<br>";
			print "Total balance (bal): " . $bal . "<br>"; */
			break;
		default:
			print "<p>Hello</p>";
	}
	
	print "<form name='lab4form' action=" . $_SERVER['PHP_SELF'] . " method='post'>
	<fieldset><legend>Bank Account Lab Lab</legend>
	
	<div><label for='number'>Account Number:</label>
	<input type='text' name='number' value='" . $acct_num . "' size='10' maxlength='10' autofocus></div>
	
	<div><label for='name'>Customer Name:</label>
	<input type='text' name='name' value='" . $name . "' size='30' maxlength='50'></div>
	
	<div><label for='address'>Customer Address:</label>
	<input type='text' name='address' value='" . $address . "' size='70' maxlength='99'></div>
	
	<div><label for='amount'>Amount to deposit or withdraw:</label>
	<input type='text' name='amount' value='' size='30' maxlength='30'></div>
		
	<div><label for='balance'>Balance:</label>
	<input type='text' name='balance' value='" . $bal . "' size='30' maxlength='30'></div>
		
	<input type='hidden' name='amount_hidden' value='" . $amount . "' size='30' maxlength='30'>
	<input type='hidden' name='chkbal' value='" . $chkbal . "' size='30' maxlength='30'>
	<input type='hidden' name='savbal' value='" . $savbal . "' size='30' maxlength='30'>
	<input type='hidden' name='bal_hidden' value='" . $bal . "' size='30' maxlength='30'>
	
	<div>
	<button class='button' type='submit' name='transaction' value='Deposit to Checking'>Deposit to Checking</button>
	<button class='button' type='submit' name='transaction' value='Deposit to Savings'>Deposit to Savings</button>
	</div>
	<div>
	<button class='button' type='submit' name='transaction' value='Withdraw from Checking'>Withdraw from Checking</button>
	<button class='button' type='submit' name='transaction' value='Withdraw from Savings'>Withdraw from Savings</button>
	</div>
	<div>
	<button class='button' type='submit' name='transaction' value='Display Checking Balance'>Display Checking Balance</button>
	<button class='button' type='submit' name='transaction' value='Display Savings Balance'>Display Savings Balance</button>
	</div>
	<div>
	<button class='button' type='submit' name='transaction' value='Display Total Balance'>Display Total Balance</button>
	</div>
	<div>
	<button class='button' type='reset' name='reset' value='Clear'>Clear</button>
	</div>
	</fieldset>
	</form>";
	
						
	unset($amount);
	//unset($amount_hidden);
	unset($chkbal);
	unset($savbal);
	unset($bal);
};
print "</body> </html>";
?>
