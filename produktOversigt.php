<?php
//starter en session på siden
session_start();

//henter information fra connection.php, for at skabe kontakt til databasen
require_once "connection.php";

// tjekker om man er logget in
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}




?>

<?php
// Henter information fra alle produkter på databasen
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
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="adminStyle.css">
</head>
<body>


	<header>
		<div class="logo">
			<h1 class="logo-text">Strøyer</h1>
		</div>
		<div class="nav">
			<h1 class="logo-text"> <a href="logud.php" onclick="return confirm ('Er du sikker på at du vil logge ud?')">Log ud</a></h1>
		</div>
	</header>

	<div class="admin-wrapper">

		<div class="left-sidebar">
			<ul>
				<li><a href="produktOversigt.php">Produktoversigt</a></li>
				<li><a href="ordrer.php">Igangværende ordrer</a></li>
				<li><a href="afsluttedeOrdrer.html">Afsluttede ordrer</a></li>
				
			</ul>
		</div>

		<div class="admin-content">

			<div class="button-group">
				<a href="tilføjProdukt.php" class="btn">Tilføj produkt</a>
			</div>

			<div class="content">

				<h2 class="page-title">Produktoversigt</h2>

<form action='produktOversigt.php'>

  <input type="submit"  value="vis alt">

  </form>

  <form method="POST" action='<?php echo $_SERVER['PHP_SELF']?>'>

  <input type="submit" name="Bukser"  value="Bukser">

 

  <input type="submit" name="Kjoler"  value="Kjoler">



  <input type="submit" name="Sko"  value="Sko">



  <input type="submit" name="Jakker"  value="Jakker">

 

  <input type="submit" name="Trojer"  value="Trøjer">

  </form>






		<!-- Table der indeholder alle produkter i databasen -->
<table>
  <tr>
    <th>Katagori</th>
    <th>Producent</th>
    <th>Model</th>
    <th>Varenummer</th>
    <th>Billede</th>
    <th>Pris</th>

  </tr>

					<tbody>

<?php

  // While loop der kører igennem databasen og echoer de valgte resultater i en tabel
  while($row = mysqli_fetch_assoc($results)){


    echo '<tr <div class="table">';

      echo "<td>".$row['kategori']."</td>";
      echo "<td>".$row['producent']."</td>";
      echo "<td>". $row['model']."</td>";
      echo "<td>". $row['produktnummer']."</td>";
      echo "<td>"."<img src='billeder/". $row['billede']."'>"."</td>";
      echo "<td>". $row['pris']. ".kr". "</td>";


      ?>
      <!--"rediger.php?id=<?php //echo $row['ID']?>" Gør at id'en fra databasen bliver hentet og skaber en unik url for det enkelte produkt-->
      <!-- onclick laver en advarsel der spøger om brugeren er sikker på om man vil slette -->
      <td><a href="products.php?id=<?php echo $row['ID']?>" class="godkend">Vis </a></td>
      <td><a href="redigertoj.php?id=<?php echo $row['ID']?>" class="godkend">Rediger</a></td>
      <td><a href="delete.php?id=<?php echo $row['ID']?>" class="afvis" onclick="return confirm ('Er du sikker på du vil slette <?php echo $row['model']?>?')"
      >Slet </a></td>
   <?php

  }
  ?>
</div>
</table>



				</table>

			</div>
		</div>
	</div>

</body>
<?php
mysqli_close($connection);
 ?>
</html>
