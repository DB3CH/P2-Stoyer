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
?>

<!DOCTYPE html>
<html>
<head>
  <title>Shop</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <meta charset="utf-8">
</head>
<body>
 

  <div class="pageNav">

    <label for="toggle">&#9776;</label>
    <input type="checkbox" id="toggle">


    <div class="pageHeader">
    <a href="forside.php"><h1>STRØYER</h1></a>
    </div>

    <ul class="pageMenu">
      <li><a href="shop.php">Shop</a></li>
      <li><a href="trends.php">Trends</a></li>
      <li><a href="omOs.php">Om os</a></li>
      <li><a href="#">Kontakt</a></li>
    </ul>
    <hr class="navLinePage">

  </div>




  <div class="shopping-cart">
  <!-- Title -->
  <div class="title">
    Kurv
  </div>



<?php
$storrelse = $storrelser[$key];
  //foreach loop skriver alt informationen om produkterne i indkøbskurven
  foreach ($_SESSION["indkobskurv"] as $key => $item) {
    $id=$item;




    $query = "SELECT * FROM produkttest WHERE id= $id ";
    $result = mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($result)){


          echo "
            <div class='item'>
             <form method='post' action='kurv.php'>

            <div class='image'> <img src='billeder/". $row['billede']."'>"." </div>
         

          <div class='description'>".$row['producent']."

          

          ".$row['model']."</div>



          <div class='price'>kr.".$row['pris']."</div>


          </form>

          </div>";

          $samletpris += $row['pris'];
        }
        ?>

        <div class="description">
          <?php
        $storrelse = $storrelser[$key];
        echo $storrelse;
        ?>
      </div>




    </div>


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
    </div>
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
