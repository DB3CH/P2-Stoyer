<?php
// Etablerer forbindelse til serveren
require_once "connection.php";

//Tager informationen fra formen og sætter den i variabler, HTMLentities sørger for at det ikke er skrevet kode i formen. 
  $kategori = ($_POST['kategori']);
  $producent = ($_POST['producent']);
  $model = htmlentities($_POST['model']);
  $beskrivelse = ($_POST['beskrivelse']);
  $pris = htmlentities($_POST['pris']);
  $id = htmlentities($_post['id']);
  
//Sætter sql query til at indsætte data i en variabel
$sql = "UPDATE produkttest SET katagori='$katagori', producent='$producent', model='$model', pris='$pris', beskrivelse='$beskrivelse' WHERE id='$id';";

echo $sql;
    $result = mysqli_query($connection,$sql);

if(!$result){
    die("could not query the databsse" .mysqli_error());
}


//header sender brugeren videre til show.php 
header("location: show.php");


// lukker forbindelsen til serveren
mysqli_close($connection);
?>