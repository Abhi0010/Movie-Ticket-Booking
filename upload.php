<?php

session_start();
$count= $_POST['counter'];
$cost= $_POST['total'];
$seat=$_POST['selected-seats'];
$_SESSION['amount']=$cost;

if(isset($_SESSION['username'])){

	$db = mysqli_connect('localhost','root','','book') or 
	die('Error connecting to MySQL server.');
	$email=$_SESSION['username'];
	$movname=$_SESSION['movname'];

	$order = "INSERT INTO seat
	            (email, movname, seatno, total, tamount)
	            VALUES
	            ('$email','$movname', '$seat', '$count',$cost)";

	$result = mysqli_query($db,$order); //order executes
	if($result){
	    header("Location:http://localhost/Project/checkout.php");
	} else{
	    echo("<br>Input data is fail");
	}
}
?>