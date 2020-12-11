<?php
session_start();
?>

<?php
if(isset($_SESSION['username'])){

	// $name=$_SESSION['username'];

	// echo $name;
	$email=$_SESSION['username'];
	$_SESSION['movname']=$_POST['movname'];
	$movname=$_POST['movname'];
	$movdate=$_POST['movdate'];
	$movtime=$_POST['movtime'];
	$db = mysqli_connect('localhost','root','','book') or 
	die('Error connecting to MySQL server.');

	$order = "INSERT INTO details
	            (email, movname, movdate, movtime)
	            VALUES
	            ('$email','$movname', '$movdate','$movtime')";
	$result = mysqli_query($db,$order); //order executes
	if($result){
	    header("Location: http://localhost/Project/seat.php");
	}else{
	    echo("<br>Input data is fail");
	}
	// $sql = "DELETE FROM details WHERE email='leo@gmail.com'";

	// if (mysqli_query($db, $sql)) {
	//   echo "Record deleted successfully";
	// } else {
	//   echo "Error deleting record: " . mysqli_error($conn);
	// }
}
else{
	echo"You need to login to book tickets";
}