<?php
	session_start();
	$email=$_SESSION['username'];
	$mname=$_POST['cancel'];
	$db = mysqli_connect('localhost','root','','book') or 
			die('Error connecting to MySQL server.');
	$sql = "DELETE FROM details WHERE email='$email' and movname='$mname'";

	$db2 = mysqli_connect('localhost','root','','book') or 
			die('Error connecting to MySQL server.');
	$sql2 = "DELETE FROM seat WHERE email='$email' and movname='$mname'";

	if (mysqli_query($db, $sql) && mysqli_query($db, $sql2)) {
	  	header("Location:http://localhost/Project/mybookings.php");
	} else {
	  echo "Error deleting record: " . mysqli_error($db);
	}
	$db3 = mysqli_connect('localhost','root','','account') or 
	die('Error connecting to MySQL server.');
	$amm=$_SESSION['amount']/2;
	$sql = "UPDATE dummy SET amount=amount+$amm WHERE cnumber=123456789012";

	if (mysqli_query($db3, $sql)) {
	  $message="Transaction Successful!";
	} else {
	  $message="Transaction Failed!";
	}
?>