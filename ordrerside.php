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
  	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

	<input type="checkbox" id="check">
  <label for="check">
    <i class="fas fa-bars" id="btn"></i>
    <i class="fas fa-times" id="cancel"></i>
  </label>
  <div class="sidebar">
    <header>Menu</header>
    <a href="produktOversigt.php" class="active">
      <span>Produktoversigt</span>
    </a>
    <a href="ordrer.php">
      <span>Igangværende ordrer</span>
    </a>
    <a href="afsluttedeOrdrer.php">
      <span>Afsluttede ordrer</span>
    </a>
  </div>


  <header>
    <div class="nav">
     <h1 class="logo-text" > <a class="logo-text" href="logud.php" onclick="return confirm ('Er du sikker på at du vil logge ud?')">Log ud</a></h1>
   </div>
 </header>

 <div class="form-wrapper">
    <div class="form">

    	<?php
    //While loop skriver alt informationen om produktet fra databasen
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
    ?>

      <form>


        <h2>Ordre oplysninger:</h2>

        <label for="email"><h3>Bestilling fra:</h3></label>
        <p><?php echo $row ['navn']." ". $row['efternavn']?></p>

        <label for="email"><h3>Adresse:</h3></label>
        <p><?php echo $row['adresse']; ?></p>

        <label for="email"><h3>Postnummer:</h3></label>
        <p><?php echo $row['postnummer']; ?></p>

        <label for="email"><h3>Email:</h3></label>
        <p><?php echo $row['email']; ?></p>

        <label for="email"><h3>By:</h3></label>
        <p><?php echo $row['city']; ?></p>

        <label for="email"><h3>Land:</h3></label>
        <p><?php echo $row['land']; ?></p>

        <label for="email"><h3>Nummer:</h3></label>
        <p><?php echo $row['telefonnummer']; ?></p>

        <label for="email"><h3>Tidspunkt ordreren er lavet:</h3></label>
        <p><?php echo $row['tidspunkt']; ?></p>

       
      </form>

      



      

    </div>

    	<a href="#id=<?php echo $row['id']?>" class="godkend" onclick="return confirm ('Har du sendt tøjet?')"
      >Godkend</a>

      <a href="afvis.php?id=<?php echo $row['id']?>" class="afvis" onclick="return confirm ('Husk at sende mail til dem')"
      >Afvis </a>


	<?php
        }
        ?>
  </div>


	

	

</body>
<?php
mysqli_close($connection);
 ?>
</html>