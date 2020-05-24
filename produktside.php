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
      $query = "SELECT * FROM produkttest WHERE id= $id ";


  }
}
?>

<!DOCTYPE html>
<html>
<head>

  <!-- Styling skal flyttes til eksternt dokument -->
  <style>
    img {
       height: 100px;
       width: auto;
   }
</style>

<title><?php echo $row['model']; ?></title>
<meta charset="utf-8">
</head>

<body>
    

    <?php
//While loop skriver alt informationen om produktet fra databasen
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
    }

    ?>
    <!--knap til at tilføje produktet til indkøbskurven -->
    <a href="kurv.php?id=<?php echo $id?>"> Tilføj til kurv </a>
    <br>
    <a href="viskurv.php">Se din kurv</a>
    <br>
    <a href="shop.php">Tilbage</a>

</body>
</html>

<?php
mysqli_close($connection);
?>
