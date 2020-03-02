
<?php
 require_once 'databasetjek.php';

$query = "SELECT Maerke, Stoerelse, Billede,Model FROM Bukser";
$results = mysqli_query($connection,$query);

if(!$results){
   die("could not query the database" .mysqli_error());
}


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="stroeyerstyle.css" rel="stylesheet" type="text/css">
</head>
<body>

  <div class="brand-title"> <a href="forside.php">Strøyer</div> </a>

<h2>Produkt oversigt</h2>
<?php 
echo "<ul>";
while($row = mysqli_fetch_assoc($results)){
  
  echo '<li>';
    echo  $row['Model']."<br>";
    ?>
 
    <?php
      echo "<img src=". $row['Billede']." width='32' height='32'>";
      ?>

      <?php
      echo  "<h5>".  "Størelse - " .$row['Stoerelse']."<br>". "Mærke - ". $row['Maerke']."</h5>";
      ?>
      

<?php
    echo "</a>";
  echo '</li>';
}
echo "</ul>"; 
?>





    </div>
</body>
</html>