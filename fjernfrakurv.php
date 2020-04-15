 <?php
 session_start();
$id = $_GET['id'];

if (($key = array_search($id, $_SESSION["indkobskurv"])) !== false) {
  unset($_SESSION["indkobskurv"][$key]);
  header("location: viskurv.php");
}


  ?>
