<?php
session_start();

$pris = $_SESSION['pris'];
 ?>


<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="betal" action="index.html" method="post">
      <input type="submit" name="betal" value="Betal <?php echo $pris; ?> kr.">
    </form>

  </body>
</html>
