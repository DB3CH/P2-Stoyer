<?php
session_start();
// Etablerer forbindelse til serveren
 require_once 'connection.php';

//vælger alt informationen om alle produkter i databasne

$query = "SELECT*FROM produkttest";
$results = mysqli_query($connection,$query);

//hvis der ikke er nogle resultater bliver fejlkode skrevet
if(!$results){
   die("could not query the database" .mysqli_error());
}

if (isset($_POST['Bukser']))
{
$query = "SELECT*FROM produkttest WHERE kategori='Bukser'";
$results = mysqli_query($connection,$query);
}
if(!$results){
   die("bukser virker ikke" .mysqli_error());
}

if (isset($_POST['Kjoler']))
{
$query = "SELECT*FROM produkttest WHERE kategori='Kjoler'";
$results = mysqli_query($connection,$query);
}
if(!$results){
   die("bukser virker ikke" .mysqli_error());
}

if (isset($_POST['Sko']))
{
$query = "SELECT*FROM produkttest WHERE kategori='Sko'";
$results = mysqli_query($connection,$query);
}
if(!$results){
   die("bukser virker ikke" .mysqli_error());
}

if (isset($_POST['Jakker']))
{
$query = "SELECT*FROM produkttest WHERE kategori='Jakker'";
$results = mysqli_query($connection,$query);
}
if(!$results){
   die("bukser virker ikke" .mysqli_error());
}
if (isset($_POST['Trojer']))
{
$query = "SELECT*FROM produkttest WHERE kategori='Trojer'";
$results = mysqli_query($connection,$query);
}
if(!$results){
   die("bukser virker ikke" .mysqli_error());
}






?>

<!DOCTYPE html>
<html>
<head>
	<title>Shop</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  	<meta charset="utf-8">
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











	<div class="shopSection">


<div class="kategori">


	<form action='shop.php'>

		<input class="kategori-btn" type="submit"  value="Vis alt">

	</form>

	<form method="POST" action='<?php echo $_SERVER['PHP_SELF']?>'>

	<input class="kategori-btn" type="submit" name="Bukser"  value="Bukser">
	<input class="kategori-btn" type="submit" name="Kjoler"  value="Kjoler">
	<input class="kategori-btn" type="submit" name="Sko"  value="Sko">
	<input class="kategori-btn" type="submit" name="Jakker"  value="Jakker">
	<input class="kategori-btn" type="submit" name="Trojer"  value="Trøjer">
	</form>

	</div>





<div class="shopContainer">

			  <?php

			  // While loop der kører igennem da og echoer de valgte resultater i en tabel
			  while($row = mysqli_fetch_assoc($results)){

			  	?>

						<div class="images"><a href="products.php?id=<?php echo $row['ID']?>"> <?php echo "<img src='billeder/". $row['billede']."'>";?><div class="shopText"><?php echo $row ['producent']." ". $row['model']?><br><?php echo $row ['pris']?> Kr.</div></a></div>



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
