<?php
session_start();

print_r($_SESSION["indkøbskurv"]);

if (isset($_POST['ryd'])) {
  session_destroy();

  header("location: viskurv.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Indkøbskurv</title>
  </head>
  <body>
    <form class="ryd_indkøb" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="submit" name="ryd" value="Ryd indkøbskurv">
    </form>

  </body>
</html>
