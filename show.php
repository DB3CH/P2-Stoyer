<?php
session_start();
require_once "connection.php";

// tjekker om man er logget in
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}


?>

<?php
// Etablerer forbindelse til serveren

$query = "SELECT*FROM produkttest ORDER BY pris ASC";
$results = mysqli_query($connection,$query);

if(!$results){
   die("could not query the database" .mysqli_error());
}


?>
<!--CSS der laver gitter i vores tabel, skal flyttes til eksternt dokument -->


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="showstyle.css">
<title>Show</title>
<meta charset="utf-8">
</head>
<body>

<div class="header">

<a href="insert.php">Indsæt tøj</a>

<h2>Butik Strøyer Admin </h2>

<a href="logud.php" onclick="return confirm ('Er du sikker på at du vil logge ud?')">Log ud</a>


</div>

<h2>Produkt oversigt</h2>


<!-- Table der indeholder alle produkter i databasen -->
<table>
  <tr>
    <th>Katagori</th>
    <th>Producent</th>
    <th>Model</th>
    <th>Pris</th>
    <th>Beskrivelse</th>
  </tr>


<?php

  // While loop der kører igennem databasen og echoer de valgte resultater i en tabel
  while($row = mysqli_fetch_assoc($results)){


    echo '<tr>';

      echo "<td>".$row['kategori']."</td>";
      echo "<td>".$row['producent']."</td>";
      echo "<td>". $row['model']."</td>";
      echo "<td>". $row['pris']. ".kr". "</td>";
      echo "<td>".$row['beskrivelse']."</td>";
      ?>
      <!-- "rediger.php?id=<?php //echo $row['ID']?>" Gør at id'en fra databasen bliver hentet og skaber en unik url for det enkelte produkt-->
      <!-- onclick laver en advarsel der spøger om brugeren er sikker på om man vil slette -->
      <td><a href="rediger.php?id=<?php echo $row['ID']?>">Rediger i <?php echo $row ['model'];?> </a></td>
      <td><a href="delete.php?id=<?php echo $row['ID']?>" onclick="return confirm ('Er du sikker på du vil slette <?php echo $row['model']?>?')"
      >Slet <?php echo $row ['model'];?>  </a></td>
   <?php

  }
  ?>
</table>

<div class="bg-billede">

</div>



</body>
</html>

<?php
mysqli_close($connection);
?>
