<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="cssp/checkout.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


</head>

<?php

$nameErr = $cardnoErr = $monthErr = $yearErr= $cvvErr="";
$name = $cardno = $month = $year = $cvv="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cardname"])) {
    $nameErr = "Name is required";
  }
  else if(!preg_match("/^[a-zA-Z-' ]*$/", $_POST["cardname"])){
    $nameErr = "Only letters and white space allowed";
  } 
  else {
    $name = test_input($_POST["cardname"]);
    $_SESSION['cname']=$name;
  }
  
  if (empty($_POST["cardnumber"])) {
    $cardnoErr = "Card number is required";
  }
  else if(!preg_match('/^[0-9]*$/', $_POST["cardnumber"])){
    $cardnoErr = "Card number should only contain digits";
  }
  else if(strlen($_POST["cardnumber"])!=12){
    $cardnoErr = "Card number should be of 12 digits";
  }  
  else {
    $cardno = test_input($_POST["cardnumber"]);
    $_SESSION['cnumber']=$cardno;
  }

  if (empty($_POST["expmonth"])) {
    $monthErr = "Expiry month is required";
  }
  else if(!preg_match("/^[a-zA-Z]*$/", $_POST["expmonth"])){
    $monthErr = "Only letters are allowed";
  } 
  else {
    $month = test_input($_POST["expmonth"]);
  }

  if (empty($_POST["expyear"])) {
    $yearErr = "Expiry Year is required";
  }
  else if(!preg_match('/^[0-9]*$/', $_POST["expyear"])){
    $yearErr = "Expiry year should only contain digits";
  }
  else if(strlen($_POST["expyear"])!=4 or $_POST["expyear"]<2020){
    $yearErr = "Invalid expiry date";
  }  
  else {
    $year = test_input($_POST["expyear"]);
  }

  if (empty($_POST["cvv"])) {
    $cvvErr = "CVV is required";
  }
  else if(!preg_match('/^[0-9]*$/', $_POST["cvv"])){
    $cvvErr = "CVV should only contain digits";
  }
  else if(strlen($_POST["cvv"])!=3){
    $cvvErr = "CVV should be of 3 digits";
  }  
  else {
    $cvv = test_input($_POST["cvv"]);
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if($nameErr=='' && $cardnoErr=='' && $monthErr=='' && $yearErr=='' && $cvvErr==''){
  header("Location: http://localhost/Project/checkout_2.php");
}

}

?>

<body>
<!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="navbar-brand" href="HomePage.php"><span><img src="img/logo2-nav.png" height="24px"></span></a>
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
</nav> -->
    <h2 class="mt-5 mb-5"><center>CHECKOUT</center></h2>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="formb">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div> <br>
                <div class="form-group">
                    <label for="cname">Name on Card<span class="error"> * <?php echo $nameErr;?></span></label>
                    <input type="text" id="cname" name="cardname" placeholder="John Wick">
                </div>
                <div class="form-group">
                    <label for="ccnum">Credit card number<span class="error"> * <?php echo $cardnoErr;?></span></label>
                    <input type="number" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                </div>
                <div class="form-group">
                    <label for="expmonth">Exp Month<span class="error"> * <?php echo $monthErr;?></span></label>
                    <input type="text" id="expmonth" name="expmonth" placeholder="September">
                </div>
                <div class="form-group">
                    <label for="expyear">Exp Year<span class="error"> * <?php echo $yearErr;?></span></label>
                    <input type="number" id="expyear" name="expyear" placeholder="2020">
                </div>
                <div class="form-group">
                    <label for="cvv">CVV <span class="error"> * <?php echo $cvvErr;?></span></label>
                    <input type="password" id="cvv" name="cvv" placeholder="352">
                </div>
            </div>
            <button type="button" class="btn btn-info">₹<?php echo $_SESSION['amount']; ?></button>
            <button type="submit" class="btn btn-success">Pay</button>
        </form>
    </div>
</body>

</html>
