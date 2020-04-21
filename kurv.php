<?php
//Starter en session på siden
session_start();

//Tjekker om der findes en indkøbskurv session, hvis ikke bliver en ny startet
if (!isset($_SESSION["indkobskurv"])) {
	$_SESSION["indkobskurv"] = array();
}

//henter information fra connection.php, for at skabe kontakt til databasen
require_once "connection.php";

		//henter id fra det produkt man har valgt
    $id = $_GET['id'];

		//indsætter idet fra de valgte produkt i databasen
    array_push($_SESSION["indkobskurv"], $id);



		//henviser tilbage til webshoppen
  header("location: shop.php");

 ?>
