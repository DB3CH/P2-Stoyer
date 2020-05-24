<?php

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


<body>

 <div class="form-wrapper">
    <div class="form">

  <form action="afvisphp.php" method="POST" class="container">
    
   <?php
    //While loop skriver alt informationen om produktet fra databasen
   $result = mysqli_query($connection,$query);
   while($row = mysqli_fetch_assoc($result)){
    ?>


    Kontakt information:
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
    Hvorfor orderen blev afvist:
    <br> 
    <textarea rows="4" cols="50" name="hvorfor" placeholder="Fortæl kunden hvorfor orderen blev afvist"></textarea>
    <br>
    <input type="submit" value="Send mail">

    <?php 
  }
  ?>
</form>
</div>
</div>

</body>
</html>
<?php
mysqli_close($connection);
?>