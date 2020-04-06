
<?php
session_start();
require_once "connection.php";

// tjekker om man er logget in
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}

//Denne kode bliver kun kørt, hvis der bliver trykket på submit knappen "indsæt"
if (isset($_POST['indsæt'])) {
  //Tager informationen fra formen og sætter den i variabler, HTMLentities sørger for at det ikke er skrevet kode i formen.
    $kategori = ($_POST['kategori']);
    $producent = ($_POST['producent']);
    $model = htmlentities($_POST['model']);
    $beskrivelse = ($_POST['beskrivelse']);
    $pris = htmlentities($_POST['pris']);

  //Sætter sql query til at indsætte data i en variabel
  $sql = "INSERT INTO produkttest (kategori, producent, model, pris, beskrivelse)
  VALUES ('$kategori', '$producent', '$model', '$pris', '$beskrivelse')";

  //if staement viser om dataen er skrevet eller om der er en error
  if (mysqli_query($connection, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }

  //header sender brugeren videre til show.php
  header("location: show.php");

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert  </title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="insertstyle.css">
</head>

<body>
    <div class="header">

<a href="insert.php">Indsæt tøj</a>

<h2> <a class="logo" href="show.php">Butik Strøyer Admin </a> </h2>

<a href="logud.php">Log ud</a>

</div>
<!-- Form hvor data kan indsættes, post = videre til phpaction, hvor det bliver sat på databasen. -->
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="container">
        <ul>
       <li> <label>Kategori:</label>
        <input type="text" id="kategori" name="kategori"> </li>
       <li> <Lable>Producent:</Lable>
        <input type="text" id="producent" name="producent"> </li>
       <li> <Lable>Model:</Lable>
        <input type="text" id="model" name="model"> </li>
       <li> <Lable>Beskrivelse:</Lable>
        <input type="text" id="beskrivelse" name="beskrivelse"> </li>
       <li> <Lable>Pris:</Lable>
        <input type="number" min="0.00" max="999999.00"  id="pris" name="pris"> </li>

        <input type="submit" name="indsæt" value="Indsæt">
        </ul>
    </form>

</body>
</html>

<?php
    mysqli_close($connection);
 ?>
