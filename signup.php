<!DOCTYPE html>
<html lang="en">
  <head>
    <title>BookYourShow</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="cssp/login.css">
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){

    $('.input').focus(function(){
      $(this).parent().find(".label-txt").addClass('label-active');
    });

    $(".input").focusout(function(){
      if ($(this).val() == '') {
        $(this).parent().find(".label-txt").removeClass('label-active');
      };
    });

    });
</script>

  </head>

    <?php  
 
$name=$email = $pass =  $phone="";
$nameErr=$emailErr = $passErr = $phoneErr='';
$message="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }
  else if(!preg_match("/^[a-zA-Z-' ]*$/", $_POST["name"])){
    $nameErr = "Only letters and white space allowed";
  } 
  else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email id is required";
  }
  else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    $emailErr = "Invalid email format";
  }  
  else {
    $email = test_input($_POST["email"]);
  }
  if(empty($_POST["password"])){
        $passErr="Password is required";
    }
    else if(!empty($_POST["password"])){

      if (strlen($_POST["password"]) <= '8') {
          $passErr = "Your Password Must Contain At Least 8 Characters !";
      }
      elseif(!preg_match("#[0-9]+#",$_POST["password"])) {
          $passErr = "Your Password Must Contain At Least 1 Number !";
      }
      elseif(!preg_match("#[A-Z]+#",$_POST["password"])) {
          $passErr = "Your Password Must Contain At Least 1 Capital Letter !";
      }
      elseif(!preg_match("#[a-z]+#",$_POST["password"])) {
          $passErr = "Your Password Must Contain At Least 1 Lowercase Letter !";
      }
      elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
          $passErr = "Your Password Must Contain At Least 1 Special Character !";
      }
      else {
      $pass=test_input($_POST["password"]);
  }
  }
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone no is required";
  }
  else if(!preg_match('/^[0-9]*$/', $_POST["phone"])){
    $phoneErr = "Phone no should only contain digits";
  }
  else if(strlen($_POST["phone"])!=10){
    $phoneErr = "Phone no should be of 10 digits";
  }  
  else {
    $phone = test_input($_POST["phone"]);
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
    if($nameErr=='' && $emailErr=='' && $passErr=='' && $phoneErr=='')
{
  $db = mysqli_connect('localhost','root','','credential') or die('Error connecting to MySQL server.');

  $query= "SELECT * FROM login WHERE email = '$email'";

  $res = mysqli_query($db,$query);

  $num= mysqli_num_rows($res);

  if($num==1){
      $message="Account already exists";
  }
  else{
      $order = "INSERT INTO login
              (email, name, password, phone)
              VALUES
              ('$email','$name', '$pass', '$phone')";

  $result = mysqli_query($db,$order);
  mysqli_close($db);//order executes
  header("Location:http://localhost/Project/HomeLogin.php"); 

}
}


}

?>



  <body>

  <div class="sidenav">
    <div class="login-main-text">
      <!-- <img src="logo.jpg" class="logo" /> -->
      <a href="HomePage.php"><span style="padding-left: 10%"><img src="img/logo2-nav.png" height="24px"></span></a>
      <p style="padding: 10%">Register from here to access.</p>
    </div>
  </div>
  <div class="main">
    <div class="col-md-6 col-sm-12">
      <div class="register-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="form-group">
            <label>
            <p class="label-txt">NAME:<span class="error"> * <?php echo $nameErr;?></span></p>
            <input type="text" class="input" name="name">
            <div class="line-box">
              <div class="line"></div>
            </div>
          </label>
          </div>
          <div class="form-group">
            <label>
            <p class="label-txt">EMAIL-ID:<span class="error"> * <?php echo $emailErr;?></span></p>
            <input type="email" class="input" name="email">
            <div class="line-box">
              <div class="line"></div>
            </div>
          </label>
          <label>
          </div>
          <div class="form-group">
          <label>
              <p class="label-txt">PASSWORD:<span class="error"> * <?php echo $passErr;?></span></p>
              <input type="password" class="input" name="password">
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
          </div>
          <div class="form-group">
          <label>
              <p class="label-txt">PHONE:<span class="error"> * <?php echo $phoneErr;?></span></p>
              <input type="number" class="input" name="phone">
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
          </div>
          <span class="error"><?php echo $message;?></span><br><br>
          <button type="submit" class="btn btn-black">Submit</button>
          <p class="center-align bold text-muted mt-3">Already have an account?
            <a href="HomeLogin.php" class="text-danger">Login</a> here!
          </p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

