<?php
session_start();
$id = $_SESSION['indkobskurv'];
$storrelse = $_SESSION['storrelse'];
$pris = $_SESSION['pris'];


 ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Style.css">
    
    <title></title>
  </head>
  <body>

      <div class="form-wrapper">
      <div class="form">
    <form action="ordrerupload.php" method="POST" class="container">


      <h2>Leverings oplysninger:</h2>

      <label for="email">Email:<input type="email" name="email" placeholder="Indtast email" required></label>
      
      <label for="navn">Navn:<input type="text" name="navn" placeholder="Indtast navn" required></label>
      
      <label for="efternavn">Efternavn:<input type="text" name="efternavn" placeholder="Indtast efternavn" required></label>
      
      <label for="adresse">Adresse: <input type="text" name="adresse" placeholder="Indtast adresse" required></label>
      
      <label for="postnummer">Postnummer:<input type="number" maxlength="4" name="postnummer" placeholder="Postnummer" required></label>
      
      <label for="by">By:<input type="text" name="city" placeholder="By" required></label>
      
      <label for="land">Land:<input type="text" name="land" placeholder="Land" required></label>
      
      <label for="telefonnummer">Telefonnummer:<input type="number" name="telefonnummer" maxlength="8" placeholder="Telefonnummer" equired></label>
      
      <input class="btn" type="submit" value="Til Betaling">
      <input type="hidden" name="id[]" value="<?php echo $id; ?>">
      <input type="hidden" name="storrelse" value="<?php echo $storrelse; ?>">
      <input type="hidden" name="pris" value="<?php echo $pris; ?>">
    </form>
  </div>
</div>
  </body>
</html>
