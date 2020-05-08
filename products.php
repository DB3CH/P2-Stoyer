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

			<p>Varenr:<?php echo $row['produktnummer']; ?> </p>
			<br>
			<p><?php echo $row['beskrivelse']; ?></p>
			<br>
			<p>Vi har størrelse <?php echo $row['storrelse']; ?></p>

        <?php
        $id=$row['ID'];
        }
       ?>


       <form class="størrelse" action="kurv.php" method="POST">
				 	<input class="vælg-størrelse" type="text" name="storrelse" Placeholder="Vælg Størrelse" required>
       		<input class="btnProducts"type="submit" name="tilfoej" value="Tilføj">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
       </form>


		</div>

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
