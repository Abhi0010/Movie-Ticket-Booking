<!DOCTYPE html>
<html lang="en">
<head>
  <title>Booking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
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
<div class="container mt-5">

  <div class="card-deck">
  <div class="card" style="width:450px">
    <img class="card-img-top" src="img/Sonic.jpg" alt="Card image">
    <div class="card-body">
      <h4 class="card-title">Sonic: The Hedgehog</h4>
      <p class="card-text">The world needed a hero -- it got a hedgehog. Powered with incredible speed, Sonic embraces his new home on Earth -- until he accidentally knocks out the power grid, sparking the attention of uncool evil genius Dr. Robotnik</p>
      <form action="book2.php" method="POST">
    <div class="form-group">
      <select class="form-control" id="sel1" name="movdate">
        <option value="10 Dec,2020">10 Dec,2020</option>
        <option value="11 Dec,2020">11 Dec,2020</option>
        <option value="12 Dec,2020">12 Dec,2020</option>
      </select>
      <br>
     
      <select class="form-control" id="sel2" name="movtime">
        <option value="9:00 AM">9:00 AM</option>
        <option value="2:00 PM">2:00 PM</option>
        <option value="6:00 PM">6:00 PM</option>
      </select>
      <br>
      <button class="btn btn-primary" value="Sonic: The Hedgehog" type="submit" name="movname">Book</button>
    </div>
  </form>
<br>
     
    </div>
  </div>
 
 
  <div class="card" style="width:450px">
    <img class="card-img-top" src="img/Dil_Bechara.webp" alt="Card image" >
    <div class="card-body">
      <h4 class="card-title">Dil Bechara</h4>
      <p class="card-text">Kizie and Manny are poles apart in personality and their battle against cancer is the only common thread binding them. Love slowly wraps them in its embrace, but little do they know what fate has in store for them.</p>
      <form action="book2.php" method="POST">
    <div class="form-group">
    <select class="form-control" id="sel3" name="movdate">
        <option value="10 Dec,2020">10 Dec,2020</option>
        <option value="11 Dec,2020">11 Dec,2020</option>
        <option value="12 Dec,2020">12 Dec,2020</option>
      </select>
      <br>
     
      <select class="form-control" id="sel4" name="movtime">
        <option value="9:00 AM">9:00 AM</option>
        <option value="2:00 PM">2:00 PM</option>
        <option value="6:00 PM">6:00 PM</option>
      </select>
      <br>
      <button class="btn btn-primary" value="Dil Bechara" type="submit" name="movname">Book</button>
    </div>
  </form>
    </div>
  </div>

  <div class="card" style="width:450px">
    <img class="card-img-top" src="img/tanhaji-unsung-warrior.webp" alt="Card image">
    <div class="card-body">
      <h4 class="card-title">Tanhaji: The Unsung Warrior</h4>
      <p class="card-text">Chhatrapati Shivaji's right-hand man, braveheart Subhedar Tanhaji Malusare, pits his sharp acumen against the brawn of ruthless and hedonistic Mughal chieftain Udaybhan Singh Rathore to recapture Kondhana for the Maratha</p>
      <form action="book2.php" method="POST">
    <div class="form-group">
    <select class="form-control" id="sel5" name="movdate">
        <option value="10 Dec,2020">10 Dec,2020</option>
        <option value="11 Dec,2020">11 Dec,2020</option>
        <option value="12 Dec,2020">12 Dec,2020</option>
      </select>
      <br>
     
      <select class="form-control" id="sel6" name="movtime">
        <option value="9:00 AM">9:00 AM</option>
        <option value="2:00 PM">2:00 PM</option>
        <option value="6:00 PM">6:00 PM</option>
      </select>
      <br>
      <button class="btn btn-primary" value="Tanhaji: The Unsung Warrior" type="submit" name="movname">Book</button>
    </div>
  </form>
    </div>
  </div>
  </div>
</div>
<style>
.card-img-top {
    width: 100%;
    height: 40%;
    object-fit: cover;
}
</style>

</body>
</html>
