<?php
 require_once 'connection.php';

$query = "SELECT kategori,producent,model,pris,beskrivelse FROM produkttest";
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
    echo  $row['kategori']."<br>";
    
 
    
      echo  $row['producent']."<br>";

       echo  $row['model']."<br>";

        echo  $row['pris']."<br>";

         echo  $row['beskrivelse']."<br>";
      

      
    
}
?>
</ul>





    </div>
</body>
</html>