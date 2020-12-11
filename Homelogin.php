<?php
session_start();
?>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

  $message="";
  $emailErr = $passerr = "";  
  $email = $pass =  "";
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } 
    else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid email format";
    }  
    else {
        $email = test_input($_POST["email"]);
    }

    if(empty($_POST["password"])){
        $passerr="Password is required";
    }
    else {
        $pass=test_input($_POST["password"]);
    }
                    
}
                    
?>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
  if($emailErr=='' && $passerr=='')
  {
      $db = mysqli_connect('localhost','root','','credential') or die('Error connecting to MySQL server.');
      $query = "SELECT * FROM login WHERE email= '$email' or password='$pass'";
    $result = mysqli_query($db,$query); //order executes
    if (mysqli_num_rows($result) == 0) {
        mysqli_close($db);
        header("Location:http://localhost/Project/signup.php");
      } 
    else{
      $row = mysqli_fetch_array($result);
      if($row['email'] == $email && $row['password'] == $pass)
        {
          mysqli_close($db);
          $_SESSION['username']=$email;
          header("Location:http://localhost/Project/HomePage2.php");
        }
    else{
      mysqli_close($db);
      $message="Invalid EmailId or Password! Try Again";
    }
                              
  }
  }
}
?>



  <body>
  <div class="sidenav">
    <div class="login-main-text">
      <!-- <img src="logo.jpg" class="logo" /> -->
      <a href="HomePage.php"><span style="padding-left: 10%"><img src="img/logo2-nav.png" height="24px"></span></a>
      <p style="padding: 10%">Login from here to access.</p>
    </div>
  </div>
  <div class="main">
    <div class="col-md-6 col-sm-12">
      <div class="login-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="form-group">
            <label>
            <p class="label-txt">EMAIL-ID:<span class="error"> * <?php echo $emailErr;?></p>
            <input type="email" class="input" name="email">
            <div class="line-box">
              <div class="line"></div>
            </div>
          </label>
          <label>
          </div>
          <div class="form-group">
          <label>
              <p class="label-txt">PASSWORD:<span class="error"> * <?php echo $passerr;?></p>
              <input type="password" class="input" name="password">
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <br>
            <span class="error"><?php echo $message;?></span>
          </div>
            <button type="submit" class="btn btn-black">Login</button>
            <br>

         <p class="center-align bold text-muted mt-3">Don't have an account?
            <a href="signup.php" class="text-danger">Sign up</a> here!
          </p>
          
        </form>
      </div>
    </div>
  </div>
</body>
</html>

