<?php
//starter en session på siden
session_start();

//opretter forbindelse til databasen
require_once 'connection.php';

//tjekker om der er valgt en id fra webshoppen
if(isset($_GET['id'])){

	//id fra URL bliver sat i en variabel
    $id=htmlentities($_GET['id']);

  //tjekker at der er en id i variablen
	if(!empty($id)){
		//$query indeholder sql kode der vælger alt indehold med den givne id fra databasen
		$query = "SELECT * FROM produkttest WHERE id= $id ";


    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
	<link rel="stylesheet" href="style.css">
  	<meta charset="utf-8">
</head>
<body>

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

	<div class="flex-2">

    <?php
    //While loop skriver alt informationen om produktet fra databasen
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
    ?>

		<div class="flexItem">
			<?php echo "<img src='billeder/". $row['billede']."'>";?>
		</div>
		<div class="flexItem flexText">
			<h3><?php echo $row ['producent']." ". $row['model']?></h3>
			<h4><?php echo $row['pris']?> kr.</h4>

			<p>Varenr.:</p>
			<br>
			<p><?php echo $row['beskrivelse'] ?></p>
			<br>
			<p><?php echo $row['storrelse'] ?></p>
      <?php
        }
       ?>

       <form class="" action="kurv.php" method="post">
       		<input class="btnProducts"type="button" name="tilfoej" value="Tilføj">
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
