<?php
session_start();
if (!isset($_SESSION["indkobskurv"])) {
	$_SESSION["indkobskurv"] = array();
}

require_once "connection.php";

    $id = $_GET['id'];

    array_push($_SESSION["indkobskurv"], $id);

  header("location: webshop.php");

 ?>
