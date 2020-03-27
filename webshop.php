<?php
session_start();
// Etablerer forbindelse til serveren
 require_once 'connection.php';

$query = "SELECT ID,kategori,producent,model,pris,beskrivelse FROM produkttest";
$results = mysqli_query($connection,$query);

if(!$results){
   die("could not query the database" .mysqli_error());
}


?>
<!--CSS der laver gitter i vores tabel, skal flyttes til eksternt dokument -->
<style>
  table, th, td{
    border: 1px solid black;
  }

</style>

<!DOCTYPE html>
<html>
<head>
<title>Webshop</title>
<meta charset="utf-8">
</head>
<body>



<h2>Web Shop</h2>
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
      echo "<td>".$row['model']."</td>";
      echo "<td>". $row['pris']."</td>";
      echo "<td>".$row['beskrivelse']."</td>";
      ?>
      <!-- "rediger.php?id=<?php //echo $row['ID']?>" Gør at id'en fra databasen bliver hentet og skaber en unik url for det enkelte produkt-->
      <td><a href="produktside.php?id=<?php echo $row['ID']?>">Se produkt</a></td>

   <?php

  }
  ?>
</table>
<a href="viskurv.php">Se din kurv</a>




</body>
</html>

<?php
mysqli_close($connection);
?>
