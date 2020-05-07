 <?php
 //starter en session på siden
 session_start();



$key = $_GET['key'];

if (isset($key)) {
  unset($_SESSION["indkobskurv"][$key]);
  unset($_SESSION["storrelse"][$key]);
  unset($_SESSION["pris"][$key]);
  header("location: viskurv.php");
}
  ?>
