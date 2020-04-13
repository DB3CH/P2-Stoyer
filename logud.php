<?php
//starter en session
session_start();

//Sletter sessionen
session_destroy();

//Henviser tilbage til login siden
header('Location: login.php');
exit;
?>
