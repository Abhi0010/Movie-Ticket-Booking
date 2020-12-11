<!doctype html>
<html lang="en">
	<head>
		<?php include 'basics/header.php';?>

		<title>Welcome to BookMyMovie</title>
	</head>
	<body>
		<?php include 'basics/navbar.php';?>

		<header id="myCarousel" class="carousel slide">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<div class="fill" style="background-image:url('img/tanhaji-unsung-warrior.webp');"></div>
					<div class="carousel-caption">
						<h2>Book tickets in a few clicks</h2>
					</div>
				</div>
				<div class="item">
					<div class="fill" style="background-image:url('img/Sonic.jpg');"></div>
					<div class="carousel-caption">
						<h2>Cancel tickets anytime</h2>
					</div>
				</div>
				<div class="item">
					<div class="fill" style="background-image:url('img/Dil_Bechara.webp');"></div>
					<div class="carousel-caption">
					</div>
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="icon-prev"></span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="icon-next"></span>
			</a>
		</header>

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="page-header">Movies</h2>
				</div>
				<div class="col-xs-12">
					<h5 class="center-align text-uppercase lead">Coming Soon</h5>
				</div>
				<div class="col-md-3 col-sm-6">
						<img class="img-responsive img-portfolio img-hover" src="img/wonder_woman_1984.webp" alt="" style="height: 400px">
				</div>
				<div class="col-md-3 col-sm-6">
						<img class="img-responsive img-portfolio img-hover" src="img/Sooryavanshi.jpg" alt="" style="height: 400px">
				</div>
				<div class="col-md-3 col-sm-6">
						<img class="img-responsive img-portfolio img-hover" src="img/tenet.jpg" alt="" style="height: 400px">
				</div>
				<div class="col-md-3 col-sm-6">
						<img class="img-responsive img-portfolio img-hover" src="img/cs-fbawtft.jpg" alt="">
				</div>
			</div>
			<br><br><br>
		</div>

		<div class="bottom">
			<!-- Call to Action Section -->
			<div class="pre-footer small">
				<div class="row">
					<div class="col-xs-12">
						<h5 class="center-align bold" style="color:#555;">Book an experience with BookMyMovie!</h5>
					</div>
					<div class="row row-content">
						<div class="col-xs-12">
						Life has never been so convenient for a movie buff! Remember the time, when you had to stand in a long queue outside the theatre to book movie tickets? That time is gone now!With the emergence of BookMyMovie, India's biggest online ticketing portal, booking movie tickets have become a cake walk. Now, enjoy your favourite movies in theatre with just a click! BookMyMovie is Movies on the go - Jahan mood kiya wahan book kiya! Just take out your mobile, launch the app, choose your movie, theatre &amp; show time and book tickets online, right away! So simple. Isn't it! We give you some more amazingly cool reasons why you should book your movie tickets here!
						</div>
					</div>
					<div class="row row-content">
							<h5 class="center-align bold" style="color:#555;">Bollywood, Hollywood or Regional cinema</h5>
						<p>Whatever be your choice in movies, BookMyMovie is the Go-to destination! With the list of all the upcoming movies in any language - Hindi, English, Marathi, Tamil, Telugu, Kannada, Malayalam or Genre – Action, Comedy, Thriller, Drama, Romance, Animation or Crime, we keep you informed about the movie world! We give you the release dates also, to let you plan your movie outing accordingly!</p>
					</div>
				</div>
			</div>
		</div>

		<?php include 'basics/footer.php';?>
		<script>
			$('.carousel').carousel({
				interval: 5000 //changes the speed
			})
		</script>
	</body>
</html>
