 <?php
 //starter en session på siden
 session_start();

 //henter idet for det valgte produkt
$id = $_GET['id'];

//kode der søger gennem session array og sletter de valgte id, hvilket fjerner produktet fra indkøbskurven
if (($key = array_search($id, $_SESSION["indkobskurv"])) !== false) {
  unset($_SESSION["indkobskurv"][$key]);
  header("location: viskurv.php");
}


  ?>
