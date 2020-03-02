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
<ul>
<?php 
while($row = mysqli_fetch_assoc($results)){
  
  echo '<li>';
<<<<<<< HEAD
    echo  $row['kategori']. "<br>";
=======
    echo "<h2>";
    echo "<h2>".$row['kategori']."</h2>"."<br>";
>>>>>>> 2a1fee99740cc3d466cbfc5d6d9efab3cb6a12e8
    
 
    
      echo   $row['producent']."<br>";

       echo "Model: ". $row['model']."<br>";

        echo  "Pris: ". $row['pris']."<br>";

         echo  "Beskrivelse: ". $row['beskrivelse']."<br>";
      

      
    
}
?>
</ul>





    </div>
</body>
</html>