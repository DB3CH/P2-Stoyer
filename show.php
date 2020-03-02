<?php
// Etablerer forbindelse til serveren
 require_once 'connection.php';

$query = "SELECT ID,kategori,producent,model,pris,beskrivelse FROM produkttest";
$results = mysqli_query($connection,$query);

if(!$results){
   die("could not query the database" .mysqli_error());
}


?>
<style>
  table, th, td{
    border: 1px solid black;
  }

</style>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>


<h2>Produkt oversigt</h2>
<table>
  <tr> 
    <th>Katagori</th>
    <th>Producent</th>
    <th>Model</th>
    <th>Pris</th>
    <th>Beskrivelse</th>
  </tr>
  <?php 
  while($row = mysqli_fetch_assoc($results)){
    
    echo '<tr>';
    
      echo "<td>".$row['kategori']."</td>";
      echo "<td>".$row['producent']."</td>";
      echo "<td>".$row['model']."</td>";
      echo "<td>". $row['pris']."</td>";
      echo "<td>".$row['beskrivelse']."</td>";
      ?>
      <td><a href="rediger.php?id=<?php echo $row['ID']?>">Rediger</a></td>
      <td><a href="delete.php?id=<?php echo $row['ID']?>" onclick="return confirm ('Er du sikker på du vil slette <?php echo $row['model']?>?')"
      >Slet</a></td>
   <?php    
      
  }
  ?>
</table>




</body>
</html>