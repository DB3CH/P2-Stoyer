<?php
//starter en session på siden
session_start();
?>



<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<link rel="stylesheet" href="style.css">
  	<meta charset="utf-8">
  	<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body>

	<div class="cart">
	<a href="viskurv.php">
		<img class="cart" src="cart.png">
		 <?php
    if (isset($_SESSION["pris"])) {
      echo "<p>". $_SESSION["pris"]. " kr." ."</p>";
  }else {
    echo "<p>"."0 kr."."</p>";
  }
     ?>
	</a>
	</div>
	
	<div class="pageNav">
		
		<label for="toggle">&#9776;</label>
		<input type="checkbox" id="toggle">


		<div class="pageHeader">
		<a href="forside.php"><h1>STRØYER</h1></a>
		</div>

		<ul class="pageMenu">
			<li><a href="shop.php">Shop</a></li>
			<li><a href="trends.php">Trends</a></li>
			<li><a href="omOs.php">Om os</a></li>
			<li><a href="contact.php">Kontakt</a></li>
		</ul>
		<hr class="navLinePage">
		
	</div>

	<div class="flex-2">
		<div class="flexItem flexText">
			<h3>Kontakt os</h3>
			<h5>Åbningstider:</h5>
			<p>Søndag LUKKET</p>
			<p>Mandag 10 - 17:30</p>
			<p>Tirsdag 10 - 17:30</p>
			<p>Onsdag 10 - 17:30</p>
			<p>Torsdag 10 - 17:30</p>
			<p>Fredag 10 - 17:30</p>
			<p>Lørdag 10 - 17:30</p>
			
		</div>

		<div class="flexItem">
			<h3>Send os en besked</h3>

  <form action="/action_page.php">
    <input type="text" id="fname" name="firstname" placeholder="Fornavn:">

    <input type="text" id="lname" name="lastname" placeholder="Efternavn:">

    <input type="text" id="email" name="email" placeholder="Email:">

    

    <textarea class="text-area" id="subject" name="subject" placeholder="Skriv besked her:"></textarea>

    <input class="btn" type="submit" value="Submit">
  </form>
</div>

	</div>
		

	<footer>
		<a href="https://www.facebook.com/stroyeraalborg/"><img src="faceb_icon.png" alt="facebook icon"></a>
		<a href="https://www.instagram.com/butikstroyer/?hl=da"><img src="insta_icon.png" alt="facebook icon"></a>
		<p>2017 STRØYER - ALL RIGHTS RESERVED</P>
	</footer>

</body>
</html>