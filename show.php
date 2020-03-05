<?php
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
<title>Show</title>
<meta charset="utf-8">
</head>
<body>

<a href="insert.php">Indsæt</a>

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
      echo "<td>".$row['model']."</td>";
      echo "<td>". $row['pris']."</td>";
      echo "<td>".$row['beskrivelse']."</td>";
      ?>
      <!-- "rediger.php?id=<?php //echo $row['ID']?>" Gør at id'en fra databasen bliver hentet og skaber en unik url for det enkelte produkt-->
      <!-- onclick laver en advarsel der spøger om brugeren er sikker på om man vil slette --> 
      <td><a href="rediger.php?id=<?php echo $row['ID']?>">Rediger</a></td>
      <td><a href="delete.php?id=<?php echo $row['ID']?>" onclick="return confirm ('Er du sikker på du vil slette <?php echo $row['model']?>?')"
      >Slet</a></td>
   <?php

  }
  ?>
</table>

hej




</body>
</html>

<?php
mysqli_close($connection);
?>
