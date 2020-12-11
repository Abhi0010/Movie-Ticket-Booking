
<!DOCTYPE html>
<html>
<head>
	<title>MyBookings</title>
	<style>
		div{
			border-radius: 5px;
          	background-color: #f2f2f2;
          	padding: 20px 150px;
          	margin: 50px 300px;
		}
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
	<div>
		<?php
		session_start();
		$email=$_SESSION['username'];
		echo "<h3>Email: ".$email."</h3>";
		// if(isset($_SESSION['movname'])){
		$db = mysqli_connect('localhost','root','','book') or 
			die('Error connecting to MySQL server.');
		$query = "SELECT * FROM details INNER JOIN seat ON details.email=seat.email WHERE details.email='$email'";
		$result = mysqli_query($db, $query);
		$num= mysqli_num_rows($result);
		// $que = "SELECT * FROM seat WHERE email='$email' AND movname='$movname'";
		// $result2 = mysqli_query($db, $que);
		// $num2= mysqli_num_rows($result2);

		if($num>0){
			// while ($row = mysqli_fetch_array($result) && $row2 = mysqli_fetch_array($result2)){
			while ($row = mysqli_fetch_array($result)){
			$movn=$row['movname'];
			echo "<br><strong>Movie Name: </strong>".$row['movname'];
			echo "<br><strong>Movie Date: </strong>".$row['movdate'];
			echo "<br><strong>Movie Time: </strong>".$row['movtime'];
			echo "<br><strong>Seats: </strong>".$row['seatno'];
			echo "<br><strong>Cost: </strong>".$row['tamount'];
			echo "<br><br>";
			?>
			<p class="center-align bold text-muted mt-3 mb-3">50% of the total amount will be charged as cancellation fee.</p>
			<form method="POST" action="cancel.php">
				<button type="submit" value="<?php echo $movn; ?>" name="cancel" class="btn btn-info">Cancel</button>
			</form>
			<?php
		}
		}	
		else{
			echo "<br>No Bookings yet!";
		}

		// }
		// else{
		// 	echo "<br>No Bookings yet!";
		// }
		

		?>
		
	</div>
</body>
</html>