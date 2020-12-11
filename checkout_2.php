<?php
session_start();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<?php
if(isset($_SESSION['cnumber'])){

	// $cname='Jack Smith';
	// $cnumber=123456789012;
	// $amount=100000;
	$db = mysqli_connect('localhost','root','','account') or 
	die('Error connecting to MySQL server.');

	// $order = "INSERT INTO dummy
	//             (cname, cnumber, amount)
	//             VALUES
	//             ('$cname','$cnumber', '$amount')";
	// $result = mysqli_query($db,$order); //order executes
	// if($result){
	//     echo("<br>Input data is succeeded");
	// } else{
	//     echo("<br>Input data is fail");
	// }
	$amm=$_SESSION['amount'];
	$sql = "UPDATE dummy SET amount=amount-$amm WHERE cnumber=123456789012";

	if (mysqli_query($db, $sql)) {
	  $message="Transaction Successful!";
	} else {
	  $message="Transaction Failed!";
	}
		mysqli_close($db);
	}
else{
	    // echo"";
	}
echo"<br>";
?>

<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<style>
		div{
			border-radius: 5px;
          	background-color: #f2f2f2;
          	padding: 20px 200px;
          	margin: 0 300px;
		}
			
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="navbar-brand" href="HomePage2.php"><span><img src="img/logo2-nav.png" height="24px"></span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="book.php">Booking</a>
    </li>
  </ul>
   <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="mybookings.php"><i class="fa fa-ticket" aria-hidden="true"></i>&nbsp;&nbsp;My Bookings</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Logout</a>
    </li>
  </ul>
</nav>
	<div class="mt-5">
		<?php
		echo"<h3>Payment Details</h3>";
	    echo"<br><strong>Name on Card:</strong> ",$_SESSION['cname'];
	    echo"<br><strong>Credit card number:</strong> ",$_SESSION['cnumber'];
	    echo"<br><strong>Amount:</strong> ₹",$_SESSION['amount'];
	    echo"<br><h4>$message</h4><br><br>";
	    ?>
	    <a href="HomePage2.php"><button type="button" class="btn btn-info">Back to Home</button></a>
	</div>
	
	</body>
	</html>

