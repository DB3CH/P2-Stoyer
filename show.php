<?php
 require_once 'connection.php';

$query = "SELECT ID,kategori,producent,model,pris,beskrivelse FROM produkttest";
$results = mysqli_query($connection,$query);

if(!$results){
   die("could not query the database" .mysqli_error());
}


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>


<h2>Produkt oversigt</h2>
<?php 
echo "<ul>";
while($row = mysqli_fetch_assoc($results)){
  
  echo '<li>';
    echo  $row['kategori']. "<br>";
    
 
    
      echo   $row['producent']."<br>";

       echo "Model: ". $row['model']."<br>";

        echo  "Pris: ". $row['pris']."<br>";

         echo  "Beskrivelse: ". $row['beskrivelse']."<br>";
      

      
    
}
echo "</ul>"; 
?>





    </div>
</body>
</html>