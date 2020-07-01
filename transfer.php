<?php
session_start();
function get_balance($acct)
{
	$result = null;
	if($link = mysqli_connect("127.0.0.1", "root", "root", "test"))
	{
		$stmt = $link->prepare("SELECT amount FROM accounts WHERE id=?");
		$stmt->bind_param('i', $acct);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_all();
		if(count($result) === 1) $result = $result[0][0];
		else $result = null;
		$stmt->close();
	}
	return $result;
}

function transfer($from, $to, $amount)
{
	/*	Mysqli does not support multiple prepared statements.
		So to be proper, we're going to perform a multi query, concatenating the values.
		For this, and to be extra anal, we are going to validate the arguments again.
	*/
	$amount = filter_var($amount, FILTER_VALIDATE_FLOAT);
	$from = filter_var($from, FILTER_VALIDATE_INT);
	$to = filter_var($to, FILTER_VALIDATE_INT);
	if($amount !== false && $from !== false && $to !== false)
	{
		if($link = mysqli_connect("127.0.0.1", "root", "root", "test"))
		{
			$query = "UPDATE accounts SET amount = amount - $amount WHERE id=$from;";
			$query .= "UPDATE accounts SET amount = amount + $amount WHERE id=$to;";
			$return = $link->multi_query($query);
			if($return === false) $return = $link->error;
			$link->close();
			return $return;
		}
	}
}

if(isset($_POST['amount']) && isset($_POST['from']) && isset($_POST['to']))
{
	$amount = filter_var($_POST['amount'], FILTER_VALIDATE_FLOAT);
	$from = filter_var($_POST['from'], FILTER_VALIDATE_INT);
	$to = filter_var($_POST['to'], FILTER_VALIDATE_INT);
	if($amount !== false && $from !== false && $to !== false && $amount > 0)
	{
		$balance = get_balance($from);
		if($balance !== null)
		{
			if($balance >= $amount) //TOCTOU is here.
			{
				usleep(500000); //Simulate backend operations
				$return = transfer($from, $to, $amount);
				if($return !== true) $_SESSION["msg"] = $return;
				else $_SESSION["msg"] = "Transfer successful!";
			}
			else $_SESSION["msg"] = "Insufficient balance for operation.";
		}
		else $_SESSION["msg"] = "Account does not exist.";
	}
	else $_SESSION["msg"] = "Invalid parameters received.";
}
else $_SESSION["msg"] = "Invalid parameters received.";
header("Location: index.php");
?>