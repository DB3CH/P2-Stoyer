<?php
session_start();
// Etablerer forbindelse til serveren
require_once 'connection.php';

//vælger alt informationen om alle produkter i databasne
$query = "SELECT*FROM produkttest WHERE kategori='Bukser'";
$results = mysqli_query($connection,$query);

//hvis der ikke er nogle resultater bliver fejlkode skrevet
if(!$results){
	die("could not query the database" .mysqli_error());
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Shop</title>
	<link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="shoppingcart">
		<a href="viskurv.php">
			<img class="shoppingcart" src="shoppingcart.png">
			<p>0,00 kr.</p>
		</a>
	</div>

	<div class="pageNav">

		<label for="toggle">&#9776;</label>
		<input type="checkbox" id="toggle">


		<div class="pageHeader">
			<a href="index.php"><h1>STRØYER</h1></a>
		</div>

		<ul class="pageMenu">
			<li><a href="shop.php">Shop</a></li>
			<li><a href="trends.php">Trends</a></li>
			<li><a href="omOs.php">Om os</a></li>
			<li><a href="#">Kontakt</a></li>
		</ul>
		<hr class="navLinePage">

	</div>

	<div class="shopSection">
		<h2>Produkter</h2>




		<div class="shopContainer">

			<?php

			  // While loop der kører igennem da og echoer de valgte resultater i en tabel
			while($row = mysqli_fetch_assoc($results)){

				?>

				<div class="images"><a href="products.php?id=<?php echo $row['ID']?>"> <?php echo "<img src='billeder/". $row['billede']."'>";?><div class="shopText"><?php echo $row ['producent']." ". $row['model']?><br><?php echo $row ['pris']?></div></a></div>



				<?php
			}
			?>


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
