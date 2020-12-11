<?php

	$db = mysqli_connect('localhost','root','','credential') or die('Error connecting to MySQL server.');
	$sql = "DELETE FROM login WHERE email='abhi@gmail.com'";

	if (mysqli_query($db, $sql)) {
	  echo "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . mysqli_error($db);
	}
	// $db = mysqli_connect('localhost','root','','book') or die('Error connecting to MySQL server.');
	// $sql = "DELETE FROM seat WHERE email='jacksmith@gmail.com'";
	// // $sql2="DELETE FROM seat WHERE email='leo@gmail.com'";
	// if (mysqli_query($db, $sql)) {
	//   echo "Record deleted successfully";
	// } else {
	//   echo "Error deleting record: " . mysqli_error($db);
	// }
	// $db = mysqli_connect('localhost','root','','account') or die('Error connecting to MySQL server.');
	// $sql = "DELETE FROM dummy WHERE cname='Jack Smith'";
	// // $sql2="DELETE FROM seat WHERE email='leo@gmail.com'";
	// if (mysqli_query($db, $sql)) {
	//   echo "Record deleted successfully";
	// } else {
	//   echo "Error deleting record: " . mysqli_error($db);
	// }
?>