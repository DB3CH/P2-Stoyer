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
		$query = "SELECT * FROM ordrer WHERE id= $id ";


    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ordrer</title>
	<link rel="stylesheet" href="adminStyle.css">
  	<meta charset="utf-8">
</head>
<body>


	<div class="flex-2">

    <?php
    //While loop skriver alt informationen om produktet fra databasen
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
    ?>
	<li><a href="ordrer.php">Tilbage</a></li>
		
		<div class="flexItem flexText">
			Bestilling fra 
			<?php echo $row ['navn']." ". $row['efternavn']?>
			<br>
			Adresse:
			<?php echo $row['adresse']; ?>
			<br>
			Postnummer:
			<?php echo $row['postnummer']; ?>
			<br>
			Mail:
			<?php echo $row['email']; ?>
			<br>
			By:
			<?php echo $row['city']; ?>
			<br>
			Land:
			<?php echo $row['land']; ?>
			<br>
			Nummer:
			<?php echo $row['telefonnummer']; ?>
			<br>
			Tidspunkt ordreren er lavet:
			<?php echo $row['tidspunkt']; ?>


      
        
        
     
       <br>
            <td><a href="afvis.php?id=<?php echo $row['id']?>" class="godkend" onclick="return confirm ('Har du sendt tøjet?')"
      >Godkend</a></td>
      
      <br>
      <td><a href="afvis.php?id=<?php echo $row['id']?>" class="afvis" onclick="return confirm ('Husk at sende mail til dem')"
      >Afvis </a></td>
       <?php
        }
        ?>
      




		</div>

	</div>

	

</body>
<?php
mysqli_close($connection);
 ?>
</html>