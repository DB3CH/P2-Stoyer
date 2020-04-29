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
    <title></title>
  </head>
  <body>
    <form method=”post” name="info" action="fakemobilepay.php" class="kundeinfo" enctype="text/plain">

      Kontakt information:
      <br>
      Email: <input type="email" name="email" placeholder="Indtast email" required>
      <br>
      Leverings oplysninger:
      <br>
      Navn:<input type="text" name="navn" placeholder="Indtast navn" required>
      <br>
      Efternavn: <input type="text" name="efternavn" placeholder="Indtast efternavn" required>
      <br>
      Adresse: <input type="text" name="adresse" placeholder="Indtast adresse" required>
      <br>
      postnummer: <input type="number" maxlength="4" name="postnummer" placeholder="Postnummer" required>
      <br>
      By: <input type="text" name="by" placeholder="By" required>
      <br>
      Land: <input type="text" name="land" placeholder="Land" required>
      <br>
      Telefonnummer: <input type="number" name="telefonnummer" maxlength="8" placeholder="Telefonnummer" equired>
      <br>
      <input type="submit" name="submit" value="Til Betaling">
      <input type="hidden" name="id[]" value="<?php echo $id; ?>">
      <input type="hidden" name="storrelse" value="<?php echo $storrelse; ?>">
      <input type="hidden" name="pris" value="<?php echo $pris; ?>">
    </form>
  </body>
</html>
