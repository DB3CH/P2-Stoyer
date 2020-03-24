<?php
session_start();
if (!isset($_SESSION["indkøbskurv"])) {
	$_SESSION["indkøbskurv"] = array();
}

require_once "connection.php";

    $id = $_GET['id'];

    array_push($_SESSION["indkøbskurv"], $id);

  header("location: webshop.php");

 ?>
