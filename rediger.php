<?php
require_once 'connection.php';
session_start();
require_once "connection.php";

// tjekker om man er logget in
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}

//Kode til at redigere i tøjet, bliver kun kørt hvis der trykkes på rediger knappen
if (isset($_POST['rediger'])) {
      //Tager informationen fra formen og sætter den i variabler, HTMLentities sørger for at det ikke er skrevet kode i formen.
        $kategori = ($_POST['kategori']);
        $producent = ($_POST['producent']);
        $model = htmlentities($_POST['model']);
        $beskrivelse = ($_POST['beskrivelse']);
        $pris = htmlentities($_POST['pris']);
        $id = htmlentities($_POST['id']);



      //Sætter sql query til at indsætte data i en variabel
      $sql = "UPDATE produkttest SET kategori='$kategori', producent='$producent', model='$model', pris='$pris', beskrivelse='$beskrivelse'
      WHERE id='$id';";

      if (mysqli_query($connection, $sql)) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      }


      //header sender brugeren videre til show.php
      header("location: show.php");
}


?>


<?php


if(isset($_GET['id'])){
	//id fra URL bliver sat i en variabel
    $id=htmlentities($_GET['id']);


	if(!empty($id)){
		//$query indeholder sql kode der sletter alt indehold med den givne id
		$query = "SELECT * FROM produkttest WHERE id= $id ";

        $results = mysqli_query($connection,$query);


        $row = mysqli_fetch_assoc($results);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert  </title>
	<meta charset="utf-8">
</head>

<body>

	<form name="rediger" id="rediger" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" autocomplete="on">
        <label>Kategori:</label>
        <input type="text" id="kategori" name="kategori" value="<?php echo $row['kategori']?>">
        <Lable>Producent:</Lable>
        <input type="text" id="producent" name="producent" value="<?php echo $row['producent']?>">
        <Lable>Model:</Lable>
        <input type="text" id="model" name="model" value="<?php echo $row['model']?>">
        <Lable>Beskrivelse:</Lable>
        <input type="text" id="beskrivelse" name="beskrivelse" value="<?php echo $row['beskrivelse']?>">
        <Lable>Pris:</Lable>
        <input type="number" min="0.00" max="999999.00" step="1.00" id="pris" name="pris" value="<?php echo $row['pris']?>">

        <input type="submit" name="rediger" value="Rediger">
        <input type="hidden" name="id" value="<?php echo $id?>">
    </form>

</body>
</html>

<?php
mysqli_close($connection);
?>
