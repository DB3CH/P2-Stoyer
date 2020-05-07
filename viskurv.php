<?php
//henter information fra connection.php, for at skabe kontakt til databasen
require_once 'connection.php';

//starter en session på siden
session_start();

$samletpris = 0;
//tjekker om der er en inkøbskurv funktion
if (isset($_SESSION["indkobskurv"])) {

  if (isset($_SESSION["storrelse"])) {



$storrelser = $_SESSION["storrelse"];




  //foreach loop skriver alt informationen om produkterne i indkøbskurven
  foreach ($_SESSION["indkobskurv"] as $key => $item) {
    $id=$item;

    $query = "SELECT * FROM produkttest WHERE id= $id ";
    $result = mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($result)){

          echo "<div class='product_wrapper'>

          <form method='post' action='kurv.php'>

          <div class='producent'>".$row['kategori']."</div>

          <div class='producent'>".$row['producent']."</div>

          <div class='model'>".$row['model']."</div>

          <div> <img src='billeder/". $row['billede']."'>"." </div>


          <div class='pris'>kr.".$row['pris']."</div>


          </form>

          </div>";

          $samletpris += $row['pris'];
        }
        $storrelse = $storrelser[$key];
        echo $storrelse;



      ?>

      <a href="fjernfrakurv.php?key=<?php echo $key;?>"> Fjern dette element </a>
      <?php
  }
}
}else {
  //hvis der ikke er nogle produkter i kurven
  echo "Din kurv er tom";
}
?>
<br>
<?php
if (!isset($_SESSION["pris"])) {
	$_SESSION["pris"] = 0;
}
if ($samletpris==0) {
  echo "0";
}else {
  if (isset($_SESSION["pris"])) {
  	$_SESSION["pris"] = $samletpris;
    echo $samletpris . "kr.";
  }

}



//print_r($_SESSION["indkøbskurv"]);

//tjekker om indkøbskurven skal rydes
if (isset($_POST['ryd'])) {
  unset($_SESSION['indkobskurv']);;
  unset($_SESSION['storrelse']);;
  unset($_SESSION['pris']);;
  header("location: viskurv.php");
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Indkøbskurv</title>
       <style>
        img {
 height: 100px;
 width: auto;
}
    </style>
  </head>
  <body>
    <form class="ryd_indkøb" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="submit" name="ryd" value="Ryd indkøbskurv">
    </form>

<a href="shop.php">Fortsæt med at handle</a>

<a href="info.php">Til Betaling</a>



  </body>
</html>

<?php
mysqli_close($connection);
?>
