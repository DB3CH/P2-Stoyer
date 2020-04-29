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
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="afvisphp.php" method="POST" class="container">
  

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

  </body>
</html>
<?php
mysqli_close($connection);
 ?>