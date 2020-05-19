<?php
session_start();
// Etablerer forbindelse til serveren
 require_once 'connection.php';

//vælger alt informationen om alle produkter i databasne
$query = "SELECT * FROM produkttest ORDER BY ID DESC LIMIT 3";
$results = mysqli_query($connection,$query);

//hvis der ikke er nogle resultater bliver fejlkode skrevet
if(!$results){
   die("could not query the database" .mysqli_error());
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Frontpage</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  	<meta charset="utf-8">
</head>
<body>



	<div class="shoppingcart">
	<a href="viskurv.php">
		<img class="shoppingcart" src="shoppingcart.png">
    <?php
    if (isset($_SESSION["pris"])) {
      echo "<p>". $_SESSION["pris"]. " kr." ."</p>";
  }else {
    echo "<p>"."0 kr."."</p>";
  }
     ?>
	</a>
	</div>
	<div class="nav">

		<label for="toggle">&#9776;</label>
		<input type="checkbox" id="toggle">

		<div class="header">
		<a href="forside.php"><h1>STRØYER</h1></a>
		</div>
		<ul class="menu">
			<li><a href="shop.php">Shop</a></li>
			<li><a href="trends.php">Trends</a></li>
			<li><a href="omOs.php">Om os</a></li>
			<li><a href="contact.php">Kontakt</a></li>
		</ul>
		<hr class="navLine">
	</div>

	<div class="hero">
		<div class="heroContent">
			<h1>Butik Strøyer</h1>
			<p>Kvindetøj med fokus på kvalitet og den nyeste mode.</p>
			<a href="shop.php" class="btn">Shop her</a>
		</div>
		<div class="scroll">
			<div class="line"></div>
				<p>SCROLL</p>
		</div>
		<div class="heroImage">
			<img src="forsidepic2.jpg">
		</div>

	</div>
	<div class="flex-2">

		<div class="flexItem">
			<img src="stroyerbutik.jpg" class="mobileHide">
		</div>
		<div class="flexItem flexText">
			<h2>Placeret centralt i Gravensgade</h2>

			<p>Velkommen til Butik Strøyers webshop!
Butik Strøyer er en tøjbutik, hvor man blandt andet kan finde lækkert designertøj til kvinder, accessories, sko, samt smykker. Vi finder og udvælger løbende nye og spændende varer i og udenfor Danmark. Alle vores styles er håndplukkede, hvilket giver vores kunder rig mulighed for at sammensætte en helt unik garderobe.
</p>

    	<a href="omOs.php" class="btnTrends">Se her</a>
		</div>
	</div>
	<div class="line2"></div>

	<div class="imageSection">
		<h2>Nyeste produkter</h2>

<div class="imagesContainer">


  <?php

  // While loop der kører igennem da og echoer de valgte resultater i en tabel
  while($row = mysqli_fetch_assoc($results)){

  	?>

			<div class="images"><a href="products.php?id=<?php echo $row['ID']?>">
       <?php echo "<img src='billeder/". $row['billede']."'>";?>
       <div class="imgText"><?php echo $row ['producent']." ". $row['model']?>
        <br><?php echo $row ['pris']?>
      </div></a></div>



				<?php
	}
	?>
</div>
		<div class="btnlow">
			<a href="Shop.php" class="btnTrends">Se her</a>
		</div>


		<div class="line2"></div>

	</div>
	<footer>
		<a href="https://www.facebook.com/stroyeraalborg/"><img src="faceb_icon.png" alt="facebook icon"></a>
		<a href="https://www.instagram.com/butikstroyer/?hl=da"><img src="insta_icon.png" alt="facebook icon"></a>
		<p>2017 STRØYER - ALL RIGHTS RESERVED</P>
	</footer>



</body>
<?php
mysqli_close($connection);
 ?>
</html>
